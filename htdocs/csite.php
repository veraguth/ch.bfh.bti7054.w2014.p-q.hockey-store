<?php
 	include 'tools/menu.php';
    class csite {
        private $headers;
        private $footers;
        private $page;

        public function __construct() {
            $this->headers = array();
            $this->footers = array();
        }

        public function __destruct() {
            // clean up here
        }

        public function render($pageID) {
        	include 'layout/hockey-store.php';
            foreach($this->headers as $header) {
                include $header;
            }
            $this->page->loadPage($pageID);
            $menu = getMenu(1);
			
			setLayout($menu, $this->page->getContent());
			
            foreach($this->footers as $footer) {
                include $footer;
            }
        }

        public function addHeader($file) {
            $this->headers[] = $file;
        }

        public function addFooter($file) {
            $this->footers[] = $file;
        }

        public function setPage(cpage $page) {
            $this->page = $page;
        }

        public function getPage(){
        	return $this->page;
        }
    }
?> 