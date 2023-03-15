<div id="page_body">
    <div class="inner">
      <div class="page-title">
        <h1><span>Admin</span> View Outbound Email	</h1>
      </div>
      <div class="content-box page_cont admn_eft_eml" style="padding:40px 0 0 45px;">
      <form action="#" method="post">
      <p><label class="">Subject:</label> <span class="view_inpt"><?php echo $email['subject'];?></span> </p>
      <p><label class="">Message:</label><span class="view_inpt"><?php echo $email['content'];?></span></p>
      <p style="padding-top: 10px;"><input name="save" type="button" class="btn" value="Edit" style="margin-left: 190px; margin-right: 5px;" onclick="location.href='<?php echo site_url('admin/email/edit/'.$email['email_id'])?>';"/><input name="cancel" type="button" class="btn" value="Cancel" onclick="location.href='<?=site_url('admin/email');?>'"/></p>
      
      </form>
        
      </div>
      <!-- end table container here --> 
      
    </div>
  </div>