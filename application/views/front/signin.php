<div id="page-body">

	<div class="container">

		<div class="row">

			<div class="span12">

				<div class="inner-contents">

					<h2><span class="sign-ico">Sign In</span></h2>



					<div class="signin-form">

						<div class="row-fluid">



							<div class="span6">

								<p style="padding-bottom:20px">*Please fill in your username and password.</p>
								<p id="error" style="color: red;display:none;"></p>

								<form method="post" action="<?php echo site_url('front/login/process'); ?>" class="login_form ajax_form validate_form" data-validate="parsley" data-focus="first" data-error-container="ul#formerrors"/>

									<p>

										<strong>Username:</strong>

										<input name="username" id="username" type="text" class="input_field parsley-validated" placeholder="Email" data-required="true" data-trigger="change focusout" data-type="email"/>

									</p>



									<p>

										<strong>Password:</strong>

										<input name="password" id="password" type="password" class="input_field parsley-validated" placeholder="Password" data-required="true" data-trigger="change focusout">
										<input type="hidden" name="login_page" value="1">
									</p>



									<div class="action-cont">

										<div class="pull-left"><a href="<?php echo site_url('forgotpwd'); ?>">Forgot Password?</a> <span>|</span> <a href="<?php echo site_url('home#home-signin'); ?>">Register!</a></div>

										<div class="pull-right"><input name="do_login" type="submit" class="custom-btn" value="Sign In"></div>

									</div>

								</form>

							</div>  <!-- end left container -->



							<div class="span4 offset1">

								<div id="socialmedai-accounts">

									<h2>Sign in With</h2>

									<div class="sm-acc"><a href="#" title="Facebook Account"><img src="<?=base_url();?>images/front/fb-account.png" alt=" "></a></div>

									<div class="media-sep"></div>

									<div class="sm-acc"><a href="#" title="Twitter Account"><img src="<?=base_url();?>images/front/twitter-account.png" alt=" "></a></div>

								</div>

							</div>  <!-- end social media accounts -->

						</div>

					</div>  <!-- end container form -->

				</div>



			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
$(function(){
	var errors_load = "<?php echo isset($errors) ? $errors : 'false'?>";
	var email = "<?php echo isset($email) ? $email : 'user@mydomain.com'?>";
	if(errors_load != 'false'){
		$('p#error').text(errors_load);
		$('#username').val(email);
		$('p#error').fadeIn("slow");
		$('#username').addClass('parsley-error');
		$('#password').addClass('parsley-error');
	}
});
</script>