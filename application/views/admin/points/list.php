<h2><span>Admin</span> Points Controller</h2>
<style>
.popup_container {
 width:180px !important;
 vertical-align:top !important;
}
.controls {
 margin-left:26px !important;
}

.cat_edit_popup {
 right:71px !important;
 top:19px !important;
}

.ymp_btn_lrge{

margin-left:26px !important;
}

</style>

<div class="tabular_cont point-controller">

  <table> 

   <tbody><tr>

    <th style="text-align:left;padding-left:25px; width:57%">Activities</th>    
    <th style="width: 3%;"></th>
    <th style="width: 14%;" class="hidden-phone">Amount of points</th>    
    <th style="width: 14%;"></th>
    <th style="width:11%">Actions</th>

  </tr>

  <tr>

    <td style="text-align:left;padding-left:25px;">Lesson</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->lesson;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action"> <div class="popup_container  add_category"> 
    <a href="javascript:void(0);" class="create_button" id="create_button1"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal" id="category_form"  method="post" action="<?php echo site_url('admin/points/add/1')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="points" name="points"  value="<?php echo $points->lesson;  ?>" >
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                    <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div></td>

  </tr>


  <tr class="highlited-tr">

    <td style="text-align:left;padding-left:25px;">Stage</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->stage;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action">
    <div class="popup_container  add_category"> 
    <a href="javascript:void(0);"  class="create_button" id="create_button2"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal"  id="category_form" method="post" action="<?php echo site_url('admin/points/add/2')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="stage_points" name="stage_points"  value="<?php echo $points->stage;  ?>">
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                   <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div>
    </td>

  </tr>
  

  <tr>

    <td style="text-align:left;padding-left:25px;">ToDo Item</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->todo;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action">
     <div class="popup_container  add_category"> 
    <a href="javascript:void(0);"  class="create_button" id="create_button3"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal" id="category_form"  method="post" action="<?php echo site_url('admin/points/add/3')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="todo_points" name="todo_points" value="<?php echo $points->todo;  ?>">
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                   <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div>
   </td>

  </tr>

  

  <tr>

    <td style="text-align:left;padding-left:25px;">Recommendation</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->recommendation;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action"> <div class="popup_container  add_category"> 
    <a href="javascript:void(0);"  class="create_button" id="create_button4"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal"  id="category_form" method="post" action="<?php echo site_url('admin/points/add/4')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="recommenpoints" name="recommenpoints" value="<?php echo $points->recommendation;  ?>" >
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                  <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div></td>

  </tr>

  

  <tr>

    <td style="text-align:left;padding-left:25px;">Survey</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->survey;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action"> <div class="popup_container  add_category"> 
    <a href="javascript:void(0);"  class="create_button" id="create_button5"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal" id="category_form" method="post" action="<?php echo site_url('admin/points/add/5')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="surveypoints" name="surveypoints"  value="<?php echo $points->survey;  ?>">
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                 <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div></td>

  </tr>

  <tr>

    <td style="text-align:left;padding-left:25px;">Blog Comment</td>
    <td></td>
    <td class="hidden-phone"><?php echo $points->blog_comment;  ?></td>
    <td class="hidden-phone"></td>
    <td class="action"> <div class="popup_container  add_category"> 
    <a href="javascript:void(0);"  class="create_button" id="create_button6"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a>
    <div class="popover bottom cat_edit_popup" style="display:none;">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content form_div ">
                <form class="form-horizontal"  method="post" action="<?php echo site_url('admin/points/add/6')?>">
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label" for="subcategory_name">Points:</label>
                            <input type="text" id="blogpoints" name="blogpoints"  value="<?php echo $points->blog_comment;  ?>">
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" id="" class="btn ymp_btn_lrge">Save</button>
                        <button type="submit" class="btn ymp_btn_lrge cancel">Cancel</button>
                    </div>
                   <input type="hidden"  name="do_save_points"  id="do_save_points"   value="save"/>
                </form>
            </div>
        </div>
    </div>
</div></td>

  </tr>

</tbody></table>

</div>
<script>
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
	</script>