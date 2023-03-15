
<h2 class="pull-left"><span>Admin</span> Blog  Controller</h2>
<div class="search_box pull-left">
	<form action="<?php echo site_url('admin/blog/search'); ?>" method="post">
		<input name="keyword" type="text" class="ymp_inpt" placeholder="Search here" value="<?php echo(isset($search_keyword)?$search_keyword:""); ?>" />
		<input name="" type="image" src="<?php echo site_url('images/srch_icon.png'); ?>" alt="search" class="search_btn" />
		<input value="do_search" name="do_search" type="hidden" />
	</form>
</div>
<a href="<?php echo site_url('admin/blog/add'); ?>" class="ymp_top_btn pull-right">Create New Blog</a>
<div class="clear"></div>
<div class="tabular_cont">
	<table>
		<thead>
			<tr>
				<th><a href="<?php echo site_url('admin/blog/page/' . $page . '/date_added/' . ($orderBy == "date_added" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Date <?php echo($orderBy == "date_added" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th><a href="<?php echo site_url('admin/blog/page/' . $page . '/author/' . ($orderBy == "author" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Author <?php echo($orderBy == "author" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone hidden-tablet"><a href="<?php echo site_url('admin/blog/page/' . $page . '/title/' . ($orderBy == "title" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Title <?php echo($orderBy == "title" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/blog/page/' . $page . '/category/' . ($orderBy == "category" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">Category <?php echo($orderBy == "category" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($blogs as $blog){ ?>
			<tr>
				<td><?php echo date('d-m-Y'); ?></td>
				<td><?php echo $blog->author; ?></td>
				<td class="hidden-phone hidden-tablet"><?php echo $blog->title; ?></td>
				<td class="hidden-phone"><?php echo $blog->category; ?></td>
				<td class="action"><a href="<?php echo site_url('admin/blog/edit/'.$blog->id); ?>"><img src="<?php echo site_url('images/edit_icon.png'); ?>" alt=" " /></a>
					<div class="popup_container"><a href="#!delete" class="delete_confirm"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
						<div class="popover bottom" style="display:none;">
							<div class="arrow"></div>
							<div class="popover-inner">
								<div class="popover-content">
									<p> Are you sure you want to do this? <span>This action can not be undone! </span> <span class="sp_btn">
										<button type="button" data-target-url="<?php echo site_url('admin/blog/delete/'.$blog->id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
										<button type="submit" class="btn ymp_btn_lrge ymp_btn_small delete">Cancel</button>
										</span> </p>
								</div>
							</div>
						</div>
					</div></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
