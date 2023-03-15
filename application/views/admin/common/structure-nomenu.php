<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo page_title(); ?></title>
<link rel="shortcut icon" href="<?=base_url();?>images/favicon.ico?id=2" type="image/x-icon"/>
<link rel="icon" href="<?=base_url();?>images/favicon.ico?id=2" type="image/x-icon"/>
<link href="<?php echo site_url('css/reset.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/my_style.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/style-ssovit.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo site_url('js/jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('js/jquery.hint.js'); ?>" type="text/javascript"></script>
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript"> var home_url="<?php echo site_url(); ?>",ajax_url="<?php echo site_url('admin/ajax'); ?>",admin_url="<?php echo site_url('admin'); ?>";</script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="span4">
					<div id="logo"><a href="<?php echo site_url('admin'); ?>)"><img src="<?php echo site_url('images/logo.png'); ?>" alt="Meow Startup"></a></div>
				</div>
				<div id="admin-area">Administrator Area</div>
			</div>
		</div>
	</div>
	<div id="page-body">
		<div class="container">
			<div class="row">
				<div class="span12">
					<h2><span>Admin</span> <?php echo $contentTitle; ?></h2>
					<?php if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger">
						<h4><?php echo $this->session->flashdata('message-title'); ?></h4>
						<div><?php echo $this->session->flashdata('error'); ?></div>
					</div>
					<?php } ?>
					<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success">
						<h4><?php echo $this->session->flashdata('message-title'); ?></h4>
						<div><?php echo $this->session->flashdata('success'); ?></div>
					</div>
					<?php } ?>
					<?php echo $this->load->view($body); ?> </div>
			</div>
		</div>
	</div>
	<!-- page body --> 
	
</div>
<div id="copyright">
	<div class="container">
		<div class="row">
			<div class="span12">&copy; 2013 Startup Meow. All Rights Reserved.</div>
		</div>
	</div>
</div>
<script src="<?php echo site_url('js/bootstrap.min.js'); ?>" type="text/jscript"></script> 
<script src="<?php echo site_url('js/jquery.validate.js'); ?>" type="text/jscript"></script> 
<script src="<?php echo site_url('js/scripts.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/scripts-ssovit.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/scripts-h.js'); ?>" type="text/javascript"></script>
</body>
</html>