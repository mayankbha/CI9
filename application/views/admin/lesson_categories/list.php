<h2 class="pull-left"><span>Admin</span> Lessons Category Controller</h2>
<div class="search_box search_box_with_drpdwn pull-left">
    <form action="<?php echo site_url('admin/lesson_categories/search')?>" method="post">
        <div class="srch_box pull-left">
            <select name="search_category" class="sel_dropdown">
                <option value="1">Stage</option>
                <option value="2">Overall</option>
                <option value="3">Sub-1</option>
                <option value="4">Sub-2</option>
            </select>
        </div>                      
        <div class="inpt_div_srch pull-left">
            <input id="search_text" name="search_term" type="text" class="ymp_inpt" value="<?php echo $search_term?>" title="Search here" />
            <input name="" type="image" src="<?php echo base_url()?>images/srch_icon.png" alt="search" class="search_btn" id="search_button" />
        </div>
    </form>
</div>
<style>
    .cat_edit_popup label { width:300px; }
</style>
<div class="pull-right"> <a href="javascript:void(0);" class="ymp_top_btn" id="new_cat">Create New Category</a></div>
    <div style="margin-left:5px;display:none;" class="popup_container" id="popup_newcat">
      <div class="popover bottom" style="right: -36px; top: 89px;">
        <div class="arrow"></div>
        <div class="popover-inner">
          <div class="popover-content">
            <form method="post" action="<?php echo site_url('admin/lesson_categories/add');?>" class="stage-list ajax_form"  onsubmit="return check();">
              <p id="error" style="color: red;padding-bottom: 10px;"></p>
              <p>
                <label>Stage:</label>
                <select name="stage" id="stage" class="input-field input_error stage1" style="height: auto ! important;width: 65%;"  onchange="get_overall(this.value);">
                    <?php foreach ($stages as $stage):?>
                        <option value="<?php echo $stage?>"><?php echo $stage?></option>
                    <?php endforeach;?>
                </select>
                <input name="stage_text" id="stage_text" class="input-field input_error" type="text" style="height: auto ! important;width: 65%;display:none;">
                <label style="float: right; width: auto;padding-left: 10px;padding-top: 5px;" for="stage_check">New Stage</label>
                <input name="stage_check" id="stage_check" class="input-field" type="checkbox" style="height: auto ! important;width:auto;float: right;margin-top: 8px;">
              </p>

              <p style="margin-left:3px;">
                <label>Overall:</label>
                <select name="overall" id="overall" class="input-field input_error overall1" style="height: auto ! important;width: 65%;"  onchange="get_sub1(this.value)">
                  	<option selected="selected"  value="">Select</option>
                 </select>
                
               <?php /*?> <select name="overall" id="overall" class="input-field input_error" style="height: auto ! important;width: 65%;">
                    <?php foreach ($overalls as $overall):?>
                        <option value="<?php echo $overall?>"><?php echo $overall?></option>
                    <?php end<?php */?>
                </select>
                <input name="overall_text" id="overall_text" class="input-field input_error" type="text" style="height: auto ! important;width: 65%;display:none;">
                <label style="float: right; width: auto;padding-left: 10px;padding-top: 5px;" for="overall_check">New Overall</label>
                <input name="overall_check" id="overall_check" class="input-field" type="checkbox" style="height: auto ! important;width:auto;float: right;margin-top: 8px;margin-right: -4px;">
              </p>
              <p>
                <label>Sub 1:</label>
                <select name="sub1" id="sub1" class="input-field input_error sub11" style="height: auto ! important;width: 65%;">
                 	<option selected="selected"  value="">Select</option>
                </select>
                <?php /*?><select name="sub1" id="sub1" class="input-field input_error" style="height: auto ! important;width: 65%;">
                    <?php foreach ($sub1s as $sub1):?>
                        <option value="<?php echo $sub1?>"><?php echo $sub1?></option>
                    <?php endforeach;?>
                </select><?php */?>
                <input name="sub1_text" id="sub1_text" class="input-field input_error" type="text" style="height: auto ! important;width: 65%;display:none;">
                <label style="float: right; width: auto;padding-left: 10px;padding-top: 5px;" for="sub1_check">New Sub 1</label>
                <input name="sub1_check" id="sub1_check" class="input-field" type="checkbox" style="height: auto ! important;width:auto;float: right;margin-top: 8px;">
              </p>
              <p style="margin-left: -45px;">
                <label>Sub 2:</label>
                <input name="sub2" class="input-field" type="text" style="height: auto ! important;width: 65%;">
              </p>
              <p> <span class="sp_btn">
                <button class="btn ymp_top_btn" type="submit" style="width: 90px">Save</button>
                <button class="btn ymp_top_btn" type="button" id="cancel_add_lesson_category">Cancel</button>
              </span> </p>
            </form>
          
        </div>
      </div>
    </div>
  </div>
