
<!--content -->
<div class="content">
	<div class="log-box">
		<form class="form-horizontal log-form" method="post" action="<?php echo site_url('admin/login') ?>" >
			<div class="control-group">
				<label class="control-label" for="inputEmail">Email:</label>
				<div class="controls">
					<input type="text" id="inputEmail" name="username" class="input-field">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password:</label>
				<div class="controls">
					<input type="password" id="inputPassword" name="password" class="input-field">
				</div>
			</div>
			<div class="control-group">
				<div class="controls"><a href="<?php echo site_url('admin/forgot') ?>" class="forgot-password">Forgot Password?</a>
					<span class="pull-right"><button type="submit" class="btn btn-primary" name="do_login">Login</button>
						<button type="button" class="go_home btn btn-primary">Cancel</button>
						<input type="hidden" name="do_login" value="yes"></span>
				</div>
			</div>
		</form>
	</div>
</div>
<!--/content -->