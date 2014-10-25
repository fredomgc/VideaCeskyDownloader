<?php

namespace App\Presenters;

use Nette,
    App\Model;

class IndexPresenter extends BasePresenter {

    public function actionDone() {
        
    }

    public function actionDefault() {

        //$d = new \YouTubeDownloader("K6m40W1s0Wc");
        //$d->decode();
        //$this->template->test = $d->decode();
        //$this->doMagic("www.youtubeinmp4.com/youtube.php?video=http://www.youtube.com/watch?v=QplQL5eAxlY");
        //$this->setView("done");
//$this->redirect("done");
        //dump($this->link("done"));
//$this->flashMessage("aaaa");
    }

    public function createComponentUrlForm() {
        $f = new \App\UrlForm();
        $f->onError[] = callback($this, "doFormError");
        $f->onSuccess[] = callback($this, "doUrl");

        return $f;
    }

    public function doUrl(\App\UrlForm $f) {
        $done = array();
        $data = $f->getValues();

        $decoder = new \VideaCeskyDecoder($data->url);
        $data = $decoder->decode();

        if (!is_array($data)) {
            $this->doError();
        }
        foreach ($data as $single) {
            $youtube = new \YouTubeDownloader($single["youtube"]);
            $video = $youtube->decode();

            if ($video != FALSE) {
                $done[] = array("youtube" => $video["link"], "subtitles" => $single["subtitles"], "thumbnail" => $video["thumbnail"]);
            }
        }

        $this->template->title = $decoder->getPostName();
        $this->template->data = $done;

        if (empty($done)) {
            $this->doError();
        }

        $this->setView("done");
    }

    function doError() {
        $this->flashMessage("Na zadané stránce se nepodařilo nalézt žádná videa ke stažení. Pokud věříte, že jde o chybu, nahlaste ji prosím.", \App\FlashMessages::BAD);
        $this->redirect("Index:");
    }

}
