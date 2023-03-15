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
<div id="page-body">

    <div class="container">

        <div class="row">

            <div class="span12">

                <h2 class="pull-left"><span>Admin</span> Resources Controller</h2>

                <div class="search_box search_box_with_drpdwn pull-left">

                    <form action="#" method="get">

                        <div class="srch_box pull-left">

                            <select name="fancySelect" class="sel_dropdown">

                                <option value="1" selected="selected">Category</option>

                                <option value="2">Cat1</option>

                                <option value="2">Cat2</option>

                                <option value="2">Cat3</option>

                            </select>

                        </div>

                        <div class="inpt_div_srch pull-left">

                            <input name="" type="text" class="ymp_inpt" value="Search here"/>

                            <input name="" type="image" src="<?php echo site_url('images/srch_icon.png'); ?>"
                                   alt="search" class="search_btn"/>

                        </div>

                    </form>

                </div>

                <div class="sort_by pull-left">

                    <label>Sort:</label>

                    <select class="ymp_inpt">

                        <option>By Level</option>

                    </select>

                </div>

                <a href="<?php echo site_url('admin/resource/add'); ?>" class="ymp_top_btn pull-right">Create New
                    Resource</a>

                <div class="clear"></div>

                <div class="tabular_cont">

                    <table>
                        <thead>
                        <tr>
                            <th class=""><a
                                    href="<?php echo site_url('admin/resource/page/' . $page . '/name/' . $order) ?>"
                                    class="">
                                    Name <?php echo($orderBy == "slug" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
                            </th>
                            <th class=""><a
                                    href="<?php echo site_url('admin/resource/page/' . $page . '/text/' . $order); ?>"
                                    class="">Description
                                    <?php echo($orderBy == "title" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
                            </th>
                            <th class=""><a
                                    href="<?php echo site_url('admin/resource/page/' . $page . '/cat_id/' . $order); ?>"
                                    class="">Category
                                    <?php echo($orderBy == "title" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
                            </th>

                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        <?php 
						foreach ($contents->result() as $content) { ?>
                            <tr>
                                <td class=""  onclick="show_data(<?php  echo $content->id; ?>);" ><a href="<?php echo site_url('admin/resource/view_resource/'.$content->id)?>"  style="color:#333333"  target="_blank" ><?php echo $content->name; ?></a></td>
                                <td class="hidden-phone"  onclick="show_data(<?php  echo $content->id; ?>);"><a href="<?php echo site_url('admin/resource/view_resource/'.$content->id)?>"  style="color:#333333"  target="_blank" ><?php echo $content->text; ?></a></td>
                                <td class="hidden-phone"  onclick="show_data(<?php  echo $content->id; ?>);"><a href="<?php echo site_url('admin/resource/view_resource/'.$content->id)?>"  style="color:#333333"  target="_blank"><?php echo $this->Resource_model->get_lesson_categories_by_id($content->lesson_id)->stage; ?></a></td>
                                <td class="action"><a
                                        href="<?php echo site_url('admin/resource/edit/' . $content->id); ?>"><img
                                            src="<?php echo site_url('images/edit_icon.png'); ?>" alt=" "/></a>
                                <a href="#!delete" onclick="show(<?php echo $content->id; ?>);" ><img  src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" "/></a>
                                    <div class="popup_container">

                                        <div class="popover bottom delete_popup_<?php echo $content->id;?>" style="display:none;">
                                            <div class="arrow"></div>
                                            <div class="popover-inner">
                                                <div class="popover-content">
                                                    <p> Are you sure you want to do this?
                                                        <span>This action is NOT reversible. </span> <span
                                                            class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/resource/delete/' . $content->id); ?>"
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
                        <?php } ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
<script>
function show_data(val) {
  window.open("<?php echo site_url('admin/resource/view_resource/')?>/"+val);
}
</script>