 <?php
 
	
    function __autoload($class) {
        include "$class.php";
    }

    function initialise_site(asite $site) {
        $site->addHeader("header.php");
        $site->addFooter("footer.php");
    }
?> 