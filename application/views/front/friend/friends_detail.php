
<style>
	.selected{
		background:#F5FBFF !important;
	}
	.set-value {
	
	display:none !important;
	}
	
	.set-value1 {
	
	display:none !important;
	}
	
	
</style>

<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents clearfix">

<div class="clearfix frineds_title">

	<h2 class="pull-left"><span class="contact-ico friend_h2icon">Friends</span></h2>
    
   <div class="inpt_div_srch pull-left">
    	<input name="" type="text" class=" input_field" value="Search here"  id="search_user" />
    	<input name="" type="image" src="<?php  echo base_url();?>images/front/srch_btn.png" alt="search" class="search_btn"   onclick="get_search_users();"/>
  	</div>
    
    <div class="pull-right">
    	<a href="<?php  echo site_url('friends/email_invitiation/');?>"><img src="<?php echo  base_url();?>images/front/invite_friends.png" alt="invite"></a>
        <a href="<?php  echo site_url('friends/facebook/'); ?>"><img src="<?php echo  base_url();?>images/front/invite_friends_fb.png" alt="invite"></a>
    </div>
    
</div>
<!--  end friend title  -->

<div class="friend_container fd_container clearfix">

<div class="friend_box friend_detail_left clearfix">

  <img src="<?php echo  base_url();?>images/front/frnd_detail_img.png" alt="friend" class="pull-left">
  
  <div class="pull-right">
  
  	<div class="fd_ttl">
     <p><span>First Name:</span><?php echo $member->first_name; ?></p>
     <p><span>Last Name:</span>	<?php echo $member->last_name; ?></p>
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
     <p><span>Email Address:</span>	<?php echo $member->email; ?></p>
     <p><span>Phone Number:</span>	<?php echo $member->phone; ?></p>
     <p><span>Company Name:</span>	<?php echo $member->company_name; ?></p>
     <p><span>Website:</span>	WWW.meow.com</p>
    </div>
    
</div>
<!--  end friend box  -->


<div class="friend_box friend_detail_mdl friend_detail_rgt clearfix">
    
    <div class="fd_ttl">
     <h3><img src="<?php echo  base_url();?>images/front/about_icon.png" alt="about"> About</h3>
    </div>
    
    <p class="fd_aboutp">
    	<?php echo $member->about; ?>
    </p>
    
</div>
<!--  end friend box  -->

<div class="clear"></div>

<div style="padding-top:10px;">
<a href="javascript:void(0);"  onclick="window.location='<?php echo site_url('message/send/'.$member->first_name);  ?>'"><img src="<?php echo  base_url();?>images/front/msg_btn.png" alt="message"></a>
<a href="javascript:void(0);"  onclick="window.location='<?php echo site_url('friends/');  ?>'"><img src="<?php echo  base_url();?>images/front/atf_btn.png" alt="add to friend"></a>
</div>

</div>
<!--  end friend container  -->

</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>

<script>
function include(arr,obj) {
    return (arr.indexOf(obj) != -1);
}
function get_search_users(){
var searchword=$('#search_user').val();

if(searchword)
$.post("<?php echo site_url('friends/friend_details_search/');  ?>",{"searchword":searchword},function(data){
	if(data==''){
		$('.friend_container').html('');
	} else {
	  $('.friend_container').html(data);  
	}
});
}
</script>
