<div id="popover">



<div id="popover-head" class="clearfix">

<div class="span3"><img src="<?=base_url();?>images/front/popup-logo.png" alt=" "></div>

<div class="close-pp"><a href="javascript:void(0);" onClick="closePP();">Close (<strong>x</strong>)</a></div>

</div>	<!-- end popover head -->



<div id="popover-body">

<div class="popover-heading clearfix">

<h3 class="pull-left">Share with LinkedIn</h3>

<a href="#" class="pull-right"><img src="<?=base_url();?>images/front/linkin_pp.jpg" alt="fb"></a>

</div>



<form class="share-form">


<div class="share-desc clearfix" style="padding:0 0 15px 0;">

<img src="<?=base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr pull-left">

<h4>Lorem ipsum dolor sit amet.</h4>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. </p>

</div>


<label class="checkbox"> <input type="checkbox" checked> Post to updates</label>

<div class="share-detail share_dtl_link">
<textarea name="" cols="10" rows="10" class=" input_field" style="height:65px;" >Say something about this...</textarea>
</div>

<label class="checkbox"> <input type="checkbox"> Post to updates</label>

<label class="checkbox"> <input type="checkbox"> Post to updates</label>


<div class="submit-form">
  <input name="" type="button" class="custom-btn" value="Share" onClick="closePP(); openForm('<?=site_url('blog/linkedin_confirmation');?>');">

<input name="" type="button" class="custom-btn" value="Cancel" onClick="closePP();">

</div>

</form>



</div>	<!-- end popver body -->



</div>