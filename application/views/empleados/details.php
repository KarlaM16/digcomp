<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Información Personal</h4><!--llenamos la tabla básico de cada empleado con los datos de Empleado_model funcion getone y getall-->
                            <div class="nk-block-des">
                                <p>Información Basica, obtenida en la encuesta del AREA 5.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <!--Empleado_model-->
                <div class="nk-block">
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title">Básico</h6>
                        </div>
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Global ID</span>
                                <span class="data-value"><?php echo $empleado->global_id; ?></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Género</span>
                                <span class="data-value"><?php echo $empleado->genero;?></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Correo Electrónico</span>
                                <span class="data-value"><?php echo ($empleado->email!=null)?$empleado->email:'Sin Correo Electrónico';?></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Edad</span>
                                <span class="data-value text-soft"><?php echo $empleado->edad; ?></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Fecha de Entrevista</span>
                                <span class="data-value"><?php echo 'Día :'. date('d-M-Y',strtotime($empleado->creation_time)).' Hora: '. date('H:i:s',strtotime($empleado->creation_time));?></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                            <div class="data-col">
                                <span class="data-label">Formación</span>
                                <span class="data-value"><?php echo $empleado->formacion;?></span>
                            </div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                </div><!-- .nk-block -->
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                <span><?php echo $empleado->empleado_id; ?></span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text"><small><?php echo $empleado->global_id;?></small></span>
                                <span class="sub-text"><?php echo ($empleado->email!=null)?$empleado->email:'Sin Información'; ?></span>
                            </div>
                            <div class="user-action">
                                
                            </div>
                        </div><!-- .user-card -->
                    </div><!-- .card-inner -->
                   
                    <div class="card-inner p-0">
                        <ul class="link-list-menu"> <!--menu refereenciando a los items que pueede seleccionar para empleado-->
                            <li><a class="active" href="<?php echo base_url('empleados/details/'.$empleado->global_id); ?>"><em class="icon ni ni-user-fill-c"></em><span>Información Personal</span></a></li>
                            <li><a href="<?php echo base_url('empleados/competencia/'.$empleado->global_id); ?>"><em class="icon ni ni-bell-fill"></em><span>Competencias</span></a></li>
                            <li><a href="<?php echo base_url('empleados/preguntas/'.$empleado->global_id); ?>"><em class="icon ni ni-activity-round-fill"></em><span>Preguntas</span></a></li>
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->