<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents">

<div class="comment_box comment_box_confirm" style="margin-bottom: 20px; margin-top: 20px; display:none">

<?=str_replace('<p>', '<p style="padding-right: 35px">', $confirmtion);?>

  <a href="javascript:void(0);" onclick="$('.comment_box_confirm').hide();" class="comment-close"><img src="<?=base_url();?>images/front/close-button.png" width="22" height="22" alt=""></a>

</div>

<h2><span class="contact-ico">Contact Us</span></h2>

<?=$content;?>



<div class="contact-form">

<div class="row-fluid">



<div class="span6">

<form>

<p>

<strong>Name:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Email:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Subject:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Message:</strong>

<textarea name="" cols="10" rows="10" class="input_field"></textarea>

</p>



<div class="submit text-center">

<input name="" type="button" class="custom-btn" value="Send" onclick="$('.comment_box_confirm').show();">

<input name="" type="button" class="custom-btn" value="Cancel">

</div>

</form>

</div>	<!-- end left container -->



<div class="span6">

<div class="map"><img src="<?=base_url();?>images/front/map.jpg" alt=" "></div>

<div class="company-info">

<h4>Startup Meow</h4>

<p><?=str_replace('<p>','',str_replace('</p>','<br />',$address));;?></p>

</div>

<div class="company-info">

<h4>&nbsp;</h4>

<p><strong>Email:</strong> <a href="mailto:<?=strip_tags($email);?>"><?=strip_tags($email);?></a></p>



</div>

</div>



</div>

</div>	<!-- end container form -->

</div>

</div>

</div>

</div>

</div>