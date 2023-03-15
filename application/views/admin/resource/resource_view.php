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

<script>
	function show(id)
	{
		$('.delete_popup_'+id).css({"display":"block"});
	}
</script>
<style>
.btn3 {
	text-shadow: 1px 1px 1px #0B212F !important;
	border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
}


.btn {
width:150px !important;
}

.sbmt_dv {
margin-left:205px !important;
}
</style>
<h2><span>Admin</span> View a Resource </h2>
<div class="ymp_content ymp_view_resources">

    <div class="yvr_block pull-left span5" style="margin-left:0;">
        <strong>Name:</strong> <span><?php echo $resource->name; ?></span>
    </div>

    <div class="yvr_block pull-left span4">
        <strong>Category:</strong> <span><?php echo $this->Resource_model->get_lesson_categories_by_id($resource->lesson_id)->stage; ?></span>
    </div>

    <div class="clearfix"></div>

    <div class="yvr_block">
        <strong style="display:block;">Text:</strong>
        <span><?php echo $resource->text; ?></span>
    </div>

    <div class=""  style="display:inline-flex;padding:10px 10px 10px 10px;width:auto">
  <?php /*?>  <img src="<?php echo base_url() ?>/crop.php?h=317&w=422&f=upload/<?php echo $resource->image; ?>"  id="img1" /><?php */?>
        <img src="<?php echo base_url() ?>upload/<?php echo $resource->image; ?>" style="height:317px !important;" id="img1">
      
           &nbsp; &nbsp;
          <?php if($resource->video!='') : ?>
         <iframe width="400" height="317" src="//www.youtube.com/embed/<?php echo parse_youtube($resource->video); ?>" ></iframe>
         <?php  endif; ?>
    </div>
    
    <div class="yvr_block">
     </br>
        <strong>Link:</strong> <a href="<?php echo $resource->url;  ?>"><?php echo $resource->url; ?></a>
    </div>

    <div class="sbmt_dv" >

        <button class="btn" type="submit"  onclick="window.location='<?php echo site_url('admin/resource/edit/' . $resource->id); ?>';">Edit</button>
        &nbsp;

      <button class="btn"  type="submit"  onclick="window.location='<?php echo site_url('admin/resource/add/'); ?>';" >Create New</button> &nbsp;
       <div class="popup_container"  ><a href="#!delete"   onclick="show(<?php echo $resource->id; ?>);"> <button class="btn" type="submit" >Remove</button></a>

                                        <div class="popover bottom delete_popup_<?php echo $resource->id;?>" style="display:none;">
                                            <div class="arrow"></div>
                                            <div class="popover-inner">
                                                <div class="popover-content">
                                                    <p> Are you sure you want to do this?
                                                        <span>This action is NOT reversible. </span> <span
                                                            class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/resource/delete/' . $resource->id); ?>"
                                                class="go_to btn3 ymp_btn_lrge ymp_btn_small">Confirm
                                        </button>
										<button type="submit" class="btn3 ymp_btn_lrge ymp_btn_small delete">Cancel
                                        </button>
										</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


        
      



        <!--<button class="btn" type="submit"  onclick="window.location='<?php //echo site_url('admin/resource/delete/' . $resource->id); ?>';">Remove</button>-->

    </div>

</div>