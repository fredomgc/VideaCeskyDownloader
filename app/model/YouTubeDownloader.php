<?php

class YouTubeDownloader extends \Nette\Object {

    /** @var string */
    private $id; //specialni ID YouTube videa, např. "un_GfbhsEDs"

    /** @var string */
    private $html;

    const DOWNLOAD_LINK = "http://keepvid.com/?url=https://www.youtube.com/watch?v=";

    public function __construct($id) {
        $this->id = $id;
        $link = self::DOWNLOAD_LINK . $this->id;
        $this->html = file_get_contents($link);
    }

    /**
     * Vrací asociativní pole link => odkaz ke stažení, thumbnail => náhled
     * Nebo FALSE při chybě
     * @return boolean|array
     */
    public function decode() {
        try {
            require_once dirname(__FILE__) . '/../../vendor/simple_html_dom.php';

            $html = new simple_html_dom(); //podporuje nevalidní HTML
            $html->load($this->html);

            $done = array();
            
            //NAHLED
            $pieces = $html->find("div#dl img.m");
            if (!isset($pieces[0]))
                return FALSE;

            $piece = $pieces[0];
            $done["thumbnail"] = $piece->src;
            
            //VIDEO
            $pieces = $html->find('div#dl a.l'); //jednotlivé odkazy ke stažení
            if (!isset($pieces[0]))
                return FALSE;

            $piece = $pieces[0]; //vezmeme ten první, což je video v MP4

            $done["link"] = $piece->href;
            
            if(empty($done)) return FALSE;
            
            return $done;
        } catch (Exception $e) { //muze se pokazit hromada veci
            return FALSE;
        }
    }

}
