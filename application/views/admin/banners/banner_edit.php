<style>
.admn_eft_eml p label, .admn_vw_cndtl p label { width:135px;}
</style>
<div id="page_body">
    <div class="inner">
      <div class="page-title">
        <h1><span>Admin</span> <?=($edit=='new') ? 'Add' : 'Edit' ?> Banner Controller	</h1>
      </div>
      <div class="content-box page_cont admn_eft_eml" style="padding:40px 0 0 45px;">
      <form action="<?php echo site_url('admin/banner/save/' . $banner_id);?>" method="post" enctype="multipart/form-data">
	  <?PHP if(form_error('name')) { ?><p><?php echo form_error('name');?></p><?PHP } ?>
      <p><label class="">Name:</label> 
	  <select name="name" id="name" class="input-field" onchange="setLocation(this.value)">
			<option value=""> Select</option>
			<option value="home" <?PHP if(isset($banner['name']) && $banner['name']=='home') echo 'selected="selected"'; ?>> Home</option>
			<option value="sign_in" <?PHP if(isset($banner['name']) && $banner['name']=='sign_in') echo 'selected="selected"'; ?>> Sign In</option>
			<option value="sign_up_driver" <?PHP if(isset($banner['name']) && $banner['name']=='sign_up_driver') echo 'selected="selected"'; ?>> Sign Up(driver)</option>
			<option value="sign_up_company" <?PHP if(isset($banner['name']) && $banner['name']=='sign_up_company') echo 'selected="selected"'; ?>> Sign Up(company)</option>
		</select>
	   </p>
	  
	   <?PHP if(form_error('location')) { ?><p><?php echo form_error('location');?></p><?PHP } ?>
      <p><label class="">Location:</label> 
	  	<select name="location" id="location" class="input-field">
			<option value=""> Select</option>
			<option value="right" <?PHP if(isset($banner['location']) && $banner['location']=='right') echo 'selected="selected"'; ?>> Right</option>
			<option value="bottom" <?PHP if(isset($banner['location']) && $banner['location']=='bottom') echo 'selected="selected"'; ?>> Bottom(728 x 90)</option>
		</select>
	  </p>
	  
	  <?PHP if(form_error('code')) { ?><p><?php echo form_error('code');?></p><?PHP } ?>
      <p><label class="">Code:</label><textarea  name="code" id="code" rows="" cols="" class="input-field"><?php echo set_value('code', isset($banner['code']) ? $banner['code'] : '');?></textarea></p>
	  
	   <?PHP if(form_error('userfile')) { ?><p><?php echo form_error('userfile');?></p><?PHP } ?>
      <p><label class="">Image:</label> <input name="userfile" id="userfile" type="file" class="input-field" value="" /> 
	  </p><?php if (!empty($banner['image'])) : ?><p><label class="">&nbsp;</label>
		<img src="<?php echo site_url('data/banners/' . $banner['image']);?>" alt="" width="100" height="100" /><br/>
	  <?php endif;?></p>
	  
	  <?PHP if(form_error('link')) { ?><p><?php echo form_error('link');?></p><?PHP } ?>
      <p><label class="">Link:</label> <input name="link" id="link" type="text" class="input-field" value="<?php echo set_value('link',isset($banner['link']) ? $banner['link'] : '');?>" /> </p>
	  
	  <?PHP if(form_error('date_from')) { ?><p><?php echo form_error('date_from');?></p><?PHP } ?>
      <p><label class="">Dsplay From:</label> <input name="date_from" id="datepicker" type="text" class="input-field" value="<?php echo set_value('date_from',isset($banner['date_from']) ? $banner['date_from'] : '');?>" /> </p>
	  
	  <?PHP if(form_error('date_to')) { ?><p><?php echo form_error('date_to');?></p><?PHP } ?>
      <p><label class="">Display To:</label> <input name="date_to" id="datepicker2" type="text" class="input-field" value="<?php echo set_value('date_to',isset($banner['date_to']) ? $banner['date_to'] : '');?>" /> </p>
	  
	  <?PHP if(form_error('max_clicks')) { ?><p><?php echo form_error('max_clicks');?></p><?PHP } ?>
      <p><label class="">Maximum clicks:</label> <input name="max_clicks" id="max_clicks" type="text" class="input-field" value="<?php echo set_value('max_clicks',isset($banner['max_clicks']) ? $banner['max_clicks'] : '');?>" /> </p>
	  
	  <?PHP if(form_error('max_impressions')) { ?><p><?php echo form_error('max_impressions');?></p><?PHP } ?>
      <p><label class="">Maximum impressions:</label> <input name="max_impressions" id="max_impressions" type="text" class="input-field" value="<?php echo set_value('max_impressions',isset($banner['max_impressions']) ? $banner['max_impressions'] : '');?>" /> </p>
	  
      <p style="padding-top: 10px;"><input name="save" type="submit" class="btn" value="Save" style="margin-left: 190px; margin-right: 5px;" /><input name="cancel" type="button" class="btn" value="Cancel" onclick="location.href='<?=site_url('admin/banner');?>'"/></p>
      
      </form>
        
      </div>
      <!-- end table container here --> 
      
    </div>
  </div>
  <script>
 $(function() {

	$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true});

	$("#datepicker2").datepicker({showOtherMonths: true, selectOtherMonths: true});

});
function setLocation(val)
{
	if(val=='home' || val=='sign_in')
	{
		if(val=='home')
			var option = $('<option></option>').attr("right", "right").text("right(342x257)");
		else	
			var option = $('<option></option>').attr("right", "right").text("right(436x153)");
		$("#location").empty().append(option);
	} else {
		var option = $('<option></option>').attr("bottom", "bottom").text("bottom(728X90))");
		$("#location").empty().append(option);
	}
	
	
}

  </script>