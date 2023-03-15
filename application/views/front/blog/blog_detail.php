<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">



<div class="blog_inner_container blog_detail_container">
    
  <div class="blog_container_left blog_detail_left pull-left inner-contents">
  

<div class="bcl_parts bcl_text_parts clearfix">

	<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
    
    <div class="descrption">3rd July, 2013, Autor: <a href="#">Lorem Ipsum</a></div>
    
    <img src="<?=base_url();?>images/front/blog_detial_lrg1.jpg" alt="image" class="img_brdr pull-left">
    
    <img src="<?=base_url();?>images/front/blog_detial_lrg2.jpg" alt="image" class="img_brdr smaller_margin pull-left">
    
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. Donec lacinia commodo odio, non rhoncus sem adipiscing id. Curabitur eros dolor, lacinia hendrerit lorem euismod, aliquam consequat risus. </p>
    
    <p>Nam semper lacus metus, tincidunt cursus nisi elementum ut. Phasellus eleifend nulla id tristique semper. Curabitur pretium consequat tortor sit amet hendrerit. Phasellus posuere dolor vitae enim facilisis, sit amet varius dolor elementum. Donec pellentesque mauris metus, et posuere ante ultrices vel. Aliquam in nibh euismod eros venenatis volutpat vel a mauris. </p>
    
    <p>Pellentesque nunc justo, pharetra vel sodales ut, mattis non diam. Donec et risus non metus porttitor dictum porttitor in mi. Curabitur eu dolor ut quam posuere auctor sed eu diam. Mauris auctor eros at hendrerit scelerisque. Suspendisse feugiat dignissim felis, non convallis purus auctor in. Nam ante justo, sagittis eget posuere sed, dignissim eget tortor. Etiam congue urna vitae justo euismod sollicitudin.</p>
    
    <p style="padding-bottom:0;">Praesent ac nisl quis augue blandit condimentum. Nunc vel risus ac ante imperdiet euismod auctor id ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec non mauris quis tortor fermentum varius.
    
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. Donec lacinia commodo odio, non rhoncus sem adipiscing id. Curabitur pretium consequat tortor sit amet hendrerit. </p>
    
    <div class="social_links_left">
    	<a href="javascript:void(0);" onClick="openForm('<?=site_url('blog/facebook');?>')"><img src="<?=base_url();?>images/front/fb_medium.png" alt="fb"></a>
        <a href="javascript:void(0);" onClick="openForm('<?=site_url('blog/twitter');?>')"><img src="<?=base_url();?>images/front/twt_medium.png" alt="twt"></a>
        <a href="#"><img src="<?=base_url();?>images/front/email_medium.png" alt="email"></a>
        <a href="javascript:void(0);" onClick="openForm('<?=site_url('blog/linkedin');?>')"><img src="<?=base_url();?>images/front/in_medium.png" alt="in"></a>
    </div>
    
</div>
<!--  end bcl  -->

<div class="br_separator blog_detal_sep"></div>

<div class="bcl_parts clearfix">
	
    <div class="h4ndate clearfix">    
		<h4 class="pull-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        <span class="pull-right">3rd July, 2013</span>
    </div>
    
    <div class="descrption"><a href="#">Lorem Ipsum</a> <span class="sblack_clr">Points:</span> 192</div>
    
    <img src="<?=base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr img_brdr_sml pull-left">
    
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. Donec lacinia commodo odio, non rhoncus sem adipiscing id. Curabitur eros dolor, lacinia hendrerit lorem euismod, aliquam consequat risus. Nam semper lacus metus, tincidunt cursus nisi elementum ut. Phasellus eleifend nulla id tristique semper. </p>
    
</div>
<!--  end bcl  -->

<div class="br_separator blog_detal_sep"></div>

<div class="bcl_parts clearfix">
	
    <div class="h4ndate clearfix">    
		<h4 class="pull-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        <span class="pull-right">3rd July, 2013</span>
    </div>
    
    <div class="descrption"><a href="#">Lorem Ipsum</a> <span class="sblack_clr">Points:</span> 192</div>
    <img src="<?=base_url();?>images/front/image_pp.jpg" alt="image" class="img_brdr img_brdr_sml pull-left">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis elit enim, vitae dictum lacus dapibus et. Donec lacinia commodo odio, non rhoncus sem adipiscing id. Curabitur eros dolor, lacinia hendrerit lorem euismod, aliquam consequat risus. Nam semper lacus metus, tincidunt cursus nisi elementum ut. Phasellus eleifend nulla id tristique semper. </p>
    
