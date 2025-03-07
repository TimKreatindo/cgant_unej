<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | ACCESS DENIED</title>

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
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-5 col-sm-5 col-md-4 col-lg-4">
                <img src="<?= base_url('assets/img/web/403.gif') ?>" alt="not-allowed" class="w-100">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 text-center">
                <b style="font-size: 10rem" class="text-primary">403</b> <br>
                <span>Your access is not allowed</span>
            </div>
        </div>
    </div>

</body>

</html>