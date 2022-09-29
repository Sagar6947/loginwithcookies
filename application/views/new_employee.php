<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>

    <?php include('includes/top-header.php'); ?>



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

                                        <form method="post" action="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Fullname</span></div><input type="text" class="form-control" name="admin_name" value="<?= (($tag == 'edit') ? $employee_list['0']['admin_name'] : '') ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Email</span></div><input type="email" class="form-control" name="admin_email" value="<?= (($tag == 'edit') ? $employee_list['0']['admin_email'] : '') ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Number</span></div><input type="text" class="form-control" name="admin_contact" value="<?= (($tag == 'edit') ? $employee_list['0']['admin_contact'] : '') ?>" placeholder="">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Employee Type</span></div>

                                                    <select class="form-control" name="admin_type">
                                                        

                                                        <option value="0" <?php if ($tag == 'edit') {  ?> <?= (($employee_list['0']['admin_type'] == '0') ? 'Selected' : '') ?> <?php } ?>>Employee</option>


                                                        <option value="1" <?php if ($tag == 'edit') {  ?> <?= (($employee_list['0']['admin_type'] == '1') ? 'Selected' : '') ?> <?php } ?>>Admin</option>
                                                    </select>

                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Password</span></div><input type="password" class="form-control" name="admin_password" value="<?= (($tag == 'edit') ? $employee_list['0']['admin_password'] : '') ?>" placeholder="">
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


    <?php include('includes/web-footer.php'); ?>

    <?php include('includes/footer.php') ?>
    <?php include('includes/footer-link.php'); ?>
    </body>

    </html>