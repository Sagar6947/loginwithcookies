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

            <div class="chat-screen">
                <div class="row row-eq-height">
                    <?php
                    if ($this->session->has_userdata('msg')) {
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg');
                    }
                    ?>
                    <div class="col-12 col-lg-8 col-xl-12  mt-3 ">
                        <div class="card border h-60 rounded-0">
                            <div class="card-body p-0">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <ul class="nav flex-column chat-menu" id="myTab3" role="tablist">
                                            <li class="nav-item active px-3 px-md-1 px-xl-3">
                                                <div class="media d-block d-flex text-left py-2">

                                                    <div class="media-body align-self-center mt-0  d-flex">
                                                        <div class="message-content">
                                                            <h6 class="mb-1 font-weight-bold d-flex">Task Comment</h6>

                                                            <br>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="scrollerchat p-3" style="height:auto !important; ">

                                            <?php
                                            if ($comment) {
                                                foreach ($comment as $comm) {

                                                    $employee =  getRowById('tbl_employee', 'admin_id', $comm['user_id'])

                                              

                                            ?>

                                                    <div class="media d-flex mb-4">
                                                        <div class="p-3 mr-auto speech-bubble alt">

                                                            <?= $comm['comment'] ?> <?php if ($employee != '') { ?>
                                                                <span class="text-danger f8"> (<?= $employee[0]['admin_name'] ?> , <?= $employee[0]['admin_contact'] ?>) <?php  } ?></span>
                                                                <br />

                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <form method="post" action="">
                                            <div class="border-top theme-border px-2 py-3 d-flex position-relative chat-box">

                                                <input type="text" class="form-control mr-2" name="comment" placeholder="Type message here ..." />
                                                <input type="hidden" class="form-control mr-2" name="taskid" value="<?= $taskid ?>" />
                                                <input type="hidden" class="form-control mr-2" name="user_id" value="<?= sessionId('user_id') ?>" />
                                                <button type="submit" class="p-2 ml-2 rounded line-height-21 bg-primary text-white"><i class="icon-cursor align-middle"></i></button>

                                            </div>
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