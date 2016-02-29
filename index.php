<?php 
  include("includes/config.php");
  include("includes/classes/auth.php");
  include("includes/classes/db.php");
  include("includes/functions.php");
  include("includes/classes/accounts.php");
  include("includes/classes/user.php");

  $title = "CZsales";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("includes/header-include.php") ?>
	</head>
	<body>
		<div class="container wrapper">   
			<?php include("includes/header.php") ?>


			<div class="row content">
				<?php include("includes/content-left.php") ?>
				<div class="col-lg-9 content-right">
					<div class="hidden-xs hidden-sm">
						<h4>Featured</h4>
						<div class="featured">
							<a href="index.html#"><img src="img/slides/slide-00.jpg" /></a>
							<a href="index.html#"><img src="img/slides/slide-01.jpg" /></a>
							<a href="index.html#"><img src="img/slides/slide-02.jpg" /></a>
						</div>
					</div>
					<h4>Recommended</h4>
					<div class="row selected-classifieds">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Samsung Galaxy S4</a></h5>
									<p class="price">550 EUR</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Vizio 60" Slim Frame 3D</a></h5>
									<p class="price">370 EUR</strong></p>                 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Logitech 2.1 HS-263</a></h5>
									<p class="price">36 EUR</strong></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Apple McBook Pro</a></h5>
									<p class="price">740 EUR</strong></p>                    
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Adidas Blake 46"</a></h5>
									<p class="price">55 EUR</strong></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Card reader MobileLite G2</a></h5>
									<p class="price">10 EUR</strong></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Electonics toolkit (40 pieces)</a></h5>
									<p class="price">28 EUR</strong></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class="thumbnail">
								<a href="index.html#"><img src="http://placehold.it/800x600/e0e0e0" /></a>
								<div class="caption">
									<h5><a href="index.html#">Nokia Lumia 800</a></h5>
									<p class="price">185 EUR</strong></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("includes/footer.php") ?>
		</div>
		<?php include("includes/footer-include.php") ?>
	</body>
</html>