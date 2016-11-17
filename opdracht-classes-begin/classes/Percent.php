<?php
    class Percent {
        public $absolute, $relative, $hundred, $nominal;
        public function __construct($new, $unit) {
            $this->absolute = $this->formatNumber($new / $unit);
            $this->relative = $this->formatNumber($this->absolute -1);
            $this->hundred = $this->formatNumber($this->absolute * 100);
            
            if ($this->absolute == 1) {
                $this->nominal = "status-quo";
            } elseif ($this->absolute > 1) {
                $this->nominal = "positive";
            } else { 
                $this->nominal = "negative";
            }
        }
        public function formatNumber($number) {
            return number_format($number, 2, '.', ' '); # 2cijfers na de komma
        }
    }
?>