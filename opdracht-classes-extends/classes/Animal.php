<?php 
    class Animal {
        protected $name, $gender, $health;
        
        public function __construct($iName, $iGender, $iHealth) {
            $this->name = $iName;
            $this->gender = $iGender;
            $this->health = $iHealth;
        }
        public function getName() {
            return $this->name;
        }
        public function getGender() {
            return $this->gender;
        }
        public function getHealth() {
            return $this->health;
        }
        public function changeHealth($healthPoints) {
            $this->health += $healthPoints;
        }
        public function doSpecialMove() {
            return "walk";
        }
        
    }
?>