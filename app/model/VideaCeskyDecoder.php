<?php

class VideaCeskyDecoder extends Nette\Object {

    /** @var string */
    private $url; //url na dané video

    /** @var string */
    private $html; //html dané stránky s videem

    public function __construct($url) {
        $this->url = $url;
        $this->html = @file_get_contents($this->url);
    }

    /**
     * Jméno videa podle VideaČesky.cz
     * @return string
     */
    public function getPostName() {
        $title = $this->getTextBetweenTags($this->html, "h1");
        $span = $this->getTextBetweenTags($title, "span");

        return strip_tags($span);
    }

    /**
     * Vrací text mezi dvěma tagy
     * @param string $string
     * @param string $tagname
     * @return string
     */
    private function getTextBetweenTags($string, $tagname) {
        $pattern = "/<$tagname ?.*>(.*)<\/$tagname>/";
        preg_match($pattern, $string, $matches);
        if (isset($matches[0]))
            return $matches[0];
        return "";
    }

    /**
     * Hlavní dekódovací metoda
     * @return type
     */
    public function decode() {
        require_once dirname(__FILE__) . '/../../vendor/simple_html_dom.php';
        $fetched = FALSE;

        $html = new simple_html_dom(); //podporuje nevalidní HTML
        $html->load($this->html);

        $tags = $html->find('embed'); //může zde být více videí, každé pravděpodobně bude v embed tagu.
        //jde o jedno video?
        $fetched = $this->decodeSingle($tags);

        if ($fetched != FALSE) {
            return $fetched;
        }

        //jde o playlist?
        $fetched = $this->decodePlaylist($tags);

        if ($fetched != FALSE) {
            return $fetched;
        }

        return $fetched;
    }

    private function decodeSingle($tags) {
        $return = array();
        foreach ($tags as $tag) {
            $flashvars = $tag->flashvars;

            //find youtube url and parse youtube ID
            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $flashvars, $matches);

            if (!isset($matches[0]))
                continue; //toto nevalidni video preskocit

            $id = $matches[0];

            /**
             * Subtitles
             */
            //file=http://www.videacesky.cz/autori/ABigWhiteWolf/titulky/11letaRekordmankaVHorolezectvi.srt
            preg_match("/file=http\:\/\/www.videacesky.cz\/autori(.*)srt/", $flashvars, $matches1);


            //captions.file=/autori/Ajvngou/titulky/oznaceni-uzemi.srt
            preg_match("/file=\/autori(.*)srt/", $flashvars, $matches2);

            //captions.file=http://www.videacesky.cz/autori/Mithril/titulky/VGHS02E05.srt
            preg_match("/captions\.file=(.*)\/autori(.*)srt/", $flashvars, $matches3);

            if (!isset($matches1[0]) && !isset($matches2[0]) && !isset($matches3[0]))
                continue; //tyto nevalidni titulky preskocit

            if (isset($matches1[0]))
                $subtitles = str_replace("file=", "", $matches1[0]);

            if (isset($matches2[0]))
                $subtitles = 'http://www.videacesky.cz' . str_replace("file=", "", $matches2[0]);

            if (isset($matches3[0]))
                $subtitles = str_replace(" ", "", str_replace("captions.file=", "", $matches3[0])); //remove spaces from URL

            /**
             * Return array
             * $id = ID of youtube video, eg. JH55-C
             * $subtitles = URL of subtitles for dowload, eg. http://www.videacesky.cz/autori/tynka/titulky/VsauceSetkaniSVsaucem.srt
             */
            $return[] = array(
                "youtube" => $id,
                "subtitles" => $subtitles
            );
        }//end foreach

        return $return;
    }

    private function decodePlaylist($tags) {
        foreach ($tags as $tag) {
            $flashvars = $tag->flashvars;
            preg_match("/playlistfile=http\:\/\/www.videacesky.cz\/autori(.*)xml/", $flashvars, $matches);

            if (!isset($matches[0]))
                return FALSE;

            $playlist = str_replace("playlistfile=", "", $matches[0]);

            $xml = simplexml_load_file($playlist);
            $result = array();

            foreach ($xml->channel->item as $item) {
                $item = $item[0];
                $ns = $item->children('http://developer.longtailvideo.com/'); //namespace

                $result[] = array("youtube" => $this->findYouTubeId((string) $ns->file), "subtitles" => 'http://www.videacesky.cz' . $ns->{'captions.file'});
            }

            return $result;
        }//end foreach
    }

}
