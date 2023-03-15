<div id="page_body">
    <div class="inner">
	  <div class="head_cont">
		<h1 class="left"><span>Admin</span> FAQ Controller</h1>
		<div class="right"><a href="<?php echo site_url('admin/faq/edit');?>">Add New </a></div>
		<div class="clear"></div>
	  </div>	<!-- end heading container here -->	
     
      <div class="site_contents">
        <table width="1000" border="0" cellspacing="0" cellpadding="0" class="outbound">
		 <?php foreach($faqs_items as $user): ?>
  		<tr>
			<td width="855">
			<h5><?php echo $user['question'];?></h5>
			<p><?php echo $user['response'];?> </p>
			</td>
			<td width="145" align="right"><a href="<?php echo site_url('admin/faq/edit/'.$user['faq_id']);?>">Edit</a> | <a href="<?php echo site_url('admin/faq/delete/'.$user['faq_id'])?>" itle="Are you sure you want to delete this question?" class="confirm_action">Delete</a></td>
		</tr>
 		 <?php endforeach;?>
		</table>
      </div>
      <!-- end table container here --> 
    </div>
  </div>
