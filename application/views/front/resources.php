<div id="page-body" class="logged-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="banner_container">
<div class="blog_banner rscrch_banner clearfix">

<div class="rscrs_banner_left pull-left text-right">
	<img src="<?php  echo base_url();?>images/front/rscrs_cat_img.png" alt=" "> 
</div>

<div class="rscrs_banner_right pull-left text-center">

<h5>Our Favorite Small Business Resources</h5>



</div>

</div>
</div>
<!--  end blog banner  -->



<div class="inner-contents clearfix">

<div class=" row-fluid clearfix">

<h2 class="pull-left" style="margin-bottom:0px;"><span class="resources-ico">Resources</span></h2>

<div class="search-filter" style="padding:0;">
<form  action="#"  name="" onsubmit="get_search_users();" >
<input name="" type="text" class="search-field" value="Search"  onclick="if(this.value=='Search'){ this.value=''; }"  id="search_user">
<input name="" type="image" src="<?php echo base_url();?>images/front/search-btn.png" alt="Search"  onclick="get_search_users();">
 </form>
</div>
</div>



<div id="resources-list" style="padding-top:10px;">
<div id="with-search-box">
<ul>

<?php   foreach($contents->result() as $resources) {    ?>
      <div id="without-search-box">
        <li class="even"  style="margin-left:6px;">

        <div class="list-inner clearfix"  onclick="show_data(<?php echo $resources->lesson_id; ?>);"  style="cursor:pointer;">
        
        <div class="pull-left"><a href="<?php echo site_url('resource/view_resource/'.$resources->lesson_id);  ?>"><?php echo $this->Resource_model->get_lesson_categories_by_id($resources->lesson_id)->stage;  ?></a></div>
        
        <div class="pull-right"><a href="<?php echo site_url('resource/view_resource/'.$resources->lesson_id);  ?>"><img src="<?php  echo base_url();?>images/front/pointer.png" alt=" "></a></div>
        
        </div>
        </div>
        </li>

<?php    }   ?>

</div>
</div>
</div>

<div id="with-div"></div>
</ul>

</div>	<!-- end resources list -->



</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>


<script>
function show_data(id) {
window.location="<?php echo site_url('resource/view_resource/');  ?>/"+id;
}

function include(arr,obj) {
    return (arr.indexOf(obj) != -1);
}
function get_search_users(){
var searchword=$('#search_user').val();

$.post("<?php echo site_url('resource/search');  ?>",{'searchword':searchword},function(data){

	if(data==''){
		$('#with-search-box').hide();
	} else {
		$(".without-search-box").each(function(e){
		
		    $(".#with-search-box").show();
			var id = $(".without-search-box:eq("+e+")").attr('id');
			var ids = data.split('+');
			if(include(ids,id)){
				$(".without-search-box:eq("+e+")").show();
			} else {
				$(".without-search-box:eq("+e+")").hide();
			}
		});
	}
});
}

</script>






