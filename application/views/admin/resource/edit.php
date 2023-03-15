<style>

.ymp_btn_lrge {

margin-bottom:0px !important;
 

}
.btn3 {

text-shadow: 1px 1px 1px #0B212F !important;
border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
}

</style>

<h2><span>Admin</span> Add/Edit a Resource </h2>

<div class="ymp_content form_div form_blog_edit edit_resources">

    <form class="form-horizontal" method="post"
          action="<?php echo site_url('admin/resource/edit/' . $resource->id); ?>"  enctype="multipart/form-data"  onsubmit="return check();">

        <div class="control-group">

            <label class="control-label">Name:</label>

            <div class="controls">

                <input type="text" class="span7 input_field" name="r_name" value="<?php echo $resource->name; ?>">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Text:</label>

            <div class="controls">

                <textarea name="r_text" cols="10" rows="10"
                          class="input_field span7"><?php echo $resource->text;?></textarea>

            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Image:</label>

               <div class="controls">
				<input type="file" id="inputUpload" name="r_image" style="display:none" placeholder="">
				<label for="inputUpload">
					<input type="text" readonly="readonly" id="inputUploadFilename" class="input_field span6"  value="<?php echo $resource->image; ?>"   style="width:366px;" />
					<button type="button" class="btn3 bt2  ymp_btn_lrge">Browse</button>
				</label>
			</div>

        </div>

      <div class="control-group">

            <label class="control-label">Video:</label>

            <div class="controls">

                <input type="text" class="span7 input_field" name="r_video" value="<?php echo $resource->video; ?>">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label">URL:</label>

            <div class="controls">

                <input type="text" class="span7 input_field"
                       value="<?php echo $resource->url; ?>" name="r_url">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Category:</label>

            <div class="controls">
                <select name="r_cat" class="input_field span7">
                    <?php  
					foreach($lessons  as $lesson){
					    if($resource->lesson_id==$lesson->id){    ?>
                       
                        <option value="<?php echo $lesson->id; ?>"  selected="selected"><?php echo $lesson->stage; ?></option>
                    <?php 
					      }else{
				    ?>
                        <option value="<?php echo $lesson->id; ?>"><?php echo $lesson->stage; ?></option>
                    <?php
					}}
				?>
                </select>
            </div>

        </div>

        <div class="sbmt_dv">

            <button type="submit" class="btn " name="do_edit_resource">Save</button>
            <input type="hidden" name="do_edit_resource" value="do_edit_resource"/>

            &nbsp;

            <button type="button" class="btn  "  onclick="window.location='<?php echo site_url('admin/resource'); ?>';">Cancel</button>

        </div>

    </form>

</div>
<script>
function check(){
var err = true;

if($('#r_name').val()==''){
        $('#r_name').css('border','1px solid red');
		err = false;	
}
if($('#r_text').val()==''){
        $('#r_text').css('border','1px solid red');
		err = false;	
}
if($('#r_url').val()==''){
        $('#r_url').css('border','1px solid red');
		err = false;	
}


$("textarea,select").each(function(){
	 if($(this).val()=='') {
		$(this).css('border','1px solid red');
		err = false;	
	 }
});
return err;
}


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
	
	$('#inputUploadVideo').change(function(){
		var _fileName=getFilename($('#inputUploadVideo').val());
		if(_fileName!=""){
		$('#inputUploadFilenameVideo').val(_fileName);
		}
	})

})
</script>
