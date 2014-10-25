<?php

namespace App;

/**
 * @author Ondrej Smetak <posta@ondrejsmetak.cz>
 */
abstract class BaseComponent extends \Nette\Application\UI\Control
{
    protected function prepareTemplate()
    {
        $reflect = new \ReflectionClass($this);
        $nameOfClass = $reflect->getShortName();
        
        $this->template->setFile(dirname(__FILE__) . '/' . $nameOfClass .'/' .$nameOfClass . '.latte');  
    }
}
