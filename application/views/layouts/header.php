<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Competencias Digitales. Área 5</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashlite.css?ver=2.4.0'); ?>"> <!--llamamos a los estilos de la plantilla-->
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/css/theme.css?ver=2.4.0'); ?>"> <!--llamamos a los estilos de la plantilla desde la carpeta assets-->
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <p>
                            <font size=2 color="blue">RESOLUCIÓN DE PROBLEMAS</font>
                        </p>
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                            <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">General</h6>
                                </li><!-- .nk-menu-heading -->

                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('dashboard/index'); ?>" class="nk-menu-link"> <!-- la direcccion por defecto al estar en la pagina-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Principal</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item">

                                    <a href="<?php echo site_url('empleados/index'); ?>" class="nk-menu-link"> <!--al aplastar empleados nos manda a la pagina empleados/indes-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Empleados</span>
                                    </a>
                                </li><!-- .nk-menu-item -->


                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Información General</h6>
                                </li><!-- .nk-menu-heading -->

                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('empleados/index'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Encuesta</span>
                                    </a>

                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('empleados/index'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Instituciones</span>
                                    </a>

                                    <a href="<?php echo site_url('empleados/index'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Competencias Digitales</span>
                                    </a>

                                    <a href="<?php echo site_url('empleados/index'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Área 5</span>
                                    </a>
                                </li>

                            
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Administrador</h6>
                                </li><!-- .nk-menu-heading -->

                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('usuarios/index'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Usuarios</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                              
                                <img class="logo-light logo-img logo-img-lg" src="<?php echo base_url('assets/logo-utpl.png'); ?>" srcset="./images/logo-utpl.png 4x" alt="logo-utpl.png"> <!--llamando logos de la carpeta assets-->
                                <img class="logo-dark logo-img logo-img-lg" src="<?php echo base_url('assets/images/logo-utpl.png'); ?>" srcset="./images/logo-utpl.png 4x" alt="logo-utpl.png">
                                
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">

                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status"><?php echo $this->session->userdata('role'); ?></div>
                                                    <div class="user-name dropdown-indicator"><?php echo $this->session->userdata('name'); ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <!--informacion segun la cuenta del usuario en el que estemos-->
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php echo $this->session->userdata('name'); ?></span>
                                                        <span class="sub-text"><?php echo $this->session->userdata('email'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">

                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Modo Nocturno</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo base_url('home/logout'); ?>"><em class="icon ni ni-signout"></em><span>Cerrar Sesión</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notificaciones</span>
                                                <a href="#">Marcar como leído</a>
                                            </div>
                                            <div class="dropdown-foot center">
                                                <a href="#">Ver todo</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">