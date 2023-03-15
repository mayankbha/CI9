<div id="page-body">

	<div class="container">
	
		<div class="row">
		
			<div class="span12">
			
				<h2><span>Admin</span> Content and META Controller</h2>
			
				<div class="tabular_cont">
				
					<table> 
					
						<tr>
					
						  <th class=""><a href="<?php echo site_url('admin/content/index/name/' . $order_type); ?>">Page Name</a></th>    
					
						  <th class="hidden-phone"><a href="<?php echo site_url('admin/content/index/data/' . $order_type); ?>">Content</a></th>    
					
						  <th>Actions</th>
					
						</tr>
					
						<?PHP foreach($contents as $content):?>
					
						<tr>
					
						  <td class=""><?=$content['name'];?></td>
					
						  <td class="hidden-phone"><?=substr(strip_tags($content['data']),0,20);?></td>
					
						  <td class="action"><a href="<?php echo site_url('admin/content/edit/' . $content['content_id']); ?>"><img src="<?=base_url();?>images/edit_icon.png" alt=" " /></a></td>
					
						</tr>
						<?PHP endforeach;?>
					
					</table>
				
				</div>
			
			</div>
		
		</div>
	
	</div>

</div>