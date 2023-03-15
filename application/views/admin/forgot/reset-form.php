
<!--content -->
<div class="content">
	<div class="log-box">
		<form class="form-horizontal log-form" method="post" action="<?php echo current_url(); ?>" >
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password:</label>
				<div class="controls">
					<input type="password" id="inputPassword" name="password" class="input-field">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPasswordRepeat">Confirm Password:</label>
				<div class="controls">
					<input type="password" id="inputPasswordRepeat" name="password_repeat" class="input-field">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<span class="pull-right"><button type="submit" class="btn btn-primary" name="do_reset_password">Reset</button>
						<button type="button" class="go_home btn btn-primary">Cancel</button>
						<input type="hidden" name="do_reset_password" value="yes"></span>
				</div>
			</div>
		</form>
	</div>
</div>
<!--/content -->