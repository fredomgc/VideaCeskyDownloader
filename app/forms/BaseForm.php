<?php
namespace App;

abstract class BaseForm extends \Nette\Application\UI\Form
{
    
    public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);
        
        $this->buildForm();
    }
       
    protected abstract function buildForm();
}