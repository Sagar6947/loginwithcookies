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
                                                    <div class="input-group-prepend"><span class="input-group-text">Category</span></div>

                                                    <input type="text" class="form-control" name="category" 
                                                    
                                                    value="<?= (($tag == 'edit') ? $category_list['0']['category'] : '') ?>">
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


            <div class="row">
                <div class="col-12 mt-3">

                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>S.no.</th>
                                            <th>Create date</th>
                                            <th>Category</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($category)) {
                                            foreach ($category as $cate) {
                                        ?>
                                                <tr id="row<?= $cate['cate_id'] ?>">
                                                    <td><?= $i ?></td>
                                                    <td><?= convertDatedmy($cate['create_date']) ?></td>
                                                    <td><?= $cate['category'] ?></td>

                                                    <td>
                                                    
                                                    <a href="<?= base_url('update-category/' . $cate['cate_id']) ?>" class="badge badge-warning">Update</a>


                                                        <!-- <a href="<?= base_url('AdminDashboard/delete_category/' . $cate['cate_id']) ?>" class="badge badge-danger">Delete</a> -->
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