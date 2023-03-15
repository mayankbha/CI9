<div id="wrap">
    <div id="main" class="container clear-top">


        <div id="wrapper">


            <div id="page-body" class="clearfix">

                <div class="container">

                    <div class="row head_conrent">
                        <h1 class="span12"><strong>Admin</strong> View Contact Detail </h1>
                    </div>

                    <div class="ymp_content form_div view-contact" style="min-height: 320px; ">

                        <form class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">Message Date:</label>

                                <div class="controls view-text">
                                    <?php echo date('m-d-Y', strtotime($contact['date']));?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">First Name:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['first_name'];?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Last Name:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['last_name'];?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['email'];?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Subject:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['subject'];?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Questions/Info:</label>

                                <div class="controls view-text">
                                    <?php echo $contact['message'];?>
                                </div>
                            </div>


                            <div class="sbmt_dv action" style="margin-top: 30px;">
                                <button type="button" class="btn btn-primary btn-large"
                                        onclick="location.href='<?php echo site_url('admin/contacts/reply/' . $contact['contact_id']) ?>';">
                                    Reply
                                </button>
                                <button type="button" class="btn btn-primary btn-large"
                                        onclick="$('.popup-mask').show(); $('#popup_container<?= $contact['contact_id']; ?>').show();">
                                    Remove
                                </button>
                                <div class="popup_container" id="popup_container<?= $contact['contact_id']; ?>"
                                     style="margin-left:5px; display: none">
                                    <div class="popover bottom">
                                        <div class="arrow"></div>
                                        <div class="popover-inner">
                                            <div class="popover-content" style="padding-left:-10px;">
                                                <p style="color: rgb(87,87,87);font-size: 0.875em;line-height: 20px;">
                                                    Are you sure you want to do this? <span>This action can not be undone! </span>
					<span class="sp_btn">
					<button type="button" class="btn btn-primary btn-small"
                            onclick="location.href='<?= site_url('admin/contacts/delete/' . $contact['contact_id']); ?>'"
                            style="width:70px;">Confirm
                    </button>
					<button type="submit" onclick="CancelRemovePopup(<?= $contact['contact_id']; ?>)"
                            class="btn btn-primary btn-small" style="width:70px;">Cancel
                    </button>
					</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-large"
                                        onclick="location.href='<?php echo site_url('admin/contacts/') ?>';">Cancel
                                </button>
                            </div>

                        </form>

                    </div>

                    <div class="row head_conrent">
                        <h1 style="position: relative;padding-left: 25px;"><strong>Admin</strong> Contact History </h1>
                    </div>


                    <div class="tabular_cont tabular_cont_phn_last">
                        <table>


                            <tr>

                                <th>
                                    <a href="<?= site_url('admin/contacts/view/' . $contact_id . '/date/' . $order_type); ?>">Date</a>
                                </th>

                                <th>
                                    <a href="<?= site_url('admin/contacts/view/' . $contact_id . '/first_name/' . $order_type); ?>">First
                                        Name</a></th>

                                <th class="hidden-phone"><a
                                        href="<?= site_url('admin/contacts/view/' . $contact_id . '/last_name/' . $order_type); ?>">Last
                                        Name</a></th>

                                <th class="hidden-phone"><a
                                        href="<?= site_url('admin/contacts/view/' . $contact_id . '/email/' . $order_type); ?>">Email</a>
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
                                            href="<?= site_url('admin/contacts/view/' . $crt['contact_id']); ?>"><img
                                                src="<?= base_url(); ?>images/edit_icon.png" alt=" "/></a>
                                        <a href="<?= site_url('admin/contacts/reply/' . $crt['contact_id']); ?>"><img
                                                src="<?= base_url(); ?>images/reply.png" alt="reply" title="reply"/></a>

                                        <div class="popup_container"><a href="#!delete" class="delete_confirm"><img
                                                    src="<?php echo site_url('images/delete_icon.png'); ?>"
                                                    alt=" "/></a>

                                            <div class="popover bottom" style="display:none;">
                                                <div class="arrow"></div>
                                                <div class="popover-inner">
                                                    <div class="popover-content">
                                                        <p> Are you sure you want to do this?
                                                            <span>This action can not be undone! </span> <span
                                                                class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/contacts/delete_history/' . $crt['contact_id']); ?>"
                                                class="go_to btn ymp_btn_lrge ymp_btn_small">Confirm
                                        </button>
										<button type="submit" class="btn ymp_btn_lrge ymp_btn_small delete">Cancel
                                        </button>
										</span></p>
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