<?php
	if(isset($_POST['savePage']))
	{
	    savePage();

	}

	function savePage() {
		include 'dbconnect.php';
		$request = 'UPDATE pages SET title = "'.$_POST["title"].'"'.' WHERE id = "'.$_GET["pageID"].'"';

		$db->query($request);
	}
?>