<div id="barra_superior" class="app-header header-shadow bg-royal header-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto"></div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <!-- VERIFICACIÓN DE USUARIO LOGEADO -->
        <div id="barra_logueo" class="app-header__content">
            <?php
                if($usuario<>null){
                echo '<h2 style="color: white;">'.$nombre_empresa_activa.'</h2>';
                } else {
                    echo '<h2 style="color: white;"></h2>'; 
                }
            ?>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <button id="btnLogin" class="mb-2 mr-2 btn btn-info">
                                <?php
                                    if(isset($usuario)){
                                        echo strtoupper($usuario);

                                        $nombre_empresa_activa = $_SESSION['IdNombreEmpresa'];

                                        require 'conectar.php';
                                        
                                        $consulta = "SELECT tipo_usr FROM tbluser WHERE usr='$usuario'";
                                        $resultado = mysqli_query($conexion, $consulta);

                                        if($encontrado = mysqli_fetch_array($resultado)){
                                            $tipo_usuario = $encontrado['tipo_usr'];
                                        }

                                        echo '<span class="badge badge-light">'.$tipo_usuario.'</span>';
                                        
                                        $usr_activo = $usuario;
                                        $tip_usr_activo = $tipo_usuario;
                                        }
                                    else {
                                        echo ('LOGOUT');
                                    }
                                ?>    
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'menu_lateral.php' ?>
</div>