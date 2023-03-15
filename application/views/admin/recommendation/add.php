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


.set-width{
 width:60%  !important;
}
.sb1 {
margin:-45px 0 0 214px !important;
}

</style>
<h2><span>Admin</span> Add/Edit a Recommendation</h2>
<div class="ymp_content">
<div class="auto-emails edit-recommendations" style="background:0 none">
<div class="row-fluid">

<form enctype="multipart/form-data" action="<?php echo site_url('admin/recommendations/add') ?>" method="post" class="form-horizontal"  onsubmit="return check();">
<div class="span6">
<div class="control-group">
<label class="control-label">Title:</label>
<div class="controls">
<input name="title" type="text" class="input_field" value=""  id="title">
</div>
</div>

<div class="control-group">
<label class="control-label">Description:</label>
<div class="controls">
<textarea name="description" cols="10" rows="10" class="input_field" style="height:72px;"  ></textarea>
</div>
</div>

 <div class="control-group">
  <label class="control-label">Image:</label>
   <div class="controls">
	<input type="file" id="inputUpload" name="image" style="display:none" placeholder="">
	<label for="inputUpload">
	<input type="text" readonly="readonly" id="inputUploadFilename" class="input_field  set-width"   />
   <div class="sbmt_dv sb1" style="width:auto" >
     <button type="button" class="btn"  style="float:right;margin-right:20px;">Browse</button>
   </div>
</label>
</div>
</div>

<div class="control-group">
<label class="control-label">Video:</label>
<div class="controls">
<input name="video" type="text" class="input_field" value="">
</div>
</div>

<div class="control-group">
<label class="control-label">Affiliate link:</label>
<div class="controls">
<input name="affiliate_link" type="text" class="input_field" value=""  id="affiliate_link">
</div>
</div>
</div>

<div class="span6 rec-col">
<div class="control-group">
<label class="control-label">Stage:</label>
<div class="controls">
<select name="stage" class="input_field"  onchange="get_overall(this.value)">
<option value="">Select</option>
<?php if($lcs): ?>
<?php foreach($lcs as $lc): ?>
<option value="<?php echo $lc->stage ?>"><?php echo $lc->stage ?></option>
<?php endforeach; ?>
<?php endif; ?>

</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Overall:</label>
<div class="controls">
<select name="overall" class="input_field"  id="overall"  onchange="get_sub1(this.value);">
<option value="">Select</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Sub-1:</label>
<div class="controls">
<select name="sub1" class="input_field"  id="sub1"  onchange="get_sub2(this.value);">
<option value="">Select</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Sub-2:</label>
<div class="controls">
<select name="sub2" class="input_field"  id="sub2"  onchange="get_lesson(this.value),get_survey(this.value);">
<option value="">Select</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Lesson:</label>
<div class="controls">
<select name="lessons" class="input_field"  id="lesson">
<option  value="">Select</option>
<?php /*?><?php if($lessons): ?>
<?php foreach($lessons as $lesson): ?>
<option value="<?php echo $lesson->id ?>"><?php echo $lesson->title ?></option>
<?php endforeach; ?>
<?php endif; ?><?php */?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Survey:</label>
<div class="controls">
<select name="survey" class="input_field"  id="survey">
<option  value="">Select</option>
</select>
</div>
</div>

</div>
<div class="clear"></div>
<div class="sbmt_dv" style="padding-top:20px">
<button type="submit" class="btn">Save</button>&nbsp;
<button onclick="window.location='<?php echo site_url('admin/recommendations') ?>';" class="btn">Cancel</button>
</div>
</form>
</div>
</div>
</div>	<!-- end inner container -->


<script>
function check(){
var err = true;

if($('#title').val()==''){
        $('#title').css('border','1px solid red');
		err = false;	
}
if($('#affiliate_link').val()==''){
        $('#affiliate_link').css('border','1px solid red');
		err = false;	
}



$("textarea,select").each(function(){
	 if($(this).val()=='') {
		$(this).css('border','1px solid red');
		err = false;	
	 }else{
	 	$(this).css('border','1px solid green');
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

function get_lesson(val) {

$.post('<?php  echo site_url('admin/recommendations/get_lesson/'); ?>',{'lesson':val},function(data){
  document.getElementById('lesson').innerHTML=data;
});

}

function get_survey(val) {
$.post('<?php  echo site_url('admin/recommendations/get_survey/'); ?>',{'survey':val},function(data){
  document.getElementById('survey').innerHTML=data;
});

}


function get_overall(val) {
$.post('<?php  echo site_url('admin/recommendations/get_overall/'); ?>',{'stage':val},function(data){
  document.getElementById('overall').innerHTML=data;
});

}


function get_sub1(val) {
$.post('<?php  echo site_url('admin/recommendations/get_sub1/'); ?>',{'overall':val},function(data){
  document.getElementById('sub1').innerHTML=data;
});

}

function get_sub2(val) {
$.post('<?php  echo site_url('admin/recommendations/get_sub2/'); ?>',{'sub1':val},function(data){
  document.getElementById('sub2').innerHTML=data;
});
}


</script>
