<style>
.btn {
width:150px !important;
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
<script>
	function show(id)
	{
		$('.delete_popup_'+id).css({"display":"block"});
	}
</script>

<h2 class="pull-left"><span>Admin</span> View  a Survey</h2>
<div class="clear"></div>
<div class="ymp_content form_div edit_survey_form view_survey_form">
	<form>
		<div class="survey_edit_form_left form-horizontal pull-left">
			<h3 style="line-height:normal;padding-bottom:15px;"> Stage/Category</h3>
			<div class="control-group" style="padding:14px 0 25px;">
				<label class="control-label">Title:</label>
				<div class="controls"> <?php echo $survey->title;  ?> </div>
			</div>
			<div class="control-group">
				<label class="control-label">Stage:</label>
				<div class="controls"> <?php echo $survey->stage;  ?> </div>
			</div>
			<div class="control-group">
				<label class="control-label">Overall:</label>
				<div class="controls"><?php echo $survey->overall;  ?></div>
			</div>
			<div class="control-group">
				<label class="control-label">Sub 1:</label>
				<div class="controls"> <?php echo $survey->sub1;  ?> </div>
			</div>
			<div class="control-group">
				<label class="control-label">Sub 2:</label>
				<div class="controls"> <?php echo $survey->sub2;  ?> </div>
			</div>
			<div class="control-group spcl_wdth">
				<label class="control-label">Numerical Order:</label>
				<div class="controls"> <?php echo $number;  ?> </div>
			</div>
		</div>
		<!--  end left part  -->
		
		<div class="survey_edit_form_right pull-right">
			<h3 style="line-height:normal;padding-bottom:15px;">Question and Answers</h3>
			<label>Question:</label>
			<div class="tarea_container"> <span><?php echo $question->name;  ?></span> </div>
              <?php  $i=1;   foreach($answer as $ans){      ?>	    
				<label style="padding-top:10px;">Answer  <?php echo $i;  ?> :</label>
				<div class="tarea_container"> <span style="margin-bottom:6px;"><?php echo $ans->name;  ?></span> </div>
					<div class="lbl_actn clearfix">
						<label class="pull-left">Action for Answer:</label>
						<div class="select_container pull-left"><?php if($ans->action1==1){ echo $survey->position+1; }else {echo "jump to lesson"." #".$ans->action2; } ?></div>
					</div>
                <?php  $i++;   }   ?>        
					</div>
                    
                    </form>
					<div class="clearfix"></div>
					<div class="sbmt_dv" style="padding:20px 0 0; text-align:center;">
						&nbsp;
						<button type="submit" class="btn "  onclick="window.location='<?php echo site_url('admin/surveys/edit/' . $survey->id); ?>';">Edit</button>
						&nbsp;
                       <div class="popup_container"><a href="#!delete"  onclick="show(<?php echo $survey->id; ?>);"><button type="submit" class="btn  " >Remove</button></a>
						<div class="popover bottom delete_popup_<?php echo $survey->id;?>" style="display:none;">
							<div class="arrow"></div>
							<div class="popover-inner">
								<div class="popover-content">
									<p> Are you sure you want to do this? <span>This action is NOT reversible. </span> <span class="sp_btn">
										<button type="button" data-target-url="<?php echo site_url('admin/surveys/delete/'.$survey->id); ?>" class="go_to btn3 ymp_btn_lrge ymp_btn_small">Confirm</button>
										<button type="submit" class="btn3 ymp_btn_lrge ymp_btn_small delete">Cancel</button>
										</span> </p>
								</div>
							</div>
						</div>
					</div> 
                    	<button type="submit" class="btn "  onclick="window.location='<?php echo site_url('admin/surveys/add/'); ?>';">Create New</button>
					</div>
				
			</div>