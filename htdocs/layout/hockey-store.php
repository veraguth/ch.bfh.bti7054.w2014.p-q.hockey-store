<?php
   function setLayout($menu, $content, $template, $pageID){
   	include($template);
   	echo('
			<div id="header">
				<div id="banner">
					<img src="images/banner.png">
				</div>
			</div>
			<div id="content-wrap">
				<div id="content" class="container">
					<div id="main-content" class="row">
						<div class="col-md-2 hidden-xs hidden-sm">');
							echo $menu;
							echo ('
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">');

			
            echo($content);
            
			
			echo('
								</div><!-- .col-md-12 -->
							</div><!-- .row -->');
							
			echo(getTemplateContent($pageID));
			echo('
								
						</div><!-- .col-md-8 -->
						<div class="col-md-2">');
			if(!isset($_SESSION['username'])){
			echo('<form name="login" action="login.php" method="POST">
								<input name="username" type="text" required="true">
								<input name="password" type="password" required="true">
								<input type="submit">
							</form>');
			} else{
				echo('<h3>logged in</h3>');
			}
			echo('<h2>Warenkorb</h2>');
			echo displayCart();
			echo('</div><!-- .col-md-2 -->
					</div><!-- ##main-content -->
				</div><!-- ##content -->
			</div><!-- ##content-wrap -->
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p>hockey-store.ch<br>
							Wald-und-Wiesenweg 567<br>
							CH-59354 Pfludiwil<br>
							Tel: 025 123 45 67<br>
							E-Mail: <a href="mailto:info@hockey-store.ch">info@hockey-store.ch</a>
							</p>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- ##footer -->
			');
   }
   
   function displayCart(){
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
			$query = "SELECT name, price FROM articles WHERE articleID = ?";
			$mysqli = new mysqli('localhost', 'root', '', 'hockey-store_ch');
			$stmt = $mysqli->prepare($query);
		
			$totalPrice = 0;
			foreach($cart as $artId=>$num){
				$stmt->bind_param('i', $artId);
				$stmt->execute();
				$res = $stmt->get_result();
				$row = $res->fetch_object();
				$name = $row->name;
				$price = $row->price;
				$sum = $num*$price;
				$totalPrice += $sum;
				
				echo $name . ': ' . $num . 'x' . $price . '=' . $sum;
				echo '<a href="cart.php?action=remove&artId=' . $artId . '&num=1">remove</a><br/>';
			}
			echo 'totaler Wert: ' . $totalPrice;
		} else {
			echo 'Der Warenkorb ist leer!';
		}
   }
?>