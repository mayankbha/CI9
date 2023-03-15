<div id="content" class="hm_content hm_pg_content">
    <div id="con_content" class="same_wdth pg_content">
        <h2 class="pg_title">Admin View Content and Meta Controller</h2>
        <div class="clear"></div>
        
        <div class="pg_inr_con">
            
           <div class="admn_lgn aeoe_cont">
		   		<?php if($content['type']!='data') { ?>	
                    <div class="clear">
                        <label>Page Name:</label>
                        <span class="avoed_spn"><?php echo $content['name'];?> </span>
                    </div>
                    <div class="clear">
                        <label>Content:</label>
                        <span class="avoed_spn tar_avoed"><?php echo $content['data'];?> </span>
                    </div>
					<div class="clear">
                        <label>Title:</label>
                        <span class="avoed_spn tar_avoed"><?php echo $content['title'];?> </span>
                    </div>
					<div class="clear">
                        <label>Description:</label>
                        <span class="avoed_spn tar_avoed"><?php echo $content['description'];?> </span>
                    </div>
					<div class="clear">
                        <label>Keywords:</label>
                        <span class="avoed_spn tar_avoed"><?php echo $content['keywords'];?> </span>
                    </div>
				<?php   }else { ?>
					<div class="clear">
                        <label>Content:</label>
                        <span class="avoed_spn tar_avoed"><?php echo $content['data'];?> </span>
                    </div>
				<?php } ?>		
				<div class="clear">
					<label>&nbsp;</label>
					<p class="frgt_ps" align="center" style="padding-top: 20px;"><input type="submit" class="ad_btn" value="Edit" onclick="location.href='<?=site_url('admin/content/edit/'.$content['content_id']);?>'"/>  <input type="button" class="ad_btn cncl" value="Cancel" onclick="location.href='<?=site_url('admin/content');?>'"/></p>
				</div>
            </div>
        </div>
    </div>
</div>
