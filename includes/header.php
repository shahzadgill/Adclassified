 <?php
  if ($_REQUEST['cmd']=='login') {
  	extract($_REQUEST);
  	//die($login_email." - ".$login_password);
  	$obj = $a->user_login($login_email,$login_password);
  	 if ($obj>0) {
      $auth->create_session($obj);
      header('Location: dashboard.php');
    }
  }

  $user_info = $user->user_info($GLOBALS['u_id']);
  ?>
<div class="logo"><a href="index.html"><img src="img/czsale-logo.png" alt="CZSale" title="CZSale" /></a></div>
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#czsale-navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="czsale-navbar">
		<a href="addClassified.html" class="btn btn-success navbar-btn navbar-left add-classified-btn" style="margin-top:7px" role="button">Add classified</a>
		<ul class="nav navbar-nav navbar-right">
			<?php if ($GLOBALS['u_id']>0):?>
				<li class="dropdown">
                        <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                            <img src="http://placehold.it/64x64/e0e0e0" alt="Bill" class="img-circle" width="25px" height="25px" /> <?php echo ucfirst($user_info['name']); ?>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="dashboard.php">Home</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
			<?php else: ?>
				<li><a href="signup.php">Sign Up</a></li>
			<li class="dropdown">
				<a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
				<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
					<li>
						<div class="row">
							<div class="col-md-12">
								<form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
									<input type='hidden' name="cmd" value="login" >
									<div class="form-group">
										<label class="sr-only" for="exampleInputEmail2">Email address</label>
										<input type="email" class="form-control login_email" id="login_email" placeholder="Email address" name="login_email" required>
									</div>
									<div class="form-group">
										<label class="sr-only" for="exampleInputPassword2">Password</label>
										<input type="password" class="form-control login_password" id="login_password" placeholder="Password" name="login_password"  required>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success btn-block" name="login" id="login">Sign in</button>
									</div>
								</form>
							</div>
						</div>
					</li>
					<li class="divider"></li>
					<li>
						<div class="form-group">
							<button onclick="location.href='#'" class="btn btn-default btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
							<button onclick="location.href='#'" class="btn btn-default btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i> Sign in with Twitter</button>
							<button onclick="location.href='#'" class="btn btn-default btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign in with Google</button>
						</div>
					</li>
				</ul>
			</li>
			<?php endif; ?>



		</ul>   
	</div>
</nav>