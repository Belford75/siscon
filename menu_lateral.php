<div class="app-main">
    <div class="app-sidebar sidebar-shadow bg-royal sidebar-text-light">
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu metismenu">
                    <li class="app-sidebar__heading">SISTEMA</li>
                    <li>
                        <a data-toggle="modal" data-target=".modal-login">
                            <i class="metismenu-icon pe-7s-id"></i>
                            Iniciar sesión
                        </a>
                    </li>
                    <li>
                        <a onclick="MensajeCerrarSesion()" href="cerrar_sesion.php">
                            <i class="metismenu-icon pe-7s-delete-user"></i>
                            Cerrar sesión
                        </a>
                    </li>
                    <li class="app-sidebar__heading">CONFIGURACIÓN</li>
                    <li>                                    
                        <a href="#">
                            <i class="metismenu-icon pe-7s-network"></i>
                            Empresas
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <?php
                                    if($usuario){
                                        if($usr_activo <> Null && $tip_usr_activo == 'ADM'){
                                            echo ('<a data-toggle="modal" data-target=".modal-new-empresa">');
                                            //echo ('<a data-toggle="modal" href="frm_empresa.php">');
                                        }
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Nueva empresa
                                </a>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".modal-empresa-reg">');
                                    }
                                ?>
                                    <i class="metismenu-icon">
                                    </i>Empresas registradas
                                </a>
                            </li>                                        
                        </ul>
                    </li>  
                    <li>   
                        <?php
                            if($usuario){
                                if(isset($usr_activo) <> Null && $tip_usr_activo == 'ADM'){
                                    echo ('<a data-toggle="modal" data-target=".modal-usr">');
                                }
                            }
                        ?>                                                                 
                            <i class="metismenu-icon pe-7s-users"></i>
                            Usuarios
                        </a>                                    
                    </li>                         
                    <li>
                        <?php
                            if(isset($usuario)){
                                echo ('<a data-toggle="modal" data-target=".modal-cambio">');
                            }
                        ?> 
                            <i class="metismenu-icon pe-7s-cash"></i>
                            Tipo de cambio
                        </a>
                    </li>
                    <li>
                        <?php
                            if($usuario){
                                if(isset($usr_activo) <> Null && $tip_usr_activo == 'ADM'){
                                    echo ('<a data-toggle="modal" data-target=".modal-documentos">');
                                }
                            }
                        ?> 
                            <i class="metismenu-icon pe-7s-folder"></i>
                            Documentos
                        </a>
                    </li>
                    <li class="app-sidebar__heading">CONTABILIDAD</li>
                    <li>                                    
                        <a href="#">
                            <i class="metismenu-icon pe-7s-copy-file"></i>
                            Cuentas
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <?php
                                    if(isset($usr_activo) <> Null && $tip_usr_activo == 'ADM'){
                                        echo ('<a data-toggle="modal" data-target=".modal-plan-cuentas">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Plan de Cuentas
                                </a>
                            </li>
                            <ul>
                                <li>
                                    <?php
                                        if(isset($usr_activo) <> Null && $tip_usr_activo == 'ADM'){
                                            echo ('<a data-toggle="modal" data-target=".Auxiliar">');
                                        }
                                    ?>
                                        <i class="metismenu-icon"></i>
                                        Cuentas Auxiliares
                                    </a>
                                </li>
                            </ul>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-copy-file"></i>
                                    Listados por pantalla
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul class="mm-collapse">
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".CBcta2">');
                                    }
                                ?>
                                    <i class="metismenu-icon pe-7s-note2"></i>
                                    Plan de Cuentas
                                </a>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".ListaAux">');
                                    }
                                ?>
                                    <i class="metismenu-icon pe-7s-paperclip"></i>
                                    Cuentas Auxiliares
                                </a>
                                </ul>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon">
                                    </i>Consulta de Saldos
                                </a>
                            </li>                                        
                        </ul>
                    </li>
                    <li>                                    
                        <a href="#">
                            <i class="metismenu-icon pe-7s-pen"></i>
                            Libro Diario
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                    <!-- VERIFICA QUE SE HAYA INTRODUCIDO EL TIPO DE CAMBIO -->
                                <?php
                                require 'consulta_cambio.php';

                                if(isset($usuario)){
                                    if(!isset($cambio)){
                                        echo '<script language="javascript">';
                                        echo 'SinTC();';
                                        echo '</script>';
                                    }
                                    #echo ('<a data-toggle="modal" data-target=".modal-ingresos">');
                                    echo ('<a href="frm_ingresos.php">');
                                }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Ingresos
                                </a>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".modal-egresos">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Egresos
                                </a>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".modal-traspaso">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Traspasos
                                </a>
                            </li>  
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a data-toggle="modal" data-target=".modal-ajuste">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Ajustes
                                </a>
                            </li>                                      
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="metismenu-icon pe-7s-print"></i>
                            Listados de Trabajo
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Mayores
                                </a>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Sumas y Saldos
                                </a>
                            </li>                                                                              
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="metismenu-icon pe-7s-graph2"></i>
                            Estados Financieros
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse">
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Balance General
                                </a>
                            </li>
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Pérdidas y Ganancias
                                </a>
                            </li>   
                            <li>
                                <?php
                                    if(isset($usuario)){
                                        echo ('<a href="#">');
                                    }
                                ?>
                                    <i class="metismenu-icon"></i>
                                    Estado de Flujo de Efectivo
                                </a>
                            </li>                                                                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>      
    <!-- Barra de presentación -->      
    <div class="app-main__outer">
        <div class="app-main__inner_principal">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading" id="caja_tc">
                        <div>SISCON
                            <div class="page-title-subheading" style="color: black;">Tecnología a su Servicio.
                                <a class="btn-warning" style="color: black;"><i>T/C: </i>
                                    <?php 
                                        if(isset($cambio)){
                                            echo ''.$cambio;
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>