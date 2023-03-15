<script>
	function show(id)
	{
		$('.delete_popup').hide();
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
<h2 class="pull-left"><span>Admin</span> Survey  Controller</h2>
<div class="search_box pull-left">
	<form action="<?php echo site_url('admin/survey/search'); ?>" method="post">
		<input name="keyword" type="text" class="ymp_inpt" placeholder="Search here" value="<?php echo(isset($search_keyword)?$search_keyword:""); ?>" />
		<input name="" type="image" src="<?php echo site_url('images/srch_icon.png'); ?>" alt="search" class="search_btn" />
		<input value="do_search" name="do_search" type="hidden" />
	</form>
</div>
<a href="<?php echo site_url('admin/surveys/add'); ?>" class="ymp_top_btn pull-right">Create New Survey</a>
<div class="clear"></div>
<div class="tabular_cont">
	<table>
		<thead>
			<tr>
				<th class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/surveys/page/' . $page . '/title/' . $order); ?>" class="">Title <?php echo($orderBy == "title" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th><a href="<?php echo site_url('admin/surveys/page/' . $page . '/stage/' . $order); ?>" class="">Stage <?php echo($orderBy == "author" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/surveys/page/' . $page . '/sub2/' . $order); ?>" class="">Category <?php echo($orderBy == "category" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th><a href="<?php echo site_url('admin/surveys/page/' . $page . '/number/' . $order); ?>" class="">Prioritization Number <?php echo($orderBy == "date_added" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($surveys){
			 foreach($surveys as $survey){ ?>
			<tr  style="cursor:pointer;">
				<td  onclick="show_data('<?php echo $survey->id; ?>');" class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/surveys/view/'.$survey->id); ?>"  style="color:#333333"><?php echo $survey->title;?></a></td>
				<td  onclick="show_data('<?php echo $survey->id; ?>');"><a href="<?php echo site_url('admin/surveys/view/'.$survey->id); ?>"  style="color:#333333"><?php echo $survey->stage; ?></a></td>
				<td onclick="show_data('<?php echo $survey->id; ?>');" class="hidden-phone"><a href="<?php echo site_url('admin/surveys/view/'.$survey->id); ?>"  style="color:#333333"><?php echo $survey->sub2; ?></a></td>
				<td  onclick="show_data('<?php echo $survey->id; ?>');"><?php echo $survey->number; ?></td>
				<td class="action"><a href="<?php echo site_url('admin/surveys/edit/'.$survey->id); ?>"><img src="<?php echo site_url('images/edit_icon.png'); ?>" alt=" " /></a>
					<a href="#!delete"  onclick="show(<?php echo $survey->id;  ?>);"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
                    <div class="popup_container">
						<div class="popover bottom delete_popup delete_popup_<?php echo $survey->id;  ?>" style="display:none;">
							<div class="arrow"></div>
							<div class="popover-inner">
								<div class="popover-content">
									<p> Are you sure you want to do this? <span>This action is NOT reversible. </span> <span class="sp_btn">
										<button type="button" data-target-url="<?php echo site_url('admin/surveys/delete/'.$survey->id); ?>" class="go_to btn3 ymp_btn_lrge ymp_btn_small">Confirm</button>
										<button type="submit" class="btn3 ymp_btn_lrge ymp_btn_small delete">Cancel</button>
										</span> </p>
								</div>
							</div>
						</div>
					</div></td>
			</tr>
			<?php } }?>
		</tbody>
	</table>
</div>
<script>
function show_data(val) {
   window.location="<?php echo site_url('admin/surveys/view/'); ?>/"+val;
}
</script>