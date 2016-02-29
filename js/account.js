$(document).ready(function(){
    $('#user-register').validate({
        onfocusout: function (element) {},
        rules: {
            firstname:{
                required: true,
                minlength: 5,
            },
            lastname:{
                required: true,
                minlength: 5,
            },
            email:{
                required: true,
                email:true
            },
            password:{
                required:true,
                minlength: 6,
                maxlength: 15  
            },
            rpassword:{
                required: true,
                equalTo:'#password'
            },
            cityname:{
                required: true,
            },
            },
        messages: {
            firstname:{
                required:"Firstname is required",
                minlength:"At least 5 characters required"
            },
            lastname:{
                required:"Lastname is required",
                minlength:"At least 5 characters required"
            },
            email:{
                required:"Email is required",
                email:"Enter valid email"
            },
            remail:{
                required:"Email is required",
                equalTo:"Email not match"
            },
            password:{
                required:"Password is required",
                minlength:"At least 6 characters",
                maxlength:"Less then 15 characters"
            },
            cityname:{
                required:"City name is required",
            },
        }
    });

    //login form validation
    $('#login-nav').validate({
        onfocusout: function (element) {},
        rules: {
            lemail:{
                required: true,
            },
            lpassword:{
                required:true,
                minlength: 6,
                maxlength: 15   
            },
            },
        messages: {
            lemail:{
                required:"Email is required",
                email:"Enter valid email"
            },
            lpassword:{
                required:"Password is required",
                minlength:"At least 6 characters",
                maxlength:"Less then 15 characters"
            },
        }
    });
});
       
//Login System
    function login(){
        if($('#login-nav').valid()==true){
            var params=$('#login-nav').serialize();
            $("#loading").modal('show');
            $.get('./ajax/accounts.php?cmd=user-login',params,function(data){
                $("#loading").modal('hide');
                var obj=$.parseJSON(data);
                if(obj.uid>0){
                      window.location='dashboard.php';
                    }
                    else{  
                        alert(obj.err);
                    }
            });
        }
        else
            return false;
    }    

    function err_msg(){
        $('#err_msg').show();
    }    