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
