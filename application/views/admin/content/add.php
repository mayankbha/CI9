<h2><span>Admin</span> Add Content</h2>
<div class="ymp_content form_blog_edit form_div">
	<form class="form-horizontal" action="<?php echo site_url('admin/content/add'); ?>" method="post">
		<div class="control-group">
			<label class="control-label" for="slug">Permalink Slug:</label>
			<div class="controls">
				<input type="text" id="slug" class="input_field span7" name="slug" placeholder=""  value="<?php echo set_value('slug'); ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="title">Page Title:</label>
			<div class="controls">
				<input type="text" id="title" class="input_field span7" name="title" placeholder="" value="<?php echo set_value('title'); ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="description">Description:</label>
			<div class="controls">
				<textarea class="span7" id="description" name="description" rows="4"><?php echo set_value('descriptioin'); ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="keyword">Keyword:</label>
			<div class="controls">
				<input type="text" id="keyword" class="input_field span7" name="keyword" placeholder="" value="<?php echo set_value('keyword'); ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="keywords">Content:</label>
			<div class="controls">
				<textarea class="tinymce" id="content" name="content"><?php echo set_value('content'); ?></textarea>
			</div>
		</div>
		<div class="sbmt_dv">
			<button type="submit" class="btn" name="do_save_content">Save</button>
			<input type="hidden" name="do_save_content" value="do_save_content" />
			&nbsp;
			<button type="submit" class="btn go_to " data-target-url="<?php echo site_url('admin/content'); ?>">Cancel</button>
		</div>
	</form>
</div>
<script src="<?php echo site_url('js/tinymce/tinymce.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo site_url('js/tinymce.js'); ?>"></script> 
