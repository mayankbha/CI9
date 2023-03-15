<div class="heading_cont">
<h2 class="left"><span>Admin</span> <?PHP echo ($edit=='edit') ? 'Edit' : 'Add New';?> Account Detail</h2>
<div class="clear"></div>
</div>	<!-- end heading container here -->

<div class="site_contents">
<table width="362" border="0" cellspacing="0" cellpadding="0" class="add_cont">
<form name="memberfrm" id="memberfrm" method="post" action="<?PHP echo site_url('admin/members/save/'.$member_id);?>" >
  <tr>
    <td height="8" colspan="2"><?php echo form_error('first_name');?></td>
    </tr>
  <tr>
    <td width="115" class="strong">First Name:</td>
    <td><input type="text" name="first_name" id="first_name" class="input_field" name="subject" value="<?PHP echo set_value('first_name',($edit=='edit')? $member['first_name'] : '');?>" /></td>
  </tr>
  <tr>
    <td height="8" colspan="2"><?php echo form_error('last_name');?></td>
    </tr>
  <tr>
    <td class="strong">Last Name:</td>
    <td><input type="text" name="last_name" id="last_name" class="input_field" name="subject" value="<?PHP echo set_value('last_name',($edit=='edit')? $member['last_name'] : '');?>" /></td>
  </tr>
   <tr>
    <td height="8" colspan="2"><?php echo form_error('company_name');?></td>
    </tr>
  <tr>
    <td class="strong">Company Name:</td>
    <td><input name="company_name" id="company_name" type="text" class="input_field" value="<?php echo set_value('company_name',($edit=='edit')? $member['company_name'] : '');?>"/></td>
  </tr>
   <tr>
    <td height="8" colspan="2"><?php echo form_error('phone');?></td>
    </tr>
  <tr>
    <td class="strong">Phone:</td>
    <td><input name="phone" id="phone" type="text" class="input_field" value="<?php echo set_value('phone',($edit=='edit')? $member['phone'] : '');?>"/></td>
  </tr>
  <tr>
    <td height="8" colspan="2"><?php echo form_error('email');?></td>
    </tr>
  <tr>
    <td class="strong">Email address:</td>
    <td><input name="email" id="email" type="text" class="input_field"  value="<?php echo set_value('email',($edit=='edit')? $member['email'] : '');?>"/></td>
  </tr>
  <tr>
    <td height="8" colspan="2"><?php echo form_error('password');?></td>
    </tr>
  <tr>
    <td class="strong">Password:</td>
    <td><input name="password" id="password" type="password" class="input_field" value="<?PHP echo set_value('password');?>"  /><?php echo form_error('password');?></td>
  </tr>
  <tr>
    <td height="8" colspan="2"><?php echo form_error('confirm');?></td>
    </tr>
 <tr>
    <td class="strong">Confirm Password:</td>
    <td><input name="confirm" id="confirm" type="password" class="input_field" value="<?PHP echo set_value('confirm');?>" /></td>
  </tr>
  <tr>
    <td height="40"></td>
    <td>
	<input type="submit" class="sm_btn" value="Save" /> <input type="button" class="sm_btn" value="Cancel" onclick="location.href='<?PHP echo site_url('admin/members');?>'"/>
	</td>
  </tr>
  </form>
  </table>
</div>	<!-- end site contents container here -->
