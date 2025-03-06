<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGANT UNIVERSITAS JEMBER | LOGIN PAGE</title>

    <link rel="icon" href="<?= base_url('assets/img/web/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('template/client/compiled/css/app.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">


    <script src="<?= base_url('template/client') ?>/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url('template/client/compiled/js/app.js') ?>"></script>
    <style>
    * {
        font-family: "Ubuntu", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    body {
        background-color: #cccde3
    }

    @keyframes color-change-2x {
        0% {
            background: #19dcea;
        }

        100% {
            background: #b22cff;
        }
    }

    @keyframes text-focus-in {
        0% {
            filter: blur(12px);
            opacity: 0;
        }

        100% {
            filter: blur(0px);
            opacity: 1;
        }
    }


    #btn-submit {
        animation: color-change-2x 2s linear infinite alternate both;
    }

    #banner-image-lg {
        background-image: url('<?= base_url('assets/img/web/login.svg') ?>');
        background-attachment: fixed;
        height: 90vh;
    }

    #form_login {
        animation: text-focus-in .6s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
    }


    /* lg hight */
    @media screen and (min-width: 991px) {}


    /* lg-down */
    @media screen and (max-width: 990px) {
        #banner-image-lg {
            display: none;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8" id="banner-image-lg">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <?= form_open('validasi_login', 'id="form_login"') ?>
                <div class="text-center">
                    <img src="<?= base_url('assets/img/web/logo.png') ?>" alt="logo" style="width: 80px" id="logo">
                    <h4 class="mt-3">CGANT UNIVERSITAS JEMBER</h4>
                    <P class="mb-3">Login Page</P>

                    <div id="alert_container" class="mb-3">

                    </div>

                </div>
                <div class="form-group my-2">
                    <label for="nip">NIP</label>
                    <input type="text" name="account_nip" id="nip" class="form-control p-3">
                </div>
                <div class="form-group my-2">
                    <label for="password">Password</label>
                    <input type="password" name="account_pass" id="password" class="form-control p-3">
                </div>
                <button id="btn-submit" class="btn w-100 my-2 p-2 text-white" type="submit">
                    Login
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <script>
    function regenerate_token(token) {
        const c_name = "<?= $this->security->get_csrf_token_name() ?>";
        $('input[name="' + c_name + '"]').val(token);
    }
    </script>
    <script src="<?= base_url('assets/js/login.js') ?>"></script>
</body>

</html>