<h2 class="pull-left"><span>Admin</span> Users Controller</h2>
<a href="<?php echo site_url('admin/users/add'); ?>" class="ymp_top_btn pull-right">Add New User</a>
<div class="clear"></div>
<div class="tabular_cont popup_table">
	<table>
		<thead>
			<tr>
				<th class=""><a href="<?php echo site_url('admin/users/page/' . $page . '/first_name/' . ($orderBy == "first_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">First Name <?php echo($orderBy == "first_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
				<th class=""><a href="<?php echo site_url('admin/users/page/' . $page . '/last_name/' . ($orderBy == "last_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "last_name" ? $order : ""); ?>">Last Name <?php echo($orderBy == "last_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/users/page/' . $page . '/email/' . ($orderBy == "email" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "email" ? $order : ""); ?>">Email <?php echo($orderBy == "email" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/users/page/' . $page . '/active/' . ($orderBy == "active" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "active" ? $order : ""); ?>">Active <?php echo($orderBy == "active" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) { ?>
			<tr>
				<td class=""><?php echo $user->first_name; ?></td>
				<td class=""><?php echo $user->last_name; ?></td>
				<td class="hidden-phone"><?php echo $user->email; ?></td>
				<td class="hidden-phone"><?php echo ($user->active == 1 ? "Yes" : "No"); ?></td>
				<td class="action"><a href="<?php echo site_url('admin/users/edit/'.$user->user_id); ?>"><img src="<?php echo site_url('images/edit_icon.png'); ?>" alt=" " /></a>
					<div class="popup_container"><a href="#!delete" class="delete_confirm"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
						<div class="popover bottom" style="display:none;">
							<div class="arrow"></div>
							<div class="popover-inner">
								<div class="popover-content">
									<p> Are you sure you want to do this? <span>This action can not be undone! </span> <span class="sp_btn">
										<button type="button" data-target-url="<?php echo site_url('admin/users/delete/'.$user->user_id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
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
	<div class="popup-mask" id="popup_mask" style="display:none"></div>
</div>
<div class="clearfix">
    <?php $this->my_pagination->show(); ?>
</div>
