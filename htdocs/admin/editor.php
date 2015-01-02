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
			$request = "SELECT title, naviText, content, path FROM pages WHERE pageID = '$pageID'";
			$return = mysqli_query($db, $request);
			while($row = mysqli_fetch_object($return))
				{
				  $title = $row->title;
				  $naviText = $row->naviText;
				  $content = $row->content;
				  $path = $row->path;
				}
			$contentEditor = $contentEditor.'<form action="http://localhost/administrator?pageID='.$_GET['pageID'].'" method="post">';
			$contentEditor = $contentEditor.'<div class="col-md-12"><input type="submit" name="save" value="save" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Title</div><div class="col-md-10"><input name="title" type="text" value="'.$title.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">naviText</div><div class="col-md-10"><input name="naviText" type="text" value="'.$naviText.'" /></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">Content</div><div class="col-md-10"><textarea name="content" rows="10" cols="100">'.$content.'</textarea></div>';
			$contentEditor = $contentEditor.'<div class="col-md-2">naviText</div><div class="col-md-10"><input name="path" type="text" value="'.$path.'" /></div>';
			
		}

		if(isset($_POST['save'])) {
		    savePage();
		}
		
		return $contentEditor;
	}

	function savePage() {
		include 'dbconnect.php';
		$request = "UPDATE pages SET";
		$request = $request." title = '".$_POST['title']."',";
		$request = $request." naviText = '".$_POST['naviText']."',";
		$request = $request." content = '".$_POST['content']."',";
		$request = $request." path = '".$_POST['path']."'";
		$request = $request." WHERE pageID = ".$_GET['pageID'];

		if ($db->query($request) === TRUE) {
		    echo "save successfull";
		} else {
		    echo "save caused error: " . $db->error;
		}
	}
    
?>