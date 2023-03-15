<h2 class="pull-left"><span>Admin</span> Blog Categories Controller</h2>
<div class="search_box search_box_with_drpdwn pull-left">
    <form action="<?php echo site_url('admin/blog_categories/search')?>" method="post">
        <div class="srch_box pull-left">
            <select name="search_category" class="sel_dropdown">
                <option value="0">Category</option>
                <?php foreach($level1_blog_categories as $level1_blog_category):?>
                <option value="<?php echo $level1_blog_category->id?>" <?php echo $search_category==$level1_blog_category->id?' selected="selected"':''?>><?php echo $level1_blog_category->name?></option>
                <?php endforeach;?>
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
    <a href="#" class="ymp_top_btn pull-right" id="create_button">Create New Category</a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal" id="point" method="post" action="<?php echo site_url('admin/points/add')?>">
                    <div class="control-group">
                        <label class="control-label">Category:</label>
                        <div class="controls">
                            <select name="parent_category_id" id="parent_category_id" class="input_field span4">
                                <option value="0">Select</option>
                                <?php foreach($level1_blog_categories as $level1_blog_category):?>
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
        <th class=""><a href="<?php echo site_url('admin/blog_categories/page/' . $page . '/parent_name/' . ($orderBy == "parent_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Category <?php echo($orderBy == "parent_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
        <th class="hidden-phone"><a href="<?php echo site_url('admin/blog_categories/page/' . $page . '/name/' . ($orderBy == "name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "name" ? $order : ""); ?>">Subcategory <?php echo($orderBy == "name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $count = 0;
      foreach ($blog_categories as $blog_category) { 
          $count++;
        ?>
      <tr>
        <td class=""><?php echo $blog_category->parent_name==""?"Root":$blog_category->parent_name; ?></td>
        <td class="hidden-phone"><?php echo $blog_category->name; ?></td>
        <td class="action">
            <div class="popup_container"> 
                <a href="#!edit" class="edit_popup" data-edit-count="<?php echo $count?>" ><img src="<?php echo site_url('images/edit_icon.png');?>" alt=" "></a>
                <div class="popover bottom cat_edit_popup" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content form_div ">
                            <form class="form-horizontal edit_form" id="category_edit_form<?php echo $count?>" method="post" action="<?php echo site_url('admin/blog_categories/edit/'.$blog_category->id)?>">
                                <div class="control-group">
                                    <label class="control-label">Category:</label>
                                    <div class="controls">
                                        <select name="edit_parent_category_id" class="input_field span4">
                                            <option value="0" <?php echo $blog_category->parent_id==0?' selected="selected"':''?>>Select</option>
                                            <?php foreach($level1_blog_categories as $level1_blog_category):?>
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
                                <button type="button" data-target-url="<?php echo site_url('admin/blog_categories/delete/'.$blog_category->id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
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
