<?php

namespace App\Presenters;

use Nette,
    App\Model;

/**
 * 
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

    public function createComponentFlash() {
        return new \App\FlashMessages();
    }

    public function doFormError(\App\BaseForm $f) {
        $errors = $f->getErrors();
        foreach ($errors as $error) {
            $this->flashMessage($error, \App\FlashMessages::BAD);
        }
    }

}
