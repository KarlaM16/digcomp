<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Competencias</title>
    <!-- StyleSheets  -->
    <!-- Agregar estilos a l pagina mediante base url que encuentra la ubicacion del archivo  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashlite.css?ver=2.4.0'); ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?ver=2.4.0'); ?>">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="<?php echo base_url('assets/images/logo.png'); ?>" srcset="./images/logo2x.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="<?php echo base_url('assets/images/logo-dark.png'); ?>" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <?php if ($this->session->flashdata('error')!=null) : ?>
                                    <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
                                        <em class="icon ni ni-cross-circle"></em> <strong>Importante: </strong><?php echo $this->session->flashdata('error');?> <button class="close" data-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the CryptoLite panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Estudiar como funcionan los formularios y los distintots metodos -->
                                <form action="<?php echo base_url('home/auth'); ?>" method="post">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="html/pages/auths/auth-register-v2.html">Create an account</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; <?php echo date('Y'); ?> Competencias. Derechos Reservados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url('assets/js/bundle.js?ver=2.4.0'); ?>"></script>
    <script src="<?php echo base_url('assets/js/scripts.js?ver=2.4.0'); ?>"></script>

</html>