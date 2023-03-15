<?php 
if ($this->session->userdata('admin_id')==FALSE) { ?>

<div id="header">
	<div id="head_left"></div>
	<div id="head_right"></div>
	<div class="inner">
		<div class="left" id="logo"><a href="#"><img src="<?=base_url();?>images/logo.png" alt="Fast Track Driver Solutions" title="Fast Track Driver Solutions" /></a></div>
		<div class="right" id="right_head">
			<div class="userinfo"><span>Administrator Area</span></div>
		</div>
		<!-- end right header container here -->
		<div class="clear"></div>
	</div>
</div>
<?php } else { ?>
<div id="header">

	<div class="container">
	
		<div class="row">
		
			<div class="span4">
			
				<div id="logo"><a href="<?=base_url();?>"><img src="<?=base_url();?>images/logo.png" alt="Meow Startup"></a></div>
			
			</div>
		
			<div id="admin-area">Administrator Area <a href="<?=site_url('admin/logout');?>">Logout</a></div>
		
		</div>
	
	</div>

</div>
<?php } ?>
