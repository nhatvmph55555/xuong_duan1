<div class="section-menu-left">
    <div class="box-logo">
        <a href="<?=BASE_URL?>?role=admin&act=home" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="assets/Admin/images/logo/logo.png"  data-light="assets/Admin/images/logo/logo.png" data-dark="assets/Admin/images/logo/logo.png" width="120px">
        </a>
        <div class="button-show-hide">
            <i class="icon-chevron-left"></i>
        </div>

    </div>
    <div class="section-menu-left-wrap">
        <div class="center">
            <div class="center-item">
                <ul class="">
                    <li class="menu-item 
                    <?php
                    if (isset($_GET['act']) && $_GET['act'] == 'home') {
                        echo 'active';
                    }
                    ?>                                   
                    ">
                        <a href="<?= BASE_URL ?>?role=admin&act=home" class="">
                            <div class="icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2652 3.57566C12.1187 3.42921 11.8813 3.42921 11.7348 3.57566L5.25 10.0605V19.8748C5.25 20.0819 5.41789 20.2498 5.625 20.2498H9V16.1248C9 15.0893 9.83947 14.2498 10.875 14.2498H13.125C14.1605 14.2498 15 15.0893 15 16.1248V20.2498H18.375C18.5821 20.2498 18.75 20.0819 18.75 19.8748V10.0605L12.2652 3.57566ZM20.25 11.5605L21.2197 12.5302C21.5126 12.8231 21.9874 12.8231 22.2803 12.5302C22.5732 12.2373 22.5732 11.7624 22.2803 11.4695L13.3258 2.51499C12.5936 1.78276 11.4064 1.78276 10.6742 2.515L1.71967 11.4695C1.42678 11.7624 1.42678 12.2373 1.71967 12.5302C2.01256 12.8231 2.48744 12.8231 2.78033 12.5302L3.75 11.5605V19.8748C3.75 20.9104 4.58947 21.7498 5.625 21.7498H18.375C19.4105 21.7498 20.25 20.9104 20.25 19.8748V11.5605ZM13.5 20.2498H10.5V16.1248C10.5 15.9177 10.6679 15.7498 10.875 15.7498H13.125C13.3321 15.7498 13.5 15.9177 13.5 16.1248V20.2498Z" fill="#111111" />
                                </svg>
                            </div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item has-children
                    <?php
                    if (isset($_GET['act']) && $_GET['act'] == 'all-product' || $_GET['act'] == 'add-product') {
                        echo 'active';
                    }
                    ?>   
                    ">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-file-plus"></i></div>
                            <div class="text">Product</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL ?>?role=admin&act=all-product" class="">
                                    <div class="text">All Products</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL ?>?role=admin&act=add-product" class="">
                                    <div class="text">Add Product</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children
                        <?php
                        if (isset($_GET['act']) && ($_GET['act'] == 'all-category' || $_GET['act'] == 'add-category' || $_GET['act'] == 'show-category' || $_GET['act'] == 'update-category')) {
                            echo 'active';
                        }
                        ?>
                    ">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-layers"></i></div>
                            <div class="text">Category</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL  ?>?role=admin&act=all-category" class="">
                                    <div class="text">Category list</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL ?>?role=admin&act=add-category" class="">
                                    <div class="text">New category</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 1.875C0.5 0.839466 1.33947 0 2.375 0H19.625C20.6605 0 21.5 0.839466 21.5 1.875V3.375C21.5 4.29657 20.8351 5.06285 19.9589 5.22035L19.3733 15.1762C19.28 16.7619 17.9669 18 16.3785 18H5.62154C4.03311 18 2.71999 16.7619 2.62671 15.1762L2.04108 5.22035C1.16485 5.06285 0.5 4.29657 0.5 3.375V1.875ZM2.75659 3.75C2.75266 3.74997 2.74873 3.74997 2.74479 3.75H2.375C2.16789 3.75 2 3.58211 2 3.375V1.875C2 1.66789 2.16789 1.5 2.375 1.5H19.625C19.8321 1.5 20 1.66789 20 1.875V3.375C20 3.58211 19.8321 3.75 19.625 3.75H19.2552C19.2513 3.74997 19.2473 3.74997 19.2434 3.75H2.75659ZM3.54541 5.25L4.12412 15.0881C4.17076 15.8809 4.82732 16.5 5.62154 16.5H16.3785C17.1727 16.5 17.8292 15.8809 17.8759 15.0881L18.4546 5.25H3.54541ZM8.24976 8.25C8.24976 7.83579 8.58554 7.5 8.99976 7.5H12.9998C13.414 7.5 13.7498 7.83579 13.7498 8.25C13.7498 8.66421 13.414 9 12.9998 9H8.99976C8.58554 9 8.24976 8.66421 8.24976 8.25Z" fill="#111111" />
                                </svg>
                            </div>
                            <div class="text">Attributes</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="attributes.html" class="">
                                    <div class="text">Attributes</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="add-attributes.html" class="">
                                    <div class="text">Add attributes</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0001 2C8.34322 2 7.00008 3.34315 7.00008 5V5.75H13.0001V5C13.0001 3.34315 11.6569 2 10.0001 2ZM14.5001 5.75V5C14.5001 2.51472 12.4854 0.5 10.0001 0.5C7.51479 0.5 5.50008 2.51472 5.50008 5V5.75H3.51287C2.55332 5.75 1.74862 6.47444 1.64817 7.42872L0.385015 19.4287C0.268481 20.5358 1.13652 21.5 2.24971 21.5H17.7504C18.8636 21.5 19.7317 20.5358 19.6151 19.4287L18.352 7.42872C18.2515 6.47444 17.4468 5.75 16.4873 5.75H14.5001ZM13.0001 7.25H7.00008V8.66146C7.23023 8.86745 7.37508 9.16681 7.37508 9.5C7.37508 10.1213 6.8714 10.625 6.25008 10.625C5.62876 10.625 5.12508 10.1213 5.12508 9.5C5.12508 9.16681 5.26992 8.86745 5.50008 8.66146V7.25H3.51287C3.32096 7.25 3.16002 7.39489 3.13993 7.58574L1.87677 19.5857C1.85347 19.8072 2.02707 20 2.24971 20H17.7504C17.9731 20 18.1467 19.8072 18.1234 19.5857L16.8602 7.58574C16.8401 7.39489 16.6792 7.25 16.4873 7.25H14.5001V8.66146C14.7302 8.86746 14.8751 9.16681 14.8751 9.5C14.8751 10.1213 14.3714 10.625 13.7501 10.625C13.1288 10.625 12.6251 10.1213 12.6251 9.5C12.6251 9.16681 12.7699 8.86745 13.0001 8.66146V7.25Z" fill="#111111" />
                                </svg>
                            </div>
                            <div class="text">Order</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="oder-list.html" class="">
                                    <div class="text">Order list</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="oder-detail.html" class="">
                                    <div class="text">Order detail</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="oder-tracking.html" class="">
                                    <div class="text">Order tracking</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children
                      <?php
                        if (isset($_GET['act']) && ($_GET['act'] == 'all-user' || $_GET['act'] == 'add-user' || $_GET['act'] ==
                            'show-user' || $_GET['act'] == 'update-user')) {
                            echo 'active';
                        }
                        ?> 
                    
                    ">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">Users</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL ?>?role=admin&act=all-user" class="">
                                    <div class="text">All user</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?= BASE_URL ?>?role=admin&act=add-user" class="">
                                    <div class="text">Add new user</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="report.html" class="">
                            <div class="icon"><i class="icon-pie-chart"></i></div>
                            <div class="text">Report</div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="<?= BASE_URL ?>?role=admin&act=logout" class="">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.125 18.6875C8.125 18.903 8.0394 19.1097 7.88702 19.262C7.73465 19.4144 7.52799 19.5 7.3125 19.5H1.625C1.19402 19.5 0.780698 19.3288 0.475951 19.024C0.171205 18.7193 0 18.306 0 17.875V1.625C0 1.19402 0.171205 0.780698 0.475951 0.475951C0.780698 0.171205 1.19402 0 1.625 0H7.3125C7.52799 0 7.73465 0.0856026 7.88702 0.237976C8.0394 0.390349 8.125 0.597012 8.125 0.8125C8.125 1.02799 8.0394 1.23465 7.88702 1.38702C7.73465 1.5394 7.52799 1.625 7.3125 1.625H1.625V17.875H7.3125C7.52799 17.875 7.73465 17.9606 7.88702 18.113C8.0394 18.2653 8.125 18.472 8.125 18.6875ZM19.2623 9.17516L15.1998 5.11266C15.0474 4.9602 14.8406 4.87455 14.625 4.87455C14.4094 4.87455 14.2026 4.9602 14.0502 5.11266C13.8977 5.26511 13.812 5.47189 13.812 5.6875C13.812 5.90311 13.8977 6.10989 14.0502 6.26234L16.7263 8.9375H7.3125C7.09701 8.9375 6.89035 9.0231 6.73798 9.17548C6.5856 9.32785 6.5 9.53451 6.5 9.75C6.5 9.96549 6.5856 10.1722 6.73798 10.3245C6.89035 10.4769 7.09701 10.5625 7.3125 10.5625H16.7263L14.0502 13.2377C13.8977 13.3901 13.812 13.5969 13.812 13.8125C13.812 14.0281 13.8977 14.2349 14.0502 14.3873C14.2026 14.5398 14.4094 14.6255 14.625 14.6255C14.8406 14.6255 15.0474 14.5398 15.1998 14.3873L19.2623 10.3248C19.3379 10.2494 19.3978 10.1598 19.4387 10.0611C19.4796 9.9625 19.5006 9.85678 19.5006 9.75C19.5006 9.64322 19.4796 9.5375 19.4387 9.43886C19.3978 9.34023 19.3379 9.25062 19.2623 9.17516Z" fill="#111111" />
                                </svg>
                            </div>
                            <div class="text">Log out</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>