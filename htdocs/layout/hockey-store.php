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
						<div class="col-md-2">
							<button type="button" class="btn login-button">
								Anmelden
							</button>
							</a>
							<h2>Warenkorb</h2>
							<p>...</p>
							<p>...</p>
							<p>...</p>
						</div><!-- .col-md-2 -->
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
?>