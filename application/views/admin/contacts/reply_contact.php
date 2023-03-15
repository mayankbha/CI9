<div id="wrap">
    <div id="main" class="container clear-top">


        <div id="wrapper">


            <div id="page-body" class="clearfix">

                <div class="container">

                    <div class="row head_conrent">
                        <h1 class="span12"><strong>Admin</strong> Reply</h1>
                    </div>

                    <div class="ymp_content form_div form-outbound reply-form" style="min-height: 320px; ">

                        <form class="form-horizontal"
                              action="<?php echo site_url('admin/contacts/send/' . $contact['contact_id']) ?>"
                              name="contactfrm" method="post">

                            <div class="control-group">
                                <label class="control-label">Date:</label>

                                <div class="controls view-text">
                                    <?php echo date('m-d-Y', strtotime($contact['date']));?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">To:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['email'];?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Subject:</label>

                                <div class="controls">
                                    <input type="text" id="subject" name="subject"
                                           class="input-xxlarge input_field large-field"
                                           value="Re: <?php echo $contact['subject']; ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Message:</label>

                                <div class="controls">
                                    <textarea name="message" rows="10" class="input_field large-field"
                                              style="height: 169px; width: 531px;text-align: left;">

                                        ****************************************************************************************<?php echo $contact['message'];?>
                                    </textarea>
                                </div>
                            </div>


                            <div class="sbmt_dv" style="margin-top: 30px;">
                                <button type="submit" class="btn btn-primary btn-large">Send</button>
                                <button type="button" class="btn btn-primary btn-large"
                                        onclick="location.href='<?php echo site_url('admin/contacts') ?>'">Cancel
                                </button>
                            </div>

                        </form>

                    </div>

                    <div class="row head_conrent">
                        <h1 style="padding-left: 25px;"><strong>Admin</strong> Contact History </h1>
                    </div>


                    <div class="tabular_cont tabular_cont_phn_last">
                        <table>

                            <tr>

                                <th>
                                    <a href="<?= site_url('admin/contacts/reply/' . $contact_id . '/date/' . $order_type); ?>">Date</a>
                                </th>

                                <th>
                                    <a href="<?= site_url('admin/contacts/reply/' . $contact_id . '/first_name/' . $order_type); ?>">First
                                        Name</a></th>

                                <th class="hidden-phone"><a
                                        href="<?= site_url('admin/contacts/reply/' . $contact_id . '/last_name/' . $order_type); ?>">Last
                                        Name</a></th>

                                <th class="hidden-phone"><a
                                        href="<?= site_url('admin/contacts/reply/' . $contact_id . '/email/' . $order_type); ?>">Email</a>
                                </th>
                                <th>Actions</th>

                            </tr>
                            <?php $i = 0; foreach ($replys as $crt) : ?>
                                <tr>

                                    <td class="hidden-phone"><?php echo date('m/d/Y', strtotime($crt['date']));?></td>

                                    <td><?php echo $crt['first_name'];?></td>

                                    <td><?php echo $crt['last_name'];?></td>

                                    <td class="hidden-phone"><?php echo $crt['email']?></td>

                                    <td class="action"><a
                                            href="<?php echo site_url('admin/contacts/view/' . $crt['contact_id']) ?>"><img
                                                title="view" alt="view"
                                                src="<?= base_url(); ?>images/edit_icon.png"></a>
                                        <a href="<?php echo site_url('admin/contacts/reply/' . $crt['contact_id']) ?>"><img
                                                src="<?= base_url(); ?>images/reply.png" alt="Reply"
                                                title="Reply"></a>
                                        <a href="javascript:void(0);" class="RemovePopup"
                                           title="<?= $crt['contact_id']; ?>"><img
                                                src="<?= base_url(); ?>images/delete_icon.png" alt="delete"
                                                title="delete"/></a>

                                        <div class="popup_container" id="popup_container<?= $crt['contact_id']; ?>"
                                             style="margin-left:5px; display: none">
                                            <div class="popover bottom">
                                                <div class="arrow"></div>
                                                <div class="popover-inner">

                                                    <div class="popover-content">
                                                        <p>
                                                            Are you sure you want to do this? <span>This action can not be undone! </span>
				<span class="sp_btn">
				<button type="submit" class="btn btn-primary btn-small"
                        onclick="location.href='<?= site_url('admin/contacts/delete_history/' . $crt['contact_id']); ?>'">
                    Confirm
                </button>
				<button type="button" onclick="CancelRemovePopup(<?= $crt['contact_id']; ?>)"
                        class="btn btn-primary btn-small">Cancel
                </button>
				</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <?PHP $i++; endforeach;?>
                        </table>
                        <div class="popup-mask" style="display:none"></div>
                    </div>

                </div>

            </div>
            <!-- end page body -->

        </div>
    </div>
</div>
<script>document.contactfrm.message.focus();</script>