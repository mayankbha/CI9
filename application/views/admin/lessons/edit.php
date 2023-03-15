<?php if($edited!=0){  ?>
<!--edit section -->
<h2><span>Admin</span> Add/Edit a Lesson</h2>
<div class="ymp_content content-inner add-lesson">
    <form action="<?php echo site_url('admin/lessons/edit/'.$only_lesson->id); ?>" method="post" class="form-horizontal"  enctype="multipart/form-data">
      <div class="row-fluid">
        <div class="span6">
          <p>
            <label>Title:</label>
            <input name="r_title" value="<?php echo $only_lesson->title;  ?>" class="input-field" type="text"  id="title">
        </p>
        <p>
            <label class="block">Lesson Number:</label>
            <input name="r_lesson_no" value="<?php echo $number;  ?>" class="input-field" style="width: 90px;" type="text"  onblur="check_lesson_number(this.value);"  id="lessonno">
        </p>
        <span id="lessonno1"  style="color:red;"></span>
        <span class="content-devider block"></span>
        <h3>Selecting Stage/Category</h3>
        <div class="stage-list">
            <p>
              <label>Stage:</label>
              <select name="r_stage" class="input-field"   onchange="get_overall(this.value);"  id="stage">
              <option value="">select</option>
               <?php 
			   foreach($stage as  $lescate) :
			   if(isset($lescate->stage) && $only_lesson->stage==$lescate->stage){
			    ?>
                <option  value="<?php echo $lescate->stage; ?>"  selected="selected"><?php echo $lescate->stage; ?></option> 
               <?php  }else{  ?>
                <option  value="<?php echo $lescate->stage; ?>"   ><?php echo $lescate->stage; ?></option>
               <?php } endforeach;?>
              </select>
          </p>
          <p>
              <label>Overall:</label>
              <select name="r_overall" class="input-field"  onchange="get_sub1(this.value);"   id="overall">
               <option value="">select</option>
              <?php 
			  foreach($overall as  $lescate) :  
			  if(isset($only_lesson->overall) && $only_lesson->overall==$lescate->overall) {
			   ?>
                <option  value="<?php echo $lescate->overall; ?>"  selected="selected"><?php echo $lescate->overall; ?></option> 
               <?php  }else{  ?>
                 <option  value="<?php echo $lescate->overall; ?>" ><?php echo $lescate->overall; ?></option> 
               <?php  }endforeach; ?>
              </select>
          </p>
          <p>
              <label>Sub 1:</label>
              <select name="r_sub1" class="input-field"  onchange="get_sub2(this.value);"  id="sub1">
               <option value="">select</option>
              <?php  
			  foreach($sub1 as  $lescate) :  
			  if(isset($only_lesson->sub1) && $only_lesson->sub1==$lescate->sub1) {
			  ?>
                <option  value="<?php echo $lescate->sub1; ?>"  selected="selected"><?php echo $lescate->sub1; ?></option> 
               <?php  }else { ?>
                <option  value="<?php echo $lescate->sub1; ?>"  ><?php echo $lescate->sub1; ?></option> 
               <?php }endforeach; ?>
              </select>
          </p>
          <p>
              <label>Sub 2:</label>
              <select name="r_sub2" class="input-field"  id="sub2">
               <option value="">select</option>
              <?php  
			  	foreach($sub2 as  $lescate) :  
			    if(isset($only_lesson->sub2) && $only_lesson->sub2==$lescate->sub2) {
			  ?>
                <option  value="<?php echo $lescate->sub2; ?>"  selected="selected"><?php echo $lescate->sub2; ?></option> 
               <?php  }else { ?>
                 <option  value="<?php echo $lescate->sub2; ?>"  ><?php echo $lescate->sub2; ?></option> 
               <?php  } endforeach;?>
              </select>
          </p>
         
          <p class="content-devider"></p>
          <h3>Author</h3>
          <p>
              <label>Name:</label>
              <input name="r_name"  class="input-field" type="text"  value="<?php echo $only_lesson->author; ?>"  id="name">
          </p>
          <p>
              <label>Position:</label>
              <input name="r_position"  class="input-field" type="text"  value="<?php echo $only_lesson->position; ?>"  id="position">
          </p>
          <p>
              <label>Social Link:</label>
              <input name="r_social_link"  class="input-field" type="text"  value="<?php echo $only_lesson->social_link; ?>"  id="sociallink">
          </p>
          <p>
              <label>URL:</label>
              <input name="r_url"  class="input-field" type="text"  value="<?php echo $only_lesson->url; ?>"  id="url">
          </p>
          <span class="content-devider block"></span>
          <h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28">Recommendations</h3>
          <div class="stage-list">
              <p>
                <label style="width:27%">Recommendation:</label>
                <select name="recommendation" class="input-field" style="width:66%;margin-left:25px;">
              <?php   
              foreach($recommendation as  $recomm) :  
			  if(isset($only_lesson->sub1) && $only_lesson->sub1==$recomm->title) {
			  ?>
                <option  value="<?php echo $recomm->title; ?>"  selected="selected"><?php echo $recomm->title; ?></option> 
               <?php  }else { ?>
                <option  value="<?php echo $recomm->title; ?>"  ><?php echo $recomm->title; ?></option> 
               <?php } endforeach; ?>
                </select>
            </p>
           <!-- <p class="add-link">+ <a href="#">Add Recommendation</a></p>-->
        </div>
    </div>
</div>
<!--/left section -->
<div class="span6 lesson-form-right">
 <div class="slideshareWrapper">
  <h3>Content</h3>
  <?php
   if($lesson_slide) { $iii = 1;
   foreach($lesson_slide  as $ls) :   ?>
  <div class="slideshareDiv">
  <p>
    <label>Text:</label>
    <textarea name="slide_content[]" rows="3" class="input-field slidetext"  ><?php echo $ls->content;  ?></textarea>
   </p>
   <p>
    <label>Bullet Points:</label>
    <textarea name="slide_points[]" class="input-field slidebulletpoint" rows="3"   ><?php echo $ls->points;  ?></textarea>
   </p>
   <div class="stage-list">
     <label>Image:</label>
				<input type="file" id="inputUpload<?php echo $iii; ?>" value="<?php echo $ls->image_link;  ?>" style="display:none"   class="inputfilediv" onchange="get_file_name(<?php echo $iii ?>)" name="filename[]"   >
                
				 <label for="inputUpload<?php echo $iii ?>"  style="width:auto"  class="filenameupload">
					<input type="text" readonly="readonly" id="inputUploadFilename<?php echo $iii; ?>" class="input-field inputfiletext imagelink"  style="width:237px;"  name="slide_image_link[]"   value="<?php echo $ls->image_link;  ?>"  />
					<button type="button" class="btn3 ymp_btn_lrge"  style="margin-top:8px;">Browse</button>
				</label>
 
  <p>
      <label>Video Link:</label>
      <input name="slide_video_link[]"  class="input-field videolink" type="text"  value="<?php echo $ls->video_link;  ?>"  class="videolink" >
  </p>
  <input  type="hidden"  name="noofslide[]"  id="noofslidelist"      />
  <div style="width:20px;"></div>
  </div>
  </div>
  <p class="remove-slideshare"  onclick="remove_slide(<?php echo $ls->id;  ?>);">- <a href="javascript:void(0);">Remove  Slide</a></p>
  <?php $iii++;  endforeach; }else { ?>
     <div class="slideshareDiv">
  <p>
    <label>Text:</label>
    <textarea name="slide_content[]" rows="3" class="input-field slidetext"  ></textarea>
   </p>
   <p>
    <label>Bullet Points:</label>
    <textarea name="slide_points[]" class="input-field slidebulletpoint" rows="3"   ></textarea>
   </p>
   <div class="stage-list">
     <label>Image:</label>
				<input type="file" id="inputUpload1"  style="display:none"   class="inputfilediv  ymp_btn_lrge" onchange="get_file_name(1)" name="filename[]"   >
                
				 <label for="inputUpload1"  style="width:auto"  class="filenameupload">
					<input type="text" readonly="readonly" id="inputUploadFilename1" class="input-field inputfiletext imagelink"  style="width:237px;"  name="slide_image_link[]"    />
					<button type="button" class="btn3 ymp_btn_lrge"  style="margin-top:8px;">Browse</button>
				</label>
 
  <p>
      <label>Video Link:</label>
      <input name="slide_video_link[]"  class="input-field videolink" type="text"    >
  </p>
  <input  type="hidden"  name="noofslide[]"  id="noofslidelist"      />
  </div>
  </div>
    
  <?php   } ?>
 <!--</div>-->
</div>
<p class="edit-slideshare">+ <a href="javascript:void(0);">Add Another Slide</a></p>
<p class="content-devider"></p>
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> ToDo Items </h3>
 <div class="todoWrapper">

 <?php 
 if($lesson_todo) {
  foreach($lesson_todo  as $ltodo) :   ?>
  <div class="todoDiv">
<div class="stage-list">

    <p>
      <label>ToDo Item:</label>
      <input name="todo_item[]"  class="input-field todo" type="text"  value="<?php echo $ltodo->item;  ?>"  id="todo" >
  </p>
</div>
<p>
    <label style="width: 38%;">Select Action <span style="font-weight: normal !important">(when clicked)</span>:</label>
     <select name="action[]" class="input-field  selectaction" style="width: 60%;">
     <?php  if(isset($ltodo->action) && $ltodo->action==1) :  ?> 
         <option value="1" selected="selected"><?php echo $ltodo->action;  ?></option>
         <option value="2">2</option>
         <option value="3">3</option> 
     <?php  elseif(isset($ltodo->action) && $ltodo->action==2) :   ?>  
         <option value="1">1</option>
         <option value="2"   selected="selected"><?php echo $ltodo->action;  ?></option>
         <option value="3">3</option>
     <?php  else :   ?>   
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3" selected="selected"><?php echo $ltodo->action;  ?></option>
     <?php  endif;  ?>     
     </select>
</p>
 <input  type="hidden"  name="nooftodo[]"  id="nooftodolist"     />
 </div>
  <p class="remove-todo"  onclick="remove_todo_item(<?php echo $ltodo->id;  ?>);">- <a href="javascript:void(0);">Remove ToDo Item</a></p>
  <?php  endforeach; }else{ ?>
  
   <div class="todoDiv">
<div class="stage-list">

    <p>
      <label>ToDo Item:</label>
      <input name="todo_item[]"  class="input-field todo" type="text"   id="todo" >
  </p>
</div>
<p>
    <label style="width: 38%;">Select Action <span style="font-weight: normal !important">(when clicked)</span>:</label>
     <select name="action[]" class="input-field selectaction" style="width: 60%;">
         <option value="1" selected="selected">1</option>
         <option value="2">2</option>
         <option value="3">3</option> 
     </select>
</p>
 <input  type="hidden"  name="nooftodo[]"  id="nooftodolist"     />
 </div>
  
  <?php  } ?>
   </div>

   <p class="add-todo">+ <a href="javascript:void(0);">Add ToDo Item</a></p>
   <p class="content-devider"></p>
 
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Checklist</h3>
<div class="checklistWrapper">
 
<?php  
 if($lesson_checklist) {
 foreach($lesson_checklist  as $checklist) :   ?>
<div class="checklistDiv">
<p class="stage-list">
    <label>Title:</label>
    <input name="check_list_title[]"  class="input-field checklisttitle" type="text"  value="<?php  echo $checklist->title;  ?>"  id="checklisttitle">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions1[]" class="input-field ins1"><?php  echo $checklist->instructions1;  ?></textarea>
   </p>
   <p class="stage-list">
    <label style="width: 20%">Checklist Item:</label>
    <input name="check_list_item[]"  class="input-field checklistitem" style="width: 76%;" type="text"   id="checklistitem"  value="<?php  echo $checklist->item;  ?>">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions2[]" class="input-field ins2"><?php  echo $checklist->instructions2;  ?></textarea>
   </p>
   <input  type="hidden"  name="noofchecklist[]"  id="noofchecklist"     />
   </div>
 
    <p class="remove-checklist"  onclick="remove_checklist_item(<?php  echo $checklist->id;  ?>);">- <a href="javascript:void(0);">Remove Checklist Item</a></p>
   <?php  endforeach; }else { ?>
     <div class="checklistDiv">
<p class="stage-list">
    <label>Title:</label>
    <input name="check_list_title[]"  class="input-field" type="text"    id="checklisttitle">
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions1[]" class="input-field"></textarea>
   </p>
   <p class="stage-list">
    <label style="width: 20%">Checklist Item:</label>
    <input name="check_list_item[]"  class="input-field" style="width: 76%;" type="text"   id="checklistitem"  >
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions2[]" class="input-field"></textarea>
   </p>
   <input  type="hidden"  name="noofchecklist[]"  id="noofchecklist"     />
   </div>
  
     
     
  <?php  }  ?>   
  
</div>
 <p class="add-checklist">+ <a href="javascript:void(0);">Add Checklist Item</a></p>

<!--/right section -->

<div class="clear"></div>
</div>


<!--/ -->

<div class="blog_sbmt sbmt_dv text-center" style="padding-left:15px;">
  <button type="submit" class="btn ">Save</button>
   <input type="hidden"  name="do_edit_lesson"  id="do_edit_lesson"  value="edit" />
   </form>
  &nbsp;
  <button type="button" class="btn  "  onclick="window.location='<?php echo site_url('admin/lessons'); ?>';">Cancel</button>
</div>
</div>

<?php  }else { ?>

<h2><span>Admin</span> Add/Edit a Lesson</h2>
<div class="ymp_content content-inner add-lesson">
    <form action="<?php echo site_url('admin/lessons/add'); ?>" method="post" class="form-horizontal"  onsubmit="return check();"  enctype="multipart/form-data">
      <div class="row-fluid">
        <div class="span6">
          <p>
            <label>Title:</label>
            <input name="r_title"  class="input-field" type="text"  id="title">
        </p>
        <p>
            <label class="block">Lesson Number:</label>
            <input name="r_lesson_no"  class="input-field" style="width: 90px;" type="text"  onblur="check_lesson_number(this.value);"   id="lessonno">&nbsp;&nbsp;
        </p>
        <span id="lessonno1"  style="color:red;"></span>
        <span class="content-devider block"></span>
        <h3>Selecting Stage/Category</h3>
        <div class="stage-list">
            <p>
              <label>Stage:</label>
              <select name="r_stage" class="input-field selectaction"  onchange="get_overall(this.value);">
                <option value="">select</option>
               <?php  foreach($lessons as $les) { ?>
                 <option  value="<?php echo $les->stage; ?>"  ><?php echo $les->stage; ?></option> 
               <?php } ?>
              </select>
          </p>
          <p>
              <label>Overall:</label>
                <select name="r_overall" class="input-field"  id="overall"  onchange="get_sub1(this.value);">
                  <option value="">select</option>
                 </select>
          </p>
          <p>
              <label>Sub 1:</label>
               <select name="r_sub1" class="input-field"  id="sub1"  onchange="get_sub2(this.value);">
                 <option value="">select</option>
              </select>
          </p>
          <p>
              <label>Sub 2:</label>
                <select name="r_sub2" class="input-field"  id="sub2">
                 <option value="">select</option>
                </select>
          </p>
          
     
          <p class="content-devider"></p>
          <h3>Author</h3>
          <p>
              <label>Name:</label>
              <input name="r_name"  class="input-field" type="text"  id="name">
          </p>
          <p>
              <label>Position:</label>
              <input name="r_position"  class="input-field" type="text"  id="position">
          </p>
          <p>
              <label>Social Link:</label>
              <input name="r_social_link"  class="input-field" type="text"  id="socaillink">
          </p>
          <p>
              <label>URL:</label>
              <input name="r_url"  class="input-field" type="text"  id="url">
          </p>
          <span class="content-devider block"></span>
          <h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Recommendations</h3>
         
          <div class="stage-list">
           <div class="recommendationWrapper">
            <div class="recommendationDiv">
              <p>
                <label style="width:27%">Recommendation:</label>
               <select class="input-field" style="width:66%;margin-left:25px;"   name="r_recommendation"   >
                <?php  foreach($recommendation as $reco){ ?>
                   <option selected="selected" value="">select</option>
                    <option ><?php echo $reco->title;  ?></option>
                <?php } ?>
                </select>
          
            </p>
            </div>
            </div>
        </div>
    </div>
</div>
<!--/left section -->
<div class="span6 lesson-form-right">
  <h3>Content</h3>
    <div class="slideshareWrapper">
   <div class="slideshareDiv">
  <p>
    <label>Text:</label>
    <textarea name="slide_content[]" rows="3" class="input-field"  ></textarea>
   </p>
   <p>
    <label>Bullet Points:</label>
    <textarea name="slide_points[]" class="input-field" rows="3"   ></textarea>
   </p>
   <div class="stage-list">
              <label>Image:</label>
				<input type="file" id="inputUpload1"    style="display:none"   class="inputfilediv  ymp_btn_lrge" onchange="get_file_name(1)" name="filename[]"   >
                
				 <label for="inputUpload1"  style="width:auto"  class="filenameupload">
					<input type="text" readonly="readonly" id="inputUploadFilename1" class="input-field inputfiletext imagelink"  style="width:237px;"  name="slide_image_link[]"  />
					<button type="button" class="btn3 ymp_btn_lrge"  style="margin-top:8px;">Browse</button>
				</label>
  <p>
      <label>Video Link:</label>
      <input name="slide_video_link[]"  class="input-field videolink" type="text"  >
  </p>
  </br></br>
  </div>
  </div>
</div>
<p class="add-slideshare">+ <a href="javascript:void(0);">Add Another Slide</a></p>
<p class="content-devider"></p>
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> ToDo Items </h3>
 <div class="todoWrapper">
 <div class="todoDiv">
    <div class="stage-list">
        <p>
          <label>ToDo Item:</label>
          <input name="todo_item[]"  class="input-field todo" type="text"  id="todo" >
      </p>
    </div>
    <p>
        <label style="width: 38%;">Select Action <span style="font-weight: normal !important">(when clicked)</span>:</label>
        <select name="action[]" class="input-field" style="width: 60%;">
          <option selected="selected">Select action</option>
          <option >1</option>
          <option >2</option>
          <option >3</option>
      </select>
    </p>
   </div>
   </div> 
<p class="add-todo">+ <a href="javascript:void(0);">Add ToDo Item</a></p>
<p class="content-devider"></p>
<h3><img src="<?php echo base_url()?>images/front/checklist-image.png" alt="" height="28" width="28"> Checklist</h3>
 <div class="checklistWrapper">
 <div class="checklistDiv">
<p class="stage-list">
    <label>Title:</label>
    <input name="check_list_title[]"  class="input-field checklisttitle" type="text"  id="checklisttitle" >
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions1[]" class="input-field"></textarea>
   </p>
   <p class="stage-list">
    <label style="width: 20%">Checklist Item:</label>
    <input name="check_list_item[]"  class="input-field checklistitem" style="width: 76%;" type="text"  id="checklistitem" >
</p>
<p>
    <label>Instructions:</label>
    <textarea name="check_list_instructions2[]" class="input-field"></textarea>
   </p>
     
 </div>
 </div>  
   <p class="add-checklist">+ <a href="javascript:void(0);">Add Checklist Item</a></p>
</div>

<!--/right section -->

<div class="clear"></div>
</div>



<!--/ -->

<div class="blog_sbmt sbmt_dv text-center" style="padding-left:15px;">
  <button type="submit" class="btn ">Save</button>
    <input type="hidden"  name="noofslide"  id="no_of_slideshare"   value="1"/>
   <input type="hidden"  name="nooftodo"  id="no_of_todo"   value="1"/>
  <input type="hidden"  name="noofchecklist"  id="no_of_checklist"  value="1" />
  <input type="hidden"  name="do_save_lesson"  id="do_save_recommendation"  value="save" />
  </form>
  &nbsp;
  <button type="button" class="btn  "  onclick="window.location='<?php echo site_url('admin/lessons'); ?>';">Cancel</button>
</div>
</div>

<?php  }  ?>

