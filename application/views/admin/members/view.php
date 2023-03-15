
<h2><span>Admin</span> View Account Detail</h2>
<div class="ymp_content">
	<div class="view-account">
		<p> <strong>First Name:</strong> <span><?php echo $member->first_name; ?></span> </p>
		<p> <strong>Last Name:</strong> <span><?php echo $member->last_name; ?></span> </p>
		<p> <strong>Email Address:</strong> <span><?php echo $member->email; ?></span> </p>
		<p> <strong>Phone Number:</strong> <span><?php echo $member->phone; ?></span> </p>
		<p> <strong>Connected With:</strong> <span><?php echo $member->facebook_id>0?"Facebook":""; ?></span> </p>
		<p> <strong>Points:</strong> <span>"Wating for point controller to finish"</span> </p>
		<p> <strong>Last Login:</strong> <span><?php echo time_ago($member->last_activity_date); ?></span> </p>
		<div class="sbmt_dv" style="text-align:left; padding:35px 0 0 0;">
			<button type="button" class="btn go_to " data-target-url="<?php echo site_url('admin/members'); ?>">Back</button>
			<button type="button" class="btn go_to " data-target-url="<?php echo site_url('admin/member/delete/'.$member->member_id); ?>">Delete</button>
			<?php if($member->isactive==1){ ?>
			<button type="button" class="btn go_to" data-target-url="<?php echo site_url('admin/members/deactivate/'.$member->member_id); ?>">Deactivate</button>
			<?php }else{ ?>
			<button type="button" class="btn go_to" data-target-url="<?php echo site_url('admin/members/activate/'.$member->member_id); ?>">Activate</button>
			<?php } ?>
		</div>
	</div>
</div>
