<div class="content">
	<div class="forgot-pass-form">
		<form class="form-horizontal" method="post" action="<?php echo site_url('admin/forgot'); ?>">
			<div class="control-group">
				<label class="control-label" style="width:129px;padding-top:14px">Email Address:</label>
				<div class="controls">
                    <input type="text" id="inputEmail" name="email" class="input-field" style="width: 60%;">
                    <span class="forgot-buttons">
						<button type="submit" name="do_forgot_password" class="btn btn-primary">Submit</button>
						<input type="hidden" name="do_forgot_password" value="do_forgot_password" />
						<button type="button" class="go_admin btn btn-primary">Cancel</button>
                    </span> </div>
			</div>
		</form>
	</div>
</div>