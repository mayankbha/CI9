<?php if($edited==0){ ?>
<!--  add section  -->
<h2 class="pull-left"><span>Admin</span>  Add/Edit a Survey</h2>
<div class="clear"></div>

<div class="ymp_content form_div edit_survey_form">

	<form class="form-horizontal" method="post" action="<?php echo site_url('admin/surveys/add'); ?>"  enctype="multipart/form-data"  onsubmit="return check();" >
		
		<div class="survey_edit_form_left form-horizontal pull-left">
			
			<h3>Selecting Stage/Category</h3>
            
            	<div class="control-group ">

				<label class="control-label">Title:</label>

				<div class="controls">
					<input class="input_field"   type="text"  name="s_title"  id="title">
				</div>

			</div>

			<div class="control-group">

				<label class="control-label">Stage:</label>

				<div class="controls">
				<select name="s_stage" class="input_field"  onchange="get_overall(this.value);"  id="stage">
                    <option  value="0"  selected="selected">select</option>
					 <?php foreach ($lessons as $lesson):  ?>
					 
                        <option value="<?php echo $lesson->stage; ?>"  ><?php echo $lesson->stage;?></option>
                   <?php 
					 endforeach;?>
					</select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Overall:</label>

				<div class="controls">
			       <select name="s_overall" class="input_field"  onchange="get_sub1(this.value);"  id="overall">
                   	<option selected="selected">Select</option>
				  </select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 1:</label>

				<div class="controls">
              
				<select name="s_sub1" class="input_field"  onchange="get_sub2(this.value);"  id="sub1">
						<option selected="selected">Select</option>
					</select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 2:</label>

				<div class="controls">
                 
				<select name="s_sub2" class="input_field"  id="sub2">
						<option selected="selected">Select</option>
					</select>
				</div>

			</div>
			
			<div class="control-group spcl_wdth">

				<label class="control-label">Numerical Order:</label>

				<div class="controls">
					<input class="input_field"  style="width:75px;" type="text"  name="s_num"  id="num"  onblur="check_lesson_number(this.value);">
				</div>
              <span id="surveyno"  style="color:red;"></span>
			</div>
			
		</div>
		<!--  end left part  -->
		
		<div class="survey_edit_form_right pull-right">
			
			<h3>Question and Answers</h3>
			
			<label>Question:</label>                
			<div class="tarea_container">
				<textarea class="input_field"  name="question1"></textarea>
				</div>
				<div class="answersWrapper">
                <div class="answersDiv">
				<label class="numAns add-margin">Answer 1:</label>                
				<div class="tarea_container">
					<textarea class="input_field"  name="ans1[]"></textarea>
					</div>
					
					<div class="lbl_actn clearfix">
						<label class="pull-left add-margin" >Action for Answer:</label>                
						<div class="select_container pull-left has_mar_rgt"  >
							<select name="action1[]" class="input_field  next_action_for_a  add-select-margin" onchange="cng(1)">
								<option  value="1"  selected="selected">Go to next lesson</option>
                                <option  value="2">jump to lesson</option>
							</select>
						</div>
						<div class="select_container pull-left"  style="width:auto"></br>
							<input type="text"  name="next_action_for_q1[]" id="xyz1"  class="next_action_for_q" style="visibility:hidden;width:171px;"  placeholder="enter next lesson number" />
						</div>
					</div>
					</div>
                    </div>
					
						
						<div class="add_answer">+ <a href="javascript:void(0);">Add Answer</a></div>
						
					</div>
					
					<div class="clearfix"></div>
					<div class="sbmt_dv" style="padding:20px 0 0; text-align:center;">

						<button type="submit" class="btn ">Save</button>
                        <input type="hidden"  name="no_of_ans"  id="no_of_ans"   value="1"/>
                        <input type="hidden" name="do_save_survey" value="do_save_survey"/>
                        <input type="hidden" name="do_cancel_survey" value="do_cancel_content"/>

						&nbsp;

						<button type="button" class="btn  "  onclick="window.location='<?php echo  site_url('admin/surveys'); ?>'">Cancel</button>

					</div>

				</form>

			</div>
<?php } else { ?>
<h2 class="pull-left"><span>Admin</span>  Add a Survey</h2>
<div class="clear"></div>

<div class="ymp_content form_div edit_survey_form">

	<form class="form-horizontal" method="post" action="<?php echo site_url('admin/surveys/edit/'.$survey->id); ?>"  enctype="multipart/form-data"  onsubmit="return check();">

		
		<div class="survey_edit_form_left form-horizontal pull-left">
			
			<h3>Selecting Stage/Category</h3>
      
           <div class="control-group ">

				<label class="control-label">Title:</label>

				<div class="controls">
					<input class="input_field" value="<?php echo $survey->title; ?>"  type="text"   name="s_title"  id="title">
				</div>

			</div>

			<div class="control-group">

				<label class="control-label">Stage:</label>

				<div class="controls">
				<select name="s_stage" class="input_field"  name="s_stage"  id="stage">
                    <option  value="0"  >select</option>
					 <?php foreach ($lessons as $lesson): ?>
                        <option   <?php if($lesson->stage==$survey->stage){ echo "selected='selected'"; } ?>   value="<?php echo $lesson->stage ?>"><?php echo $lesson->stage;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Overall:</label>

				<div class="controls">
					<select name="s_overall" class="input_field"  name="s_overall"  id="overall">
					 <?php foreach ($lessons as $lesson): ?>
                        <option <?php if($lesson->overall==$survey->overall){ echo "selected='selected'"; } ?>   value="<?php echo $lesson->overall ?>"><?php echo $lesson->overall;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 1:</label>

				<div class="controls">
					<select name="s_sub1" class="input_field"  name="s_sub1"  id="sub1">
					 <?php foreach ($lessons as $lesson): ?>
                        <option  <?php if($lesson->sub1==$survey->sub1){ echo "selected='selected'"; } ?>  value="<?php echo $lesson->sub1 ?>"><?php echo $lesson->sub1;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 2:</label>

				<div class="controls">
					<select name="s_sub2" class="input_field"  name="s_sub2"  id="sub2">
						 <?php foreach ($lessons as $lesson): ?>
                        <option  <?php if($lesson->sub2==$survey->sub2){ echo "selected='selected'"; } ?>  value="<?php echo $lesson->sub2 ?>"><?php echo $lesson->sub2;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
            
			<div class="control-group spcl_wdth">

				<label class="control-label">Numerical Order:</label>

				<div class="controls">
					<input class="input_field" value="<?php echo $number;  ?> " style="width:75px;" type="text"   name="s_num"  id="num"  onblur="check_lesson_number(this.value);"  />
				</div>

			</div>
			  <span id="surveyno"  style="color:red;"></span>
		</div>
		<!--  end left part  -->
		
		<div class="survey_edit_form_right pull-right">
			
			<h3>Question and Answers</h3>
			
			<label>Question:</label>                
			<div class="tarea_container">
				<textarea class="input_field"  name="question1"><?php echo $question->name;  ?></textarea>
				</div>
                
                <div class="answersWrapper">
               
         <?php  $i=1;   foreach($answer as $ans){      ?>	    
			 <div class="answersDiv">
				<label class="numAns add-margin">Answer  <?php echo $i;  ?> :</label>                
				<div class="tarea_container">
					<textarea class="input_field"  name="ans1[]"><?php echo $ans->name;  ?></textarea>
					</div>
					
					<div class="lbl_actn clearfix">
						<label class="pull-left add-margin" >Action for Answer:</label>                
						<div class="select_container pull-left has_mar_rgt"  style="width:auto">
							<select name="action1[]" class="input_field  next_action_for_a  add-select-margin" onchange="cng1('<?php echo $i;  ?>');">
							    <option   value="1"  <?php if($ans->action1==1){ echo "selected=\"selected\"";}  ?>>Go to next lesson</option>
                                <option  value="2"  <?php if($ans->action1==2){ echo "selected=\"selected\"";}  ?> >jump to lesson</option>
							</select>
						</div>
						<div class="select_container pull-left">
                            <input  type="hidden"  name="hid[]"  id="hid"   value="<?php echo $i; ?>"   />
                          
							<input type="text"  name="next_action_for_q1[]" id="xyz<?php echo $i; ?>"  class="next_action_for_q" style="visibility:hidden;width:171px;"  placeholder="enter next lesson number"  value="<?php echo $ans->action2;  ?>" />
						</div>
					</div>
					</div>
					   <?php  $i++;   }   ?> 
                         
                       
                    </div>  
						
				<div class="add_answer">+ <a href="javascript:void(0);">Add Answer</a></div>
						
					</div>
					
					<div class="clearfix"></div>
					<div class="sbmt_dv" style="padding:20px 0 0; text-align:center;">

						<button type="submit" class="btn "  name="do_save_survey"  value="do_save_survey">Save</button>
                          <input type="hidden"  name="no_of_ans"  id="no_of_ans"  value="<?php echo count($answer); ?>" />
                         <input type="hidden" name="do_save_survey" value="do_save_content"/>

						&nbsp;
	</form>
						<button type="button" class="btn  "  onclick="window.location='<?php  echo site_url('admin/surveys/');  ?>';">Cancel</button>

					</div>

			

			</div>
            
   

<?php } ?>

