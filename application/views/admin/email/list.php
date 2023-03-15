<div id="page-body">

    <div class="container">

      <div class="row">

        <div class="span12">

          <h2 class="pull-left"><span>Admin</span> Outbound Email Controller </h2>

          <div class="clear"></div>

          <div class="tabular_cont">

            <table>

              <tr>

                <th style="width:25%;"><a href="<?=site_url('admin/email/index/subject/'.$order_type);?>">Subject</a></th>

                <th style="width:54%;" class="hidden-phone"><a href="<?=site_url('admin/email/index/content/'.$order_type);?>">Message</a></th>

                <th style="width:8%;">Actions</th>

              </tr>
			 <?php $i=0; foreach($emails as $email):?>		
              <tr>

                <td><?php echo $email['subject'];?></td>

                <td class="hidden-phone"><?php echo substr($email['content'],0,90);?></td>

                <td class="action"><a href="<?php echo site_url('admin/email/edit/'.$email['email_id'])?>"><img src="<?=base_url();?>images/edit_icon.png" alt=" " /></a></td>

              </tr>
			<?php $i++; endforeach;?>
             

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>