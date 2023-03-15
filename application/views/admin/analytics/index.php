<h2><span>Admin</span> Analytics Dashboard </h2>


<div class="dashboard_container clearfix">
  <form action="#" class="form_div">

    <div class="tabular_cont span6">

      <h3>Number of Users</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p>
            <strong>Start Date:</strong>  
            <input  type="text"  id="noof_sdate"   class="input_field datepicker"  name="date"  placeholder="Start Date"  >
          <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon datepicker" type="image"  >-->

          </p>

          <p>
            <strong>End Date:</strong>              
            <input class="input_field datepicker" type="text" placeholder="End Date"     id="noof_edate"> <input type="button"  name="show"  id="show"  onclick="get_no_of_users();"  value="show"  class="btn"/>
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->
          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p class="has_brdr_rgt"  >
            <strong>Total:</strong> <p id="total_noof_users" >0</p>
          </p>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          <p>
            <strong>Selected Period:</strong><p  id="selected_period">0</p>
          </p>
          
        </div>

      </div>

    </div>

    <div class="tabular_cont span6">

      <h3>Number New Users Over Time</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p>
            <strong>Start Date:</strong>              
            <input class="input_field datepicker" type="text"  placeholder="Start Date"> 
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

          <p>
            <strong>End Date:</strong>              
            <input class="input_field datepicker" type="text"  placeholder="End Date"> 
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p>
            500
          </p>
          
        </div>

      </div>

    </div>
    <div class="clear"></div>
    <!--end first column-->

    <div class="tabular_cont">

      <h3>Logins by Percentage</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p>
            <strong>Daily:</strong>             
            <select class="input_field"  onchange="get_daily_user_login_percentage(this.value);">
              <option value="1">Monday</option>
              <option value="2">Tuesday</option>
              <option value="3">Wednesday</option>
              <option value="4">Thursday</option>
              <option value="5">Friday</option>
              <option value="6">Saturday</option>
              <option value="7">Sunday</option>
            </select>
          </p>

          <p>
            <strong>Weekly:</strong>              
            <input class="input_field  datepicker"  type="text" placeholder="Start Date"  id="s_weekly_users">  
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->


            <input class="input_field  datepicker"  type="text"  placeholder="End Date"  id="e_weekly_users" ><input type="button"  name="show"  id="show"  onclick="get_weekly_user_login_percentage();"  value="show"  class="btn"/>
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

          <p>
            <strong>Monthly:</strong>             
            <select class="input_field"  onchange="get_monthy_user_login_percentage(this.value);">
              <option value="1" >January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4" >April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
                 
            </select>
          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p class="has_brdr_rgt">
            <strong>Total:</strong><p id="ttl_percen"> 0%</p>
          </p>
          
          <p>
            <strong>Selected Period:</strong> <p id="weekly_selected_period">0</p>
          </p>
          
        </div>

      </div>

    </div>
    <!--end second column-->

    <div class="tabular_cont">

      <h3>Churn Rate</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p class="has_brdr_rgt">
            <strong>Total:</strong> <p id="ttl_churn_rate"><?php  echo $ttlchurnrate."%"; ?></p>
          </p>

          <p>
            <strong>Weekly:</strong>              
            <input class="input_field datepicker"  type="text"  placeholder="Start Date"  id="churn_sdate">  
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->


            <input class="input_field datepicker"  type="text"  placeholder="End Date"  id="churn_edate"><input type="button"  name="show"  id="show"  onclick="get_churn_rate();"  value="show"  class="btn"/>  
         <!--   <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p id="churn_selected_period">
            0%
          </p>
          
        </div>

      </div>

    </div>
    <!--end third column-->

    <div class="tabular_cont">

      <h3>Percentage of Site Visitors Who Sign Up for an Account</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p class="has_brdr_rgt">
            <strong>Total:</strong><p  id="singup_users"><?php echo $ttlsingupusers; ?> </p>
          </p>

          <p>
            <strong>Weekly:</strong>              
            <input class="input_field datepicker"  type="text"  placeholder="Start Date"  id="s_singup">  
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->


            <input class="input_field  datepicker"  type="text"  placeholder="End Date" id="e_singup"><input type="button"  name="singup"  id="singup"  onclick="get_singup_users();"  value="show"  class="btn"/>   
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p id="selected_singup_users">
           0%
          </p>
          
        </div>

      </div>

    </div>
    <!--end forth column-->

    <div class="tabular_cont">

      <h3>Percentage of New Accounts That Complete at Least X Activities When They Sign Up</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p class="has_brdr_rgt">
            <strong>Total:</strong><p>0% </p>
          </p>

          <p>
            <strong>Weekly:</strong>              
            <input class="input_field datepicker"  type="text"  placeholder="Start Date">  
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->


            <input class="input_field  datepicker"  type="text"  placeholder="End Date">  
           <!-- <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

        </div>

        <div class="ndb_btm clearfix">

          <p>
            1.8%
          </p>
          
        </div>

      </div>

    </div>
    <!--end fifth column-->

    <div class="row-fluid">

      <div class="tabular_cont span4">

        <h3>Affiliate Purchases / User</h3>

        <div class="ntbl_dsbrd_body">

          <div class="ndb_top clearfix small_input">

            <p>             
              <input class="input_field datepicker"  type="text"  placeholder="Start Date">  
           <!--   <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->
            </p>

            <p>

              <input class="input_field datepicker"  type="text"  placeholder="End Date">  
            <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

            </p>

          </div>

          <div class="ndb_btm clearfix">
            <p class="has_brdr_rgt"> <strong>Total:</strong> 32 </p>
            <p> <strong>Selected Period:</strong> 15 </p>
          </div>
        </div>

      </div>
      
      <div class="tabular_cont span4">

        <h3>Time to First Affiliate</h3>

        <div class="ntbl_dsbrd_body">

          <div class="ndb_top clearfix small_input">

            <p>             
              <input class="input_field datepicker"  type="text"  placeholder="Start Date">  
          <!--    <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->
            </p>

            <p>

              <input class="input_field datepicker"  type="text"  placeholder="End Date">  
        <!--      <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

            </p>

          </div>

          <div class="ndb_btm clearfix">
            <p class="has_brdr_rgt"> <strong>Total:</strong> 5 Days </p>
            <p> <strong>Selected Period:</strong> 3 Days </p>
          </div>
        </div>

      </div>
      
      <div class="tabular_cont span4">

        <h3>Purchases / Year</h3>

        <div class="ntbl_dsbrd_body">

          <div class="ndb_top clearfix">

            <p>             
              <select class="input_field">
                <option selected="selected">2013</option>
              </select>
            </p>

          </div>

          <div class="ndb_btm clearfix">
            <p class="has_brdr_rgt"> <strong>Total:</strong> 570 </p>
            <p> <strong>Selected Period:</strong> 280 </p>
          </div>
        </div>

      </div>
      
    </div>
    <!--end sixth column-->

    <div class="tabular_cont">

      <h3>Virality</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_top clearfix">

          <p class="has_brdr_rgt">
            <strong>Total:</strong> <?php echo $ttlvirality;  ?>
          </p>

          <p>
            <strong>Choose Period:</strong>             
            <input class="input_field datepicker"  type="text"  placeholder="Start Date"  id="sdate_virality">  
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->


            <input class="input_field datepicker"  type="text"  placeholder="End Date"  id="edate_virality"><input type="button"  name="virality"  id="virality"  onclick="get_virality();"  value="show"  class="btn"/>    
          <!--  <input name="" alt="image" src="<?php //echo base_url()?>images/date_img.png" class="date_icon" type="image">-->

          </p>

        </div>
        
        <div class="ndb_btm clearfix ndb_spcl_btm">
          <p> <strong>Email Shares:</strong> <span id="email_virality"></span> </p>
          <p> <strong>FB Shares:</strong> <span id="fb_virality"></span> </p>
          <p> <strong>Twitter Shares:</strong><span id="twitter_virality"></span></p>
          <p class="spacl_case"> <strong>New Users From These Sources:</strong> <span><?php echo $ttlnewusers; ?></span></p>
        </div>
      </div>

    </div>
    <!--end seventh column-->


    <div class="tabular_cont">

      <h3>Mailing Effectivness</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_btm clearfix ndb_spcl_btm1">
          <p> <strong>Open Rates:</strong><span><?php echo $open_mail_rate; ?></span> </p>
          <p> <strong>Click Through Rates:</strong> <span><?php echo $click_mail_rate; ?></span> </p>
          <p class="spacl_case"> <strong>Unsubscribe Rates:</strong> <span><?php echo $unsubscribe_mail_rate; ?></span>  </p>
        </div>
      </div>

    </div>
    <!--end eighth column-->

    <div class="tabular_cont">

      <h3>Conversion Percentage</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_btm clearfix ndb_spcl_btm1">
          <p>  68% </p>
        </div>
      </div>

    </div>
    <!--end ninth column-->

    <div class="row-fluid">

      <div class="tabular_cont span6">

        <h3>Most ‘Flagged’ or ‘Bad’ Lessons</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p>Lorem Ipsum Lesson 1</p>
            <p>Lorem Ipsum Lesson 2</p>
            <p>Lorem Ipsum Lesson 3</p>
            <p>Lorem Ipsum Lesson 4</p>
            <p>Lorem Ipsum Lesson 5</p>
          </div>
        </div>

      </div>

      <div class="tabular_cont span6">

        <h3>Most Irrelevant Lessons</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p>Lorem Ipsum Lesson 1</p>
            <p>Lorem Ipsum Lesson 2</p>
            <p>Lorem Ipsum Lesson 3</p>
            <p>Lorem Ipsum Lesson 4</p>
            <p>Lorem Ipsum Lesson 5</p>
          </div>
        </div>

      </div>

    </div>
    <!--end tenth column-->

    <div class="row-fluid">

      <div class="tabular_cont span6">

        <h3>Most Completed Recommendations</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p>Lorem Ipsum Recommendation 1</p>
            <p>Lorem Ipsum Recommendation 2</p>
            <p>Lorem Ipsum Recommendation 3</p>
            <p>Lorem Ipsum Recommendation 4</p>
            <p>Lorem Ipsum Recommendation 5</p>
          </div>
        </div>

      </div>

      <div class="tabular_cont span6">

        <h3>Most Deleted Recommendations</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p>Lorem Ipsum Lesson 1</p>
            <p>Lorem Ipsum Lesson 2</p>
            <p>Lorem Ipsum Lesson 3</p>
            <p>Lorem Ipsum Lesson 4</p>
            <p>Lorem Ipsum Lesson 5</p>
          </div>
        </div>

      </div>

    </div>
    <!--end eleventh column-->

    <div class="tabular_cont">

      <h3>Comments per User</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_btm clearfix ndb_spcl_btm1">
          <p>46</p>
        </div>
      </div>

    </div>
    <!--end tweleve column-->

    <div class="tabular_cont">

      <h3>Users on the Program Right Now</h3>
      
      <div class="ntbl_dsbrd_body">

        <div class="ndb_btm clearfix ndb_spcl_btm1">
          <p>521</p>
        </div>
      </div>

    </div>
    <!--end thirteen column-->

    <div class="tabular_cont tabular_cont_dashbrd_table">

      <table>

        <tbody><tr>

          <th><a href="#">User</a></th>

          <th><a href="#">Daily Login</a></th>

          <th class="hidden-phone"><a href="#">Weekly Login</a></th>

          <th><a href="#">Monthly Login</a></th>

        </tr>

        <?php 
		  foreach($daily as $d){
		  ?>
          <tr>
          <td><?php echo $d->first_name;?></td><td><?php echo $d->id;?></td>
          <?php   
          foreach($weekly as $w){
		  if($w->first_name==$d->first_name){
		  ?>
          <td><?php echo $w->id;  ?></td>
		  <?php
		  }else{ echo '<td>0</td>';}}
          ?>
          <?php   
          foreach($monthly as $m){
		   if($m->first_name==$d->first_name){
		  ?>
          <td><?php echo $m->id;  ?></td>
		  <?php
		  }else{ echo '<td>0</td>';}}
          ?>
          </tr>
		 <?php 
		  }
		 ?>
        
       <!-- <tr>

          <td>Lorem Ipsum</td>

          <td></td>

          <td class="hidden-phone">5</td>
          <td>5</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>10</td>

          <td class="hidden-phone">10</td>
          <td>10</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>6</td>

          <td class="hidden-phone">6</td>
          <td>6</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>8</td>

          <td class="hidden-phone">8</td>
          <td>8</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>20</td>

          <td class="hidden-phone">20</td>
          <td>20</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>15</td>

          <td class="hidden-phone">15</td>
          <td>15</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>9</td>

          <td class="hidden-phone">9</td>
          <td>9</td>

        </tr>

        <tr>

          <td>Lorem Ipsum</td>

          <td>10</td>

          <td class="hidden-phone">10</td>
          <td>10</td>

        </tr>-->

      </tbody></table>

    </div>
    <!--end forteen column-->

    <div class="row-fluid">

      <div class="tabular_cont span4">

        <h3>Users Logging in Through Email</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p><strong>Logs in per User:</strong> <span><?php echo $email_login;  ?></span></p>
         <!--   <p><strong>Recommendations Checked:</strong> 68</p>
            <p><strong>Shares:</strong> 120</p>-->
          </div>
        </div>

      </div>

      <div class="tabular_cont span4">

        <h3>Users Logging in Through Twitter</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p><strong>Logs in per User:</strong><span><?php echo $twitter_login;  ?></span></p>
           <!-- <p><strong>Recommendations Checked:</strong> 32</p>
            <p><strong>Shares:</strong> 150</p>-->
          </div>
        </div>

      </div>

      <div class="tabular_cont span4">

        <h3>Users Logging in Through FB</h3>
        
        <div class="ntbl_dsbrd_body ntbl_dsbrd_body_p100">

          <div class="ndb_btm clearfix">
            <p><strong>Logs in per User:</strong> <span><?php echo $fb_login;  ?></span></p>
           <!-- <p><strong>Recommendations Checked:</strong> 45</p>
            <p><strong>Shares:</strong> 86</p>-->
          </div>
        </div>

      </div>

    </div>
    <!--end fifteen column-->


  </form>
