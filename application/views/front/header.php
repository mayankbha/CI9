<div class="navbar navbar-inverse navbar-fixed-top">

	<div class="navbar-inner">

		<div class="container">

			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			</button>

			<a class="brand" href="<?php echo base_url();?>"><img src="<?=base_url();?>/images/front/logo.png" alt="Meow Startup"></a>

			<!--This PHP Conftion is removeable when working on functional point and fix navigation-->
			<?PHP if(isset($headerConfition) && $headerConfition=='yes') { ?>

			<div class="nav-collapse collapse">



				<div id="logged-info" class="logged-out clearfix">



					<div class="user-msgarea">

						<ul>

							<li><a href="#" class="inbox-ico">Inbox</a></li>

							<li><a href="#" class="msg-ico">25</a></li>

						</ul>

					</div>



					<form>

						<div class="user-welcome">Welcome, <a href="#">Lorem Ipsum</a> <a href="#" class="edit-account" title="Edit Account">Edit Account</a></div>

						<div class="user-submit">

							<input name="" onClick="window.location.href='<?php echo site_url('login/logout');?>'" type="button" class="login" value="Logout">

						</div>

					</form>

					<div id="social-media">

						<a href="#"><img src="<?=base_url();?>/images/front/facebook.png" alt="facebook" title="facebook"></a>

						<a href="#"><img src="<?=base_url();?>/images/front/twitter.png" alt="twitter" title="twitter"></a>

					</div>

				</div>	<!-- end logged info -->



				<ul class="nav clear">

					<li class="active"><a href="#">My Account</a></li>

					<li class=""><a href="#">Reading</a></li>

					<li class=""><a href="#">Resources</a></li>

					<li class=""><a href="#">Friends</a></li>

					<li class=""><a href="#">Help</a></li>

				</ul>



			</div>
			<?PHP } else { ?>
			<div class="nav-collapse collapse">
				<div id="logged-info" class="clearfix">

					<form method="post" id="loginForm" class="ajax_form login_form validate_form" data-validate="parsley" data-focus="first" data-error-container="ul#formerrors" action="<?php echo site_url('front/login/process'); ?>"/>
						<div id="error"></div>
						<div class="user-field">

							<a href="<?php echo site_url('login');?>"><strong>Login</strong></a>

							<input name="username" type="text" class="header-field parsley-validated" value="" placeholder="Email" data-required="true" data-trigger="change focusout" data-type="email"/>

						</div>

						<div class="user-field">

							<span class="text-right"><a href="<?php echo site_url('forgotpwd');?>">Forgot Password?</a></span>

							<input name="password" type="password" class="header-field parsley-validated" value="" placeholder="Password" data-required="true" data-trigger="change focusout">

						</div>

						<div class="user-submit">

							<input name="do_login" type="submit" class="login" value="Login">

						</div>

					</form>

					<div id="social-media">

						<a href="#" class="help-ico"><img src="<?=base_url();?>/images/front/help-icon.png" alt="Help" title="Help"></a>

						<a href="#"><img src="<?=base_url();?>/images/front/facebook.png" alt="facebook" title="facebook"></a>

						<a href="#"><img src="<?=base_url();?>/images/front/twitter.png" alt="twitter" title="twitter"></a>

					</div>

				</div>	<!-- end logged info -->
			</div>
			<?PHP } ?>



		</div>

	</div>

</div>	<!-- end navigion here -->
