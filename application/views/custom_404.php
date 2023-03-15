<div id="page-body">



<div id="custome-error-cont">

<div class="oops-mascot"></div>

<h2>Error 404</h2>

<p><strong><?=strip_tags($content);?></strong></p>

</div>



</div>  <!-- end page body -->

<div id="push"></div>

<script type="text/javascript">
<?php if(isset($admin)):?>
$(function(){
  $('div#page-body').attr('style','padding:1px;');
});
<?php endif;?>
</script>