</div>
<!--  end bcl  -->

<div class="br_separator blog_detal_sep"></div>

<div class="btm_padding_tabphn">
<a href="javascript:void(0);" onClick="$('#comment_box').show();" class="noraml_btn">Comment</a>

<div class="comment_box comment_box_confirm" style="display:none">

<div class="arrow"></div>
<?=$confirmation;?>
<a href="javascript:void(0);" onClick="$('.comment_box_confirm').hide();" class="cmnt_crss"><img src="<?=base_url();?>images/front/crss_icon.png" alt="cross"></a>
  
</div>

<div class="comment_box" id="comment_box" style="display:none">

<div class="arrow"></div>

<form action="#" method="get">
    	
    <label>Comment</label>
    
    <textarea class="input_field"></textarea>
    
    <div class="comment_sbmt_dv">
        <input name="" type="button" value="Post" class="custom-btn" onClick="$('#comment_box').hide();$('.comment_box_confirm').show();"/>&nbsp;
        <input name="" type="button" value="Cancel" class="custom-btn" onClick="$('#comment_box').hide();"/>
    </div>
    
    <a href="javascript:void(0);" onClick="$('#comment_box').hide();" class="cmnt_crss"><img src="<?=base_url();?>images/front/crss_icon.png" alt="cross"></a>
    
</form>
</div>
</div>

</div>
<!--  end left part  -->

<div class="blog_contaienr_right pull-right">

    <div class="blog_bg_box">
        <h4>Find Us:</h4>
        <div class="lrge_scl_blk">
            <a href="#"><img src="<?=base_url();?>images/front/fb_large.png" alt="fb"></a>
            <a href="#"><img src="<?=base_url();?>images/front/twt_large.png" alt="twt"></a>
            <a href="#"><img src="<?=base_url();?>images/front/g+_large.png" alt="email"></a>
            <a href="#"><img src="<?=base_url();?>images/front/rss_large.png" alt="in"></a>
            <a href="#"><img src="<?=base_url();?>images/front/in_large.png" alt="in"></a>
        </div>
    </div>
    <!-- end blog bg box -->

    <div class="br_separator"></div>

    <div class="blog_bg_box blr_p">
        <p>If you would like to contribute please email us at contribute@site.com</p>
    </div>
    <!-- end blog bg box -->

    <div class="br_separator"></div>

    <div class="blog_bg_box">
        <h4>Subscribe for Updates and Articles</h4>
        <div class="lrge_scl_blk">
            <div class="spa3"><input name="" type="text" class="input_field" value="email"></div>
            <input name="" type="button" class="noraml_btn" value="Subscribe">
        </div>
    </div>
    <!-- end blog bg box -->

    <div class="br_separator"></div>

    <div class="blg_rgt_btm_part blog_bg_box">

        <h4>Trending Articles</h4>

        <div class="brbp_box clearfix">

        <img src="<?=base_url();?>images/front/img_ph_sml.jpg" alt="image" class="img_brdr pull-left">
        
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a fermentum ipsum. Phasellus faucibus odio ante.</p>

        </div>
        <!-- end brbp -->

        <div class="brbp_box clearfix">

        <img src="<?=base_url();?>images/front/img_ph_sml.jpg" alt="image" class="img_brdr pull-left">
        
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a fermentum ipsum. Phasellus faucibus odio ante.</p>

        </div>
        <!-- end brbp -->

        <div class="brbp_box clearfix">

        <img src="<?=base_url();?>images/front/img_ph_sml.jpg" alt="image" class="img_brdr pull-left">
        
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a fermentum ipsum. Phasellus faucibus odio ante.</p>

        </div>
        <!-- end brbp -->

    </div>
    <!-- end blog right bottom -->

</div>
<!-- end right blog container -->

</div>

  
<!--  end blog container  -->

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>