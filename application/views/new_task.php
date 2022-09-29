<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>

    <?php include('includes/top-header.php'); ?>
    <style>
        .drocss {
            position: absolute;
            transform: translate3d(140px, 36px, 0px);
            top: 0px;
            /* left: -30% !important; */
            will-change: transform;
            padding: 12px;
            font-size: 15px;
            line-height: 32px;
        }
    </style>


    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0"><?= $title ?></h4>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($this->session->has_userdata('msg')) {
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg');
                    }
                    ?>

                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Date</span></div>

                                                        <input type="date" class="form-control" name="date" value="<?= (($tag == 'edit') ? $task_list[0]['date'] : date('Y-m-d')) ?>" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Time</span></div>

                                                        <input type="time" class="form-control" name="time" value="<?= (($tag == 'edit') ? $task_list[0]['time'] : date("H:i")) ?>" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="input-group">
                                                        <select name="category" class="form-control select2-1 " id="select2-1" required>
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            foreach ($category as $cate) {
                                                            ?>
                                                                <option value="<?= $cate['cate_id'] ?>" <?php if ($tag == 'edit') {  ?> <?= (($cate['cate_id'] == $task_list[0]['category']) ? 'Selected' : '') ?> <?php } ?>><?= $cate['category'] ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Assign Employee</span></div>



                                                        <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>Click To Select </button>
                                                        <ul class="dropdown-menu drocss">


                                                            <?php
                                                            if ($tag == 'new') {
                                                                $i = 0;
                                                                foreach ($employee as $employeeList) {
                                                                    $i = $i + 1;
                                                            ?>
                                                                    <li> <input type="checkbox" id="employee<?= $i ?>" name="employee_id[]" value="<?= $employeeList['admin_id'] ?>" />&nbsp;

                                                                        <?= $employeeList['admin_name'] ?> (<?= $employeeList['admin_contact'] ?>)

                                                                    </li>

                                                                <?php
                                                                }
                                                            } else {

                                                                $i = 0;
                                                                foreach ($employee as $employeeList) {
                                                                    $i = $i + 1;
                                                                ?>
                                                                    <li>

                                                                        <input type="checkbox" id="employee<?= $i ?>" name="employee_id[]" value="<?= $employeeList['admin_id'] ?>" <?= ((in_array($employeeList['admin_id'], $emp_id)) ? 'Checked' : '') ?> />

                                                                        <?= $employeeList['admin_name'] ?> (<?= $employeeList['admin_contact'] ?>)

                                                                    </li>

                                                            <?php

                                                                }
                                                            }
                                                            ?>



                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Status</span></div>
                                                        <select name="status" class="form-control">
                                                            <option value="0" <?= (($tag == 'edit') ? (($task_list[0]['status'] == 0 || $task_list[0]['status'] == 0) ? 'selected' : '') : '') ?>>Normal</option>
                                                            <option value="1" <?= (($tag == 'edit') ? (($task_list[0]['status'] == '1' || $task_list[0]['status'] == '1') ? 'selected' : '') : '') ?>>High Priority</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Text Note</span></div>
                                                        <textarea class="form-control" name="text" placeholder=""><?= (($tag == 'edit') ? $task_list[0]['text'] : '') ?></textarea>


                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Upload Image</span></div>
                                                        <input type="file" class="form-control" name="images_temp">

                                                        <?php if ($tag == 'edit') { ?>
                                                            <input type="hidden" class="form-control" name="image" value="<?= $task_list[0]['image']  ?>">

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>



                                                <div class="form-group col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Upload Audio File</span></div>
                                                        <input type="file" class="form-control" name="voice_temp" accept="image/mp3">
                                                        <?php if ($tag == 'edit') { ?>
                                                            <input type="hidden" class="form-control" name="voice" value="<?= $task_list[0]['voice'] ?>">

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>


                                            </div>

                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>



                    </div>
                </div>


            </div>

        </div>
    </main>




    <script>
        var options = [];

        $('.dropdown-menu a').on('click', function(event) {

            var $target = $(event.currentTarget),
                val = $target.attr('data-value'),
                $inp = $target.find('input'),
                idx;

            if ((idx = options.indexOf(val)) > -1) {
                options.splice(idx, 1);
                setTimeout(function() {
                    $inp.prop('checked', false)
                }, 0);
            } else {
                options.push(val);
                setTimeout(function() {
                    $inp.prop('checked', true)
                }, 0);
            }

            $(event.target).blur();

            console.log(options);
            return false;
        });
    </script>

    <?php include('includes/web-footer.php'); ?>

    <?php include('includes/footer.php') ?>
    <?php include('includes/footer-link.php'); ?>
    </body>

    </html>