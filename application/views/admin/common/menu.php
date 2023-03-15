<div class="main-navigation">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="<?php if (isset($sel) && $sel == 'blogs') echo 'active'; ?> dropdown"><a href="#"
                                                                                                            class="dropdown-toggle"
                                                                                                            data-toggle="dropdown">Blog
                                Controls</a>
                            <ul class="dropdown-menu">
                                <li <?php if (isset($sub_sel) && $sub_sel == 'blog_categories') echo 'class="active"';?> >
                                    <a href="<?php echo (isset($sub_sel) && $sub_sel == 'blog_categories') ? "javascript:void()" : site_url('admin/blog_categories'); ?>">Categories</a>
                                </li>
                                <li <?php if (isset($sub_sel) && $sub_sel == 'blog_posts') echo 'class="active"';?>><a href="<?php echo site_url('admin/blog'); ?>">Posts</a></li>
                            </ul>
                        </li>
                        <li class="<?php if (isset($sel) && $sel === 'content' || $sel === 'email') echo 'active'; ?> dropdown"><a href="#"
                                                                                                              class="dropdown-toggle"
                                                                                                              data-toggle="dropdown">Content
                                Controls</a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="<?php echo site_url('admin/content'); ?>">Page Content and META
                                        Data</a></li>
                                <li class=""><a href="<?php echo base_url('admin/email') ?>">Outbound Email</a></li>
                                <li class=""><a href="<?php echo base_url('admin/email/broadcast') ?>">Broadcast Emails</a></li>
                                <li class=""><a href="<?php echo base_url('admin/email/auto') ?>">Auto Emails</a></li>
                            </ul>
                        </li>
                        <li class="<?php if (isset($sel) AND $sel === 'user' OR $sel === 'analytics') echo 'active'; ?> dropdown"><a
                                href="<?php echo site_url('admin/users'); ?>" class="dropdown-toggle"
                                data-toggle="dropdown">User Administration</a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="<?php echo site_url('admin/users'); ?>">Admin Users</a></li>
                                <li class=""><a href="<?php echo site_url('admin/members'); ?>">Public Users</a></li>
                                <li class=""><a href="<?php echo site_url('admin/contacts'); ?>">Contacts</a></li>
                                <li class=""><a href="<?php echo site_url('admin/analytics'); ?>">Analytics</a></li>
                                <li class=""><a href="<?php echo site_url('admin/lessons/feedbacks'); ?>">Lessons
                                        Feedback</a></li>
                                <li class=""><a href="<?php echo site_url('admin/points'); ?>">Points Controller</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if (isset($sel) && ($sel == 'learning' OR $sel == 'resource' OR $sel === 'lessons')) echo 'active'; ?> dropdown"><a href="#"
                                                                                                               class="dropdown-toggle"
                                                                                                               data-toggle="dropdown">Learning</a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="<?php echo site_url('admin/resource') ?>">Resources</a></li>
                                <li class=""><a href="<?php echo site_url('admin/lessons') ?>">Learning</a></li>
                                <li class=""><a href="<?php echo base_url('admin/surveys') ?>">Surveys</a></li>
                                <li <?php if (isset($sub_sel) && $sub_sel == 'lesson_categories') echo 'class="active"';?>>
                                    <a href="<?php echo (isset($sub_sel) && $sub_sel == 'lesson_categories') ? "javascript:void()" : site_url('admin/lessons/categories'); ?>">Lessons
                                        Categories Controller</a></li>
                                <li class=""><a href="<?php echo base_url('admin/lessons/recommendations') ?>">Recommendation Controller</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
