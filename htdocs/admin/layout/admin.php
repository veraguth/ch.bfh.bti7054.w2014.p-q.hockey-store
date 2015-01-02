<?php
	include 'admin/editor.php';
	function setAdminLayout($adminMenu, $showPages, $showArticles){
	   	echo('
	   	<div class="container">
	   		<div class="row">
	   			<div id="admin-tools" class="col-md-2">
	   				<ul>
	   					<li><a onclick="showPages()" href="http://localhost/administrator/?pageID=0">pages</a></li>
	   					<li><a onclick="showArticles()" href="http://localhost/administrator/?articleID=0">articles</a></li>
	   				</ul>
	   			</div><!-- #admin-tools -->
	   			<div id="admin-pages" class="col-md-2'.$showPages.'">');
	   				echo($adminMenu);
	   	echo('
	   			</div><!-- #admin-pages -->
	   			<div id="admin-articles" class="col-md-2 hide'.$showArticles.'">');
	   				echo('articles');
	   	echo('
	   			</div><!-- #admin-articles -->
	   			<div id="admin-editor" class="col-md-8">
	   				');
	   	echo(getPageEditor());
	   	
	   	echo('
	   			</div><!-- #admin-editor -->
	   		</div><!-- .row -->
	   	</div><!-- .container -->');
	}
?>