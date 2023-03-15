<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="inner-contents">

<h2><span class="jobs-ico"><?php $jobs_page_title = getMetaContent('jobs_page_title','data'); echo $jobs_page_title['data']?></span></h2>



<div class="jobs-cont first">

<h3><?=strip_tags($jobs_title_1);?></h3>

<div class="job-stats"><span class="job-date"><?=strip_tags($jobs_date_1);?></span> <span class="job-location"><?=strip_tags($jobs_location_1);?></span> <span class="job-type">Job Type: <?=strip_tags($jobs_type_1);?></span></div>

<h5>Job Description:</h5>

<?=$jobs_description_1;?>

<h5>Job Specifications:</h5>

<?=str_replace('<ul>','<ul class="list-items">',$jobs_specification_1);?>

</div>	<!-- end job location -->



<div class="jobs-cont">

<h3><?=strip_tags($jobs_title_2);?></h3>


<div class="job-stats"><span class="job-date"><?=strip_tags($jobs_date_2);?></span> <span class="job-location"><?=strip_tags($jobs_location_2);?></span> <span class="job-type">Job Type: <?=strip_tags($jobs_type_2);?></span></div>

<h5>Job Description:</h5>

<?=$jobs_description_2;?>

<h5>Job Specifications:</h5>

<?=str_replace('<ul>','<ul class="list-items">',$jobs_specification_2);?>

</div>	<!-- end job location -->



</div>

</div>

</div>

</div>

</div>	<!-- end page body -->

<div id="push"></div>