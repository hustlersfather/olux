<?php
  ob_start();
  session_start();
  include "includes/config.php";
  date_default_timezone_set('UTC');


  if(isset($_SESSION['sname']) and isset($_SESSION['spass'])){
   header("location: index.html");
   exit();
}
?>




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



<script type="text/javascript">
var update_login_status = function (type,msg,hide = false) {
	
	switch (type) {		
		case "error":
			alert_type = "danger";
		break;
		
		case "success":
			alert_type = "success";
		break;
		case "info":
			alert_type = "info";
		break;
		default:
			alert_type = "info";
		break;
	}
	
	var html = "<div class = 'alert alert-"+alert_type+"'>"+msg+"</div>";
	$('#login_status').html(html);
	$('#login_status').show();
	if (hide) {
		setTimeout(function() {
			$('#login_status').slideUp();
			$('#login_status').html("");
		}, hide);
	}
}

$(document).on("submit", '.login_form', function(e) {
    var
     $form = $(this);
    var 
    $input = $form.find(':submit');
    $input.attr("disabled", 'disabled');
 
    var dataz = $form.serializeArray();
    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: dataz,
        dataType: 'json',
        success: function(data) {
            if (data.redirect) {				
				setTimeout(function() {
					window.location.href = data.redirect;
				}, 3000);               
            }
				
            update_login_status (data.status,data.message,10000);
            if (data.view_captcha) {				
				$("#login_recaptcha").show();
            }
			if (data.reset) {
				$form.trigger('reset');
			}
            
        },
        error: function(request, x, y) {
            if (request.status == 422) {
                var errorsHtml = "";
                $.each(request.responseJSON.errors, function(key, value) {
                    errorsHtml += '' + value[0] + '<br/>';
                });
                update_login_status ("error",errorsHtml);
            } 
			else if (request.status == 419) {
				location.reload();
			}
			else {
                update_login_status ("error","Server Error .. ",5000);
            }
        },
        complete: function(data) {
            $input.removeAttr("disabled");
            if (typeof(grecaptcha) != 'undefined') {
                grecaptcha.reset();
            }
			if ('function' === typeof initRecapatcha)  {
				initRecapatcha();
			}
        },
        beforeSend: function() {
           update_login_status ("info","Loading ...");
        },
    });
    e.preventDefault();
});
            </script>
