
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
            
		


</body>

</html>
