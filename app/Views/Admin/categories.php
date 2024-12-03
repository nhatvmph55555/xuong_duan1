<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:29 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>N4 Fashion - Ultimate Admin Dashboard</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">



    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/Admin/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Admin/images/favicon.png">

</head>

<body>

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                <?php include 'app/Views/Admin/layouts/slidebar.php' ?>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                            <div class="wg-box">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo "<p>" . $_SESSION['message'] . "</p>";
                                        unset($_SESSION['message']);
                                    }
                                    ?>
                                    <div class="title-box">
                                        Danh sách Danh mục sản phẩm
                                    </div>

                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">
                                                    <font style="vertical-align: inherit">
                                                        <font style="vertical-align: inherit">Hiển thị</font>
                                                    </font>
                                                </div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>
                                                            <font style="vertical-align: inherit">
                                                                <font style="vertical-align: inherit">10</font>
                                                            </font>
                                                        </option>
                                                        <option>
                                                            <font style="vertical-align: inherit">
                                                                <font style="vertical-align: inherit">20</font>
                                                            </font>
                                                        </option>
                                                        <option>
                                                            <font style="vertical-align: inherit">
                                                                <font style="vertical-align: inherit">30</font>
                                                            </font>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">
                                                    <font style="vertical-align: inherit">
                                                        <font style="vertical-align: inherit">mục nhập</font>
                                                    </font>
                                                </div>
                                            </div>
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input
                                                        type="text"
                                                        placeholder="Tìm kiếm ở đây..."
                                                        class=""
                                                        name="name"
                                                        tabindex="2"
                                                        value=""
                                                        aria-required="true"
                                                        required="" />
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="<?=BASE_URL ?>?role=admin&act=add-category"><i class="icon-plus"></i>
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">Add Category</font>
                                            </font>
                                        </a>
                                    </div>
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">
                                                    <font style="vertical-align: inherit">
                                                        <font style="vertical-align: inherit">STT</font>
                                                    </font>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="body-title">
                                                    <font style="vertical-align: inherit">
                                                        <font style="vertical-align: inherit">Name</font>
                                                    </font>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="body-title">
                                                    <font style="vertical-align: inherit">
                                                        <font style="vertical-align: inherit">Hoạt động</font>
                                                    </font>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            <?php foreach (
                                                $listCategory as $key =>
                                                $value
                                            ): ?>
                                                <li class="wg-product item-row gap20">
                                                    <div class="body-text text-main-dark mt-4">
                                                        <?= $key + 1 ?>
                                                    </div>
                                                    <div class="body-text text-main-dark mt-4"><?= $value->name ?></div>
                                                    <div class="list-icon-function">
                                                        <div class="item eye">
                                                            <a href="<?= BASE_URL?>?role=admin&act=show-category&id=<?= $value->id ?>">
                                                                <i class="icon-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="item edit">
                                                            <a href="<?=BASE_URL?>?role=admin&act=update-category&id=<?= $value->id ?>">
                                                                <i class="icon-edit-3"></i>
                                                            </a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a href="<?=BASE_URL ?>?role=admin&act=delete-category&id=<?= $value->id ?>" onclick="confirm('Bạn muốn xóa chứ???')">
                                                                <i class="icon-trash-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 entries</div>
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        <?php include 'app/Views/Admin/layouts/footer.php' ?>
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/bootstrap-select.min.js"></script>
    <script src="assets/Admin/js/zoom.js"></script>
    <script src="assets/Admin/js/morris.min.js"></script>
    <script src="assets/Admin/js/raphael.min.js"></script>
    <script src="assets/Admin/js/morris.js"></script>
    <script src="assets/Admin/js/jvectormap.min.js"></script>
    <script src="assets/Admin/js/jvectormap-us-lcc.js"></script>
    <script src="assets/Admin/js/jvectormap-data.js"></script>
    <script src="assets/Admin/js/jvectormap.js"></script>
    <script src="assets/Admin/js/apexcharts/apexcharts.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-1.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-2.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-3.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-4.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-5.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-6.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-7.js"></script>
    <script src="assets/Admin/js/switcher.js"></script>
    <script defer src="assets/Admin/js/theme-settings.js"></script>
    <script src="assets/Admin/js/main.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:54 GMT -->

</html>