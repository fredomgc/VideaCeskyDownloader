<?php

namespace App;

class UrlForm extends BaseForm {

    protected function buildForm() {
        $this->addText("url", "URL videa")
                ->addRule(BaseForm::URL, "Nejedná se o platnou URL")
                ->setAttribute("placeholder", "http://www.videacesky.cz/skece/whose-line-is-it-anyway-nic-nez-otazky-5")
                ->setRequired("Musíte uvést URL");

        $this->addSubmit("done", "Najít video a titulky");
    }

}
