<?php
function loadPageAdmin(asite $site) {
	include 'dbconnect.php';
	$site->render();
}

function getAdminMenu(){
	include 'dbconnect.php';
	$menu = '';
	if(isset($_GET['pageID'])) {
		$request = "SELECT naviText, pageID, path FROM pages WHERE parent_pageID = 1";
		$return = mysqli_query($db, $request);
		$menu = '<ul class="">';
		$menu = $menu.'<form action="http://localhost/administrator" method="post">';
		$menu = $menu.'<input type="submit" name="newPage" value="new Page" />';
		$menu = $menu.'</form>';
		while($row = mysqli_fetch_object($return)) {
			  $menu = $menu.'<li><a href="http://localhost/administrator?pageID='.$row->pageID.'">'.$row->naviText.'</a></li>';
		}
		$menu.'</ul>';
	}

	if(isset($_GET['articles']) && $_GET['articleCategoryID'] < 0) {
		include 'dbconnect.php';
		$request = "SELECT categoryID, name FROM articlecategories";
		$return = mysqli_query($db, $request);
		$menu = '<h2>Article Categories</h2><ul class="">';
		while($row = mysqli_fetch_object($return)) {
			  $menu = $menu.'<li><a href="http://localhost/administrator?articles=1&articleCategoryID='.$row->categoryID.'">'.$row->name.'</a></li>';
		}
		$menu.'</ul>';
	}

	if(isset($_GET['articles']) && $_GET['articleCategoryID'] >= 0) {
		include 'dbconnect.php';
		$request = "SELECT articleID, name FROM articles WHERE categoryID = ".$_GET['articleCategoryID'] ;
		$return = mysqli_query($db, $request);
		$menu = '<h2>Articles</h2><ul class="">';
		$menu = $menu.'<form action="http://localhost/administrator?articles=1&articleCategoryID='.$_GET['articleCategoryID'].'" method="post">';
		$menu = $menu.'<input type="submit" name="newArticle" value="new Article" />';
		$menu = $menu.'</form>';
		while($row = mysqli_fetch_object($return)) {
			  $menu = $menu.'<li><a href="http://localhost/administrator?articles=1&articleCategoryID='.$_GET['articleCategoryID'].'&articleID='.$row->articleID.'">'.$row->name.'</a></li>';
		}
		$menu.'</ul>';
	}

	if(isset($_POST['newPage'])) {
	    newPage();
	}

	if(isset($_POST['newArticle'])) {
	    newArticle();
	}
	
	return $menu;
}



function newPage() {
	include 'dbconnect.php';
	$request = "INSERT INTO pages (parent_pageID, title, naviText, templateID, content, languageID, path)";
	$request =  $request."values(1, 'new page', 'new page', 3, '', 2, 'path123')";

	if ($db->query($request) === TRUE) {
	    echo "page added successfull";
	} else {
	    echo "adding page caused error: " . $db->error;
	}
}

function newArticle() {
	include 'dbconnect.php';
	$request = "INSERT INTO articles (name, categoryID, picture, text, lead, price, brand)";
	$request =  $request."values('new article', ".$_GET['articleCategoryID'].", '', '', '', '','')";

	if ($db->query($request) === TRUE) {
	    echo "article added successfull";
	} else {
	    echo "adding article caused error: " . $db->error;
	}
}


?>