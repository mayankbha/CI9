<div id="page_body">
<div class="inner">
  <h1><span>Admin</span> Edit Outbound Email</h1>
  <div class="site_contents">
	<form action="<?php echo site_url('admin/faq/save/'.$faq_id)?>" method="post" class="outbound-email">
	  <p> <label>Question:</label><input  name="question" id="question" type="text" value="<?php echo set_value('question',($edit=='edit')? $faq['question'] : '');?>" class="outbound-input" /></p>
	  <p> <label>Message:</label><textarea name="response" cols="" rows="" class="outbound-input"><?php echo set_value('response',($edit=='edit')? $faq['response'] : '');?></textarea></p>
	 
	  <p style="padding: 20px 0 0 260px;"> <label>&nbsp;</label>
		<input name="" type="submit" class="btn" value="Save" style="margin:0 2px 0 60px" />
		<input name="" type="button" class="btn" value="Cancel" onclick="location.href='<?=site_url('admin/faq');?>'"/>
	  </p>
	</form>
  </div>
  <!-- end table container here --> 
  
</div>
</div>
