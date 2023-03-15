<div id="wrapper">


    <div id="page-body" class="clearfix">

        <div class="container">

            <div class="row head_conrent">
                <h1 class="span12"><strong>Admin</strong> Contacts Controller </h1>
            </div>

            <div class="tabular_cont">
                <table>

                    <tr>

                        <th><a href="<?= site_url('admin/contacts/index/date/' . $order_type); ?>">Date</a></th>

                        <th><a href="<?= site_url('admin/contacts/index/first_name/' . $order_type); ?>">First
                                Name</a></th>

                        <th class="hidden-phone"><a
                                href="<?= site_url('admin/contacts/index/last_name/' . $order_type); ?>">Last
                                Name</a></th>

                        <th class="hidden-phone"><a
                                href="<?= site_url('admin/contacts/index/email/' . $order_type); ?>">Email</a>
                        </th>

                        <th>Actions</th>

                    </tr>
                    <?php $i = 0; foreach ($contacts as $crt_contact): ?>
                        <tr>

                            <td><?php echo date('m-d-Y', strtotime($crt_contact['date']));?></td>

                            <td><?php echo $crt_contact['first_name'];?></td>

                            <td class="hidden-phone"><?php echo $crt_contact['last_name'];?></td>

                            <td class="hidden-phone"><?php echo $crt_contact['email'];?></td>

                            <td class="action"><a
                                    href="<?= site_url('admin/contacts/view/' . $crt_contact['contact_id']); ?>"><img
                                        src="<?= base_url(); ?>images/edit_icon.png" alt=" "/></a>
                                <a href="<?= site_url('admin/contacts/reply/' . $crt_contact['contact_id']); ?>"><img
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
                                                data-target-url="<?php echo site_url('admin/contacts/delete/' . $crt_contact['contact_id']); ?>"
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
                        <?php $i++; endforeach;?>
                </table>
                <div class="popup-mask" style="display:none"></div>
            </div>
        </div>
    </div>
</div>


<!-- end page body -->
