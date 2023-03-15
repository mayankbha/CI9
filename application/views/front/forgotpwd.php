<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents">

<h2><span style="text-align:center;"> <?php $forget_password_title = getMetaContent('forget_password_title'); echo $forget_password_title['data']?></span></h2>
<!--confirmation comments -->

<!--/confirmation comments -->
<div class="text-center"><img src="<?=base_url();?>images/front/forgot-password-image.jpg" width="191" height="223" alt=""></div>
<div class="text-center"><?=$forget_content;?></div>

<div class="comment_box comment_box_confirm" style="margin-bottom: 20px; margin-top: 20px; display:none">
<?=str_replace('<p>', '<p style="padding-right: 35px">',$content);?>
  <a href="#" onclick="$('.comment_box_confirm').hide();" class="comment-close"><img src="<?=base_url();?>images/front/close-button.png" width="22" height="22" alt=""></a>
</div>

<div class="forgot-pass">

<div class="row-fluid">



<div class="span12 text-center">

<form>

<p>

<span>Email Address:</span> <input name="" type="text" class="input_field">
<input name="" type="button" class="custom-btn" value="Submit" onclick="$('.comment_box_confirm').show();">

<input name="" type="button" class="custom-btn" value="Cancel">
</p>


</form>

</div>	<!-- end left container -->







</div>

</div>
	<!-- end container form -->

</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>