<?php
 	include 'tools/menu.php';
    class asite {
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

        public function render() {
        	$showPages = ' hide';
            $showArticles = ' hide';
            if (isset($_GET['pageID'])) {
                $showPages = ' show';
            }

            if (isset($_GET['articleID'])) {
                $showArticles = ' show';
            }
            include 'admin/layout/admin.php';
            foreach($this->headers as $header) {
                include $header;
            }
            //$this->page->loadAdminPage();
            $adminMenu = getAdminMenu();
            setAdminLayout($adminMenu, $showPages, $showArticles);
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

        public function setPage(apage $page) {
            $this->page = $page;
        }

        public function getPage(){
        	return $this->page;
        }
    }
?> 