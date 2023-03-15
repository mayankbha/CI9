<h2 class="pull-left"><span>Admin</span>  Add a Survey</h2>
<div class="clear"></div>

<div class="ymp_content form_div edit_survey_form">

	<form class="form-horizontal" method="post" action="<?php echo site_url('admin/surveys/add'); ?>"  enctype="multipart/form-data"  onsubmit="return check();">

		
		<div class="survey_edit_form_left form-horizontal pull-left">
			
			<h3>Selecting Stage/Category</h3>

			<div class="control-group">

				<label class="control-label">Stage:</label>

				<div class="controls">
                 <input class="input_field"   type="text"   name="s_stage">
				<!--	<select name="s_stage" class="input_field">
					 <?php //foreach ($lessons as $lesson): ?>
                        <option value="<?php //echo $lesson->id ?>"><?php //echo $lesson->stage;?></option>
                    <?php //endforeach;?>
					</select>-->
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Overall:</label>

				<div class="controls">
                 <input class="input_field"   type="text"   name="s_overall">
					<!--<select name="s_overall" class="input_field">
					 <?php //foreach ($lessons as $lesson): ?>
                        <option value="<?php //echo $lesson->id ?>"><?php //echo $lesson->overall;?></option>
                    <?php //endforeach;?>
					</select>-->
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 1:</label>

				<div class="controls">
                 <input class="input_field"   type="text"   name="s_sub1">
					<!--<select name="s_sub1" class="input_field">
					 <?php //foreach ($lessons as $lesson): ?>
                        <option value="<?php //echo $lesson->id ?>"><?php //echo $lesson->sub1;?></option>
                    <?php //endforeach;?>
					</select>-->
				</div>

			</div>
			
			<div class="control-group">

				<label class="control-label">Sub 2:</label>

				<div class="controls">
                  <input class="input_field"   type="text"   name="s_sub2">
					<!--<select name="s_sub2" class="input_field">
						 <?php //foreach ($lessons as $lesson): ?>
                        <option value="<?php //echo $lesson->id ?>"><?php //echo $lesson->sub2;?></option>
                    <?php //endforeach;?>
					</select>-->
				</div>

			</div>
			
            <div class="control-group">

				<label class="control-label">Lesson :</label>

				<div class="controls">
					<select name="s_lesson" class="input_field">
						 <?php foreach ($lessons as $lesson): ?>
                        <option value="<?php echo $lesson->id ?>"><?php echo $lesson->title;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
              <div class="control-group">

				<label class="control-label">Category :</label>

				<div class="controls">
					<select name="s_cate" class="input_field">
						 <?php foreach ($category as $categorys): ?>
                        <option value="<?php echo $categorys->id ?>"><?php echo $categorys->categories_name;?></option>
                    <?php endforeach;?>
					</select>
				</div>

			</div>
			
            
            
            
			<div class="control-group spcl_wdth">

				<label class="control-label">Numerical Order:</label>

				<div class="controls">
					<input class="input_field" value="123" style="width:75px;" type="text"   name="s_num">
				</div>

			</div>
			
		</div>
		<!--  end left part  -->
		
		<div class="survey_edit_form_right pull-right">
			
			<h3>Question and Answers</h3>
			
			<label>Question:</label>                
			<div class="tarea_container">
				<textarea class="input_field"  name="s_ques1">Lorem Ipsum is simply 
					dummy text of the printing and typesetting industry. Lorem Ipsum has 
					been the industry's standard dummy text ever since the 1500s, when an 
					unknown printer took a galley of type and scrambled it to </textarea>
				</div>
				
				<label>Answer 1:</label>                
				<div class="tarea_container">
					<textarea class="input_field" name="s_ans1">Lorem Ipsum is simply 
						dummy text of the printing and typesetting industry. Lorem Ipsum has 
						been the industry's standard dummy text ever since the 1500s, when an 
						unknown printer took a galley of type and scrambled it to </textarea>
					</div>
					
					<div class="lbl_actn clearfix">
						<label class="pull-left">Action for Answer:</label>                
						<div class="select_container pull-left has_mar_rgt">
							<select name="s_action_1_1" class="input_field">
								<option selected="selected">Select action</option>
							</select>
						</div>
						<div class="select_container pull-left">
							<select name="s_action_1_2" class="input_field">
								<option selected="selected">Select action</option>
							</select>
						</div>
					</div>
					
					<label>Answer 2:</label>                
					<div class="tarea_container">
						<textarea class="input_field"  name="s_ans2">Lorem Ipsum is simply 
							dummy text of the printing and typesetting industry. Lorem Ipsum has 
							been the industry's standard dummy text ever since the 1500s, when an 
							unknown printer took a galley of type and scrambled it to </textarea>
						</div>
						
						<div class="lbl_actn clearfix">
							<label class="pull-left">Action for Answer:</label>                
							<div class="select_container pull-left has_mar_rgt">
								<select name="s_action_2_1" class="input_field">
									<option selected="selected">Select action</option>
								</select>
							</div>
							<div class="select_container pull-left">
								<select name="s_action_2_2" class="input_field">
									<option selected="selected">Select action</option>
								</select>
							</div>
						</div>
						
						<div class="add_answer">+ <a href="#">Add Answer</a></div>
						
					</div>
					
					<div class="clearfix"></div>
					<div class="sbmt_dv" style="padding:20px 0 0; text-align:center;">

						<button type="submit" class="btn "  name="do_save_survey">Save</button>
                         <input type="hidden" name="do_save_survey" value="do_save_content"/>

						&nbsp;
	</form>
						<button type="button" class="btn  "  onclick="window.location='<?php  echo site_url('admin/surveys/');  ?>';">Cancel</button>

					</div>

			

			</div>
            
   <script>
function check(){
var err = true;
$("input[type='text'],textarea,select").each(function(){
	 if($(this).val()=='') {
		$(this).css('border','1px solid red');
		err = false;	
	 }else{
	 	$(this).css('border','1px solid green');
	 }
});
return err;
}

</script>         