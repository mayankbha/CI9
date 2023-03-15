
<h2><span>Admin</span> Create New Blog Entry </h2>
<div class="ymp_content form_div form_blog_edit">
	<form class="form-horizontal" action="<?php echo site_url('admin/blog/edit/'.$blog->id); ?>" method="post" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="inputTitle">Title:</label>
			<div class="controls">
				<input type="text" name="title" id="inputTitle" class="span7 input_field" value="<?php echo $blog->title; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputAuthor">Author:</label>
			<div class="controls">
				<input type="text" name="author" id="inputAuthor" class="span7 input_field" value="<?php echo $blog->author; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Category:</label>
			<div class="controls">
				<?php categoryDropdown($blog->category_id,'category_id','input_field span7',false); ?>
			</div>
		</div>
		<div class="control-group date_input">
			<label class="control-label" for="inputDate">Date:</label>
			<div class="controls">
				<input type="text" id="inputDate" name="date" class="span3 input_field datepicker" value="<?php echo date('d-m-Y',strtotime($blog->date_added)); ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmbed">Embed Link:</label>
			<div class="controls">
				<input type="text" id="inputEmbed" name="embed_link" class="span7 input_field" value="<?php echo $blog->embed_link; ?>">
			</div>
		</div>
		<div class="control-group upload_section">
			<label class="control-label" for="inputUpload">Upload Image:</label>
			<div class="controls">
				<input type="file" id="inputUpload" name="image" style="display:none" placeholder="">
				<label for="inputUpload">
					<input type="text" readonly="readonly" id="inputUploadFilename" class="input_field span6" value="<?php echo basename($blog->image); ?>" />
					<button type="button" class="btn   ymp_btn_lrge">Browse</button>
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputMeta">META Tags:</label>
			<div class="controls">
				<input type="text" id="inputMeta" name="meta_tags" class="span7 input_field" value="<?php echo $blog->meta_tags; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputContent">Content:</label>
			<div class="controls">
				<textarea name="content" class="tinymce"><?php echo htmlspecialchars($blog->content); ?></textarea>
			</div>
		</div>
		<div class="sbmt_dv">
			<button type="submit" class="btn">Save</button>
			<input type="hidden" name="do_save_blog" value="do_save_blog" />
			&nbsp;
			<button type="button" class="btn  go_to" data-target-url="<?php echo site_url('admin/blog'); ?>">Cancel</button>
		</div>
	</form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
	function getFilename(file) {
	  if (file.indexOf('/') > -1) file = file.substring(file.lastIndexOf('/') + 1);
	  else if (file.indexOf('\\') > -1) file = file.substring(file.lastIndexOf('\\') + 1);
	  return file;
	}
	$('#inputUpload').change(function(){
		var _fileName=getFilename($('#inputUpload').val());
		if(_fileName!=""){
		$('#inputUploadFilename').val(_fileName);
		}
		})
	
	})
</script>