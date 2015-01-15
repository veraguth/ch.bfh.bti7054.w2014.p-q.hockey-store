<?php
	function getPageEditor(){
		//include('admin/savePage.php');
		$contentEditor = '';
		if (isset($_GET['pageID']) && $_GET['pageID'] > 0) { 
			
			include 'dbconnect.php';
			$pageID = $_GET['pageID'];
			$title = '';
			$naviText = '';
			$content = '';
			$path = '';
			$request = "SELECT title, naviText, content, path, articleCategoryID FROM pages WHERE pageID = '$pageID'";
			$return = mysqli_query($db, $request);
			while($row = mysqli_fetch_object($return))
				{
				  $title = $row->title;
				  $naviText = $row->naviText;
				  $content = $row->content;
				  $path = $row->path;
				  $articleCategoryID = $row->articleCategoryID;
				}
			$contentEditor = $contentEditor.'<form action="http://localhost/administrator?pageID='.$_GET['pageID'].'" method="post">';
			$contentEditor = $contentEditor.'<div class="col-md-12"><input type="submit" name="deletePage" value="delete page" /></div>';
			$contentEditor = $contentEditor.'</form>';
			$contentEditor = $contentEditor.'<form action="http://localhost/administrator?pageID='.$_GET['pageID'].'" method="post">';
			$contentEditor = $contentEditor.'<div class="col-md-12"><input type="submit" name="savePage" value="save page" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Title</div><div class="col-md-10"><input name="title" type="text" value="'.$title.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">naviText</div><div class="col-md-10"><input name="naviText" type="text" value="'.$naviText.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Content</div><div class="col-md-10"><textarea name="content" rows="10" cols="100">'.$content.'</textarea></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">naviText</div><div class="col-md-10"><input name="path" type="text" value="'.$path.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Article category ID</div><div class="col-md-10"><input name="articleCategoryID" type="text" value="'.$articleCategoryID.'" /></div>';
			$contentEditor = $contentEditor.'</form>';

			
		}

		if (isset($_GET['articleID']) && isset($_GET['articleCategoryID'])) { 
			
			include 'dbconnect.php';
			$articleID = $_GET['articleID'];
			$name = '';
			$picture = '';
			$price = '';
			$brand = '';
			$text = '';
			$lead = '';
			$request = "SELECT name, picture, price, brand, text, lead FROM articles WHERE articleID = '$articleID'";
			$return = mysqli_query($db, $request);
			while($row = mysqli_fetch_object($return))
				{
				  $name = $row->name;
				  $picture = $row->picture;
				  $price = $row->price;
				  $brand = $row->brand;
				  $text = $row->text;
				  $lead = $row->lead;
				}
			$contentEditor = $contentEditor.'<form action="http://localhost/administrator?articles=1&articleCategoryID='.$_GET['articleCategoryID'].'&articleID='.$_GET['articleID'].'" method="post">';
			$contentEditor = $contentEditor.'<div class="col-md-12"><input type="submit" name="deleteArticle" value="delete article" /></div>';
			$contentEditor = $contentEditor.'</form>';
			$contentEditor = $contentEditor.'<form action="http://localhost/administrator?articles=1&articleCategoryID='.$_GET['articleCategoryID'].'&articleID='.$_GET['articleID'].'" method="post">';
			$contentEditor = $contentEditor.'<div class="col-md-12"><input type="submit" name="saveArticle" value="save article" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Name</div><div class="col-md-10"><input name="name" type="text" value="'.$name.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Picture</div><div class="col-md-10"><input name="picture" type="text" value="'.$picture.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Price</div><div class="col-md-10"><input name="price" type="text" value="'.$price.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Brand</div><div class="col-md-10"><input name="brand" type="text" value="'.$brand.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Lead</div><div class="col-md-10"><textarea name="lead" rows="3" cols="100">'.$lead.'</textarea></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Text</div><div class="col-md-10"><textarea name="text" rows="10" cols="100">'.$text.'</textarea></div>';
			$contentEditor = $contentEditor.'</form>';
			
			
		}

		if(isset($_POST['savePage'])) {
		    savePage();
		}

		if(isset($_POST['deletePage'])) {
		    deletePage();
		}

		if(isset($_POST['saveArticle'])) {
		    saveArticle();
		}

		if(isset($_POST['deleteArticle'])) {
		    deleteArticle();
		}
		
		return $contentEditor;
	}

	

	function saveArticle() {
		include 'dbconnect.php';
		$request = "UPDATE articles SET";
		$request = $request." name = '".$_POST['name']."',";
		$request = $request." picture = '".$_POST['picture']."',";
		$request = $request." price = '".$_POST['price']."',";
		$request = $request." brand = '".$_POST['brand']."',";
		$request = $request." lead = '".$_POST['lead']."',";
		$request = $request." text = '".$_POST['text']."'";
		$request = $request." WHERE articleID = ".$_GET['articleID'];

		if ($db->query($request) === TRUE) {
		    echo "save successfull";
		} else {
		    echo "save caused error: " . $db->error;
		}
	}

	function savePage() {
		include 'dbconnect.php';
		$request = "UPDATE pages SET";
		$request = $request." title = '".$_POST['title']."',";
		$request = $request." naviText = '".$_POST['naviText']."',";
		$request = $request." content = '".$_POST['content']."',";
		$request = $request." path = '".$_POST['path']."',";
		$request = $request." articleCategoryID = '".$_POST['articleCategoryID']."'";
		$request = $request." WHERE pageID = ".$_GET['pageID'];

		if ($db->query($request) === TRUE) {
		    echo "save successfull";
		} else {
		    echo "save caused error: " . $db->error;
		}
	}

	function deletePage() {
		include 'dbconnect.php';
		$request = "DELETE FROM pages WHERE pageID = ".$_GET['pageID'];
		if ($db->query($request) === TRUE) {
		    echo "delete successfull";
		} else {
		    echo "delete caused error: " . $db->error;
		}
	}

	function deleteArticle() {
		include 'dbconnect.php';
		$request = "DELETE FROM articles WHERE articleID = ".$_GET['articleID'];
		if ($db->query($request) === TRUE) {
		    echo "delete successfull";
		} else {
		    echo "delete caused error: " . $db->error;
		}
	}
    
?>