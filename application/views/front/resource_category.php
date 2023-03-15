<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents clearfix">

<div class="clearfix frineds_title">

	<h2 class="pull-left"><span class="contact-ico rscrh_cat_icon">Resource Category 
</span></h2>
    
    <div class="inpt_div_srch pull-right">
    	<input name="" type="text" class=" input_field" value="Search" />
    	<input name="" type="image" src="<?php echo base_url();?>images/front/srch_btn.png" alt="search" class="search_btn" />
  	</div>    
</div>
<!--  end friend title  -->

<a href="<?php echo site_url('resource/');  ?>" class="back_btn"><img src="<?php  echo base_url();?>images/front/back_btn.png" alt="back"></a>

<div class="resource_cat_container clearfix"  style="cursor:pointer"  >

<?php   foreach($resources as $res ) {   ?>
<div class="rc_cont friend_box"  style="background-color:#F5FBFF"  onclick="show_category(<?php  echo $res->id;  ?>);"  >
	<h3><span><a  href="javascript:void(0);" /><?php  echo $res->name;  ?></a></span></h3>
    <p><?php  echo $res->text;  ?></p>
</div>
<?php  }  ?>

<div style="height:10px;">&nbsp;</div>
</div>
<!--  end resource category  -->

<a href="<?php echo site_url('resource/');  ?>" class="back_btn has_margin_top"><img src="<?php echo base_url();?>images/front/back_btn.png" alt="back"></a>


</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>
<script>
function  show_category(val) {
window.location='<?php echo site_url('resource/resource_detail/');  ?>/'+val;
}
</script>