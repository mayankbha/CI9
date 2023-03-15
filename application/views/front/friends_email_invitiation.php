<?php  
 /* $ids=array();
  $ids=explode('/',$userids);
  $useremail='';
   $username='';
 for($i=0; $i<count($ids)-1; $i++){
  if($i==count($ids)-2){
      $last='';
   }else{
      $last=',';
   }
   $useremail .= $this->outbound_email_model->get_member_info($ids[$i])->email.$last; 
   $username .= $this->outbound_email_model->get_member_info($ids[$i])->first_name.$last; 
   }*/
  ?>
<div id="search-user-result"></div>
<div  id="frinds-div">
<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents clearfix">

<div class="clearfix frineds_title">

	<h2 class="pull-left"><span class="contact-ico friend_h2icon">Friends</span></h2>
    
    <div class="inpt_div_srch pull-left">
     <form  action="#"  name="" onsubmit="get_search_users();" >
    	<input name="" type="text" class=" input_field" onclick="if(this.value=='Search here'){ this.value=''; }" value="Search here"  id="search_user" />
        </form>
        <input name="" type="image" src="<?php  echo base_url();?>images/front/srch_btn.png" alt="search" class="search_btn"  onclick="get_search_users();" />
  	</div>
    
    <div class="pull-right">
    	<a href="#"><img src="<?php  echo base_url();?>images/front/invite_friends.png" alt="invite"></a>
        
        <div class="popup_container invite_friend_pp"> <a href="#"><img src="<?php  echo base_url();?>images/front/invite_friends_fb.png" alt="invite"></a>
<div class="popover bottom"  style="display:" >

              <div class="arrow" style="right:165px;"></div>

              <div class="popover-inner">

                <div class="popover-content ">

                  <form action="<?php echo site_url('friends/invite_friends');  ?>"  method="post">
                  
                      <label style="margin-top:0;"><?php $friends_invit = getMetaContent('friends_email_invitiation_title'); echo $friends_invit['data']?></label>
                      <input name="to" type="text" class=" input_field"   id="to" />

                      <label>Subject:</label>
                      <input name="subject" type="text" class=" input_field" value="<?php $fremail_subject_default = getMetaContent('friends_email_invit_subject_default'); echo strip_tags($fremail_subject_default['data'])?>" />

                      <label>Message:</label>
                      <textarea class="input_field" rows="10"  name="msg"></textarea>
                      <div class="pp_btnss text-center">
                      	<input type="submit" class="custom-btn" value="Invite" name="do_save_friends"  >
                        <input type="button" class="custom-btn" value="Cancel" name=""  onclick="window.location='<?php echo site_url('friends/');  ?>'">
                      </div>

                  </form>

                </div>

              </div>

            </div>
            

          </div>
    </div>
    
</div>
<!--  end friend title  -->

<div class="friend_container">

<?php
 

  ?>
<div class="friend_box clearfix">
    <img class="pull-left" src="<?php  echo base_url();?>images/front/friends_face.png" alt="invite">
    <h4 id="name"></h4>
    <a href="#" class="crss_blue"><img src="<?php  echo base_url();?>images/front/crss_blue.png" alt="invite"></a>
</div>
<?php  ?>

<!--  end friend box  -->
</div>
<!--  end friend container  -->

</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>
</div>
<script>
function get_search_users(){
var searchword=$('#search_user').val();

$.post("<?php echo site_url('friends/search_email_invitation_user');  ?>",{'searchword':searchword},function(data){
if(data!=''){
    var e=data.split(',');
   $('#name').val(e[0]);
   $('#to').val(e[1]);
  }
  
});
}
</script>

