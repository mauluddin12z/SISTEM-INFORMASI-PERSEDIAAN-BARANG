<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>404 Error</title>
        <link href="<?= base_url('assets/css/styles.css')?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/templatesStyles.css')?>" rel="stylesheet" />
        <style type="text/css">
            body{
            background-image: url(<?= base_url("assets/img/bg-404.svg");?>);
            background-size: 500px 500px;
            background-color: #1E2328;
            }   
        </style>
    </head>
    <body class="bg-dark">
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column text-center position-absolute top-50 start-50 translate-middle">
                                    <img class="bg-dark img-error" src="<?=base_url('assets/img/404.svg')?>"/>
                                    <a style="text-decoration: none;" class="btn btn-warning m-4" href="<?= base_url()?>dashboard">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Back to Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
