<script>
	function show(id) {
	 $('.show_'+id).css({"display":"block"});
	}
	function confirm_user(id) {
			jQuery('.show_'+id).click(function(){
				jQuery(this).parent().remove();
	           });
	
	}
	
	function cancel_button(id) {
	$(".show_"+id).hide();
	 $('.show_'+id).css({"display":"none"});
	}
	
jQuery(document).ready(function(){
	/*jQuery(".crss_blue").click(function(){
	
		jQuery(this).parent().remove();
	});*/
	

	jQuery(".friend_box").click(function(){
		if(jQuery(this).hasClass('selected')){
			jQuery(this).removeClass('selected');
		} else {
			jQuery(this).addClass('selected');
		}
	});

});
</script>
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
<?php //echo $this->session->flashdata('success'); ?>
	<h2 class="pull-left"><span class="contact-ico friend_h2icon">Friends</span></h2>
    
    <div class="inpt_div_srch pull-left">
       <form  action="#"  name="" onsubmit="get_search_users();" >
    	<input name="" type="text" class=" input_field" onclick="if(this.value=='Search here'){ this.value=''; }" value="Search here"  id="search_user" />
        </form>
        <input name="" type="image" src="<?php  echo base_url();?>images/front/srch_btn.png" alt="search" class="search_btn"  onclick="get_search_users();" />
  	</div>
    
    <div class="pull-right">
    <a class="emailInv" href="javascript:void(0);"  id=""  onclick="window.location='<?php  echo site_url('friends/email_invitiation'); ?>';"><img src="<?php  echo base_url();?>images/front/invite_friends.png" alt="invite"></a>
        <a href="<?php  echo site_url('friends/facebook/'); ?>"><img src="<?php  echo base_url();?>images/front/invite_friends_fb.png" alt="invite"></a>
    </div>
    
</div>

<!--  end friend title  -->

<div class="friend_container">

<?php   
if($memberdetail){

 foreach($memberdetail as $mem){  
 
	$mem = $this->outbound_email_model->get_member_details($mem);
?>
<div class="friend_box clearfix"    id="<?php echo $mem->member_id;  ?>"  >
    <img class="pull-left" src="<?php  echo base_url();?>images/front/friends_face.png" alt="invite"  onclick="window.location='<?php   echo site_url('friends/detail/' . $mem->member_id );?>';">
    <h4>
		<span><?php echo $mem->first_name;  ?><br/><?php echo $mem->company_name;  ?></span>
	</h4>
   
    <div class="popup_container crss_friend hidden-tablet  show_<?php echo $mem->member_id;  ?>  "  style="display:none"> 

            <div class="popover bottom "  >

              <div class="arrow"></div>

              <div class="popover-inner">

                <div class="popover-content ">

                  <div class="text-center">
                  	<img alt="" src="<?php  echo base_url();?>images/front/popover-cat.png">
                  </div>
                  
                  <div class="signup-confirmmsg"><?php  echo str_replace('<p>','',str_replace('</p>','',$content));?></div>
                  
                  <div class=" text-center">
                    <input type="button" class="custom-btn" value="Confirm" name=""   onclick="confirm_user('<?php echo $mem->member_id;  ?>');">
                    <input type="button" class="custom-btn" value="Cancel" name=""    onclick="$('.show_<?php echo $mem->member_id ?>').hide();">
                  </div>
	
                </div>

              </div>

            </div>

          </div>
    
     <a class="crss_blue" id="<?php echo $mem->member_id;  ?>"  onclick="$('.show_<?php echo $mem->member_id ?>').show();"><img src="<?php  echo base_url();?>images/front/crss_blue.png" alt="invite"></a>
</div>
<?php }  }  ?>

<!--  end friend box  -->

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

$.post("<?php echo site_url('friends/search/');  ?>",{'searchword':searchword},function(data){
	if(data==''){
		$('.friend_container').hide();
	} else {
		$(".friend_box").each(function(e){
		
		    $(".friend_container").show();
			var id = $(".friend_box:eq("+e+")").attr('id');
			var ids = data.split('+');
			if(include(ids,id)){
				$(".friend_box:eq("+e+")").show();
			} else {
				$(".friend_box:eq("+e+")").hide();
			}
		});
	}
});
}

</script>