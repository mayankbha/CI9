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
<div class="popup_container pull-right add_category"> 
    <div class="new_box new_box_with_drpdwn pull-left">
    <form action="<?php echo site_url('admin/lesson_categories/search')?>" method="post">
        <div class="srch_box pull-left">
            <select name="search_category" id="type_dropdown">
                <option value="1">Stage</option>
                <option value="2">Overall</option>
                <option value="3">Sub-1</option>
                <option value="4">Sub-2</option>
            </select>
        </div>                      
        <a href="#" class="ymp_top_btn pull-right" id="create_button" style="margin:0">Create New</a>
    </form>
</div>
    
    
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

<div class="tabular_cont">
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
            <div class="popup_container"> 
                <a href="#!edit" class="edit_popup" data-edit-count="<?php echo $count?>" ><img src="<?php echo site_url('images/edit_icon.png');?>" alt=" "></a>
                <div class="popover bottom cat_edit_popup" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content form_div ">
                            <form class="form-horizontal edit_form" id="category_edit_form<?php echo $count?>" method="post" action="<?php echo site_url('admin/lesson_categories/edit/'.$blog_category->id)?>">
                                <div class="control-group">
                                    <label class="control-label">Category:</label>
                                    <div class="controls">
                                        <select name="edit_parent_category_id" class="input_field span4">
                                            <option value="0" <?php echo $blog_category->parent_id==0?' selected="selected"':''?>>Select</option>
                                            <?php foreach($level1_lesson_categories as $level1_blog_category):?>
                                            <?php if ($level1_blog_category->id != $blog_category->id):?>
                                            <option value="<?php echo $level1_blog_category->id?>" <?php echo $blog_category->parent_id==$level1_blog_category->id?' selected="selected"':''?>><?php echo $level1_blog_category->name?></option>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="edit_subcategory_name">Subcategory:</label>
                                    <div class="controls">
                                        <input type="text" name="edit_subcategory_name<?php echo $count?>" id="edit_subcategory_name<?php echo $count?>" class=" span4 input_field" value="<?php echo $blog_category->name?>">
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
            
            <div class="popup_container">
                <a href="#!delete" class="delete_confirm"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
                <div class="popover bottom" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content">
                            <p> Are you sure you want to do this? <span>This action can not be undone! </span> <span class="sp_btn">
                                <button type="button" data-target-url="<?php echo site_url('admin/lesson_categories/delete/'.$blog_category->id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
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
