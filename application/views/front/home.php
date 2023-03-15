<div id="home-main-cont" style="z-index:9">
	<div id="tag-line"><?php echo $content;?></div>

	<div class="container">
     <span style="color:red"><?php  echo $this->session->flashdata('signuperror');  ?></span>
		<div class="row">
        
			<div class="span4" id="home-signin">

				<h2>Sign Up By Email</h2>

				<form action="<?php echo site_url('signup'); ?>" method="post" id="registerForm" class="" data-validate="parsley" data-focus="first" data-error-container="ul#formerrors"/>

					<p><input name="username" type="text" class="home-field" placeholder="Username" data-required="true" data-trigger="change focusout"></p>

					<p><input name="email" type="text" class="home-field" placeholder="Email" data-required="true" data-trigger="change focusout" data-type="email"></p>

					<p><input name="password" type="password" class="home-field" placeholder="Password" data-required="true" data-trigger="change focusout"></p>
                    <input type="hidden"  name="confirmf"  value="<?php echo $confirm; ?>"   />

					<div style="padding-top:15px;" id="create">
							<input type="image" src="<?php echo base_url();?>/images/front/create-account.png" alt=" ">
					</div>

				</form>

			</div>	<!-- end left contaier -->



			<div class="span4">

				<div id="mascot"><img src="<?php echo base_url();?>/images/front/cat-mascot.png" alt=" "></div>

			</div>	<!-- end mascot container -->



			<div class="span4">

				<div id="socialmedai-accounts">

					<h2>Sign Up With</h2>

					<div class="sm-acc"><a href="javascript:void(0);" onclick="openForm('<?php echo site_url('signup/facebook_confirmation');?>')" title="Facebook Account"><img src="<?php echo base_url();?>/images/front/fb-account.png" alt=" "></a></div>

					<div class="media-sep"></div>

					<div class="sm-acc"><a href="javascript:void(0);" onclick="openForm('<?php echo site_url('signup/twitter_confirmation');?>')" title="Twitter Account"><img src="<?php echo base_url();?>/images/front/twitter-account.png" alt=" "></a></div>

				</div>

			</div>	<!-- end social media accounts -->



		</div>

	</div>

</div>	<!-- end home container -->



<div id="home-middle-cont">

	<div class="container">



		<div class="row">

			<div class="span12">

				<h2>Startup Meow Teaches You To:</h2>

			</div>

		</div>



		<div class="row">



			<div class="span6">

				<?php echo $meow_teaches_left;?>

			</div>	<!-- end left container -->



			<div class="span6">

				<?php echo $meow_teaches_right;?>


			</div>	<!-- end right container -->



		</div>



		<!-- start bottom -->

		<div id="home-bottom">

			<div class="row-fluid">



				<div class="span3 v-sep">

					<div class="section-1">

						<h3><img src="<?php echo base_url();?>/images/front/free-ico.png" alt=" "> 
						<div style="float: right; width: 73%;">
							Thousands of Lessons at No Cost!
						</div>
						</h3>

						<?php echo $free_for_all;?>

					</div>

				</div>	<!-- end section -->



				<div class="span3 v-sep">

					<div class="section-1">

						<h3><img src="<?php echo base_url();?>/images/front/best-ico.png" alt=" "> 
							<div style="float: right; width: 73%;">
								Lessons from the Best of the Best!
							</div>
						</h3>

						<?php echo $best;?>

					</div>

				</div>	<!-- end section -->



				<div class="span3 v-sep">

					<div class="section-1">

						<h3><img src="<?php echo base_url();?>/images/front/interactive-ico.png" alt=" "> 
							<div style="float: right; width: 73%;">
								Customized to YOUR Needs
							</div>
						</h3>

						<?php echo $interactive;?>

					</div>

				</div>	<!-- end section -->



				<div class="span3">

					<div class="section-1">

						<h3><img src="<?php echo base_url();?>/images/front/community-ico.png" alt=" "> 
						<div style="float: right; width: 73%;">	
							Meet Like-Minded Entrepreneurs
						</div>
						</h3>

						<?php echo $community_based;?>

					</div>

				</div>	<!-- end section -->



			</div>

		</div>	<!-- end bottom -->



	</div>

</div>	<!-- end home middle and bottom container -->



<div id="push"></div>

