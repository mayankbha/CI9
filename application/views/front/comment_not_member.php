<!DOCTYPE HTML>

<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Welcome to Our Site!</title>

<link href="<?=base_url();?>css/front/reset.css" rel="stylesheet" type="text/css" />

<link href="<?=base_url();?>css/front/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="<?=base_url();?>css/front/my_style.css" rel="stylesheet" type="text/css" />

<link href="<?=base_url();?>css/front/popup.css" rel="stylesheet" type="text/css" />

<link href="<?=base_url();?>css/front/custom-responsive.css" rel="stylesheet" type="text/css" />

<link href="<?=base_url();?>css/front/bootstrap-responsive.css" rel="stylesheet" type="text/css" />



<!-- HTML5 shim for IE backwards compatibility -->

<!--[if lt IE 9]>

<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

<![endif]-->



</head>



<body>



<!-- main wrapper starts here -->

<div id="popover-wrapper">

<div id="popover">



<div id="popover-head" class="clearfix">

<div class="span3"><img src="<?=base_url();?>images/front/popup-logo.png" alt=" "></div>

<div class="close-pp"><a href="#">Close (<strong>x</strong>)</a></div>


</div>	<!-- end popover head -->



<div id="popover-body">

<div class="text-center row-fluid" style="padding-top: 20px;"><img src="<?=base_url();?>images/front/banner_mici_img.png" alt=""></div>

<div class="signup-confirmmsg"><?=str_replace('<p>','',str_replace('</p>','',$content));?></div>

<div class="text-center"><a href="#" class="btn-link">Close</a></div>

</div>	<!-- end popver body -->



</div>

</div>	<!-- main wrapper ends here -->



<!-- bootstrap js files -->

<script src="http://code.jquery.com/jquery.js" type="text/jscript"></script>

<script src="js/bootstrap.min.js" type="text/jscript"></script>

</body>

</html>