<?php if($content['tiny_enabled']==1) { ?>
	<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<?php } ?>
<div id="page-body">

    <div class="container">

      <div class="row">

        <div class="span12">

          <h2 class="pull-left"><span>Admin</span> Edit Content and Meta</h2>

          <div class="clear"></div>

          <div class="content">

            <div class="add-form">

              <form class="form-horizontal log-form" action="<?php echo site_url('admin/content/save/'.$content_id)?>" method="post">

                <?php if($content['type']!='data') { ?>
					<div class="control-group">
						<label class="control-label">Page Name:</label>
						<div class="controls">
							<input type="text" readonly=""  name="name" id="name" class="input-field" value="<?php echo $content['name'];?>">
						</div>
					</div>
					<?php if(form_error('data')) echo '<p>'.form_error('data').'</p>';?>
					<?php if($content['type']!='meta') { ?>
					<div class="control-group">
						<label class="control-label">Content:</label>
						<div class="controls">
							<textarea name="data" id="data"  rows="" cols="" class="input-field tinymce"><?php echo $content['data'];?></textarea>
						</div>
					</div>
					<?php } ?>
					<?php if(form_error('title')) echo '<p>'.form_error('title').'</p>'?>
					<div class="control-group">
						<label class="control-label">Title:</label>
						<div class="controls">
							<input type="text" name="title" id="title" class="input-field" value="<?php echo $content['title'];?>">
						</div>
					</div>
					<?php if(form_error('description')) echo '<p>'.form_error('description').'</p>'?>
					<div class="control-group">
						<label class="control-label">Description:</label>
						<div class="controls">
							<input type="text" name="description" id="description" class="input-field" value="<?php echo $content['description'];?>">
						</div>
					</div>
					<?php if(form_error('keywords')) echo '<p>'.form_error('keywords').'</p>'?>
					<div class="control-group">
						<label class="control-label">Keywords:</label>
						<div class="controls">
							<input type="text" name="keywords" id="keywords" class="input-field" value="<?php echo $content['keywords'];?>">
						</div>
					</div>
					<?php  }else { ?>
					<div class="control-group">
						<label class="control-label">Page Name:</label>
						<div class="controls">
							<input type="text" readonly=""  name="name" id="name" class="input-field" value="<?php echo $content['name'];?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Content:</label>
						<div class="controls">
							<textarea name="data" id="data"  rows="" cols="" class="input-field tinymce" ><?php echo $content['data'];?></textarea>
						</div>
					</div>
						<input name="title"  value="0" type="hidden"  />
						<input name="description"  value="0" type="hidden"  />
						<input name="keywords"  value="0" type="hidden"  />
					<?php } ?> 	

                <div class="control-group">

                  <div class="controls"> <span class="text-center" style="display: block;">

                    <button type="submit" class="btn btn-primary">Save</button>

                    <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url('admin/content');?>'">Cancel</button>

                    </span> </div>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>