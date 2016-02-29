<?php
  include("includes/config.php");
  include("includes/classes/db.php");
  include("includes/functions.php");
  include("includes/auth.php");

  $uid=$auth->authenticate();
  $result = $db->query("select f.member_id,f.follower_id,m.name,m.pic,m.city_id from follow f,members m where f.member_id=m.id and f.follower_id=$uid ");
?>
<!doctype html>
<html>
<head>
  <?php include("includes/header-include.php"); ?>
  <link href="<?php echo BASE_URL?>/resources/raty/jquery.raty.css" rel="stylesheet">
  <script src="<?php echo BASE_URL?>/resources/raty/jquery.raty.js"></script>
  <script>
  $(document).ready(function(){
    $('#raty').raty({path: base_url+'resources/raty/images'});
  });
  </script>
  <script type="text/javascript">
  function del_user(m_id,uid){
    //alert(uid);
    //$('#loading'+f_id).show();
    $('#loading'+m_id).show();
    var params = {cmd:'unfollow','m_id':m_id,'f_id':uid};
    $.get('ajax/ajax.php',params,function(data){
    $('#loading'+m_id).hide();  
    var obj=$.parseJSON(data); 
    if(obj.msg=='ok'){
      if (obj.total==0) {
        $('#uf').text('No Following found');
        $('#userdiv'+m_id).hide();
      }
      else{
      $('#userdiv'+m_id).hide();
    }
  }
  else{
     alert(data);
  }
      /*if (data=='ok') {
         $('#userdiv'+m_id).hide();
      }
      else{
        alert(data);
      }*/
    });
  }
  </script>
</head>

<body>
    <div class="container">
    <?php include("includes/header.php"); ?>
    <hr>
    <div class="row" style="min-height:500px">
    <?php include('includes/sub-header.php');?>
    <div class="col-md-8">
    <?php
		$i=1; 
		while ($row = $db->fetch($result)) {
			$i++;
        if ($row['pic']=="") {
          $pic = 'images/no-profile.jpg';  
        }
        else{
          $pic = 'user-images/'.$row['pic'];
        }
    ?>
    <div class="col-md-12" id="userdiv<?php echo $row['member_id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div  class="pull-left"><a href="member-info.php?m_id=<?php echo $row['member_id'] ?>" target="_blank"><img src="<?php echo $pic?>" width="100px" height="100px"></a></div>
                <div class="pull-left" style="margin-left:15px; margin-top:2px;">
                    <div><b><a href="member-info.php?m_id=<?php echo $row['member_id'] ?>" target="_blank"><?php echo ucfirst($row['name']); ?></a></b></div>
                    <div><span style="color:black;"><?php echo ucfirst( get_city_name($row['city_id'])); ?></span></div>
                    <div id="">
                      <table>
                      <tr>
                          <td>Rating:</td><td id="raty"></td>
                      </tr>
                      </table>
                    </div>
                    <div><b><a href="" target="_blank">Selling Items</a></b></div>
                    <div><b><a href="" target="_blank">Buying Items</a></b></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="pull-right">
               <button class="btn btn-info" id="del_btn" onclick="del_user(<?php echo $row['member_id'] ?>,<?php echo $uid;?>)">Unfollow</button>
                </div>
            </div>
             <div class="col-md-1">
               <div id="loading<?php echo $row['member_id'] ?>" style="display:none"><img src="images/loading.gif"></div>
            </div>
        </div>
        <hr>
     </div>
     <p id="uf"></p>
    <?php 
        }
		if($i==1){
			echo '<p>No following found</p>';
		}
    ?>   
    </div> 
    <div class="col-md-4">  
    </div>
    </div> 
  <?php include("includes/footer.php"); ?>         
  </div>
<?php include("includes/footer-include.php"); ?>  
</body>
</html>