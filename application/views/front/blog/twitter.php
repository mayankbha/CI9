<div id="popover" style="width:530px;">



<div id="popover-head" class="clearfix" style="width:505px;">

<div class="span3"><img src="<?=base_url();?>images/front/popup-logo.png" alt=" "></div>

<div class="close-pp"><a href="javascript:void(0);" onClick="closePP();">Close (<strong>x</strong>)</a></div>

</div>	<!-- end popover head -->



<div id="popover-body">

<div class="popover-heading clearfix">

<h3 class="pull-left">Share with Twitter</h3>

<a href="#" class="pull-right"><img src="<?=base_url();?>images/front/twt_pp.jpg" alt="fb"></a>

</div>



<form class="share-form">

<div class="share-detail share_dtl_twt">
<textarea name="" cols="10" rows="10" class=" input_field" >Say something about this...</textarea>
<a href="#">http://www.lorem_ipsum.com/twitter/share</a>
</div>

<div class="submit-form">
  
  <span class="locknmbr">
    
    187
  </span>
  
  <input name="" type="button" class="custom-btn" value="Share" onClick="closePP(); openForm('<?=site_url('blog/twitter_confirmation');?>');">

<input name="" type="button" class="custom-btn" value="Cancel" onClick="closePP();">

</div>

</form>



</div>	<!-- end popver body -->



</div>