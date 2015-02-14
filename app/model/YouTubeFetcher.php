<?php

/**
 * Stahování YouTube videa pomocí http://youtubeinmp4.com/
 */
class YouTubeFetcher extends \Nette\Object {

    /** @var string */
    private $id; //specialni ID YouTube videa, např. "un_GfbhsEDs"

    /** @var string */
    private $link; //link k získání videa
    
    const FETCH_LINK = "http://www.youtubeinmp4.com/redirect.php?video=";

    public function __construct($id) {
        $this->id = $id;
        $this->link = self::FETCH_LINK . $this->id;
    }

    /**
     * Vrací asociativní pole link => odkaz ke stažení, thumbnail => náhled
     * Nebo FALSE při chybě
     * @return boolean|array
     */
    public function decode() {
        try {
            $done = array();
            $done["link"] = $this->link;
            $done["thumbnail"] = 'http://img.youtube.com/vi/'.$this->id.'/default.jpg';

            return $done;
        } catch (Exception $e) { //muze se pokazit hromada veci
            return FALSE;
        }
    }

}
