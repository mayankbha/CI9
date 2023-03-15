
<h2 class="pull-left fix-flaot"><span>Admin</span> Export Users List</h2>
<form class="user-filter">
	<div class="pull-left">
		<label>Signed Up:</label>
		<select name="" id="member_created" class="input_field">
			<?php foreach($dateRange as $key=>$val){ ?>
			<option value="<?php echo $key; ?>" <?php echo($key==$signedup?"selected=\"selected\"":""); ?>><?php echo $val; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="pull-left">
		<label>Status:</label>
		<select name="" id="member_active" class="input_field">
			<option value="all">All</option>
			<option value="1" <?php echo($active=="1"?"selected=\"selected\"":""); ?>>Active</option>
			<option value="0" <?php echo($active=="0"?"selected=\"selected\"":""); ?>>In-active</option>
		</select>
	</div>
	<div class="pull-left">
		<label>Connected With:</label>
		<select name="" id="member_connected" class="input_field">
			<option value="all">All</option>
			<option value="facebook" <?php echo($connected=="facebook"?"selected=\"selected\"":""); ?>>Facebook</option>
			<option value="twitter" <?php echo($connected=="twitter"?"selected=\"selected\"":""); ?>>Twitter</option>
		</select>
	</div>
	<a href="#" class="ymp_top_btn" id="doExport">Export Users</a>
</form>
<div class="clear"></div>
<div class="tabular_cont popup_table">
	<table>
		<thead>
			<tr>
				<th class=""><a href="<?php echo site_url('admin/members/page/' . $page . '/first_name/' . ($orderBy == "first_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="">First Name <?php echo($orderBy == "first_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a> </th>
				<th class=""><a href="<?php echo site_url('admin/members/page/' . $page . '/last_name/' . ($orderBy == "last_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "last_name" ? $order : ""); ?>">Last Name <?php echo($orderBy == "last_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/members/page/' . $page . '/email/' . ($orderBy == "email" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "email" ? $order : ""); ?>">Email <?php echo($orderBy == "email" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th class="hidden-phone"><a href="<?php echo site_url('admin/members/page/' . $page . '/created/' . ($orderBy == "created" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>" class="<?php echo($orderBy == "created" ? $order : ""); ?>">Date Registered <?php echo($orderBy == "created" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($members as $member) { ?>
			<tr id="member-<?php echo $member->member_id; ?>">
				<td class=""><a href="<?php echo site_url('admin/members/view/'.$member->member_id); ?>"><?php echo $member->first_name; ?></a></td>
				<td class=""><a href="<?php echo site_url('admin/members/view/'.$member->member_id); ?>"><?php echo $member->last_name; ?></a></td>
				<td class="hidden-phone"><a href="<?php echo site_url('admin/members/view/'.$member->member_id); ?>"><?php echo $member->email; ?></a></td>
				<td class="hidden-phone"><?php echo date('d-m-Y',strtotime($member->created)); ?></td>
				<td class="action"><div class="popup_container"><a href="#!delete" class="delete_confirm"><img src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" " /></a>
						<div class="popover bottom" style="display:none;">
							<div class="arrow"></div>
							<div class="popover-inner">
								<div class="popover-content">
									<p> Are you sure you want to do this? <span>This action can not be undone! </span> <span class="sp_btn">
										<button type="button" data-target-url="<?php echo site_url('admin/members/delete/'.$member->member_id); ?>" class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm</button>
										<button type="submit" class="btn ymp_btn_lrge ymp_btn_small delete">Cancel</button>
										</span> </p>
								</div>
							</div>
						</div>
					</div></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="clearfix">
	<?php $this->my_pagination->show(); ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
	var _exportBaseUrl="<?php echo site_url('admin/members/export'); ?>";
	var _regDateRange="<?php echo $signedup; ?>";
	var _memberStatus="<?php echo $active; ?>";
	var _connectedWith="<?php echo $connected; ?>";
	var _doExport="filter";
	var _filterExport=function(){
		var _newUrl=_exportBaseUrl+'/1/first_name/asc/'+_regDateRange+'/'+_memberStatus+'/'+_connectedWith+'/'+_doExport;
		document.location=_newUrl;
	}
	$('#member_created').change(function(e){
		_regDateRange=$(this).val();
		_doExport="filter"
		_filterExport();
		})
	$('#member_active').change(function(e){
		_memberStatus=$(this).val();
		_doExport="filter"
		_filterExport();
		})
	$('#member_connected').change(function(e){
		_connectedWith=$(this).val();
		_doExport="filter"
		_filterExport();
		})
	$('body').on('click','#doExport',function(e){
		e.preventDefault();
		_doExport="download";
		_filterExport();
		})
	})
</script> 
