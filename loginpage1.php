<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf_token" content="bFp933jJvHGnuhGIwgDuXBNpGzECJqTrbGP1ip6v">

    <title>xLeet</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" >
	<link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/css/custom.css" >
	<link rel="stylesheet" href="assets/css/custom-login.css" >
	<script src = "assets/js/jquery.min.js"></script>
	<script src = "assets/js/bootstrap.min.js"></script>
	<script src = "assets/js/swal.js"></script>
	<script src = "assets/js/login.js"></script>
	<script src = "assets/js/commons.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139754556-1"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)
[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-139754556-1', 'auto') ; 
ga('set', 'appName', 'xLeet');
ga('send', 'pageview');

</script><link rel="icon" href="assets/img/favicon.png">
<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/img/favicon.png">
</head>

<body>

    <div class="container">
        

<script src="https://www.google.com/recaptcha/api.js?render=6Ldtn8oUAAAAAFteEp3xGY3hhNM9TIutvrD9hoRC"></script>
<script>

function initRecapatcha () {
	grecaptcha.ready(function() {
		grecaptcha.execute('6Ldtn8oUAAAAAFteEp3xGY3hhNM9TIutvrD9hoRC', {action: 'login_page'}).then(function(token) {
			$('#_recaptcha').val( token );
		});
	});
}

if ('function' === typeof initRecapatcha)  {
	initRecapatcha();
	setInterval(function() {
		initRecapatcha();
	}, 60 * 1000);
}

</script>

<div class="row">

<div class="col-lg-5 col-md-12 col-xs-12 col-centered mt-70">
          <div class="login-panel card card-primary page-container">
            <div class="card-heading text-center">
              <h4 class="card-title welcome-title">
			  xLeet <i class="fab fa-redhat"></i> <br />  Welcome Back ! 
              </h4>
              <p>We ‘re so excited to see you again !</p>
            </div>
            <div class="card-body">
              <form action = "log-in.html" method = "post" role="form" class= "login_form">
                <fieldset>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"
                          ><i class="fas fa-user-tie"></i
                        ></span>
                      </div>
                      <input
                        class="form-control"
                        placeholder="Email@domain.com"
                        name="email"
                        type="email"
                        autofocus
                        required
                        autocomplete="off"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"
                          ><i class="fas fa-unlock-alt"></i
                        ></span>
                      </div>
                      <input
                        class="form-control"
                        placeholder="***************"
                        name="password"
                        type="password"
                        value=""
                        required
                      />
                    </div>
                  
                  </div>
				  
				  
				  <div style = "display:none;" id = "login_recaptcha" class="form-group text-center col-centered">
							<script type="text/javascript">
        var RecaptchaOptions = {"curl_timeout":1,"curl_verify":true,"lang":"en"};
    </script>
<script src='https://www.google.com/recaptcha/api.js?render=onload&amp;hl=en'></script>
<div class="g-recaptcha" data-sitekey="6Lcux6EUAAAAANdAT63on3YpArQNUG1tk9trf_K3" ></div>
<noscript>
    <div style="width: 302px; height: 352px;">
        <div style="width: 302px; height: 352px; position: relative;">
            <div style="width: 302px; height: 352px; position: absolute;">
                <iframe src="https://www.google.com/recaptcha/api/fallback?k=6Lcux6EUAAAAANdAT63on3YpArQNUG1tk9trf_K3"
                        frameborder="0" scrolling="no"
                        style="width: 302px; height:352px; border-style: none;">
                </iframe>
            </div>
            <div style="width: 250px; height: 80px; position: absolute; border-style: none;
                  bottom: 21px; left: 25px; margin: 0; padding: 0; right: 25px;">
        <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                  class="g-recaptcha-response"
                  style="width: 250px; height: 80px; border: 1px solid #c1c1c1;
                         margin: 0; padding: 0; resize: none;"></textarea>
            </div>
        </div>
    </div>
</noscript>
			
					</div>
					
                  <div class="form-group">
                    <div id="login_status"></div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block">
                      Login
                    </button>
                    <p>
					<br>
                     <a href="reset-password.html">Forgot  password? </a>	- Need an account?
                      <a href="register.html" class=" ">Register</a>
                    </p>
                  </div>
                  <div class="form-group text-center"></div>
                </fieldset>
				<input type="hidden" id = "_recaptcha" name="_recaptcha" value="">
              </form>
            </div>
          </div>
        </div>
		
	
</div>

    </div>


</body>

</html>
