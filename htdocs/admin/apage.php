 <?php
	
    class apage {
        private $title;
        private $content;
		private $pageID;		

        public function __construct($pageID) {
            $this->pageID = $pageID;
        }

        public function __destruct() {
            // clean up here
        }

        public function getContent() {
            return "<H1>{$this->title}</H1>".$this->content;
        }

        public function setContent() {
			include 'dbconnect.php';
			$request = "SELECT content FROM pages WHERE pageID = $this->pageID";
			$return = mysqli_query($db, $request);
			while($row = mysqli_fetch_object($return))
				{
				  $this->content = $row->content;
				}
        }
		
		public function setTitle() {	
			include 'dbconnect.php';
			$request = "SELECT title FROM pages WHERE pageID = $this->pageID";
			$return = mysqli_query($db, $request);
			while($row = mysqli_fetch_object($return))
				{
				  $this->title = $row->title;
				}
		}

		public function getPageID() {
			return $this->pageID;
		}

		function loadPage($pageID) {
		    $this->pageID = $pageID;
		    $this->setContent();
		    $this->setTitle();
		}
    }
?> 