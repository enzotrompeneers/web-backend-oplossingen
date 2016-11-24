<?php
echo "2";
    class HTMLBuilder {
        private $header;
        private $body;
        private $footer;
        public function __construct($iHeader, $iBody, $iFooter) {
            echo "3";
            $this->header = $iHeader;
            $this->body = $iBody;
            $this->footer = $iFooter;
            
            $this->buildHeader();
            $this->buildBody();
            $this->buildFooter();
        }
        public function buildHeader() {
            include_once "html/" . $this->header . ".php";
            foreach (glob("css/*.css") as $filename)
            {
                include_once $filename;
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