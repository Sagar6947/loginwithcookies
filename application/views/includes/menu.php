<div class="sidebar">
    <div class="site-width">
        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">


            <?php
            if (sessionId('user_type') == '1') {
            ?>
                <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> All Task</a>
                    <ul>

                        <li class="dropdown"><a href="<?= base_url('task-list') ?>"><i class="icon-options"></i>Task List</a>
                            <ul class="sub-menu">
                                <li><a href="<?= base_url() ?>task-list"><i class="icon-energy"></i> All task</a></li>
                                <li><a href="<?= base_url() ?>task-list?status=<?= encryptId('0') ?>"><i class="icon-energy"></i> New</a></li>
                                <li><a href="<?= base_url() ?>task-list?status=<?= encryptId('1') ?>"><i class="icon-disc"></i> On Working</a></li>
                                <li><a href="<?= base_url() ?>task-list?status=<?= encryptId('2') ?>"><i class="icon-frame"></i> Pending</a></li>
                                <li><a href="<?= base_url() ?>task-list?status=<?= encryptId('3') ?>"><i class="icon-frame"></i> Completed</a></li>
                                <li><a href="<?= base_url() ?>task-list?status=<?= encryptId('4') ?>"><i class="icon-frame"></i> Cancel </a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('add-task') ?>"><i class="icon-menu"></i> Add Task</a></li>



                        <li><a href="<?= base_url() ?>category"><i class="icon-grid"></i>Task category</a></li>



                    </ul>
                </li>


                <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i>Employee Section</a>
                    <ul>

                        <li><a href="<?= base_url('employee_list'); ?>"><i class="icon-user"></i> Employee List</a></li>
                        <li><a href="<?= base_url('new_employee'); ?>"><i class="icon-user"></i> Add Employee</a></li>

                    </ul>
                </li>
            <?php
            }
            ?>



            <li class="dropdown"><a href="#"><i class="icon-badge mr-1"></i> My Task List</a>
                <ul>

                    <li class="dropdown"><a href="<?= base_url('my-list') ?>"><i class="icon-screen-desktop"></i>Task List</a>
                        <ul class="sub-menu">
                        <li><a href="<?= base_url() ?>my-list"><i class="icon-energy"></i> All task</a></li>
                            <li><a href="<?= base_url() ?>my-list?status=<?= encryptId('0') ?>"><i class="icon-energy"></i> New</a></li>
                            <li><a href="<?= base_url() ?>my-list?status=<?= encryptId('1') ?>"><i class="icon-disc"></i> On Working</a></li>
                            <li><a href="<?= base_url() ?>my-list?status=<?= encryptId('2') ?>"><i class="icon-frame"></i> Pending</a></li>
                            <li><a href="<?= base_url() ?>my-list?status=<?= encryptId('3') ?>"><i class="icon-frame"></i> Completed</a></li>
                            <li><a href="<?= base_url() ?>my-list?status=<?= encryptId('4') ?>"><i class="icon-frame"></i> Cancel </a></li>
                        </ul>
                    </li>

                </ul>




    </div>
</div>