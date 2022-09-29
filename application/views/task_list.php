<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <?php include('includes/top-header.php'); ?>
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row">
                <div class="col-sm-10  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0"><?= $title ?></h4>


                        </div>


                    </div>
                </div>

                <div class="col-sm-2  align-self-center">
                    <a href="<?= base_url('add-task') ?>" class="btn btn-primary align-left">Add Task</a>
                </div>

            </div>




            <div class="row row-eq-height">

                <div class="col-12 col-lg-12 mt-3 ">
                    <?php
                    if ($this->session->has_userdata('msg')) {
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg');
                    }
                    ?>
                    <div class="card border  h-100 notes-list-section">
                        <div class="card-header border-bottom p-1 d-flex">
                            <a href="#" class="d-inline-block d-lg-none  flip-menu-toggle"><i class="icon-menu"></i></a>
                            <input type="text" class="form-control border-0 p-2 w-100 h-100 todo-search myInput" placeholder="Search here...">
                        </div>
                        <div class="row notes">

                            <?php
                            $i = 1;
                            if (!empty($task_list)) {
                                foreach ($task_list as $task) {

                                    $cate =  getRowById('tbl_category', 'cate_id',  $task['category'])
                            ?>

                                    <div class="col-12  col-md-6 col-lg-6 my-3 note business-note all starred" data-type="business-note" id="mytable">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body p-4">
                                                    <h6 class="mb-3 font-w-600"><?= convertDatedmy($task['date']) ?>
                                                        <?= date_format(date_create(
                                                            $task['time']
                                                        ), 'h:ia') ?>


                                                        <button href="#" class="badge badge-<?= (($task['task_status'] == '1') ? 'primary'  : (($task['task_status'] == '2') ? 'warning'  : (($task['task_status'] == '3') ? 'success' : (($task['task_status'] == '0') ? 'info' : 'danger')))) ?>" style="color:white" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $i ?>">


                                                            <?= (($task['task_status'] == '1') ? 'On Working'  : (($task['task_status'] == '2') ? 'Pending'  : (($task['task_status'] == '3') ? 'Completed ' : (($task['task_status'] == '0') ? 'New' : 'Cancel')))) ?>
                                                        </button>




                                                    </h6>


                                                    <?php if ($cate != '') { ?>
                                                        <p class="font-w-500 tx-s-12"><i class="icon-bag"></i> <span class="note-date">Category : <?= $cate[0]['category'] ?></span></p> <?php } ?>


                                                    <div class="note-content mb-4"><b>Work Note </b>- <?= $task['text'] ?></div>

                                                    <p class="small-content text-muted mb-10">

                                                        <?php if ($task['image'] !=  '') { ?>

                                                            <img src="<?= base_url() ?>uploads/img/<?= $task['image'] ?>" width="100px" />

                                                        <?php }
                                                        ?>

                                                        <?php if ($task['voice'] !=  '') { ?>
                                                            <a href="<?= base_url() ?>uploads/voice/<?= $task['voice'] ?>" class="btn btn-dark" download>Listen Audio</a>
                                                        <?php } ?>

                                                    </p>
                                                    <div class="d-flex notes-tool">

                                                        <h6 class="f11"><span class="dot <?= (($task['status'] == '0') ? '' : 'bg-red') ?>"> </span> <?= (($task['status'] == '0') ? 'Normal Work' : 'High Priority work') ?><br> <br>
                                                            <a class="btn btn-light text-success edit-note f14" href="<?= base_url('comment/' . $task['tid']) ?>"><i class="icon-speech"></i> Comment</a>
                                                        </h6>
                                                        <div class="ml-auto">
                                                            <a class="btn btn-light text-success edit-note" href="<?= base_url('update-task/' . $task['tid']) ?>"><i class="icon-pencil"></i></a>


                                                            <a class="btn btn-light text-danger" href="<?= base_url('AdminDashboard/delete_task/' . $task['tid']) ?>" onclick="return confirm('Are You Sure You want To delete?')"><i class="icon-trash"></i></a>


                                                        </div>
                                                    </div>

                                                    <details>
                                                        <summary class="f14 text-danger"> Assigned Employee</summary>
                                                        <p>
                                                            <?php
                                                            $employee = getRowById('tbl_employee_task', 'task_id', $task['tid']);
                                                            // print_r($employee);
                                                            if (!empty($employee)) {
                                                                foreach ($employee as $candi) {

                                                                    

                                                                    $empdetails = getRowById('tbl_employee', 'admin_id', $candi['employee_id']);

                                                            ?>
                                                                    <?= $empdetails[0]['admin_name'] ?> (<?= $empdetails[0]['admin_contact'] ?>) ,
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </p>


                                                    </details>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Status Update</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <form method="post" action="">
                                                        <select class="form-control" name="task_status">
                                                            <option value="">Select Type</option>

                                                            <option value="0" <?= (($task['task_status'] == '0') ? 'Selected' : '') ?>>New</option>


                                                            <option value="1" <?= (($task['task_status'] == '1') ? 'Selected' : '') ?>>On Working</option>
                                                            <option value="2" <?= (($task['task_status'] == '2') ? 'Selected' : '') ?>>Pending </option>

                                                            <option value="3" <?= (($task['task_status'] == '3') ? 'Selected' : '') ?>>Completed </option>

                                                            <option value="4" <?= (($task['task_status'] == '4') ? 'Selected' : '') ?>>Cancel </option>
                                                        </select>

                                                        <input type="hidden" name="taskid" value="<?= $task['tid'] ?>">

                                                        <br>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                }
                            } else {
                                echo '<p>No Task List</p>';
                            }
                            ?>

                        </div>
                    </div>


                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>

    <?php include('includes/web-footer.php'); ?>

    <?php include('includes/footer.php') ?>
    <?php include('includes/footer-link.php'); ?>

    </body>

    </html>

    <script>
        $(document).ready(function() {
            $(".myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mytable div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>