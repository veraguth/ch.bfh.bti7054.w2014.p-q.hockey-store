<?php
   function getTemplateContent($pageID) {
   	echo '<div class="row">';
      if(isset($_GET['articleID'])) getArticle($_GET['articleID']);
   	else getArticles(getArticleCategoryID($pageID));
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
               <a href="http://localhost<?php echo $_SERVER['REQUEST_URI']; ?>?articleID=<?php echo $row->articleID; ?>">
                  <div class="article-lead">
                     <h2><?php echo $row->name; ?></h2>
      					<img src="http://localhost<?php echo $row->picture; ?>" />
                     <!--<h3>Preis: CHF <?php echo $row->price; ?></h3>
                     <div class="article-lead-text"><?php echo $row->lead; ?></div>-->                  
                  </div>
               </a>
				</div>
				<?php
			}
   }

   function getArticle($articleID) {
      include 'dbconnect.php';
      $request = "SELECT articleID, name, picture, text, price FROM articles WHERE articleID = '{$_GET['articleID']}'";
      $return = mysqli_query($db, $request);
      while($row = mysqli_fetch_object($return))
      {
      ?>         
         <div class="col-sm-6 col-xs-12 article-image">
            
            <img src="http://localhost<?php echo $row->picture; ?>" />
            
         </div><!-- .col-md-12 -->
         <div class="col-sm-6 col-xs-12">
            <h2><?php echo $row->name; ?></h2>
            <?php echo $row->text; ?>
            <h3>CHF <?php echo $row->price; ?></h3>
            <form action="cart.php" method="GET">
               <input type="hidden" name="action" value="add">
               <input type="hidden" name="artId" value="<?php echo $row->articleID ?>">
               <input type="number" name="num" value=1 hidden>
               <select name="groesse">
                  <option>L</option>
                  <option>M</option>
                  <option>S</option>
               </select>
               <input type="submit" value="In den Warenkorb">
              </form>
            <script>
             document.write('<a href="' + document.referrer + '"><button>Go Back</button></a>');
         </script>
         </div><!-- .col-md-12 -->
         <?php
      }

      ?><script>document.getElementById("main-content").innerHTML = "";</script><?php
   }
?>