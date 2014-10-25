<?php

namespace App\Presenters;

use Nette,
    App\Model;

class StartPresenter extends BasePresenter {

    public function actionDefault() {
        $url = $this->getParameter("url");
        if ($url != NULL && \Nette\Utils\Validators::isUrl($url)) {
            $this->doDecode($url);
        }
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

        $this->doDecode($data->url);
    }

    private function doDecode($url) {
        $decoder = new \VideaCeskyDecoder($url);
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
        $this->redirect("Start:");
    }

}