</div>
<script type="text/javascript">
$(function(){
  $('div.dashboard_container').closest('.row')
                              .removeClass('row')
                              .addClass('row-fluid');
});

function get_no_of_users() {


var sdate=$('#noof_sdate').val();
var edate=$('#noof_edate').val();
var date1 = new Date(sdate);
var date2 = new Date(edate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
 $('#selected_period').html(diffDays);
 
 var newsday=('0' + date1.getDate()).slice(-2);
 var newsmonth=date1.getMonth()+1;
 var newsyear=date1.getFullYear();
 newsmonth = ('0' + newsmonth).slice(-2);
 
 var newsdate=newsyear+"-"+newsmonth+"-"+newsday;
 
 var neweday=('0' + date2.getDate()).slice(-2);
 var newemonth=date2.getMonth()+1;
 newemonth = ('0' + newemonth).slice(-2);
 var neweyear=date2.getFullYear();
 
 var newedate=neweyear+"-"+newemonth+"-"+neweday;
$.post('<?php echo site_url('admin/analytics/get_no_of_users/'); ?>/'+newsdate+"/"+newedate,{},function(data){
 if(data!=''){
  $('#total_noof_users').html(data);
 }
});
}

function get_weekly_user_login_percentage() {


var sdate=$('#s_weekly_users').val();
var edate=$('#e_weekly_users').val();
var date1 = new Date(sdate);
var date2 = new Date(edate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
 $('#weekly_selected_period').html(diffDays);
 
 var newsday=('0' + date1.getDate()).slice(-2);
 var newsmonth=date1.getMonth()+1;
 var newsyear=date1.getFullYear();
 newsmonth = ('0' + newsmonth).slice(-2);
 
 var newsdate=newsyear+"-"+newsmonth+"-"+newsday;
 
 var neweday=('0' + date2.getDate()).slice(-2);
 var newemonth=date2.getMonth()+1;
 newemonth = ('0' + newemonth).slice(-2);
 var neweyear=date2.getFullYear();
 
 var newedate=neweyear+"-"+newemonth+"-"+neweday;
$.post('<?php echo site_url('admin/analytics/get_weekly_users_login_percentage/'); ?>/'+newsdate+"/"+newedate,{},function(data){
 if(data!=''){
  $('#ttl_percen').html(data);
 }
});
}

function get_daily_user_login_percentage(val) {
$.post('<?php echo site_url('admin/analytics/get_daily_users_login_percentage/'); ?>/'+val,{},function(data){
 if(data!=''){
  $('#ttl_percen').html(data);
 }
});

}

function get_monthy_user_login_percentage(val) {
$.post('<?php echo site_url('admin/analytics/get_monthly_users_login_percentage/'); ?>/'+val,{},function(data){
 if(data!=''){
  $('#ttl_percen').html(data);
 }
});

}


function get_churn_rate() {


var sdate=$('#churn_sdate').val();
var edate=$('#churn_edate').val();
var date1 = new Date(sdate);
var date2 = new Date(edate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
 
 var newsday=('0' + date1.getDate()).slice(-2);
 var newsmonth=date1.getMonth()+1;
 var newsyear=date1.getFullYear();
 newsmonth = ('0' + newsmonth).slice(-2);
 
 var newsdate=newsyear+"-"+newsmonth+"-"+newsday;
 
 var neweday=('0' + date2.getDate()).slice(-2);
 var newemonth=date2.getMonth()+1;
 newemonth = ('0' + newemonth).slice(-2);
 var neweyear=date2.getFullYear();
 
 var newedate=neweyear+"-"+newemonth+"-"+neweday;
$.post('<?php echo site_url('admin/analytics/get_churn_rate/'); ?>/'+newsdate+"/"+newedate,{},function(data){
 if(data!=''){
  $('#churn_selected_period').html(data);
 }
});
}


function get_singup_users() {


var sdate=$('#s_singup').val();
var edate=$('#e_singup').val();
var date1 = new Date(sdate);
var date2 = new Date(edate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
 
 var newsday=('0' + date1.getDate()).slice(-2);
 var newsmonth=date1.getMonth()+1;
 var newsyear=date1.getFullYear();
 newsmonth = ('0' + newsmonth).slice(-2);
 
 var newsdate=newsyear+"-"+newsmonth+"-"+newsday;
 
 var neweday=('0' + date2.getDate()).slice(-2);
 var newemonth=date2.getMonth()+1;
 newemonth = ('0' + newemonth).slice(-2);
 var neweyear=date2.getFullYear();
 
 var newedate=neweyear+"-"+newemonth+"-"+neweday;
$.post('<?php echo site_url('admin/analytics/get_sing_up_users/'); ?>/'+newsdate+"/"+newedate,{},function(data){
 if(data!=''){
  $('#selected_singup_users').html(data);
 }
});
}

function get_virality() {


var sdate=$('#sdate_virality').val();
var edate=$('#edate_virality').val();
var date1 = new Date(sdate);
var date2 = new Date(edate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
 
 var newsday=('0' + date1.getDate()).slice(-2);
 var newsmonth=date1.getMonth()+1;
 var newsyear=date1.getFullYear();
 newsmonth = ('0' + newsmonth).slice(-2);
 
 var newsdate=newsyear+"-"+newsmonth+"-"+newsday;
 
 var neweday=('0' + date2.getDate()).slice(-2);
 var newemonth=date2.getMonth()+1;
 newemonth = ('0' + newemonth).slice(-2);
 var neweyear=date2.getFullYear();
 
 var newedate=neweyear+"-"+newemonth+"-"+neweday;
$.post('<?php echo site_url('admin/analytics/get_email_virality/'); ?>/'+newsdate+"/"+newedate,{},function(data){
 if(data!=''){
  var str=data.split(",");
  $('#email_virality').html(str[0]);
  $('#fb_virality').html(str[1]);
  $('#twitter_virality').html(str[2]);
 }
});


}


</script>