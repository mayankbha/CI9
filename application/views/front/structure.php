<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<title><?PHP echo @$meta['title']?></title>

		<meta name="description" content="<?PHP echo @$meta['description']?>" />

		<meta name="keywords" content="<?PHP echo @$meta['keywords']?>" />

		<link rel="shortcut icon" href="<?=base_url();?>images/favicon.ico?id=2" type="image/x-icon"/>

		<link rel="icon" href="<?=base_url();?>images/favicon.ico?id=2" type="image/x-icon"/>
		
		<link href="<?PHP echo base_url()?>css/front/reset.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/front/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<link href="<?PHP echo base_url()?>css/front/my_style.css" rel="stylesheet" type="text/css" />
		
		<link href="<?PHP echo base_url()?>css/front/popup.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/front/custom-responsive.css" rel="stylesheet" type="text/css" />
		
		<link href="<?PHP echo base_url()?>css/front/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
		
		<link href="<?PHP echo base_url()?>js/fancybox/jquery.fancybox.css?v=2.1.4" rel="stylesheet" type="text/css"/>

		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>js/jquery/jquery-ui-1.8.10.custom.css"/>

		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/front/calendar.css"/>

		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery-1.9.1.js"></script>

		<script src="<?php echo base_url()?>js/parsley.js" type="text/jscript"></script>

		<script src="<?php echo base_url()?>js/jquery.simplemodal-1.4.4.js" type="text/javascript"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery-ui-1.8.10.custom.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

		<script src="<?php echo base_url()?>js/fancybox/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/front.js"></script>

		<script src="<?php echo base_url()?>js/jquery.form.js" type="text/javascript"></script>

		<link rel="stylesheet" href="<?php echo base_url()?>css/front/validationEngine.jquery.css" type="text/css"/>

		<script src="<?php echo base_url()?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

		<script src="<?php echo base_url()?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

	</head>

	<body>

		<div id="gray_bak" style="display:none; position:absolute; margin: auto; top: 0; left: 0; width: 100%; height: 100%; z-index: 99;background-color: #7f7f7f; opacity:0.9; filter: alpha(opacity=90);overflow:auto" onclick="closePP();">&nbsp;</div>

		 <div id="content">
			<div id="basic-modal-content" style="display:none;padding:8px; z-index:99 "></div>
		</div>

		<div style="display:none">

			<div id="modal_message"><?PHP echo $this->session->flashdata('message');?></div>

			<div id="modal_message1"><?PHP echo @$message?></div>

			<a id="message_pp" href="<?PHP echo $this->session->flashdata('url');?>">View Message</a>

			<a id="confirm_pp" href="<?PHP echo $this->session->flashdata('url');?>">View Message</a>

		</div>
		<div id="wrapper" <?=($sel=='home') ? 'style="background-image:none;"' : '';?>>
			<?PHP echo $this->load->view('front/common/header');?>
	
			<?PHP echo $this->load->view($body);?>
			
		</div>	<!-- end end wrapper container -->
		
		<?PHP echo $this->load->view('front/common/footer');?>
		
		<?php
		$msg = $this->session->flashdata('message');

		if($msg){?>

		<script type="text/javascript">

		$(document).ready(function(){

			show_popup_message('Alert',$('#modal_message').html());

		});

		</script>

		<?php } if(isset($message)){?>

			<script type="text/javascript">

			$(document).ready(function(){

				show_popup_message('Alert',$('#modal_message1').html());

			});

			</script>

		<?php } $message_pp = $this->session->flashdata('message_pp'); 

			if($message_pp){

				$temp = explode('|',$message_pp);

				$msg = $temp[0];

				$title = '';

				if(isset($temp[1])){

					$title = $temp[1];

				}?>

		<script type="text/javascript">

		$(document).ready(function(){

			show_popup_message('<?PHP echo @$title?>','<?PHP echo str_replace("\n",'',$msg)?>');

		});

		</script>

		<?php	}  ?>
	
	<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.js"></script>

	 <!-- Button to trigger modal -->
    <a href="#myModal" id="conf" role="button" class="btn" data-toggle="modal" style="display:none;">Launch demo modal</a>
     
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_header" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel_header">Modal header</h3>
    </div>
    <div class="modal-body">
    <p id="model_body">One fine body…</p>
    </div>
    <div class="modal-footer">
    <button class="btn btn-primary" onClick="" id="close_btn">Close</button>
    </div>
    </div>

	</body>

</html>
