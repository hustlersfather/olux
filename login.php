<php
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
    
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/bootstrap/3/js/bootstrap.js"></script>

<link rel="shortcut icon" href="img/favicon.ico" />
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Jerux SHOP</title>
<style>
/* Start Container */
body {
  font-family: "Lato", sans-serif;
}


.page-container {
  border-radius: 10px;
  box-shadow: 0px 0px 17.55px 9.45px rgba(0, 0, 0, 0.05);
  width: 90%;
  height: auto;
  padding: 50px 0 0;
  margin: auto;
  border: 0;
  margin-bottom: 40px;
}

/* End Container */

/* Start title */
.welcome-title {
  color: #151515;

  margin-bottom: auto;
  font-weight: bold;
}
.card-heading p {
  color: #555555;
  margin-bottom: 0;
}
/* end  title */

/* Start form style */
form {
  width: 85%;
  margin: auto;
}

label {
  color: #3d3d3d;
  margin-bottom: 0.2rem;
}
.form-control {
  height: 50px;
}
.form-control:focus {
  box-shadow: none;
}

.form-group p {
  font-size: 14px;
  color: #555555;
}
.form-group a {
  font-size: 14px;
}
/* login btn stle */
.form-group .btn {
  background-color: #0081ff;
  color: #fff;
  height: 50px;
  font-weight: bold;
}

.input-group-text {
  background-color: #fff;
}

.login-panel {
	padding-top: 40px;
}
/* end btn stle */
</style>

</head>
<body>
<script type="text/javascript">


</script>
<!--Pulling Awesome Font -->

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login" id="logindiv">
              <?php
                include "loginpage1.php"; ?>
 </div>

        </div>
    </div>                    

</div>
</body>
</html>
