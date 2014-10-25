<?php

namespace App;

/**
 * @author Ondrej Smetak <posta@ondrejsmetak.cz>
 */
class FlashMessages extends BaseComponent
{
	
    const INFO = 0;
	const BAD = 1;
    const GOOD = 2;
    
	public function render($flashes) 
	{
        $this->prepareTemplate();
        
        $good = array();
        $bad = array();
        $info = array();
        
        foreach($flashes as $flash){
            switch ($flash->type) {
                case self::INFO:
                    $info[] = $flash->message;
                    break;
                case self::BAD:
                    $bad[] = $flash->message;
                    break;
                case self::GOOD:
                    $good[] = $flash->message;
                    break;
                default:
                    break;
            }
        }
        
        $this->template->good = $good;
        $this->template->bad = $bad;
        $this->template->info = $info;
        $this->template->render();	
	}

}
