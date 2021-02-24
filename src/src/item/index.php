<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
<!------ Include the above in your HEAD tag ---------->

<style>
    section{
   height: 100%;
   display: flex;
    /* background: #fff; */
/* background: linear-gradient(45deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%); */
background: rgb(184,10,98);
background: linear-gradient(45deg, rgba(184,10,98,1) 35%, rgba(255,0,108,1) 100%);
}

.login-container {
    display: grid;
    align-items: center;
}
.login-container .row{ 
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: absolute;
    margin-left: -40.5%;
    width: 90%;
    height: 46%;
}
.login-logo img{
    position: relative;
    width: 50%;
    height: 50%;
    margin-top: 19%;
    background: #282726;
    border-radius: 50%;
    padding: 0.2%;
}
.login-form-1{
    padding: 9%;
    border-bottom-left-radius: 90px;
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(233,231,252,1) 0%, rgba(251,251,251,1) 100%);
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    padding-left: 2%;
}

.login-form-1 div {  
    max-width: 90%;
}

.login-form-2 .signatur_form {
    /* max-width: 90%; */
    /* margin-left: 17%; */
    position: inherit;
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color: #06048f;
}
.login-form-2{
    padding: 9%;
    border-top-right-radius: 90px;
    border-bottom-left-radius: 90px;
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,239,250,1) 0%, rgba(254,254,254,1) 100%);
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    /* padding-right: 2%; */
    /* max-width: 40%; */
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #b80a62;
}

.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #fff;
    background-color: #06048f;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnSubmit1{
    font-weight: 600;
    width: 50%;
    color: #fff;
    background-color: #b80a62;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #06048f;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd1{
    color: #b80a62;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#000;
}
.btnForgetPwd1:hover{
    text-decoration:none;
    color:#000;
}
</style>
<section>
<div class="container login-container">
            <div class="row">
            
                <!-- <div class="col-md-6 login-form-1">
                    <div>
                    <form action = "" method = "post">
                        <h3>SHREE LOGIN</h3>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="shree_username" id="shree_username" placeholder="Your Username *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="shree_pass" id="shree_pass" placeholder="Your Password *" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                        </div>
                        <div class="form-group">
                            <button type="button" class="btnSubmit" value="Login" onclick="submit_data();" >Login</button>
                        </div>
                    </form>
                    <a href="" data-toggle="modal" data-target="#myModal1" class="btnForgetPwd" value="forgot_pass">Forget Password?</a>
                    </div>
                     -->
               
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-2">
                    <!-- <div class="login-logo">
                        <img src="../../app-assets/images/logo/nks_aromas.jpg" alt=""/>
                    </div> -->
                    <div class="signatur_form">
                    <form action = "" method = "post">
                        <h3>SIGNATURE LOGIN</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="signature_username" id="signature_username" placeholder="Your Username *" value="" pattern="[A-Za-z]{10}" />
                                <p id="demo"></p>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="signature_pass" id="signature_pass" placeholder="Your Password *" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                                <p id="demo1"></p>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btnSubmit1" value="Login" onclick="submit_data1();">Login</button>
                            </div>
                            
                    </form>
                    <a href="" data-toggle="modal" data-target="#myModal1" class="btnForgetPwd1" value="forgot_pass1">Forget Password?</a>
                          
                </div>
                <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</section>
 <!-- Modal -->
 <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Forgot Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="container" style="width: auto;">
          <div class="row">
          <div class="col-sm-12">

          <form method="post" id="passwordForm">
          <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Enter your Email Id"  style="width: -webkit-fill-available;">
  
          </form>
          </div><!--/col-sm-6-->
          </div><!--/row-->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-load" data-dismiss="modal" onclick="send_mail();" >Send Email</button>
        </div>
      </div>
      
    </div>
  </div>


<script>
    function submit_data1()
{
    var signature_username = document.getElementById('signature_username').value;
    var signature_pass = document.getElementById('signature_pass').value;
    // if (document.getElementById("signature_username").pattern != "[A-zA-Z]{1,13}") {
    // document.getElementById("demo").innerHTML = "Required First capital letter";
    
    // if (document.getElementById("signature_pass").pattern != "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}") {
    // document.getElementById("demo1").innerHTML = "Required first capital letter, one special caracters, one number and atleast 8 caracters(eg. Abc@123).";
    
if (signature_username !="" || signature_pass !="" ){ 
    $.ajax({
        url: '../../api/login/signature_login.php',
        type: 'POST',
        data: { 'signature_username': signature_username, 'signature_pass': signature_pass },
        success: function (data) {
            console.log(data);
            if(data == "1")
            {
                $.toast({
                    heading: 'Success',
                    text: 'Login Successfully!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => 
                {
                    window.location.href="dashboard.php";    
                }, 5000);
                // alert('Login Successfully!');
                // window.location.href = "dashboard.php";
            
            }
            else
            {
                $.toast({
						heading: 'Error',
						text: 'Your Login Name or Password is invalid...!!',
						showHideTransition: 'slide',
						position: 'top-right',
						hideAfter: 5000,
						icon: 'error'
					})
                // alert('Your Login Name or Password is invalid');
            }
        }
    });
    }
// }
//     }
}


function submit_data()
{
    var shree_username = document.getElementById('shree_username').value;
    var shree_pass = document.getElementById('shree_pass').value;
    $.ajax({
        url: '../../api/login/shree_login.php',
        type: 'POST',
        data: { 'shree_username': shree_username, 'shree_pass': shree_pass },
        success: function (data) {
            console.log(data);
            if(data == "1")
            {
                $.toast({
                    heading: 'Success',
                    text: 'Login Successfully!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => 
                {
                    window.location.href="dashboard.php";    
                }, 5000);
                // alert('Login Successfully!');
                // window.location.href = "index.php";
            
            }
            else
            {
                $.toast({
						heading: 'Error',
						text: 'Your Login Name or Password is invalid...!!',
						showHideTransition: 'slide',
						position: 'top-right',
						hideAfter: 5000,
						icon: 'error'
					})
               // alert('Your Login Name or Password is invalid');
            }
        }
    });
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
<script>
    var signature_pass = document.getElementById('signature_pass');
    var shree_pass = document.getElementById('shree_pass');

</script>