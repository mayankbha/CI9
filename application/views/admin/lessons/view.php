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
width:700px !important;
height:60px !important;
background: none repeat scroll 0 0 #F7F1E6 !important;
}

p {

width:auto !important;
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
margin-top:920px !important;
margin-left:92px !important;
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


<h2><span>Admin</span> View a Lesson</h2>
<div class="ymp_content content-inner">
    <div class="row-fluid">
      <div class="span6">
        <p><strong>Title:</strong>&nbsp;&nbsp;<?php  echo $only_lesson->title; ?></p>
    </div>
    <div class="span5">
        <p><strong> Prioritization Number:</strong> <?php  echo $only_lesson->number; ?></p>
    </div>
</div>
<div class="span11 content-devider"></div>
<div class="clear"></div>
<!--/ -->

<div class="row-fluid category-list">
  <div class="span6">
    <h3>Stage/Category</h3>
    <p><strong>Stage:</strong>&nbsp;&nbsp;<?php  echo $only_lesson->stage; ?> </p>
    <p><strong>Overall:</strong>&nbsp;&nbsp;<?php  echo $only_lesson->overall; ?> </p>
    <p><strong>Sub 1:</strong>&nbsp;&nbsp;<?php  echo $only_lesson->sub1; ?> </p>
    <p><strong>Sub 2:</strong>&nbsp;&nbsp;<?php  echo $only_lesson->sub2 ?> </p>
</div>
<div class="span5"  style="line-height:20px;">
    <h3>Author</h3>
    <p><strong>Name:</strong>&nbsp;&nbsp;<?php echo $only_lesson->author;  ?></p>
    <p><strong>Position:</strong>&nbsp;&nbsp;<?php echo $number;  ?></p>
    <p><strong>Social Link:</strong></p>&nbsp;&nbsp;<div style="margin-left:95px;width:auto;margin-top:-52px;"><a href="<?php echo $only_lesson->social_link;  ?>" target="_blank"  style="color:black;"><?php echo $only_lesson->social_link;  ?></a></div>
    <p><strong>URL:</strong>&nbsp;&nbsp;</p><div style="margin-left:95px;width:auto;margin-top:-27px"><a href="<?php echo $only_lesson->url;  ?>"  target="_blank"  style="color:black;" ><?php echo $only_lesson->url;  ?></a></div>
</div>
</div>
<div class="span11 content-devider"></div>
<div class="clear"></div>
<!--/ -->

<div class="row-fluid slide-content">

<?php $i=1; foreach($lesson_slide as $lesson) : ?>
  <h3>Slide <?php echo $i; ?></h3>
  <p><?php echo $lesson->content; ?></p>
  <?php
 
  if(strpos($lesson->points,',')){   
    $pointarr=explode(',',$lesson->points);  ?>
  <?php  foreach($pointarr as $point) : ?>
  <p><img src="<?php echo base_url() ?>images/list-arrow.gif"  class="img_brdr_sdw" />&nbsp;&nbsp;<?php echo $point; ?></p>
  <?php  endforeach; ?>
  <?php  }else {
  ?>
  <p><img src="<?php echo base_url() ?>images/list-arrow.gif"  class="img_brdr_sdw" />&nbsp;&nbsp;<?php echo $lesson->points; ?></p>
  <?php
  }
   ?>
</div>

<div  style="width:auto;" >
  <div style="display:inline-flex;">
   <?php if($lesson->image_link!=''){  ?>
  <p> <?php /*?> <img src="<?php echo base_url() ?>/crop.php?h=319&w=400&f=upload/<?php echo $lesson->image_link; ?>"  id="img1"  style="float:left;" /><?php */?>
  <img src="<?php echo base_url() ?>upload/<?php echo $lesson->image_link; ?>" alt="" class="img_brdr_sdw" style="height:317px !important;"></p>
  &nbsp;&nbsp;&nbsp;
  <?php  } ?>
 
     <p>
       <?php if($lesson->video_link!=''){  ?>
        <iframe width="400" height="317" src="//www.youtube.com/embed/<?php echo parse_youtube($lesson->video_link); ?>" ></iframe>
        <?php  } ?>
     </p>
 
  </div>
  <div class="content-devider"></div>
</div>


<div class="row-fluid">

 <?php $i++; endforeach;  ?>


<div class="row-fluid">

  <div class="one-third">
 
    <h3>ToDo Items </h3>
    <?php foreach($lesson_todo as $todo) : ?>
    <p><strong>ToDo Item:</strong> <?php echo $todo->item;  ?></p>
    <p><strong>Action:</strong>  <?php echo $todo->action;  ?></p>
    <?php  endforeach;  ?>
</div>
 
 
<div class="one-third left-border" style="border-right:1px solid #E5E5E5;line-height:30px;">
   
    <h3>Checklist</h3>
    <?php foreach($lesson_checklist as $checklist) : ?>
    <p><strong>Title:</strong></p><div style="margin-left:95px;width:auto;margin-top:-35px;"><a href="<?php echo $checklist->title;  ?>"  target="_blank"  style="color:black"><?php echo $checklist->title;  ?></a></div>
    <p><strong>Checklist Item:</strong> <?php echo $checklist->item;  ?></p>
    <p><strong class="block">Instructions:</strong>  <?php echo $checklist->instructions1;  ?> </p>
    <?php  endforeach;  ?> 
    </div>
    <div class="one-third">
     <h3>Recommendations</h3>
     <?php   foreach($recommendation as  $recomm) :   ?>   
     <p><strong>Title:</strong><?php echo $recomm->title;  ?></p>
      <?php  endforeach;  ?> 
 </div>
  
</div>
<div class="blog_sbmt sbmt_dv "  style="margin-left:300px;">
  <button type="submit" class="btn "  onclick="window.location='<?php echo site_url('admin/lessons/add/') ?>'"  style="width:120px;">Create New</button>
  &nbsp;
  <button type="submit" class="btn "  onclick="window.location='<?php echo site_url('admin/lessons/edit/'.$only_lesson->id) ?>'">Edit</button>
  &nbsp;
  <a href="#!delete" onclick="show(<?php echo $only_lesson->id; ?>);"><button type="submit" class="btn  "  >Remove</button></a>

                                        <div class="popover bottom delete_popup_<?php echo $only_lesson->id;?>" style="display:none;">
                                            <div class="arrow"></div>
                                            <div class="popover-inner">
                                                <div class="popover-content"  >
                                                    <p> Are you sure you want to do this?
                                                        <span>This action is NOT reversible. </span> <span
                                                            class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/lessons/delete/' . $only_lesson->id); ?>"
                                                class="go_to btn3 ymp_btn_lrge ">Confirm
                                        </button>
										<button type="submit" class="btn3 ymp_btn_lrge  delete">Cancel
                                        </button>
										</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  
</div>
</div>