<div class="popup_container pull-right add_category"> 

    
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal" id="category_form" method="post" action="<?php echo site_url('admin/lesson_categories/add')?>">
                    <div class="control-group">
                        <label class="control-label">Category:</label>
                        <div class="controls">
                            <select name="parent_category_id" id="parent_category_id" class="input_field span4">
                                <option value="0">Select</option>
                                <?php foreach($level1_lesson_categories as $level1_blog_category):?>
                                <option value="<?php echo $level1_blog_category->id?>"><?php echo $level1_blog_category->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="subcategory_name">Subcategory:</label>
                        <div class="controls">
                            <input type="text" id="subcategory_name" name="subcategory_name" class=" span4 input_field" value="">
                        </div>
                    </div>
                    <div class="sbmt_dv_pop">
                        <button type="button" id="save_button" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>

<div class="tabular_cont popup_table">
  <div class="popup-mask" style="display:none;"></div>
  <table>
    <thead>
      <tr>
        <th class=""><a href="<?php echo site_url('admin/lesson_categories/page/' . $page . '/stage/' . ($orderBy == "stage" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Stage <?php echo($orderBy == "stage" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
        <th class="hidden-phone"><a href="<?php echo site_url('admin/lesson_categories/page/' . $page . '/overall/' . ($orderBy == "overall" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Overall <?php echo($orderBy == "overall" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
        <th class="hidden-phone"><a href="<?php echo site_url('admin/lesson_categories/page/' . $page . '/sub1/' . ($orderBy == "sub1" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Sub-1 <?php echo($orderBy == "sub1" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
        <th class="hidden-phone"><a href="<?php echo site_url('admin/lesson_categories/page/' . $page . '/sub2/' . ($orderBy == "sub2" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "sub2" ? $order : ""); ?>">Sub-2 <?php echo($orderBy == "sub2" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $count = 0;
      foreach ($lesson_categories as $lesson_category) { 
          $count++;
        ?>
      <tr>
        <td class=""><?php echo $lesson_category->stage; ?></td>
        <td class="hidden-phone"><?php echo $lesson_category->overall; ?></td>
        <td class="hidden-phone"><?php echo $lesson_category->sub1; ?></td>
        <td class="hidden-phone"><?php echo $lesson_category->sub2; ?></td>
        <td class="action">

            <a href="#!edit" class="edit_popup" data-edit-count="<?php echo $count?>" ><img src="<?php echo site_url('images/edit_icon.png');?>" alt=" "></a>
            <div class="popup_container"> 
                <div class="popover bottom cat_edit_popup" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content form_div ">
                            <form class="form-horizontal edit_form ajax_form" id="category_edit_form<?php echo $count?>" method="post" action="<?php echo site_url('admin/lesson_categories/edit/' . $lesson_category->id)?>">
                                <div class="control-group">
                                    <label class="control-label" for="edit_subcategory_name">Stage:</label>
                                    <div class="controls">
                                        <input type="text" name="stage<?php echo $lesson_category->id?>" id="edit_subcategory_name<?php echo $lesson_category->id?>" class=" span4 input_field" value="<?php echo $lesson_category->stage?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="edit_subcategory_name">Overall:</label>
                                    <div class="controls">
                                        <input type="text" name="overall<?php echo $lesson_category->id?>" id="edit_subcategory_name<?php echo $lesson_category->id?>" class=" span4 input_field" value="<?php echo $lesson_category->overall?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="edit_subcategory_name">Sub 1:</label>
                                    <div class="controls">
                                        <input type="text" name="sub1<?php echo $lesson_category->id?>" id="edit_subcategory_name<?php echo $lesson_category->id?>" class=" span4 input_field" value="<?php echo $lesson_category->sub1?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="edit_subcategory_name">Sub 2:</label>
                                    <div class="controls">
                                        <input type="text" name="sub2<?php echo $lesson_category->id?>" id="edit_subcategory_name<?php echo $lesson_category->id?>" class=" span4 input_field" value="<?php echo $lesson_category->sub2?>">
                                    </div>
                                </div>
                                <div class="sbmt_dv_pop">
                                    <button type="button" class="update_button btn ymp_btn_lrge">Save</button>
                                    <button type="submit" class="btn ymp_btn_lrge cancel_edit">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <a href="#!delete" class="delete_confirm"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
            <div class="popup_container">
                <div class="popover bottom" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content">
                            <p> Are you sure you want to do this? <span>This action can not be undone! </span> <span class="sp_btn">
                                <button type="button" data-target-url="<?php echo site_url('admin/lesson_categories/delete/'.$lesson_category->id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
                                <button type="submit" class="btn ymp_btn_lrge ymp_btn_small delete">Cancel</button>
                                </span> </p>
                        </div>
                    </div>
                </div>
            </div>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="clearfix">
  <?php $this->my_pagination->show(); ?>
</div>
<script type="text/javascript">

    $('#overall_check').click(function(){
	    if($('#stage_check').prop("checked")){
				$('#overall_check').prop('checked', true);
				}
				
				});	

    $('#sub1_check').click(function(){
	
	    if($('#stage_check').prop("checked")){
				$('#sub1_check').prop('checked', true);
				}
	      if($('#overall_check').prop("checked")){
				$('#sub1_check').prop('checked', true);
				}					
				});	




    $('#stage_check').on('click',function(){
        
        if($(this).prop("checked"))
        {
            $('#stage').fadeOut('fast', function(){
                $('#stage_text').fadeIn();
            });    

            if(! $('#overall_check').prop("checked"))
            {
                $('#overall_check').click();
            }

            if(! $('#sub1_check').prop("checked"))
            {
                $('#sub1_check').click();
            }

        }
        else
        {
            $('#stage_text').fadeOut('fast', function(){
                $('#stage').fadeIn();
            });
        }
        
    });

    $('#overall_check').on('click',function(){
        
        if($(this).prop("checked"))
        {
            $('#overall').fadeOut('fast', function(){
                $('#overall_text').fadeIn();
            });    

            if(! $('#sub1_check').prop("checked"))
            {
                $('#sub1_check').click();
            }
        }
        else
        {
            $('#overall_text').fadeOut('fast', function(){
                $('#overall').fadeIn();
            });
        }
        
    });

    $('#sub1_check').on('click',function(){
        
        if($(this).prop("checked"))
        {
            $('#sub1').fadeOut('fast', function(){
                $('#sub1_text').fadeIn();
            });    
        }
        else
        {
            $('#sub1_text').fadeOut('fast', function(){
                $('#sub1').fadeIn();
            });
        }
        
    });
	
function get_overall(val) {
$.post('<?php  echo site_url('admin/lesson_categories/get_overall/'); ?>',{'stage':val},function(data){
  document.getElementById('overall').innerHTML=data;
});

}


function get_sub1(val) {
$.post('<?php  echo site_url('admin/lesson_categories/get_sub1/'); ?>',{'overall':val},function(data){
  document.getElementById('sub1').innerHTML=data;
});

}

function check() {

 var err=true;
if($(".stage1").val()=='') {
		$(".stage1").css('border','1px solid red');
	    err = false;	
	 }else{
	 	$(".stage1").css('border','1px solid green');
	 }

if($(".overall1").val()=='') {
		$(".overall1").css('border','1px solid red');
		err = false;	
	 }else{
	 	$(".overall1").css('border','1px solid green');
	 }
	 
	 
if($(".sub11").val()=='') {
		$(".sub11").css('border','1px solid red');
		err = false;	
	 }else{
	 	$(".sub11").css('border','1px solid green');
	 }
return err;
}

</script>