<style>

.add-margin {
  margin-top:10px !important;
}

.add-select-margin {
  margin-top:15px !important;
}

#xyz1 {
    margin: 10px 0 0 152px !important;
}
</style>

<script>

	jQuery(document).ready(function(){
	
		    jQuery(".add_answer").click(function(){
			jQuery(".answersDiv:last-of-type").clone().appendTo(".answersWrapper");
			jQuery(".answersDiv:last-of-type .numAns").html("Answer "+jQuery(".answersDiv").length+":");
			jQuery(".answersDiv:last-of-type .next_action_for_a").attr("onChange","cng("+jQuery(".answersDiv").length+")");
			jQuery(".answersDiv:last-of-type .next_action_for_q").attr("id","xyz"+jQuery(".answersDiv").length);
			jQuery(".answersDiv:last-of-type .next_action_for_q").css("visibility","hidden");
			jQuery(".answersDiv:last-of-type .next_action_for_q").css("margin","10px 0 0 152px");
			jQuery("#no_of_ans").val(jQuery(".answersDiv").length);
			
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
	 	 
if($("#num").val()=='') {
		$("#num").css('border','1px solid red');
		err = false;	
	 }else{
	 	$("#num").css('border','1px solid green');
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



function get_overall(val) {
$.post('<?php  echo site_url('admin/surveys/get_overall/'); ?>',{'stage':val},function(data){
  document.getElementById('overall').innerHTML=data;
});

}


function get_sub1(val) {
$.post('<?php  echo site_url('admin/surveys/get_sub1/'); ?>',{'overall':val},function(data){
  document.getElementById('sub1').innerHTML=data;
});

}

function get_sub2(val) {
$.post('<?php  echo site_url('admin/surveys/get_sub2/'); ?>',{'sub1':val},function(data){
  document.getElementById('sub2').innerHTML=data;
});
}

function check_lesson_number(val) {

$.post('<?php  echo site_url('admin/surveys/check_lesson_number/'); ?>',{'val':val},function(data){
  document.getElementById('surveyno').innerHTML=data;
});
}



</script>