<?php

class Prix{

    function __construct() {
        
    }
    
    public function __toString() {
        return $this->_variable." ".$this->_db;
    }
}