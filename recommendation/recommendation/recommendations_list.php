<script>
	function show(id)
	{
		$('.delete_popup_'+id).css({"display":"block"});
	}
</script>
<style>
.btn3 {

text-shadow: 1px 1px 1px #0B212F !important;
border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
}
</style>
<h2 class="pull-left"><span>Admin</span> Recommendations Controller</h2>
<div class="search_box search_box_with_drpdwn pull-left">
    <form action="" method="post">
      <div class="srch_box pull-left">
		<div class="srch_box pull-left">

			<select name="searchBy" class="sel_dropdown">
				<option value="overall" <?php if($searchBy=="overall"){ echo "selected='selected'"; } ?>>Overall</option>
				<option value="title" <?php if($searchBy=="title"){ echo "selected='selected'"; } ?>>Title</option>
				<option value="stage" <?php if($searchBy=="stage"){ echo "selected='selected'"; } ?>>Stage</option>
				<option value="sub1" <?php if($searchBy=="sub1"){ echo "selected='selected'"; } ?>>Sub1</option>
				<option value="sub2" <?php if($searchBy=="sub2"){ echo "selected='selected'"; } ?>>Sub2</option>
			</select>

		</div>
  </div>
  <div class="inpt_div_srch pull-left">
    <input name="search" class="ymp_inpt" value="Search here" onblur="if(this.value==''){ this.value='Search here'; }" onclick="if(this.value=='Search here'){ this.value=''; }" type="text">
    <!--<input type="hidden" name="searchBy" value="" />-->
	<input name="" src="<?php echo base_url()?>images/srch_icon.png" alt="search" class="search_btn" type="image">
</div>
</form>
</div>
<a href="<?php echo site_url('admin/recommendation/add/'); ?>" class="ymp_top_btn pull-right">Create New Recommendation</a>
<div class="clear"></div>
<div class="tabular_cont">
    <table>
      <tbody><tr>
        <th><a href="#">Title</a></th>
        <th class="hidden-phone hidden-tablet"><a href="#">Stage</a></th>
        <th class="hidden-phone hidden-tablet"><a href="#">Overall</a></th>
        <th class="hidden-phone"><a href="#">Sub-1</a></th>
        <th class="hidden-phone"><a href="#">Sub-2</a></th>
        <th>Actions</th>
    </tr>
    
    <?php  
	  if($recommendations)
	 foreach($recommendations as $recommen) { ?>
    <tr>
        <td><a href="<?php echo site_url('admin/recommendation/view/'.$recommen->id); ?>"  style="color:black"><?php  echo $recommen->title;  ?></a></td>
        <td class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/recommendation/view/' .$recommen->id); ?>" style="color:black"><?php  echo $this->Recommendation_model->get_stage_name($recommen->stage);  ?></a></td>
        <td class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/recommendation/view/' .$recommen->id); ?>" style="color:black"><?php  echo $this->Recommendation_model->get_overall_name($recommen->overall);  ?></a></td>
        <td class="hidden-phone"><a href="<?php echo site_url('admin/recommendation/view/' .$recommen->id); ?>"  style="color:black"><?php  echo $this->Recommendation_model->get_sub1_name($recommen->sub1);  ?></a></td>
        <td class="hidden-phone"><a href="<?php echo site_url('admin/recommendation/view/' .$recommen->id); ?>"  style="color:black"><?php  echo $this->Recommendation_model->get_sub2_name($recommen->sub2);  ?></a></td>
        <td class="action"><a href="<?php echo site_url('admin/recommendation/edit/' .$recommen->id); ?>"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a> 
         <div class="popup_container"><a href="#!delete"  onclick="show(<?php echo $recommen->id; ?>);"><img
                                                src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" "/></a>
                                        <div class="popover bottom  delete_popup_<?php echo $recommen->id;?>" style="display:none;">
                                            <div class="arrow"></div>
                                            <div class="popover-inner">
                                                <div class="popover-content">
                                                    <p> Are you sure you want to do this?
                                                        <span>This action is NOT reversible. </span> <span
                                                            class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/recommendation/delete/' . $recommen->id); ?>"
                                                class="go_to btn3 ymp_btn_lrge ymp_btn_small">Confirm
                                        </button>
										<button type="submit" class="btn3 ymp_btn_lrge ymp_btn_small delete">Cancel
                                        </button>
										</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
        </td>
    </tr>
    <?php  } ?>
    <!--<tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum</td>
        <td class="hidden-phone hidden-tablet">Lorem ipsum dolor sit amet</td>
        <td class="hidden-phone">Lorem ipsum</td>
        <td class="hidden-phone">Lorem ipsum dolor sit amet</td>
        <td class="action"><a href="#"><img src="<?php //echo base_url()?>images/edit_icon.png" alt=" "></a> <a href="#"><img src="<?php //echo base_url()?>images/delete_icon.png" alt=" "></a></td>
    </tr>-->
</tbody></table>
</div>