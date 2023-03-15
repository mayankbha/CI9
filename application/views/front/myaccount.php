<div id="page-body">

<div class="container">


<div class="row-fluid inner-content">
<!--section left -->
<div class="span8 inner-contents">

<div class="table text-center"><a href="#" class="blue-button-flex">Start Learning Now!</a></div>

<div class="todo-table">

<span class="stage-button">Stage One</span>


<table style="width: 100%; margin-bottom: 50px">
<?php 
if($learning_stage) {
  foreach($learning_stage as $ls) :  ?>
  <tr>
    <td class="col-30-percent">
    <div class="step-box small-round green-step">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-large-green.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"></span><?php echo $ls->overall;  ?></div></div>
    <div class="clear"></div>
    </div>
    </td>
    <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box small-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-av-size1.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"><?php echo $ls->sub1;  ?></div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
    <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box small-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-av-size2.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"><?php echo $ls->sub2;  ?></div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
  </tr>
  
   <tr>
   <?php 
   $j=1;
      $res=$this->myaccounts->get_lesson_by_sub2($ls->sub2);
	  $surveys=$this->myaccounts->get_survey($ls->sub2);
	  
	  $arr=array();
	  if($res){  
		foreach($res as $r){
		   $arr[$r->number]=$r->title;
		}
		}
	 if($surveys){	
		foreach($surveys as $s){
		   $arr[$s->number]=$s->title;
		}
	 }
	 ksort($arr);
	 foreach($arr as $ar) :
	  ?>
    <td class="col-30-percent col-2-percent"  ><div class="step-box large-round" title="<?php  echo $ar; ?>">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-av-size1.png" alt=""></div>
    <div class="step-text-table"><div class="step-text">
	<?php
	if(strlen($ar)>12){
	   echo substr($ar,0,12)."...";
	   }else{
	   echo $ar;
	   } 
	 ?></div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
  <?php  endforeach; endforeach; } ?>

   </tr>
  <?php /*?> <tr>
   <td class="col-30-percent"><div class="step-box small-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-large-gray.png" alt=""></div>
    <div class="step-text-table"><div class="step-text">Overall B</div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
    <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box small-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-large-gray.png" alt=""></div>
    <div class="step-text-table"><div class="step-text">Overall C</div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
       <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box small-round orange-step">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-large-orange.png" alt=""></div>
    <div class="step-text-table"><div class="step-text">Overall D<span class="progres-bar"><img src="<?php  echo base_url();?>images/front/progress-bar.gif" alt=""></span></div></div>
    
    <div class="clear"></div>
    </div></td>
  </tr>
<tr>
   <td class="col-30-percent"><div class="step-box small-round green-step">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-small-green.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"><span>Sub 1</span>Lorem Ipsum</div></div>
    <div class="clear"></div>
    </div></td>
    <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box large-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-av-size2.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"><span>Lesson 3</span>Lorem Ipsum</div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
       <td class="hidden-phone col-2-percent"><img src="<?php  echo base_url();?>images/front/todo-col-devider.gif" alt=""></td>
    <td class="col-30-percent"><div class="step-box large-round">
    <div class="pull-left"><img src="<?php  echo base_url();?>images/front/todo-av-size3.png" alt=""></div>
    <div class="step-text-table"><div class="step-text"><span>Survey 3</span>Lorem Ipsum </div></div>
    <span class="step-mask"></span>
    <div class="clear"></div>
    </div></td>
  </tr><?php */?>
</table>

<span class="stage-button">Stage Two</span>

<div class="down-arrow text-center"><a href="#"><img src="<?php  echo base_url();?>images/front/down-arrow.gif" width="52" height="30" alt=""></a></div>



</div>









</div>
<!--/section left -->



<!--section right -->
<div class="span4">

<div class="data-box">

<div class="todo-title">
<h3><img src="<?php  echo base_url();?>images/front/todo-sidebar-icon.png" alt=""> To-Do</h3>
</div>
<!--tabs -->
<ul class="tabs-list">
<li class="active"><a href="#">Priorities</a></li>
<li><a href="#">Daily</a></li>
<li><a href="#">Weekly</a></li>
<li><a href="#">Monthly</a></li>
<li><a href="#">Quarterly</a></li>
<li><a href="#">Yearly</a></li>

</ul>
<!--/tabs -->
<!--buttons scroll container -->
<div class="buttons-container">
<!--buttons bar -->
<?php  foreach($lesson as $les){  ?>
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button  onclick="window.location='<?php  echo site_url('myaccount/lesson_detail/'.$les->id); ?>';"><?php echo $les->title;  ?></button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<?php  } ?>
<!--/buttons bar -->

<!--buttons bar -->
<?php /*?><div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->

<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->


<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->


<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->


<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->


<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->


<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->

<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>
<!--/buttons bar -->

<!--buttons bar -->
<div class="buttons-bar">
<p class="checkbox-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="buttons-area">
<p><span class="button-field pull-left"><button class="pull-right">Checklist</button></span> <span class="button-field pull-right"><button>Lesson</button></span> <br class="clear" /></p>
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div><?php */?>
<!--/buttons bar -->

</div>
<!--scroll container -->
</div>
<!--sidebar box -->
<div class="sidebar-box">
<div class="yellow-title"><h3><img src="<?php  echo base_url();?>images/front/recommendation-bg.png" width="26" height="30" alt=""> Recommendations</h3>
</div>
<div class="buttons-container" style="height: 220px;">
<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

<div class="sidebar-buttons-bar">
<p class="sidebar-box-title"><input name="" type="checkbox" value="" class="check-box"> <label>Set Up Your Landing Page</label></p>
<div class="sidebar-buttons-area">
<p><span class="button-field pull-left text-right"><a href="#">Do not need to</a></span> <span class="button-field pull-right"><a href="#">Do not want to</a></span> <br class="clear" /></p>
</div>
</div>

</div>

</div>
<!--/sidebar box -->

<!--sidebar box -->
<div class="sidebar-box">
<div class="check-title"><h3 class="pull-left"><img src="<?php  echo base_url();?>images/front/checklist-image.png" width="29" height="29" alt=""> Checklist</h3> <span class="checklist-search"><input name="" type="text" class="input-field"><input name="" type="submit" class="checklist-submit"></span>
</div>
<div class="buttons-container" style="height: 220px;">
<div class="checklist-titles">
<?php  foreach($checklist as $checklist) {  ?>
<h2><?php echo $checklist->title;  ?></h2>
<!--<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>
<h2>Lorem Ipsum Dolor Title Here</h2>-->
<?php  } ?>
</div>


</div>

</div>
<!--/sidebar box -->


</div>
<!--/section right -->
</div>





<!--/content row -->

</div>

	<!-- end lesson detail -->





</div>
<div id="push"></div>