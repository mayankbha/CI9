
<h2><span>Admin</span> Edit User</h2>
<div class="ymp_content">
	<form class="form-horizontal adduser" action="<?php echo site_url('admin/users/edit/'.$user->user_id); ?>" method="post" id="edit_user_form">
		<div class="control-group">
			<label class="control-label" for="first_name">First Name:</label>
			<div class="controls">
				<input type="text" id="first_name" class="input_field" name="first_name" placeholder="" value="<?php echo $user->first_name; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="last_name">Last Name:</label>
			<div class="controls">
				<input type="text" id="last_name" class="input_field" name="last_name" placeholder=""  value="<?php echo $user->last_name; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email Address:</label>
			<div class="controls">
				<input type="text" id="email" class="input_field" name="email" placeholder="" value="<?php echo $user->email; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password:</label>
			<div class="controls">
				<input type="password" id="password" placeholder="" name="password" class="input_field">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password_confirm">Confirm Password:</label>
			<div class="controls">
				<input type="password" id="password_confirm" placeholder="" name="password_confirm" class="input_field">
			</div>
		</div>
		<div class="user-submit sbmt_dv">
			<button type="submit" class="btn" name="do_edit_user">Save</button>
			<input type="hidden" name="do_edit_user" value="yes" />
			<button type="button" class="btn go_to" data-target-url="<?php echo site_url('admin/users'); ?>">Cancel</button>
		</div>
	</form>
</div>
<!-- end inner container --> 
