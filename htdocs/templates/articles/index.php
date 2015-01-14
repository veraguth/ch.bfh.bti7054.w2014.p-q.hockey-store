<?php
   function getTemplateContent($pageID) {
   	echo '<div class="row">';
   	getArticles(getArticleCategoryID($pageID));
   	echo '</div>';
   }

   function getArticleCategoryID($pageID) {
   		include 'dbconnect.php';
   		$request = "SELECT articleCategoryID FROM pages WHERE pageID = '$pageID'";
   		$return = mysqli_query($db, $request);
   		$articleCategoryID;
   		while($row = mysqli_fetch_object($return))
			{
			  $articleCategoryID = $row->articleCategoryID;
			}

		return $articleCategoryID;
   }

   function getArticles($articleCategoryID) {
   		include 'dbconnect.php';
   		$request = "SELECT articleID, name, picture, lead, price FROM articles WHERE categoryID = '$articleCategoryID'";
   		$return = mysqli_query($db, $request);
   		while($row = mysqli_fetch_object($return))
			{
				?>	
				<div class="col-md-4 col-sm-6 col-xs-12">
               <div class="article-lead">
                  <h2><?php echo $row->name; ?></h2>
   					<img src="http://localhost<?php echo $row->picture; ?>" />
                  <div class="article-lead-text"><?php echo $row->lead; ?></div>
                  <h3>Preis: CHF <?php echo $row->price; ?></h3>
				  <form action="cart.php" method="GET">
					<input type="hidden" name="action" value="add">
					<input type="hidden" name="artId" value="<?php echo $row->articleID ?>">
					<input type="number" name="num" value=1 required>
					<input type="submit" value="Bestellen">
				  </form>
               </div>
				</div>
				<?php
			}

   }
?>