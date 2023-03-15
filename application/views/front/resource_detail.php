
<?php
function parse_youtube($link){
 
        $regexstr = '~
            # Match Youtube link and embed code
            (?:                             # Group to match embed codes
                (?:<iframe [^>]*src=")?       # If iframe match up to first quote of src
                |(?:                        # Group to match if older embed
                    (?:<object .*>)?      # Match opening Object tag
                    (?:<param .*</param>)*  # Match all param tags
                    (?:<embed [^>]*src=")?  # Match embed tag to the first quote of src
                )?                          # End older embed code group
            )?                              # End embed code groups
            (?:                             # Group youtube url
                https?:\/\/                 # Either http or https
                (?:[\w]+\.)*                # Optional subdomains
                (?:                         # Group host alternatives.
                youtu\.be/                  # Either youtu.be,
                | youtube\.com              # or youtube.com
                | youtube-nocookie\.com     # or youtube-nocookie.com
                )                           # End Host Group
                (?:\S*[^\w\-\s])?           # Extra stuff up to VIDEO_ID
                ([\w\-]{11})                # $1: VIDEO_ID is numeric
                [^\s]*                      # Not a space
            )                               # End group
            "?                              # Match end quote if part of src
            (?:[^>]*>)?                       # Match any extra stuff up to close brace
            (?:                             # Group to match last embed code
                </iframe>                 # Match the end of the iframe
                |</embed></object>          # or Match the end of the older embed
            )?                              # End Group of last bit of embed code
            ~ix';
 
        preg_match($regexstr, $link, $matches);
 
        return $matches[1];
 
    }

 ?>

<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents clearfix">

<div class="clearfix frineds_title rscrh_ttl">

	<h2><span class="contact-ico rscrh_cat_icon">Resource Detail 
</span></h2>

<h3 class="pull-left"><?php echo $resources->name;  ?></h3>
    <input type="hidden" name="rid"  value="<?php echo  $rid; ?>"  id="rid"   />
    <div class="tp_cmnt pull-right">
    
    	<div class="anguls">
        	<a href="javascript:void(0);"  onclick="save_down();"><img src="<?php echo base_url();?>images/front/angul_down.png" alt="low"></a>
            <span id="down"><?php   if($thump_up_down->thump_down>0){echo $thump_up_down->thump_down;}else{ echo "0";}  ?></span>
        </div>
        
        <div class="anguls">
        	<a href="javascript:void(0);"  onclick="save_up();"><img src="<?php echo base_url();?>images/front/angul_up.png" alt="low"></a>
            <span id="up"><?php  if($thump_up_down->thump_up>0){echo $thump_up_down->thump_up;}else{ echo "0";}   ?></span>
        </div>
        
    </div>
        
</div>
<!--  end friend title  -->
<div class="resource_detail_container">

<p><?php echo $resources->text;  ?></p>

<p><span><a href="<?php echo $resources->url;  ?>"><img src="<?php echo base_url();?>images/front/Untitled-1_03.png" alt=" "></a></span> <a href="<?php echo $resources->url;  ?>"><?php echo $resources->url;  ?></a></p>

<div class="img_rdtl clearfix">

<span class="pinn_it_cont pull-left">
<img class="img_brdr" alt="image" src="<?php echo base_url() ?>upload/<?php echo $resources->image; ?>"  width="417"  height="150"  >
<a class="pinn_icon" href="#"><img src="<?php echo base_url();?>images/front/pinn_it_icon.jpg" alt="pinn"></a>
</span>
<?php if($resources->video!='') :  ?>
  <iframe width="420" height="315" src="//www.youtube.com/embed/<?php echo parse_youtube($resources->video); ?>" ></iframe>
<!--<img class="img_brdr pull-left" alt="image" src="">-->
<?php  endif; ?>
<div class="social_links_left">

   <?php /*?> <a href="<?php echo site_url('front/resource/resource_facebook');?>" ><img src="<?php echo base_url();?>images/front/fb_medium.png" alt="fb"></a>
   <!-- <a href="javascript:void(0);" onClick="openForm('<?php //echo site_url('resource/twitter');?>')"><img src="<?php //echo base_url();?>images/front/twt_medium.png" alt="twt"></a>-->
   
   <a href="<?php echo site_url('front/resource/resource_twitter');?>" ><img src="<?php echo base_url();?>images/front/twt_medium.png" alt="twt"></a>
   
    <a href="<?php echo site_url('front/resource/resource_email');?>" ><img src="<?php echo base_url();?>images/front/email_medium.png" alt="email"></a>
    
    <a href="<?php echo site_url('front/resource/resource_linkedin');?>"><img src="<?php echo base_url();?>images/front/in_medium.png" alt="in"></a><?php */?>
    <div class="addthis_toolbox addthis_32x32_style addthis_default_style">
	<a class="addthis_button_facebook" ></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_linkedin"></a>
</div>
</div>
</div>
<?php  
if($comments->num_rows()>0){
foreach($comments->result() as $cmt) {   ?>

 <div class="br_separator blog_detal_sep"></div>
 <div class="bcl_parts clearfix">
    <div class="h4ndate clearfix">    
		<h4 class="pull-left"><?php  echo $cmt->name; ?>.</h4>
        <span class="pull-right"><?php  echo $cmt->cdate; ?></span>
    </div>
    
  <!--  <div class="descrption"><a href="#">Lorem Ipsum</a> <span class="sblack_clr">Points:</span> 192</div>-->
    <img src="<?php echo base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr img_brdr_sml pull-left">
    <p><?php  echo $cmt->comment; ?>. </p>
    
 </div>
<?php  }}   ?>
<div class="sbmt_dv">
<a href="<?php echo site_url('resource/view_resource/'.$resources->lesson_id);  ?>" class="back_btn"><img src="<?php echo base_url();?>images/front/back_btn.png" alt="back"></a>
<a href="javascript:void(0);" onClick="$('.rscrh_comment_box').show();" class="noraml_btn" style="margin-top:-4px;">Comment</a>

<div class="comment_box rscrh_comment_box" style="display:none">

<div class="arrow"></div>

<form action="<?php echo site_url('resource/add_comment/'.$resources->id);  ?>" method="post"  onsubmit="return check();">
    	
    <label>Comment</label>
    
    <textarea class="input_field"  name="comment"></textarea>
    
    <div class="comment_sbmt_dv">
        <input name="post" type="submit" value="Post" class="custom-btn" />&nbsp;
        <input name="cancel" type="submit" value="Cancel" class="custom-btn"  onClick="$('.rscrh_comment_box').hide();"/>
    </div>
    
    <input type="hidden"  name="do_save_comment"  id="do_save_comment"  value="save"  />
    
    
</form>
</div>

</div>

</div>
<!--  end resource d c  -->

</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>

<script>
function check(){
var err=true;
$('input[type=button],textarea').each(function(){
if($(this).val()==''){
   $(this).css('border','1px solid red');
   err=false;
}
});
return err;
}

function save_down() {
var rid=$('#rid').val();
$.post('<?php echo site_url('resource/save_down/'); ?>',{'rid':rid} ,function(data){
$('#down').html(data);
});
}

function save_up() {
var rid=$('#rid').val();
$.post('<?php echo site_url('resource/save_up/'); ?>',{'rid':rid} ,function(data){
$('#up').html(data);
});
}


$('.uiButtonConfirm ').click(function(){

alert("confirm");
});

</script>
<!-- AddThis Button BEGIN -->

<script type="text/javascript">
var addthis_config = {
"data_track_addressbar":true
};

</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-520f8c1a7db27c2c"></script>
<!-- AddThis Button END -->

