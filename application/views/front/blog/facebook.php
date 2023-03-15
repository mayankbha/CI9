<div id="popover">



<div id="popover-head" class="clearfix">

<div class="span3"><img src="<?=base_url();?>images/front/popup-logo.png" alt=" "></div>

<div class="close-pp"><a href="javascript:void(0);" onClick="closePP();">Close (<strong>x</strong>)</a></div>

</div>	<!-- end popover head -->



<div id="popover-body">

<div class="popover-heading clearfix">

<h3 class="pull-left">Share with Facebook</h3>

<a href="#" class="pull-right"><img src="<?=base_url();?>images/front/fb_pp.jpg" alt="fb"></a>

</div>



<form class="share-form">

<div class="clearfix">

<img src="<?=base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr pull-left">

<div class="share-detail"><textarea name="" cols="10" rows="10" class=" input_field" >Say something about this...</textarea></div>

</div>

<div class="share-desc clearfix">

<img src="<?=base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr pull-left">

<h4>Lorem ipsum dolor sit amet.</h4>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. </p>

</div>

<div class="submit-form">

<span class="locknmbr">
	<a href="#"><img src="<?=base_url();?>images/front/lock_pp.png" alt="acount"></a>
    187
</span>

<input name="" type="button" class="custom-btn" value="Share" onClick="closePP(); openForm('<?=site_url('blog/facebook_confirmation');?>');">

<input name="" type="button" class="custom-btn" value="Cancel" onClick="closePP();">

</div>

</form>



</div>	<!-- end popver body -->



</div>