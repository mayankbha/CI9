<div id="page_body">

<div class="inner">
<div class="page-title">
	<h1><span>Admin</span> Banner  Controller</h1>
	<a href="<?php echo site_url('admin/banner/edit/0');?>" class="top-button">Add New Banner</a>
</div>
<div class="tabular_cont ymp_tbl no_un_table">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="170" class="table_header">Location</td>

    <td width="465" class="table_header">Start Date</td>

    <td width="160" class="table_header">End Date</td>

    <td width="" class="table_header">Actions</td>
	
  </tr>

 <?php foreach ($banners as $banner) : ?>
  <tr class="bold_txt">

    <td><?php echo $banner['name'];?></td>
	
	<td><?php echo date('m/d/Y', strtotime($banner['date_from']));?></td>
	
	<td><?php echo date('m/d/Y', strtotime($banner['date_to']));?></td>
	
	<td><a href="<?php echo site_url('admin/banner/view/' . $banner['banner_id']);?>">View</a> | <a href="<?php echo site_url('admin/banner/edit/' . $banner['banner_id']);?>">Edit</a> | <a href="<?php echo site_url('admin/banner/delete/' . $banner['banner_id']);?>" title="Are you sure want to delete this banner?" class="confirm_action">Remove</a></td>

  </tr>
  <?PHP endforeach;?>
  </table>

</div>	
<!-- end table container here -->



</div>

</div>