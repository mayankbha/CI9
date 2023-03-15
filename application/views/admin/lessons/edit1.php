<?php  if($edited!=0){   ?>
<!--edit section -->
<h2><span>Admin</span> Add/Edit a Lesson</h2>
<div class="ymp_content content-inner add-lesson">
    <form action="<?php echo site_url('admin/lessons/edit/'.$only_lesson->id); ?>" method="post" class="form-horizontal">
      <div class="row-fluid">
        <div class="span6">
          <p>
            <label>Title:</label>
            <input name="r_title" value="<?php echo $only_lesson->title;  ?>" class="input-field" type="text" >
        </p>
        <p>
            <label class="block">Lesson Number:</label>
            <input name="r_lesson_no" value="<?php echo $only_lesson->number;  ?>" class="input-field" style="width: 90px;" type="text">
        </p>
        <span class="content-devider block"></span>
        <h3>Selecting Stage/Category</h3>
        <div class="stage-list">
            <p>
              <label>Stage:</label>
              <select name="r_stage" class="input-field">
               <?php  foreach($lessons as $lesson) { 
			   if(isset($only_lesson->number) && $only_lesson->number==$lesson){
			    ?>
                <option  value="<?php echo $lesson->id; ?>"  selected="selected"><?php echo $lesson->stage; ?></option> 
               <?php  }else{  ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->stage; ?></option>
               <?php }} ?>
              </select>
          </p>
          <p>
              <label>Overall:</label>
              <select name="r_overall" class="input-field">
              <?php  foreach($lessons as $lesson) { 
			  if(isset($only_lesson->overall) && $only_lesson->overall==$lesson) {
			   ?>
                <option  value="<?php echo $lesson->id; ?>"  selected="selected"><?php echo $lesson->overall; ?></option> 
               <?php  }else{  ?>
               <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->overall; ?></option> 
               <?php  }} ?>
              </select>
          </p>
          <p>
              <label>Sub 1:</label>
              <select name="r_sub1" class="input-field">
              <?php  foreach($lessons as $lesson) {  
			  if(isset($only_lesson->sub1) && $only_lesson->sub1==$lesson) {
			  ?>
                <option  value="<?php echo $lesson->id; ?>"  selected="selected"><?php echo $lesson->sub1; ?></option> 
               <?php  }else { ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->sub1; ?></option> 
               <?php }} ?>
              </select>
          </p>
          <p>
              <label>Sub 2:</label>
              <select name="r_sub2" class="input-field">
              <?php  foreach($lessons as $lesson) {  
			    if(isset($only_lesson->sub2) && $only_lesson->sub2==$lesson) {
			  ?>
                <option  value="<?php echo $lesson->id; ?>"  selected="selected"><?php echo $lesson->sub2; ?></option> 
               <?php  }else { ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->sub2; ?></option> 
               <?php  }} ?>
              </select>
          </p>
          <p class="content-devider"></p>
          <h3>Author</h3>
          <p>
              <label>Name:</label>
              <input name="r_author"  class="input-field" type="text"  value="<?php echo $only_lesson->author; ?>">
          </p>
          <p>
              <label>Position:</label>
              <input name="r_position"  class="input-field" type="text"  value="<?php echo $only_lesson->position; ?>">
          </p>
          <p>
              <label>Social Link:</label>
              <input name="r_social_link"  class="input-field" type="text"  value="<?php echo $only_lesson->social_link; ?>">
          </p>
          <p>
              <label>URL:</label>
              <input name="r_url"  class="input-field" type="text"  value="<?php echo $only_lesson->url; ?>">
          </p>
          <span class="content-devider block"></span>
          <h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28">Recommendations</h3>
          <div class="stage-list">
              <p>
                <label style="width:27%">Recommendation:</label>
                <select name="" class="input-field" style="width:70%">
                    <option selected="selected">Lorem Ipsum</option>
                </select>
            </p>
            <p class="add-link">+ <a href="#">Add Recommendation</a></p>
        </div>
    </div>
</div>
<!--/left section -->
<div class="span6 lesson-form-right">
  <h3>Content</h3>
  <p>
    <label>Text:</label>
    <textarea name="slide_content" rows="3" class="input-field"  ><?php //echo $lesson_slide->content;  ?></textarea>
   </p>
   <p>
    <label>Bullet Points:</label>
    <textarea name="slide_points" class="input-field" rows="3"   ><?php //echo $lesson_slide->points;  ?></textarea>
   </p>
   <div class="stage-list">
    <p>
      <label>Image Link:</label>
      <input name="slide_image_link"  class="input-field" type="text"  value="<?php //echo $lesson_slide->image_link;  ?>">
  </p>
  <p>
      <label>Video Link:</label>
      <input name="slide_video_link"  class="input-field" type="text"  value="<?php //echo $lesson_slide->video_link;  ?>">
  </p>
</div>
<p class="add-link">+ <a href="#">Add Another Slide</a></p>
<p class="content-devider"></p>
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> ToDo Items </h3>
<div class="stage-list">
    <p>
      <label>ToDo Item:</label>
      <input name="todo_item"  class="input-field" type="text"  value="<?php //echo $lesson_todo->item;  ?>">
  </p>
</div>
<p>
    <label style="width: 38%;">Select Action <span style="font-weight: normal !important">(when clicked)</span>:</label>
    <select name="" class="input-field" style="width: 60%;">
      <option selected="selected">Select action</option>
  </select>
</p>
<p class="add-link">+ <a href="#">Add ToDo Item</a></p>
<p class="content-devider"></p>
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Checklist</h3>
<p class="stage-list">
    <label>Title:</label>
    <input name="check_list_title"  class="input-field" type="text"  value="<?php  //echo $lesson_checklist->title;  ?>">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions1" class="input-field"><?php  //echo $lesson_checklist->instructions1;  ?></textarea>
   </p>
   <p class="stage-list">
    <label style="width: 20%">Checklist Item:</label>
    <input name="check_list_item"  class="input-field" style="width: 76%;" type="text"  value="<?php  //echo $lesson_checklist->item;  ?>">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions2" class="input-field"><?php  //echo $lesson_checklist->instructions2;  ?></textarea>
   </p>
   <p class="add-link">+ <a href="#">Add Checklist Item</a></p>
</div>

<!--/right section -->

<div class="clear"></div>
</div>


<!--/ -->

<div class="blog_sbmt sbmt_dv text-center" style="padding-left:15px;">
  <button type="submit" class="btn ">Save</button>
   <input type="hidden"  name="do_edit_recommendation"  id="do_edit_recommendation"   />
   </form>
  &nbsp;
  <button type="submit" class="btn  "  onclick="<?php echo site_url('admin/lessons/recommendations'); ?>">Cancel</button>
</div>
</div>
<?php  }else{ ?>

<!--add section-->

<h2><span>Admin</span> Add/Edit a Lesson</h2>
<div class="ymp_content content-inner add-lesson">
    <form method="post" action="<?php echo site_url('admin/lessons/add'); ?>"  class="form-horizontal"  enctype="multipart/form-data">
      <div class="row-fluid">
        <div class="span6">
          <p>
            <label>Title:</label>
            <input name="r_title" value="Lorem Ipsun Dolor" class="input-field" type="text" >
        </p>
        <p>
            <label class="block">Descripttion:</label>
             <textarea name="desc" class="input-field"><?php  //echo $lesson_checklist->instructions1;  ?></textarea>
        </p>
        <div class="stage-list">
            <p>
              <label>Stage:</label>
              <select name="r_stage" class="input-field">
               <?php  foreach($lessons as $lesson) {  ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->stage; ?></option> 
               <?php  }  ?>
              </select>
          </p>
          <p>
              <label>Overall:</label>
              <select name="r_overall" class="input-field">
              <?php  foreach($lessons as $lesson) {  ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->overall; ?></option> 
               <?php  }  ?>
              </select>
          </p>
          <p>
              <label>Sub 1:</label>
              <select name="r_sub1" class="input-field">
              <?php  foreach($lessons as $lesson) {  ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->sub1; ?></option> 
               <?php  }  ?>
              </select>
          </p>
          <p>
              <label>Sub 2:</label>
              <select name="r_sub2" class="input-field">
              <?php  foreach($lessons as $lesson) {  ?>
                <option  value="<?php echo $lesson->id; ?>"  ><?php echo $lesson->sub2; ?></option> 
               <?php  }  ?>
              </select>
          </p>
            <p>
                <div class="control-group">
    
                    <label class="control-label">Image:</label>
        
                       <div class="controls">
                        <input type="file" id="inputUpload" name="r_image" style="display:none" placeholder="">
                        <label for="inputUpload">
                            <input type="text" readonly="readonly" id="inputUploadFilename" class="input_field span6" />
                            <button type="button" class="btn bt2  ymp_btn_lrge">Browse</button>
                        </label>
                    </div>
        
                </div>
          </p>
           <p>
               <div class="control-group">

            <label class="control-label">Video:</label>

             <div class="controls">
				<input type="file" id="inputUploadVideo" name="r_video" style="display:none" placeholder="">
				<label for="inputUploadVideo">
					<input type="text" readonly="readonly" id="inputUploadFilenameVideo" class="input_field span6" />
					<button type="button" class="btn bt1  ymp_btn_lrge">Browse</button>
				</label>
			</div>

        </div>
          </p>
          <p>
              <label>Affiliate Link:</label>
              <input name="affiliate_link"  class="input-field" type="text">
          </p>
          <span class="content-devider block"></span>
          <!--<h3><img src="<?php //echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Recommendations</h3>-->
         <!-- <div class="stage-list">
              <p>
                <label style="width:27%">Recommendation:</label>
                <select name="" class="input-field" style="width:70%">
                    <option selected="selected">Lorem Ipsum</option>
                </select>
            </p>
            <p class="add-link">+ <a href="#">Add Recommendation</a></p>
        </div>-->
    </div>
</div>
<!--/left section -->
<div class="span6 lesson-form-right">
  <h3>Content</h3>
  <p>
    <label>Text:</label>
    <textarea name="slide_content" rows="3" class="input-field"></textarea>
   </p>
   <p>
    <label>Bullet Points:</label>
    <textarea name="slide_points" class="input-field" rows="3"></textarea>
   </p>
   <div class="stage-list">
    <p>
      <label>Image Link:</label>
      <input name="slide_image_link"  class="input-field" type="text">
  </p>
  <p>
      <label>Video Link:</label>
      <input name="slide_video_link"  class="input-field" type="text">
  </p>
</div>
<p class="add-link">+ <a href="#">Add Another Slide</a></p>
<p class="content-devider"></p>
<h3><img src="<?php //echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> ToDo Items </h3>
<div class="stage-list">
    <p>
      <label>ToDo Item:</label>
      <input name="todo_item"  class="input-field" type="text">
  </p>
</div>
<p>
    <label style="width: 38%;">Select Action <span style="font-weight: normal !important">(when clicked)</span>:</label>
    <select name="" class="input-field" style="width: 60%;">
      <option selected="selected">Select action</option>
  </select>
</p>
<p class="add-link">+ <a href="#">Add ToDo Item</a></p>
<p class="content-devider"></p>
<h3><img src="<?php //echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Checklist</h3>
<p class="stage-list">
    <label>Title:</label>
    <input name="check_list_title"  class="input-field" type="text">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions1" class="input-field"></textarea>
   </p>
   <p class="stage-list">
    <label style="width: 20%">Checklist Item:</label>
    <input name="check_list_item"  class="input-field" style="width: 76%;" type="text">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions2" class="input-field"></textarea>
   </p>
   <p class="add-link">+ <a href="#">Add Checklist Item</a></p>
</div>

<!--/right section -->

<div class="clear"></div>
</div>


<!--/ -->

<div class="blog_sbmt sbmt_dv text-center" style="padding-left:15px;">
  <button type="submit" class="btn ">Save</button>
   <input type="hidden"  name="do_save_recommendation"  id="do_save_recommendation"  value="yes"  />
   </form>
  &nbsp;
  <button type="submit" class="btn  "  onclick="<?php echo site_url('admin/lessons/recommendations'); ?>">Cancel</button>
</div>
</div>
<?php  } ?>


<script>
function check(){
var err = true;
$("input[type='text'],textarea,select").each(function(){
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
