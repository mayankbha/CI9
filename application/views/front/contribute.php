<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents">

<h2><span><?php $contribute_page_title = getMetaContent('contribute_page_title','data'); echo $contribute_page_title['data']?></span></h2>



<div class="contact-form">

<div class="row-fluid">



<div class="span6">

<div class=""><?=str_replace('<p>','',str_replace('</p>','',str_replace('<img','<img class="img_brdr" style="margin:15px 20px 0 0"',$image)));?></div>
<p style="padding-top:15px;"></p>
<?=$content;?>

</div>	<!-- end left container -->



<div class="span6">

<form>

<p>

<strong>Name:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Company:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Email:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Subject:</strong>

<input name="" type="text" class="input_field">

</p>



<p>

<strong>Message:</strong>

<textarea name="" cols="10" rows="10" class="input_field"></textarea>

</p>



<div class="submit text-center">

<input name="" type="button" class="custom-btn" value="Send Us Your Idea" style="background:url(<?=base_url();?>images/front/btn-large3.png) no-repeat scroll left top;width:194px;">

<input name="" type="button" class="custom-btn" value="Cancel">

</div>

</form>

</div>	<!-- end right container -->



</div>

</div>	<!-- end container form -->



</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>