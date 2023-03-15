<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Our Site!</title>
<link href="<?php echo site_url('css/reset.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/my_style.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/style-ssovit.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/style-h.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('css/datepicker.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo site_url('js/jquery.js'); ?>" type="text/javascript"></script>
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<script type="text/javascript"> var home_url="<?php echo site_url(); ?>",ajax_url="<?php echo site_url('admin/ajax'); ?>",admin_url="<?php echo site_url('admin'); ?>";</script>
<script>base_url = '<?=base_url();?>';</script>
</head>

<body>
<div id="wrapper">
	<?php $this->load->view('admin/header'); ?>
	<!-- end header -->

	<!-- Navbar -->
	<?php
			if (isset($display_menu) && $display_menu == "yes") {
				$this->load->view('admin/menu');
			}
			?>
	<!-- End Navbar -->

	<!-- page body -->
	<div id="page-body">
		<div class="container">
			<div class="row">
				<div class="span12">
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
					<?php $this->load->view($body); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- page body -->
</div>
<!-- end end wrapper container -->
<!-- footer starts here -->
<?php $this->load->view('admin/footer'); ?>
<!-- footer ends here -->

<!-- bootstrap js files -->
<script src="<?php echo site_url('js/bootstrap.min.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/jquery.validate.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/scripts.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/scripts-ssovit.js'); ?>" type="text/jscript"></script>
<script src="<?php echo site_url('js/scripts-h.js'); ?>" type="text/javascript"></script>

<script src="<?php echo site_url('js/jquery.hint.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
</body>
</html>
