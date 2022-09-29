<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <?php include('includes/top-header.php'); ?>

    <main>
        <div class="container-fluid site-width">
            <div class="row">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Dashboard</h4>
                            <p>Welcome to liner admin panel</p>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
         
            
            <div class="row">
                <div class="col-12 col-lg-12  mt-3">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 mt-3">
                                    <div class="card bg-primary">
                                        <div class="card-body">
                                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                                <i class="icon-basket icons card-liner-icon mt-2 text-white"></i>
                                                <div class='card-liner-content'>
                                                    <h2 class="card-liner-title text-white">2,390</h2>
                                                    <h6 class="card-liner-subtitle text-white">Today's Orders</h6>
                                                </div>
                                            </div>
                                            <div id="apex_primary_chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                                <i class="icon-user icons card-liner-icon mt-2"></i>
                                                <div class='card-liner-content'>
                                                    <h2 class="card-liner-title">9,390</h2>
                                                    <h6 class="card-liner-subtitle">Today's Visitors</h6>
                                                </div>
                                            </div>
                                            <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                                            <div id="apex_today_visitors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6  mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                                <i class="icon-bag icons card-liner-icon mt-2"></i>
                                                <div class='card-liner-content'>
                                                    <h2 class="card-liner-title">$4,390</h2>
                                                    <h6 class="card-liner-subtitle">Today's Sale</h6>
                                                </div>
                                            </div>
                                            <div id="apex_today_sale"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                                <span class="card-liner-icon mt-1">$</span>
                                                <div class='card-liner-content'>
                                                    <h2 class="card-liner-title">$4,390</h2>
                                                    <h6 class="card-liner-subtitle">Total Profit</h6>
                                                </div>
                                            </div>
                                            <div id="apex_today_profit"></div>
                                        </div>
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
</div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>

<script>
    function eatsnack(msg) {
        var x = document.getElementById("snackbar");
        x.className = "show";
        $('#snackbar').text(msg);
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
    $('.done').click(function() {
        var id = $(this).data('id');
        if ($('#feat' + id).is(":checked")) {
            var status = '1';
        } else {
            var status = '0';
        }
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>AdminDashboard/updateappdoned",
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                console.log(response);
                if (response == 0) {
                    eatsnack('Not done updated');
                } else if (response == 1) {
                    eatsnack('Congratulation , Completed Task');
                } else if (response == 2) {
                    eatsnack('Server Error');
                }
            }
        });
    });
</script>
</body>

</html>