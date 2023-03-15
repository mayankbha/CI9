<script>
	function show(id)
	{
		$('.delete_popup').hide();
	  	$('.delete_popup_'+id).css({"display":"block"});
	}
</script>

<h2 class="pull-left"><span>Admin</span> Lessons Controller</h2>
<div class="search_box pull-left">
    <form action="#" method="get">
      <input name="" class="ymp_inpt" value="Search here" type="text">
      <input name="" src="<?php echo base_url()?>images/srch_icon.png" alt="search" class="search_btn" type="image">
  </form>
</div>
<a href="<?php echo site_url('admin/lessons/add');  ?>" class="ymp_top_btn pull-right">Create New Lesson</a>
<div class="clear"></div>
<div class="tabular_cont">
    <table>
      <tbody>
        <tr>
        <th><a href="<?php echo site_url('admin/lessons/index/'.$order.'/'.'title'); ?>">Lesson Title</a></th>
        <th class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/lessons/index/'.$order.'/'.'stage'); ?>">Stage</a></th>
        <th class="hidden-phone"><a href="<?php echo site_url('admin/lessons/index/'.$order.'/'.'overall'); ?>">Overall/Category</a></th>
        <th><a href="<?php echo site_url('admin/lessons/index/'.$order.'/'.'number'); ?>">Prioritization Number</a></th>
        <th>Actions</th>
    </tr>
    <?php 
	if($lesson) :
	   foreach($lesson as $les):  ?>
      
    <tr>
   
       <td onclick="show_data('<?php echo $les->id; ?>');"><a href="<?php echo site_url('admin/lessons/view/'.$les->id);  ?>"  style="color:black;"><?php echo $les->title; ?></a></td>
        <td onclick="show_data('<?php echo $les->id; ?>');" class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/lessons/view/'.$les->id);  ?>"  style="color:black;"><?php echo $les->stage; ?></a></td>
        <td  onclick="show_data('<?php echo $les->id; ?>');" class="hidden-phone"><a href="<?php echo site_url('admin/lessons/view/'.$les->id);  ?>"   style="color:black;"><?php echo $les->overall; ?></a></td>
        <td onclick="show_data('<?php echo $les->id; ?>');"><a href="<?php echo site_url('admin/lessons/view/'.$les->id);  ?>"   style="color:black;"><?php echo $les->number; ?></a></td>
       
        <td class="action"><a href="<?php echo site_url('admin/lessons/edit/'.$les->id); ?>"><img src="<?php echo base_url()?>images/edit_icon.png" alt=" "></a> 
        <a href="#!delete"   onclick="show(<?php echo $les->id; ?>);"  id="<?php echo $les->id;  ?>"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
            <div class="popup_container">
                <div class="popover bottom  delete_popup  delete_popup_<?php echo $les->id;?>" style="display:none;">
                    <div class="arrow"></div>
                    <div class="popover-inner">
                        <div class="popover-content">
                            <p> Are you sure you want to do this? <span>This action is not reversible! </span> <span class="sp_btn">
                                <button type="button" data-target-url="<?php echo site_url('admin/lessons/delete/'.$les->id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
                                <button type="submit" class="btn ymp_btn_lrge ymp_btn_small delete">Cancel</button>
                            </span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    
    <?php endforeach; endif; ?>
     <input type="hidden"  name="lid"  id="lids"  value="<?php echo count($lesson); ?>"  />
</tbody></table>

<script>
function show_data(val) {
   window.location="<?php echo site_url('admin/lessons/view/'); ?>/"+val;
}
</script>




</div>