<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <?php include('includes/top-header.php'); ?>
    <main>
        <div class="container-fluid site-width">
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
                <div class="col-12 mt-3">
                    <?php
                    if ($this->session->has_userdata('msg')) {
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg');
                    }
                    ?>
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>S.no.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Username/Password</th>
                                            <th>Enable/Disable</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($employee_list)) {
                                            foreach ($employee_list as $employee) {
                                        ?>
                                                <tr id="row<?= $employee['admin_id'] ?>">
                                                    <td><?= $i ?></td>
                                                    <td><?= $employee['admin_name'] ?></td>
                                                    <td><?= $employee['admin_email'] ?></td>
                                                    <td><?= $employee['admin_contact'] ?></td>

                                                    <td><?= $employee['admin_email'] ?> <br>
                                                        Password : <?= $employee['admin_password'] ?> </td>
                                                    <td>
                                                        <a href="<?= base_url()  ?>status-update?id=<?= $employee['admin_id'] ?>&&status=<?= (($employee['admin-status'] == '2') ? '1' : '2') ?>" class="badge badge-<?= (($employee['admin-status'] == '2') ? 'danger' : 'success') ?> block">
                                                            <?= (($employee['admin-status'] == '2') ? 'Blocked' : 'Active') ?>

                                                        </a>
                                                    </td>

                                                    <td><a class="badge badge-warning" href="<?= base_url('update_employee/' . $employee['admin_id']) ?>">Edit</a> </td>

                                                    <td>
                                                        <a href="<?= base_url('AdminDashboard/delete_employee/' . $employee['admin_id']) ?>" class="badge badge-danger">Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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