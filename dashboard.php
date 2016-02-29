<?php 
  include("includes/config.php");
  include("includes/classes/auth.php");
  include("includes/classes/db.php");
  include("includes/functions.php");
  include("includes/classes/accounts.php");
  include("includes/classes/user.php");


  $u=$auth->authenticate();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("includes/header-include.php") ?>
		<script src="<?php echo BASE_URL?>/js/account.js"></script>
		<script>
		function check_email(value){
			//alert(value);
			$.get('ajax/ajax.php?cmd=check_email&email='+value,function(data){
		       if (data=='ok') {
		        $('#email_err').show();
		        $('#email_id').val(1);
		       }
		       else{
		         $('#email_err').hide();
		         $('#email_id').val(0);
		       }  
		       alert(data);    
		    });
		}

		function check_err(){
		   if($('#user-register').valid()==true){
		      var e = document.getElementById("email_id").value;
		      //var u = document.getElementById("user_id").value;
		      if (e==1) {
		        return false;
		      }
		      else{
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
					<h2>Dashboard <?php echo $a->userid(); ?></h2>
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