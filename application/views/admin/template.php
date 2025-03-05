<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?> | CGANT</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Dashboardkit is trending dashboard template made using Bootstrap 5 design framework. Dashboardkit is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="Codedthemes">
    <!-- [Favicon] icon -->
    <link rel="icon" href="<?= base_url('assets/img/web/logo.png') ?>" type="image/x-icon">
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700..700&display=swap" rel="stylesheet">
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/fonts/phosphor/duotone/style.css">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="<?= base_url('template/client/extensions/sweetalert2/sweetalert2.min.css') ?>">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-header-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="pc-loader">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="" class="b-brand text-primary text-center">
                    <img src="<?= base_url('assets/img/web/logo.png') ?>" alt="logo image" class="logo-lg" width="50px">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <!-- <li class="pc-item pc-caption"><label>Navigation</label></li> -->
                    <li class="pc-item">
                        <a href="<?= base_url('admin') ?>" class="pc-link">
                            <span class="pc-micon"><i class="material-icons-two-tone">home</i> </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>


                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <i class="material-icons-two-tone">list_alt</i></span>
                            <span class="pc-mtext">Master</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>

                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="<?= base_url('admin/master_jurusan') ?>">Master
                                    Jurusan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper">
            <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse"><a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i
                                class="material-icons-two-tone">menu</i></a></li>
                    <li class="pc-h-item pc-sidebar-popup"><a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i
                                class="material-icons-two-tone">menu</i></a></li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false"><img
                                src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> <span
                                class="ms-2"><span class="user-name">Joseph William</span> <span
                                    class="user-desc">Administrator</span></span></a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h4 class="m-0">Profile</h4>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 225px)">
                                    <ul class="list-group list-group-flush w-100">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0"><img src="../assets/images/user/avatar-2.jpg"
                                                        alt="user-image" class="wid-50 rounded-circle"></div>
                                                <div class="flex-grow-1 mx-3">
                                                    <h5 class="mb-0">Carson Darrin</h5>
                                                    <a class="text-sm link-secondary"
                                                        href="mailto:carson.darrin@company.io">carson.darrin@company.io</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="dropdown-item"><span class="d-flex align-items-center"><i
                                                        class="fas fa-user-edit"></i> <span>Edit Profile</span>
                                                </span></a>

                                            <a href="#" class="dropdown-item"><span class="d-flex align-items-center"><i
                                                        class="fas fa-key"></i> <span>Edit Password</span>
                                                </span></a>

                                            <a href="#" class="dropdown-item"><span class="d-flex align-items-center"><i
                                                        class="fas fa-sign-out-alt"></i> <span>Keluar</span>
                                                </span></a>



                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <?php $this->load->view($view) ?>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col my-1">
                    <p class="m-0">&copy 2025 team </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Required Js -->

    <script src="<?= base_url('template/admin') ?>/js/plugins/popper.min.js"></script>
    <script src="<?= base_url('template/admin') ?>/js/plugins/simplebar.min.js"></script>
    <script src="<?= base_url('template/admin') ?>/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url('template/admin') ?>/js/fonts/custom-font.js"></script>
    <script src="<?= base_url('template/admin') ?>/js/pcoded.js"></script>
    <script src="<?= base_url('template/admin') ?>/js/plugins/feather.min.js"></script>


    <script src="<?= base_url('template/client') ?>/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url('template/client/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
    const base_url = '<?= base_url() ?>'

    function loading_animation() {
        Swal.fire({
            title: 'Loading..',
            html: 'Please wait..',
            timerProgressBar: true,
            draggable: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            },
        })
    }

    function regenerate_token(token) {
        const c_name = '<?= $this->security->get_csrf_token_name() ?>'
        $('input[name="' + c_name + '"]').val(token)
    }

    function error_alert(msg) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: msg
        })
    }

    function error_alert_reloaded(msg) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: msg
        }).then((res) => {
            window.location.reload()
        })
    }

    function success_alert(msg) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: msg
        })
    }

    function success_alert_reloaded(msg) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: msg
        }).then((res) => {
            window.location.reload()
        })
    }
    </script>
    <?php
        if(isset($js)){
            foreach($js as $j){
                echo '<script src="'.base_url('assets/js/admin/').$j.'"></script>';
            }
        }
    ?>


    <script>
    layout_change('light');
    layout_sidebar_change('dark');
    change_box_container('false');
    layout_caption_change('true');
    layout_rtl_change('false');
    preset_change('preset-1');
    </script>
</body>

</html>