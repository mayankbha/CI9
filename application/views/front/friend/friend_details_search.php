<?php   if($member->num_rows()>0){  ?>  
<div class="friend_box friend_detail_left clearfix">

  <img src="<?php echo  base_url();?>images/front/frnd_detail_img.png" alt="friend" class="pull-left">
  
  <div class="pull-right">

  	<div class="fd_ttl">
     <p><span>First Name:</span><?php echo $member->row()->first_name; ?></p>
     <p><span>Last Name:</span>	<?php echo $member->row()->last_name; ?></p>
    </div>
    
    <div class="fd_scl">
    	<p><img src="<?php echo  base_url();?>images/front/fb_letter_icon.png" alt="fb"> <a href="#">www.facebook.com/lorem.p..</a></p>
        <p><img src="<?php echo  base_url();?>images/front/twt_icon.png" alt="twitter"> <a href="#">www.Twitter.com/lorem.php?</a></p>
        <p><img src="<?php echo  base_url();?>images/front/in_icon.png" alt="in"> <a href="#">www.Linkedin.com/lorem.ph..</a></p>
    </div>
  
  </div>
  
</div>
<!--  end friend box  -->

<div class="friend_box friend_detail_mdl clearfix">
    
    <div class="fd_ttl">
     <h3><img src="<?php echo  base_url();?>images/front/info_icon.png" alt="info"> Information</h3>
    </div>
    
    <div class="fd_scl">
     <p><span>Email Address:</span>	<?php echo $member->row()->email; ?></p>
     <p><span>Phone Number:</span>	<?php echo $member->row()->phone; ?></p>
     <p><span>Company Name:</span>	<?php echo $member->row()->company_name; ?></p>
     <p><span>Website:</span>	WWW.meow.com</p>
    </div>
    
</div>
<!--  end friend box  -->


<div class="friend_box friend_detail_mdl friend_detail_rgt clearfix">
    
    <div class="fd_ttl">
     <h3><img src="<?php echo  base_url();?>images/front/about_icon.png" alt="about"> About</h3>
    </div>
    
    <p class="fd_aboutp">
    	<?php echo $member->row()->about; ?>
    </p>
    
</div>
<!--  end friend box  -->
<?php  }else{
	  ?>
      <div style="color:red;">No Result Found For This Word ! Please try again</div>
      <?php 
	  }
	  ?>
<div class="clear"></div>

<div style="padding-top:10px;">
<a href="javascript:void(0);"  onclick="window.location='<?php echo site_url('message/send');  ?>'"><img src="<?php echo  base_url();?>images/front/msg_btn.png" alt="message"></a>
<a href="javascript:void(0);"  onclick="window.location='<?php echo site_url('friends/');  ?>'"><img src="<?php echo  base_url();?>images/front/atf_btn.png" alt="add to friend"></a>
</div>
