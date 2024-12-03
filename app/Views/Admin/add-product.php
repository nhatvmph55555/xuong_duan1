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
                                    if (isset($_SESSION['error'])) {
                                        echo "<p>" . $_SESSION['error'] . "</p>";
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                    <div class="title-box">
                                        Thêm mới Product

                                    </div>
                                </div>

                                <form class="form-add-product" action="<?= BASE_URL ?>?role=admin&act=add-post-product" method="post" enctype="multipart/form-data">
                                    <div class="wg-box mb-30">
                                        <fieldset>
                                            <div class="body-title mb-10">Upload images</div>
                                            <div class="upload-image mb-16">
                                                <div class="up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <div class="text-tiny">Drop your images here or select <span class="text-secondary">click to browse</span></div>
                                                        <input type="file" id="myFile" name="image_main" accept="image/*">
                                                        <img src="#" id="myFile-input" alt="">
                                                    </label>
                                                </div>
                                                <div class="flex gap20 flex-wrap">
                                                    <!-- <div class="item">
                                                        <img src="assets/Admin/images/upload/img-1.jpg" alt="">
                                                    </div>
                                                    <div class="item">
                                                        <img src="assets/Admin/images/upload/img-2.jpg" alt="">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="wg-box mb-30">
                                        <div class="item">
                                            <h6>List Image</h6><br>
                                            <button class="tf-button w50" id="btnAddImage">Add image</button>
                                            <div class="block-image">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="wg-box mb-30">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Name <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter title" name="name" tabindex="0" value="" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                                            <select name="category">
                                                <?php foreach ($listCategory as $key => $value) { ?>
                                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                <?php } ?>
                                            </select>

                                        </fieldset>
                                        <div class="cols-lg gap22">
                                            <fieldset class="price">
                                                <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                                                <input class="" type="number" placeholder="Price" name="price" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="sale-price">
                                                <div class="body-title mb-10">Sale Price </div>
                                                <input class="" type="number" placeholder="Sale Price " name="price_sale" tabindex="0" value="" aria-required="true">
                                            </fieldset>
                                        </div>
                                        <div class="cols-lg gap22">
                                            <fieldset class="variant-picker-item">
                                                <div class="variant-picker-label body-title">
                                                    Color: <span class="body-title-2 fw-4 variant-picker-label-value">Orange</span>
                                                </div>
                                                <div class="variant-picker-values">
                                                    <input id="values-orange" type="radio" name="color" checked="">
                                                    <label class="radius-60" for="values-orange" data-value="Orange">
                                                        <span class="btn-checkbox bg-color-orange"></span>
                                                    </label>
                                                    <input id="values-blue" type="radio" name="color">
                                                    <label class="radius-60" for="values-blue" data-value="Blue">
                                                        <span class="btn-checkbox bg-color-blue"></span>
                                                    </label>
                                                    <input id="values-yellow" type="radio" name="color">
                                                    <label class="radius-60" for="values-yellow" data-value="Yellow">
                                                        <span class="btn-checkbox bg-color-yellow"></span>
                                                    </label>
                                                    <input id="values-black" type="radio" name="color">
                                                    <label class="radius-60" for="values-black" data-value="Black">
                                                        <span class="btn-checkbox bg-color-black"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                            <fieldset class="variant-picker-item">
                                                <div class="variant-picker-label body-text">
                                                    Size: <span class="body-title-2 variant-picker-label-value">S</span>
                                                </div>
                                                <div class="variant-picker-values">
                                                    <input type="radio" name="size" id="values-s">
                                                    <label class="style-text" for="values-s" data-value="S">
                                                        <div class="text">S</div>
                                                    </label>
                                                    <input type="radio" name="size" id="values-m" checked="">
                                                    <label class="style-text" for="values-m" data-value="M">
                                                        <div class="text">M</div>
                                                    </label>
                                                    <input type="radio" name="size" id="values-l">
                                                    <label class="style-text" for="values-l" data-value="L">
                                                        <div class="text">L</div>
                                                    </label>
                                                    <input type="radio" name="size" id="values-xl">
                                                    <label class="style-text" for="values-xl" data-value="XL">
                                                        <div class="text">XL</div>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="cols-lg gap22">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div>
                                                <input class="" type="text" placeholder="Enter Stock" name="stock" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset>
                                        </div>
                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                                            <textarea class="mb-10" name="description" placeholder="Short description about product" tabindex="0" aria-required="true" required=""></textarea>
                                        </fieldset>
                                    </div>

                                    <div class="cols gap10">
                                        <button class="tf-button w380" type="submit">Add product</button>
                                        <a href="<?= BASE_URL ?>?role=admin&act=all-product" class="tf-button style-3 w380" type="submit">Cancel</a>
                                    </div>
                                </form>



                                <!-- <form class="form-add-new-user form-style-2" action="" method="post" enctype="multipart/form-data">
                                    <div class="wg-box">
                                        <div class="left">
                                            <h5 class="mb-4">Product</h5>
                                            <div class="body-text">Fill in the information below to add a new Product</div>
                                        </div>
                                        <div class="right flex-grow">
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Name</div>
                                                <input class="flex-grow" type="text" placeholder="Username" name="name"  value=""  required="">
                                            </fieldset>
                                            <fieldset class="email mb-24">
                                                <div class="body-title mb-10">Email</div>
                                                <input class="flex-grow" type="email" placeholder="Email" name="email"  value=""  required="">
                                            </fieldset>
                                            <fieldset class="password mb-24">
                                                <div class="body-title mb-10">Password</div>
                                                <input class="password-input" type="password" placeholder="Enter password" name="password"  value=""  required="">
                                                <span class="show-pass">
                                                    <i class="icon-eye view"></i>
                                                    <i class="icon-eye-off hide"></i>
                                                </span>
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Address</div>
                                                <input class="flex-grow" type="text" placeholder="Address" name="address"  value=""  required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Phone</div>
                                                <input class="flex-grow" type="text" placeholder="Number phone" name="phone"  value=""  required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Avatar</div>
                                                <input class="flex-grow" type="file"  name="image" accept="image/*" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Role</div>
                                                <select name="role" id="role">
                                                    <option value="" hidden>Select Role</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                    <div class="bot">
                                        <button class="tf-button w180" type="submit">Thêm mới Product</button>
                                    </div>
                                </form> -->


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
    <script src="assets/Admin/js/addimage.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:54 GMT -->

</html>