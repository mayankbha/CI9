<h2 class="pull-left"><span>Admin</span> Public Users Controller</h2>
<div class="search_box pull-left">
    <form action="<?php echo site_url('admin/members/search'); ?>" method="post">
        <input name="keyword" type="text" class="ymp_inpt" placeholder="Search here"
               value="<?php echo(isset($search_keyword) ? $search_keyword : ""); ?>"/>
        <input name="" type="image" src="<?php echo site_url('images/srch_icon.png'); ?>" alt="search"
               class="search_btn"/>
        <input value="do_search" name="do_search" type="hidden"/>
    </form>
</div>
<div class="sort_by pull-left" style="margin-right:9px">
    <label>Connected With:</label>
    <select class="ymp_inpt">
        <option>Facebook</option>
    </select>
</div>
<a href="<?php echo site_url('admin/members/export'); ?>" class="ymp_top_btn pull-right">Export Users</a>
<div class="clear"></div>
<div class="tabular_cont popup_table">
    <table>
        <thead>
        <tr>
            <th class=""><a
                    href="<?php echo site_url('admin/members/page/' . $page . '/first_name/' . ($orderBy == "first_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>"
                    class="">First
                    Name <?php echo($orderBy == "first_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
            </th>
            <th class=""><a
                    href="<?php echo site_url('admin/members/page/' . $page . '/last_name/' . ($orderBy == "last_name" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>"
                    class="<?php echo($orderBy == "last_name" ? $order : ""); ?>">Last
                    Name <?php echo($orderBy == "last_name" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
            </th>
            <th class="hidden-phone"><a
                    href="<?php echo site_url('admin/members/page/' . $page . '/email/' . ($orderBy == "email" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>"
                    class="<?php echo($orderBy == "email" ? $order : ""); ?>">Email <?php echo($orderBy == "email" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
            </th>
            <th class="hidden-phone"><a
                    href="<?php echo site_url('admin/members/page/' . $page . '/created/' . ($orderBy == "created" ? ($order == "asc" ? "desc" : "asc") : "asc")); ?>"
                    class="<?php echo($orderBy == "created" ? $order : ""); ?>">Date
                    Registered <?php echo($orderBy == "created" ? "<i class=\"sorting-" . $order . "\"></i>" : ""); ?></a>
            </th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($members as $member) { ?>
            <tr id="member-<?php echo $member->member_id; ?>">
                <td class=""><a
                        href="<?php echo site_url('admin/members/view/' . $member->member_id); ?>"><?php echo $member->first_name; ?></a>
                </td>
                <td class=""><a
                        href="<?php echo site_url('admin/members/view/' . $member->member_id); ?>"><?php echo $member->last_name; ?></a>
                </td>
                <td class="hidden-phone"><a
                        href="<?php echo site_url('admin/members/view/' . $member->member_id); ?>"><?php echo $member->email; ?></a>
                </td>
                <td class="hidden-phone"><?php echo date('d-m-Y', strtotime($member->created)); ?></td>
                <td class="action">
                    <div class="popup_container"><a href="#!delete" class="delete_confirm"><img
                                src="<?php echo site_url('images/delete_icon.png'); ?>" alt=" "/></a>

                        <div class="popover bottom" style="display:none;">
                            <div class="arrow"></div>
                            <div class="popover-inner">
                                <div class="popover-content">
                                    <p> Are you sure you want to do this?
                                        <span>This action can not be undone! </span> <span class="sp_btn">
										<button type="button"
                                                data-target-url="<?php echo site_url('admin/members/delete/' . $member->member_id); ?>"
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
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="clearfix">
    <?php $this->my_pagination->show(); ?>
</div>
