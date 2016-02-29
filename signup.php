<?php 
  include("includes/config.php");
  include("includes/classes/auth.php");
  include("includes/classes/db.php");
  include("includes/functions.php");
  include("includes/classes/accounts.php");
  include("includes/classes/user.php");
  $uid=$auth->get_id();
  if ($uid>0) {
  	header('Location: dashboard.php');
  }
  $title = "Create Account";
  if ($_REQUEST['cmd']=='signup') {
  	extract($_REQUEST);
  	//die($firstname." - ".$lastname." - ".$email." - ".$password." - ".$rpassword." - ".$city_id);
  	$obj = $a->create_account($firstname,$lastname,$email,$password,$rpassword,$city_id);
  	 if ($obj>0) {
      $auth->create_session($obj);
      header('Location: dashboard.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("includes/header-include.php") ?>
		<script src="<?php echo BASE_URL?>/js/account.js"></script>
		<script>
		function check_email(value){
			$.get(base_url+'/ajax/ajax.php?cmd=check_email&email='+value,function(data){
		       if (data>0) {
		        $('#email_err').show();
		        $('#email_id').val(1);
		       }
		       else{
		         $('#email_err').hide();
		         $('#email_id').val(0);
		       }      
		    });
		}
		function check_err(){
		   if($('#user-register').valid()==true){
		      var e = document.getElementById("email_id").value;
		      //$('#create-account').attr('disabled','disabled');
		      //$('#loader').attr('class','fa fa-refresh fa-spin');
		      if (e==1) {
		        return false;
		        $('#create-account').prop('disabled',false);
		      }
		      else{
		      	$('#create-account').prop('disabled',true);
		        return true;
		      }
		   }
		   return false;
		}
		function rem(name){
		    if (name=='email') {
		      $('#email_err').hide();
		    }
		    else if (name=='user') {
		      $('#user_err').hide();
		    }
		}
		</script>
	</head>
	<body>
		<div class="container wrapper">   
			<?php include("includes/header.php") ?>
			<div class="row content">
				<?php include("includes/content-left.php") ?>
				<div class="col-lg-9 content-right">
					<h2>Sign Up</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet porta eros, eget facilisis arcu. Duis condimentum fermentum enim, ac rutrum erat venenatis vel. Morbi pharetra viverra faucibus.</p>
					<hr>
					<div class="row">
						<div class="col-lg-12">
							<div class="well">
								<form method="post" role="form" id="user-register" onsubmit="return check_err()">
									<input  name="email_id" id="email_id" value="0" type="hidden" />
					                <input  name="city_id" id="city_id" value="0" type="hidden" />
					                <input type="hidden" name="fb_id" value="<?php echo $_SESSION['fb_id']?>">
					                <input type='hidden' name="cmd" value="signup" >
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input class="form-control firstname" name="firstname" id="firstname" placeholder="First name" type="text" value="<?php $_REQUEST['firstname'] ?>" required autofocus />
											</div>
											<div class="col-xs-6 col-md-6">
												<input class="form-control lastname" name="lastname" id="lastname" placeholder="Last name" type="text" value="<?php $_REQUEST['lastname'] ?>" required />
											</div>
										</div>
									</div>
									<div class="form-group">
										<input class="form-control email" name="email" id="email" onblur="check_email(this.value)" onfocus="rem('email')" placeholder="Your email" type="email" value="<?php $_REQUEST['email'] ?>" required/>
										<div style="padding:0 0 0 10px">
				                         <p style="display:none; color:red;" id="email_err"><i><b>Email already exist! Try another</b></i></p>
				                        </div>
									</div>
									<div class="form-group">
										<input class="form-control password" name="password" id="password" placeholder="New password" type="password" value="<?php $_REQUEST['password'] ?>" required/>
									</div>
									<div class="form-group">
										<input class="form-control rpassword" name="rpassword" id="rpassword" placeholder="Re-enter new password" type="password" value="<?php $_REQUEST['rpassword'] ?>" required/>
									</div>
									<div class="form-group">
										<input class="form-control cityname" name="cityname" id="cityname" placeholder="Enter City Name" type="text" value="<?php $_REQUEST['cityname'] ?>" required/>
									</div>
									<!--
									<input type="submit" class="btn btn-lg btn-primary btn-block create-account" name="create-account" id="create-account" value="Sign Up">-->
									<button type="submit" class="btn btn-lg btn-primary btn-block create-account" name="create-account" id="create-account"><span id="loader" class="loader"></span>Sign Up</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("includes/footer.php") ?>
		</div>
		<?php include("includes/footer-include.php") ?>
		<script>
    options = {
        serviceUrl:'ajax/ajax.php?cmd=suggestp', 
        onSelect: function(value, data){
          //alert(data);
          $('#city_id').val(data);
        },
        deferRequestBy: 0
    };
    a = $('#cityname').autocomplete(options);
</script>	
	</body>
</html>