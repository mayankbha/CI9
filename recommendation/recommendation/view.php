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


<h2><span>Admin</span> View a Lesson</h2>
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
  <div class="span6">
    <h3>Stage/Category</h3>
    <p><strong>Stage:</strong><?php  echo $recommendation->stage; ?> </p>
    <p><strong>Overall:</strong><?php  echo $recommendation->overall; ?> </p>
    <p><strong>Sub 1:</strong><?php  echo $recommendation->sub1; ?> </p>
    <p><strong>Sub 2:</strong> <?php  echo $recommendation->sub2 ?> </p>
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