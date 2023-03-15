<div class="contanier">
    <div class="page_T">
      <h1>Admin</h1>
      <h2>Banner Controller</h2>
    </div>
    <div class="page_C">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      <div class="clear"></div>
      <div class="login_cont" style="padding:0px;">
        <div class="RCA_cont_L">
          <div class="RCA_cont">
            <div class="RCL_T">
              <h2>Menu</h2>
            </div>
            <div class="RCL_C">
              <ul>
               <?php echo $menu;?>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="RCL_B"></div>
          </div>
        </div>
        <div class="RCA_cont_R">
          <div class="PI_table" style="border-right:0px;">
            <div class="PI_title">
              <div class="PI_TT" style="width:340px; background:url(images/blue_LP.gif) no-repeat left top;"><h3>View Banner Detail</h3></div>
              <div class="PI_TT" style="width:340px; background:url(images/blue_RP.gif) no-repeat right top;"></div>
              <div class="clear"></div>
            </div>
            <div class="PI_content_F">
              	<div class="AEAD_cont_L">
					<form action="<?php echo admin_url('banner/save/' . $banner->banner_id);?>" method="post" class="validation_form" enctype="multipart/form-data">
                	<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Name:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->name;?>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Location:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->location;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
                    <div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Code:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->code;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Image:</label>
                        </div>
                        <div class="AEADF_cont_R">
							<?php if (!empty($banner->image)) : ?>
								<img src="<?php echo site_url('data/banners/' . $banner->image);?>" alt="" width="300" /><br/>
							<?php endif;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Link:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->link;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
                    <div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Display from:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->date_from;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Display to:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->date_to;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Maximum clicks:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->max_clicks;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Maximum impressions:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->max_impressions;?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_L">
                        	<label>Is Active:</label>
                        </div>
                        <div class="AEADF_cont_R">
                        	<?php echo $banner->is_active ? 'Active' : 'Deactive';?> 
                        </div>
                        <div class="clear"></div>
                    </div>
					
					<div class="AEAD_cont">
                    	<div class="AEADF_cont_LN">
                        </div>
                        <div class="AEADF_cont_R" style="padding:10px 0px 0px 0px;">
                        	<div class="LBTN" style="float:left; padding:0px 0px 0px 85px;">
                                <span></span>
                                <input type="button" value="Edit" onclick="location.href='<?php echo site_url("admin/banner/edit/". $banner->banner_id);?>';" style="width:55px; color:#fff; border:0px;" />
                            </div>
                            <div class="LBTN" style="float:left; padding:0px 0px 0px 10px;">
                                <span></span>
                                <input type="button"  onclick="location.href='<?php echo site_url("admin/banner");?>';" value="Cancel" style="width:65px; color:#fff; border:0px;" />
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					</form>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="PI_content">
              <div class="PI_cont_TTL" style="width:91px;"></div>
              <div class="PI_cont_TTC" style="width:403px; border:0px;"></div>
              <div class="PI_cont_TTR" style="width:126px; border:0px;"></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
