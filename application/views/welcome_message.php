<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rahmani Azlan - 082144336657 - rahmaniazlan@gmail.com - Rumahweb</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <style type="text/css">
  .navbar {
    background: blue !important;
  }
  }
	</style>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="https://www.rumahweb.com/assets/img/2021/logo-rumahweb.svg" alt="materialize logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <?php if(isset($_SESSION['login'])) { ?>
      <a href="#" class="mr-2 text-white" onclick="myLogout()">LOGOUT</a>
    <?php }else { ?>
    <a href="#" class="mr-2 text-white" data-toggle="modal" data-bs-dismiss="modal" data-target="#modallogin">LOGIN</a>or<a class="ml-2 text-white" href="#" data-toggle="modal" data-bs-dismiss="modal" data-target="#modalregister">REGISTER</a>
    <?php } ?>
  </div>
</nav>

  <div class="container">
  <?php if(isset($_SESSION['login'])) { 
    echo "Hallo ".$_SESSION['login']['email'];
  } ?>
  </div>


<!-- MODAL -->
<!-- Modal Register -->
<div class="modal fade" id="modalregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content rounded-0 p-4">
      <div class="modal-header px-0 justify-content-center">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <form novalidate="novalidate" id="register" action="" method="POST">
          <div class="form-group formgrup">
						<input type="email" name="email_reg" id="email_reg" class="form-control rounded-0" placeholder="email" data-notif="email-notif">
          </div>
          <div class="form-group formgrup">
						<input type="text" name="password_reg" id="password_reg" class="form-control rounded-0" placeholder="password" data-notif="password-notif">
          </div>
          <div class="form-group formgrup">
						<input type="text" name="birthday_reg" id="birthday_reg" class="form-control rounded-0 datepicker" placeholder="birthday" data-notif="birthday-notif">
          </div>
        </form>
        <button onclick="myFunction()" class="btn btn-primary btn-md rounded-0">Register</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content rounded-0 p-4">
      <div class="modal-header px-0 justify-content-center">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <form novalidate="novalidate" id="login" action="" method="POST">
        <div class="form-group formgrup">
						<input type="text" name="email_log" id="email_log" class="form-control rounded-0" placeholder="email" data-notif="email-notif">
          </div>
          <div class="form-group formgrup">
						<input type="text" name="password_log" id="password_log" class="form-control rounded-0" placeholder="password" data-notif="password-notif">
          </div>
          <div class="form-group">
						<input type="submit" name="submit_log" id="submit_log" class="btn btn-secondary btn-md btn-block rounded-0" value="Sign in" disabled>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";

$('.datepicker').datepicker({
  //merubah format tanggal datepicker ke dd-mm-yyyy
    format: "yyyy-mm-dd",
    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
    //format: "dd-mm-yyyy",
    autoclose: true
});
</script>

<script>
  //modal all
	$('.modal').on('show.bs.modal', function() { 
		$("body").addClass("overflow-hidden");
	});

	$('.modal').on('hidden.bs.modal', function(){
		$("body").removeClass("overflow-hidden");
    $(this).find('form')[0].reset();
	});
	//modal all

  //REGISTER
  function myFunction() {
      var xajaxFile = baseURL + 'welcome/register';
      jQuery.ajax({
        type: "POST",
        url: xajaxFile,
        data: $("#register").serializeArray(),
        dataType: "json",
        success: function(data){
          if(data.error==true){
            alert('error');
          }else {
            $.ajax({
              //url: "https://reqres.in/api/register",
              //type: "POST",
              //data: {
                  //email: $('#email_reg').val(),
                  //password: $('#password_reg').val()
                  //birthdate: $('#birthday_reg').val()
              //},
              //success: function(response){
                //console.log(response);
                var aFile = baseURL + 'welcome/registerasi';
                jQuery.ajax({
                  type: "POST",
                  url: aFile,
                  data: $("#register").serializeArray(),
                  dataType: "json",
                  success: function(data){
                    if(data.error==true){
                      alert('error');
                    }else {
                      window.location.reload();
                    }
                  }
                });
              //}
            //});
          }
        }
      });
  }

  //LOGOUT
  function myLogout() {
    var xajaxFile = baseURL + 'welcome/logout';
    jQuery.ajax({
      type: "GET",
      url: xajaxFile,
      success: function(data){
        if(data.error==true){
          alert('error');
        }else {
          window.location.reload();
        }
      }
    });
  }
</script>

</body>
</html>