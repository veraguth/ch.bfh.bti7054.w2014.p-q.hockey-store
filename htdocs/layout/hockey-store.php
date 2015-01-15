<?php
   function setLayout($menu, $content, $template, $pageID){
   	include($template); ?>
		<div id="header">
			<div class="login" style="display:none;">
				<div class="container">
					<form name="login" action="login.php" method="POST">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label for="username">Benutzername: </label>
									<input class="form-control" name="username" type="text" required="true">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group">
									<label for="password">Passwort: </label>
									<input class="form-control" name="password" type="password" required="true">
								</div>
							</div>
							<div class="col-sm-2">
								<input class="btn" type="submit" value="Absenden">
							</div>
						</div><!-- .row -->
					</form>
				</div><!-- .container -->
			</div><!-- .login -->
			<div class="register" style="display:none;">
				<div class="container">
					<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label for='firstName'> Vorname: </label>
									<input class="form-control" type='text' name='firstName' id='firstName' maxlength="50" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='lastName'> Nachname: </label>
									<input class="form-control" type='text' name='lastName' id='lastName' maxlength="50" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='username'>UserName:</label>
									<input class="form-control" type='text' name='userName' id='userName' maxlength="50" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='password'>Password:</label>
									<input class="form-control" type='password' name='password' id='password' maxlength="50" required="true"/>
								</div><!-- .form-group -->
							</div><!-- .col-sm-5 -->
							<div class="col-sm-5">
								<div class="form-group">
									<label for='email'>Email Address:</label>
									<input class="form-control" type='email' name='email' id='email' maxlength="50" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='street'> Strasse: </label>
									<input class="form-control" type='text' name='street' id='street' maxlength="50" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='zipCode'> Postleitzahl: </label>
									<input class="form-control" type='number' name='zipCode' id='zipCode' min="1000" max="9999" required="true"/>
								</div><!-- .form-group -->
								<div class="form-group">
									<label for='city'> Stadt: </label>
									<input class="form-control" type='text' name='city' id='city' maxlength="50" required="true"/>
								</div><!-- .form-group -->
							</div><!-- .col-sm-5 -->
							<div class="col-sm-2">
								<input class="btn" type='submit' name='register' value='Absenden'/>
							</div><!-- .col-sm-2 -->
						</div><!-- .row -->
					</form>
				</div>
			</div><!-- .register -->	
			<div class="shortcuts container">
				<div class="row">
					<div class="col-sm-2 text-right col-sm-offset-10">
					<?php if(!isset($_SESSION['username'])){?>
					<div class="col-sm-6">
						<button class="login-button">Login</button>
					</div>
					<?php
					} else{?>
						<div class="col-sm-6 logout">
							<form name="logout" action="logout.php" method="POST">
								<input type="text" name="username" hidden>
								<input type="submit" value="logout" name="logout">
							</form>
						</div>
				<?php
						} ?>
						<div class="col-sm-6">
							<button class="register-button">Register</button>
						</div>
					</div>
				</div>
			</div>
			<div id="banner">
				<div id="logo">
					<a href="http://localhost/home">
						<img src="images/logo.png">
					</a>
				</div><!-- #logo -->
				<img src="images/banner.png">
				<div id="navigation" class="container">
					<div class="row">
						<div class="col-sm-9">
						<?php echo $menu; ?>
						</div>
						<div class="col-sm-3 search">
							<input type="text" onkeyup="searchFor(this.value);"/>
							<div id="summary"></div>
						</div>
					</div>
				</div>
			</div><!-- #banner -->
		</div><!-- .header -->
		<div id="content-wrap">
			<div id="content" class="container">
				<div class="row">
					<div class="col-sm-9">
						<div id="main-content">
							<?php echo($content); ?>
						</div><!-- #main-content -->
						<?php echo(getTemplateContent($pageID)); ?>
					</div>
					<div id="cart"  class="col-sm-3">
						<h2>Warenkorb</h2>
						<hr>
						<?php echo displayCart(); ?>
						<form name="email" action="email.php" method="POST">
							<input name="email" type="text" value="email" hidden>
							<input class="btn" type="submit" value="Absenden">
						<form>
					</div><!-- .col-sm-3 -->
				</div><!-- .row -->
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
   <?php }
   
   function displayCart(){
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
			$query = "SELECT name, price, picture FROM articles WHERE articleID = ?";
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
				$picture = $row->picture;
				$sum = $num*$price;
				$totalPrice += $sum;
				
				?>
				<div class="article-cart">
					<div class="row">
						<div class="article-image-cart col-xs-4">
							<img src="<?php echo $picture; ?>" />
						</div><!-- .article-image-cart -->
						<div class="article-info-cart col-xs-8">
							<h3><?php echo $name; ?></h3>
							<p>Anzahl: <?php echo $num; ?> 
								<a class="cart-remove" href="cart.php?action=remove&artId=<?php echo $artId; ?>&num=1">-</a><a class="cart-add" href="cart.php?action=add&artId=<?php echo $artId; ?>&num=1">+</a></p>
							<p>Preis: <span style="float:right;">CHF <?php echo $sum; ?></span></p>
						</div><!-- .article-info-cart -->
					</div><!-- .row -->
					
					<hr>
				</div><!-- .article-cart -->
					<?php
			}?>
				<div class="row">
					<div class="col-xs-12">
						<p>Gesamtsumme:  <span style="float:right;">CHF <?php echo $totalPrice; ?></span></p>
					</div>
				</div>
			<?php
		} else {
			echo 'Der Warenkorb ist leer!';
		}
   }
?>