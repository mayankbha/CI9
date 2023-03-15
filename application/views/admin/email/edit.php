<div id="page-body">

    <div class="container">

      <div class="row">

        <div class="span12">

          <h2 class="pull-left"><span>Admin</span> Edit Outbound Email</h2>

          <div class="clear"></div>

          <div class="content">

            <div class="add-form">

              <form class="form-horizontal log-form" action="<?php echo site_url('admin/email/save/'.$email['email_id'])?>" method="post">

                <div class="control-group">
					<?PHP if(form_error('subject')) { ?><p><?php echo form_error('subject');?></p><?PHP } ?>
                  <label class="control-label">Subject:</label>

                  <div class="controls">

                    <input name="subject" id="subject" type="text" class="input-field" value="<?php echo $email['subject'];?>" />

                  </div>

                </div>

                <div class="control-group">

                  <label class="control-label">Message:</label>

                  <div class="controls">

                    <textarea name="content"  class="input-field"><?php echo $email['content'];?></textarea>

                  </div>

                </div>

                <div class="control-group">

                  <div class="controls"> <span class="text-center" style="display: block;">

                    <button type="submit" class="btn btn-primary">Save</button>

                    <button type="button" class="btn btn-primary" onclick="location.href='<?=site_url('admin/email');?>'">Cancel</button>

                    </span> </div>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>