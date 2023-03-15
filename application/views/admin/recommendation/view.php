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
<style>
.popover-content {
width:630px !important;
height:60px !important;
background: none repeat scroll 0 0 #F7F1E6 !important;
}
p {

width:650px !important;
}
.btn3 {

text-shadow: 1px 1px 1px #0B212F !important;
border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
}
.popover {
max-width:663px !important;
margin-top:898px !important;
}

.arrow {
margin-left:268px !important;
color: #F7F1E6 !important;
}

</style>
<script>
	function show(id)
	{
		$('.delete_popup_'+id).css({"display":"block"});
	}
	
	
	
</script>

<h2><span>Admin</span> View a Recommendation</h2>
<div class="ymp_content content-inner">
    <div class="row-fluid">
      <div class="span6">
        <p><strong>Title:</strong> <?php echo $recommendation->title ?></p>
    </div>
    <div class="span5">
        <p>&nbsp;</p>
    </div>
</div>
<div class="span11 content-devider"></div>
<div class="clear"></div>
<!--/ -->

<div class="row-fluid category-list">
  <div class="span6"  style="width:75%">
    <h3>Stage/Category</h3>
    <p><strong>Stage:</strong><?php  echo $recommendation->stage; ?> </p>
    <p><strong>Overall:</strong><?php  echo $recommendation->overall; ?> </p>
    <p><strong>Sub 1:</strong><?php  echo $recommendation->sub1; ?> </p>
    <p><strong>Sub 2:</strong> <?php  echo $recommendation->sub2 ?> </p>
   
    <?php if($recommendation->image!='') {   
	
	?>
  <?php /*?>   <img src="<?php echo base_url() ?>/crop.php?h=317&w=400&f=upload/<?php echo $recommendation->image; ?>"  id="img1"  style="float:left;" /><?php */?>
      <img src="<?php echo base_url() ?>upload/<?php echo $recommendation->image; ?>" alt=" "  style="height:317px !important;"   id="img1"  style="float:left;">
    <?php  } ?>
    &nbsp;&nbsp;&nbsp;
      <?php if($recommendation->video!='') {   ?>
       
        <iframe width="400" height="317" src="//www.youtube.com/embed/<?php echo parse_youtube($recommendation->video); ?>" style="float:right;" ></iframe>
      
          <?php  } ?>
    
</div>
  
<div class="span5">
    &nbsp;
</div>
</div>
<div class="span11 content-devider"></div>
<div class="clear"></div>
<!--/ -->  
</div>
</div>