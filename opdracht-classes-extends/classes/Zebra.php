<?php
    class Zebra extends Animal {
        protected $species;
        
        public function __construct($iName, $iGender, $iHealth, $iSpecies) {
            parent:: __construct($iName, $iGender, $iHealth);
            $this->species = $iSpecies;
        }
        public function getSpecies() {
            return $this->species;
        }    
    }
?>