j<?php
  ob_start();
  session_start();
  include "includes/config.php";
  date_default_timezone_set('UTC');


  if(isset($_SESSION['sname']) and isset($_SESSION['spass'])){
   header("location: index.html");
   exit();
}
?>
<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="files/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="files/bootstrap/3/js/login.js"></script>
    
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/bootstrap/3/js/bootstrap.js"></script>

<link rel="shortcut icon" href="img/favicon.ico" />
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Jerux SHOP</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400);
html, body {
    background: url(files/img/bg.png);
}

.container {
    padding: 25px;
    position: fixed;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}
h6 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:5px;
 text-align: center;
}
.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}


</style>

</head>
<body>
<script type="text/javascript">
$(window).on('load', function() {
        logindiv(1,'Login - Jerux SHOP','log-in',1);
});</script>
<!--Pulling Awesome Font -->

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login" id="logindiv">
 </div>

        </div>
    </div>                    

</div>
</body>
</html>


<script type="text/javascript">

</script>
