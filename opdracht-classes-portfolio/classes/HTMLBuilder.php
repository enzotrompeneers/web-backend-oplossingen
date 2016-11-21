<?php
    class HTMLBuilder {
        private $header, $body, $footer;
        public function __constructor($iHeader, $iBody, $iFooter) {
            echo "5";
            $this->header = $iHeader;
            $this->body = $iBody;
            $this->footer = $iFooter;
            
            $this->buildHeader();
            $this->buildBody();
            $this->buildFooter();
        }
        public function buildHeader() {
            include_once "html/" . $this->header . ".php";
            echo "2";
            foreach (glob("css/*.css") as $filename)
            {
                include_once $filename;
                echo "1";
            }
        }
        public function buildBody() {
            include_once "html/" . $this->body . ".php";
        }
        public function buildFooter() {
            include_once "html/" . $this->footer . ".php";
            foreach (glob("js/*.js") as $filename)
            {
                include_once $filename;
            }
        }
    }
?>