<style>
.btn3 {

    text-shadow: 1px 1px 1px #0B212F !important;
    border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
}
</style>

<script>

jQuery(document).ready(function(){
	
		
	//add slide share	dynamically
	
		  jQuery(".add-slideshare").click(function(){
		 /// 
			jQuery(".slideshareDiv:last-of-type").clone().appendTo(".slideshareWrapper");
			jQuery("#no_of_slideshare").val(jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfiletext").attr("id","inputUploadFilename"+jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfilediv").attr("id","inputUpload"+jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfilediv").attr("onchange","get_file_name("+jQuery(".slideshareDiv").length+")");
			jQuery(".slideshareDiv:last-of-type .filenameupload").attr("for","inputUpload"+jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfiletext").val("");
			jQuery(".slideshareDiv:last-of-type .videolink").val("");
			
		});
		
		jQuery(".edit-slideshare").click(function(){
			jQuery(".slideshareDiv:last-of-type").clone().appendTo(".slideshareWrapper");
			jQuery("#no_of_slideshare").val(jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfiletext").attr("id","inputUploadFilename"+jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfilediv").attr("id","inputUpload"+jQuery(".slideshareDiv").length);
			jQuery(".slideshareDiv:last-of-type .inputfilediv").attr("onchange","get_file_name("+jQuery(".slideshareDiv").length+")");
			jQuery(".slideshareDiv:last-of-type .filenameupload").attr("for","inputUpload"+jQuery(".slideshareDiv").length);
		    jQuery(".slideshareDiv:last-of-type .inputfiletext").val("");
			jQuery(".slideshareDiv:last-of-type .videolink").val("");
			jQuery(".slideshareDiv:last-of-type .slidetext").val("");
			jQuery(".slideshareDiv:last-of-type .slidebulletpoint").val("");
			
		});
		
		
		
		//add  To Do dynamically
		
		  jQuery(".add-todo").click(function(){
			jQuery(".todoDiv:last-of-type").clone().appendTo(".todoWrapper");
			jQuery("#no_of_todo").val(jQuery(".todoDiv").length);
			jQuery(".todoDiv:last-of-type .todo").val("");
			
		});
		
		//add checklist dynamically
		
		  jQuery(".add-checklist").click(function(){
			jQuery(".checklistDiv:last-of-type").clone().appendTo(".checklistWrapper");
			jQuery("#no_of_checklist").val(jQuery(".checklistDiv").length);
			jQuery(".checklistDiv:last-of-type .checklisttitle").val("");
			jQuery(".checklistDiv:last-of-type .checklistitem").val("");
			jQuery(".checklistDiv:last-of-type .ins1").val("");
			jQuery(".checklistDiv:last-of-type .ins2").val("");
			
			
			
		});
		
		
		
	});
	
	function cng(id){
		jQuery("#xyz"+id).css("visibility","visible");
	}
	
	function cng1(id){
		jQuery("#xyz"+id).css("visibility","visible");
	    jQuery("#xyz"+id).css("margin","10px 0 0 152px");
	}
	
	
  
  var i=1;
  jQuery(".next_action_for_a").each(function(){
    if(jQuery(this).val()==2){
		jQuery("#xyz"+i).css("visibility","visible");
	    jQuery("#xyz"+i).css("margin","10px 0 0 152px");
	
	}
	i++;
  }); 
	

function check(){

var err = true;

if($("#title").val()=='') {
		$("#title").css('border','1px solid red');
	    err = false;	
	 }else{
	 	$("#title").css('border','1px solid green');
	 }

if($("#stage").val()=='') {
		$("#stage").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#stage").css('border','1px solid green');
	 }
	 
	 
if($("#overall").val()=='') {
		$("#overall").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#overall").css('border','1px solid green');
	 }
	 
if($("#sub1").val()=='') {
		$("#sub1").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#sub1").css('border','1px solid green');
	 }
	 
	 
if($("#sub2").val()=='') {
		$("#sub2").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#sub2").css('border','1px solid green');
	 }	 
	 	 
if($("#lessonno").val()=='') {
		$("#lessonno").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#lessonno").css('border','1px solid green');
	 }	



if($("#name").val()=='') {
		$("#name").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#name").css('border','1px solid green');
	 }	
	 

if($("#position").val()=='') {
		$("#position").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#position").css('border','1px solid green');
	 }	
	 
if($("#sociallink").val()=='') {
		$("#sociallink").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#sociallink").css('border','1px solid green');
	 }	
	 
	 
if($("#url").val()=='') {
		$("#url").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#url").css('border','1px solid green');
	 }	
	 
	 
if($(".imagelink").val()=='') {
		$(".imagelink").css('border','1px solid red');
		err = false;	
	 }else{
	 	$(".imagelink").css('border','1px solid green');
	 }		 	 

	 
	if($("#todo").val()=='') {
		$("#todo").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#todo").css('border','1px solid green');
	 }	
	 
	if($("#checklisttitle").val()=='') {
		$("#checklisttitle").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#checklisttitle").css('border','1px solid green');
	 }	
	 
	if($("#checklistitem").val()=='') {
		$("#checklistitem").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#checklistitem").css('border','1px solid green');
	 }	   


$("textarea,select,checkbox").each(function(){
	 if($(this).val()=='') {
		$(this).css('border','1px solid red');
		err = false;	
	 }else{
	 $(this).css('border','1px solid green');
	 }
});
return err;
}

function get_overall(val) {
$.post('<?php  echo site_url('admin/lessons/get_overall/'); ?>',{'stage':val},function(data){
  document.getElementById('overall').innerHTML=data;
});

}


function get_sub1(val) {
$.post('<?php  echo site_url('admin/lessons/get_sub1/'); ?>',{'overall':val},function(data){
  document.getElementById('sub1').innerHTML=data;
});

}

function get_sub2(val) {
$.post('<?php  echo site_url('admin/lessons/get_sub2/'); ?>',{'sub1':val},function(data){
  document.getElementById('sub2').innerHTML=data;
});
}

function check_lesson_number(val) {

$.post('<?php  echo site_url('admin/lessons/check_lesson_number/'); ?>',{'val':val},function(data){
  document.getElementById('lessonno1').innerHTML=data;
});
}



function getFilename(file) {
  if (file.indexOf('/') > -1) file = file.substring(file.lastIndexOf('/') + 1);
  else if (file.indexOf('\\') > -1) file = file.substring(file.lastIndexOf('\\') + 1);
  return file;
}
	

function get_file_name(val) {
		var _fileName=getFilename($('#inputUpload'+val).val());
		if(_fileName!=""){
		$('#inputUploadFilename'+val).val(_fileName);
		}
	
}

function remove_slide(val) {
		$.post('<?php  echo site_url('admin/lessons/remove_slide/'); ?>',{'slideid':val},function(data){
		  //if(data!=='')
		 window.location.reload(true);
		    });
		}
		
function remove_todo_item(val) {
		$.post('<?php  echo site_url('admin/lessons/remove_todo_item/'); ?>',{'todoid':val},function(data){
		  //if(data!=='')
		  window.location.reload(true);
		    });
		}
		
function remove_checklist_item(val) {
		$.post('<?php  echo site_url('admin/lessons/remove_checklist_item/'); ?>',{'checklistid':val},function(data){
		  //if(data!=='')
		   window.location.reload(true);
		    });
		}				
</script>