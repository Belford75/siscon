<?php
    require 'recursos.php';
?>

<style>
    *{
        margin: 0;
        padding: 0;
    }
    #contenedor{
        width: 100%;
        height: 100%;
    }
    #barra_superior{
        width: 100%;
        height: 60px;
    }
    #barra_logueo{
        width: 100%;
        height: 60px;
    }
    #caja_tc{
        width: 100%;
        height: 70px;
        display: inline-flex;
        opacity: 80%;
        background-color: whitesmoke;
    }
    .caja {
        width: 600px;
        height: 380px;
        position: fixed;
        display: block;
    }

    .cuerpoCaja {
        width: 100%;
        height: 90%;
        display: inline-flex;
        background-color: whitesmoke;
    }  
    .modal { overflow: hidden !important; }
    .sombra {box-shadow: 4px 4px 8px #999;} 
</style>

<!doctype html>
<html lang="es">

<body>
    <div id="contenedor" class="app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div id="contenido">
            <div id="formularios"></div>
        </div>
    </div>

    <!-- FORMULARIO DE INICIO DE SESIÓN -->
    <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-id" id="ModalInicioSes"> INICIO DE SESIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_usr" action="validar_usr.php" method="post">
                        <div class="card-body">
                            <div class="tab-content">
                                <div  class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div>
                                                    <input autocomplete="off" type="text" name="usr" 
                                                        id="Idusr" style="text-transform:uppercase;" 
                                                        placeholder="Usuario" autocomplete="off"
                                                        class="form-control" required>
                                                </div>
                                                <br>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"></div>
                                                    <input required name="contraseña" id="Idcontraseñá"
                                                        placeholder="Contraseña" autocomplete="off" 
                                                        type="password" class="form-control" required>
                                                </div>
                                                <br>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"></div>
                                                    <select input name="IdNombreEmpresa" type="select"
                                                        id="IdNombreEmpresa" required
                                                        onChange="CapuraValor()"
                                                        class="custom-select">
                                                        <?php
                                                            require "conectar.php";
                                                            $sql="SELECT * FROM tblempresa";
                                                            $resul=mysqli_query($conexion,$sql);
                                                        ?>
                                                            <option value="" disabled selected>Elija una empresa...</option>
                                                            <?php
                                                                while($mostrar=mysqli_fetch_array($resul)){
                                                            ?>
                                                                <option value='<?php echo $mostrar['nombre'] ?>'><?php echo $mostrar['nombre'] ?></option>
                                                            <?php
                                                            
                                                                }
                                                            ?>
                                                    </select>
                                                    <script>
                                                        function CapuraValor(nom){
                                                            var nombD = document.getElementById("IdNombreEmpresa");
                                                            //console.log(nombD.value);
                                                            return nombD.value;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="mt-1 btn btn-primary">Autenticar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE TIPO DE CAMBIO -->
    <div class="modal fade modal-cambio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-cash" id="ModalCambio"> Tipo de Cambio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_usr" action="grabar_tipo_cambio.php" method="POST">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body" autocomplete="off">
                                            <div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Fecha</span></div>
                                                    <input name="fecha" type="date" class="form-control" required>
                                                </div>
                                                <br>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"><span class="input-group-text">Cambio</span></div>
                                                    <input required autocomplete="off" name="cambio" id="Idcambio" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mt-1 btn btn-primary">Grabar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE USUARIOS -->
    <div class="modal fade modal-usr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         style="margin-top: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title pe-7s-users" id="ModalUsuario"> Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="container mt-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <!-- Pestaña de registro de usuarios -->
                                    <form action="insertar_usr.php" method="POST">
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend"><span class="input-group-text">Alias</span></div>
                                            <input type="text" style="text-transform:uppercase;" id="IdAusr" name="usr"
                                            autocomplete="off" class="form-control" required autofocus>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Nombre</span></div>
                                            <input type="text" class="form-control" id="Idnombre" name="nombre" 
                                            autocomplete="off" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Contraseña</span></div>
                                            <input type="password" class="form-control" id="Idcontraseña" name="contraseña" 
                                            autocomplete="off" required>
                                            
                                            <img src="assets/images/mostrar.png" id="btnPass" style="width: 30px; cursor: pointer;">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Tipo usr</span></div>
                                            <select name="tipo_usr" type="select" id="IdTipUsr" class="custom-select">
                                                <option value='' disabled selected>Elija una opción...</option>
                                                <option value="ADM">Administrador</option>
                                                <option value="DIG">Digitador</option>                                        
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mt-1 btn btn-primary">Grabar</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Pestaña de listado de usuarios -->
                                <div class="col-md-7">
                                    <table class="table" >
                                        <thead class="table-success table-striped" >
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Alias</th>
                                                <th>Acceso</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                require "conectar.php";
                                                $sql="SELECT * FROM tbluser";
                                                $resul=mysqli_query($conexion,$sql);
                                                
                                                while($mostrar=mysqli_fetch_array($resul)){
                                                ?>
                                                    <tr>
                                                        <th><?php echo $mostrar['cod_usr'] ?></th>
                                                        <td><?php echo $mostrar['nombre'] ?></td>
                                                        <td><?php echo $mostrar['usr'] ?></td>
                                                        <td><?php echo $mostrar['tipo_usr'] ?></td>
                                                        <th><a href="actualizar_usr.php?cod_usr=<?php echo $mostrar['cod_usr'] ?>" title="Editar Usuario" class="btn btn-info pe-7s-pen"></a></th>
                                                        <th><a href="verifica_mov_usr.php?cod_usr=<?php echo $mostrar['cod_usr'] ?>" title="Eliminar Usuario" class="btn btn-danger pe-7s-trash"></a></th> 
                                                    </tr>
                                                <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    var boton = document.getElementById('btnPass');
                                    var input = document.getElementById('Idcontraseña');

                                    boton.addEventListener('click', montrarContraseña);

                                    function montrarContraseña(){
                                        if(input.type == "password"){
                                            input.type = "text";
                                            setTimeout("ocultarPass()", 2000);   
                                        } else{
                                            input.type = "password";
                                        }
                                    }
                                    function ocultarPass(){
                                        input.type = "password";
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE NUEVA EMPRESA -->
    <div class="modal fade modal-new-empresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
         style="margin-top: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-network" id="ModalNuevaEmp"> Nueva Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                <form action="insertar_empresa.php" method="POST">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <input name="nombre" id="IdNombre" autocomplete="off"
                                                            placeholder="Nombre de la Empresa" type="text"
                                                            class="form-control" required autofocus>
                                                        </div> 
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <input name="direccion" id="IdDirec" autocomplete="off"
                                                            placeholder="Dirección de la Empresa" type="text"
                                                            class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <input name="telefono" id="IdTelf" autocomplete="off"
                                                                placeholder="Teléfono" type="text"
                                                                class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="nit" id="IdNit" autocomplete="off"
                                                            placeholder="Nro de NIT" type="text"
                                                            class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="sigla" id="IdSigla" autocomplete="off"
                                                            placeholder="Sigla" type="text" style="text-transform:uppercase;" 
                                                            onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                            class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <select required name="moneda" type="select" id="IdTipMon" class="custom-select">
                                                                <option value='' disabled selected>Tipo de moneda...</option>
                                                                <option value="BOL">Bolivianos</option>
                                                                <option value="USD">Dólares</option>    
                                                                <option value="AMB">Ambas</option>                                    
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="inicio_gest" id="Idinicio_gest" autocomplete="off"
                                                            placeholder="Inicio de gestión" type="text"
                                                            class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="mt-1 btn btn-primary">Grabar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE DOCUMENTOS -->
    <div class="modal fade modal-documentos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
         style="margin-top: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-folder" id="ModalDocumentos"> Propiedades del Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="container mt-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <!-- Pestaña de registro de documentos -->
                                    <form action="insertar_doc.php" method="POST">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="position-relative form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select required name="tipo_doc" type="select" id="tipo_doc" class="custom-select">
                                                                    <option value='' disabled selected>Tipo de Documento...</option>
                                                                    <option value="INGRESO">INGRESO</option>
                                                                    <option value="EGRESO">EGRESO</option>  
                                                                    <option value="TRASPASO">TRASPASO</option>
                                                                    <option value="AJUSTE">AJUSTE</option>
                                                                </select>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div id="toastTypeGroup">
                                                                    <h6>Numeración</h6>
                                                                    <div class="form-check">
                                                                        <input type="radio" name="numeracion" class="form-check-input" value="Automático" aria-checked="true">
                                                                        <label class="form-check-label" id="numeracion">Automático (Proporcionado por el Sistema)</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" name="numeracion" class="form-check-input" value="Manual" >
                                                                        <label class="form-check-label" id="numeracion">Manual (Proporcionado por el Usuario)</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mt-1 btn btn-primary">Grabar</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Pestaña de listado de usuarios -->
                                <div class="col-md-5">
                                    <table class="table" >
                                        <thead class="table-success table-striped" >
                                            <tr>
                                                <th>Documento</th>
                                                <th>Numeración</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                require "conectar.php";
                                                $sql="SELECT tipo_doc, numeracion FROM tblnumeracion";
                                                $resul=mysqli_query($conexion,$sql);
                                                
                                                while($mostrar=mysqli_fetch_array($resul)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $mostrar['tipo_doc'] ?></td>
                                                        <td><?php echo $mostrar['numeracion'] ?></td>
                                                        <th><a href="actualizar_doc.php?tipo_doc=<?php echo $mostrar['tipo_doc'] ?>" title="Editar documento" class="btn btn-info pe-7s-pen"></a></th>
                                                    </tr>
                                                <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EMPRESAS REGISTRADAS -->
    <div class="modal fade modal-empresa-reg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
         style="margin-top: 5%; margin-left: 5%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-network" id="ModalEmpresa"> Empresas registradas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Formulario de empresas -->
                <form class="">
                    <div class="card-body">
                        <div class="col-md-18">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Cod</th>
                                        <th>Empresa</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>NIT</th>
                                        <th>Sigla</th>
                                        <th>Moneda</th>
                                        <th>Init. Gest.</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        require "conectar.php";
                                        $sql="SELECT * FROM tblempresa";
                                        $resul=mysqli_query($conexion,$sql);
                                        
                                        while($mostrar=mysqli_fetch_array($resul)){
                                        ?>
                                            <tr>
                                                <th><font size="2"><?php echo $mostrar['cod_empresa'] ?></font></th>
                                                <td><font size="2"><?php echo $mostrar['nombre'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['direccion'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['telefono'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['nit'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['sigla'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['moneda'] ?></font></td>
                                                <td><font size="2"><?php echo $mostrar['inicio_gest'] ?></font></td>
                                                <th><a href="actualizar_emp.php?cod_empresa=<?php echo $mostrar['cod_empresa'] ?>" title="Editar Empresa" class="btn btn-info pe-7s-pen"></a></th>
                                                <th><a href="verifica_mov_emp.php?cod_empresa=<?php echo $mostrar['cod_empresa'] ?>" title="Eliminar Empresa" class="btn btn-danger pe-7s-trash"></a></th> 
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FORMULARIO REGISTRO AUXILIAR -->
    <div id="reg_aux" class="caja modal sombra show" tabindex="-1" 
        style="display: none; max-width: 50%; height: 490px; margin-left: 35%; margin-top: 10%;">
        <div class="modal-header" style="scroll-margin: inherit;">
            <h5 class="title pe-7s-next-2"> Registro en el Auxiliar</h5>
        </div>
        <div class="cuerpoCaja">
            <div class="card-body" > 
                <div class="row">
                    <div class="col-md-12">
                        <div style="width: 45%; float: right;">
                            <a onclick="agregar_fila_aux()" class="btn btn-info fas fa-plus" title="Añadir fila" style="color: white;"></a>
                            <a onclick="abrir_frm_aux()" class="btn btn-info fas pe-7s-chat" title="Mostrar Cuentas Auxiliares" style="color: white;"></a>
                        </div>
                        <div>
                                <div style="width: 100%; height: 100%;">
                                    <!-- Encabezado -->
                                    <a id="txtCta"></a><br>
                                    <a id="txtDesc"></a><br>
                                    <a id="txtRef"></a><br>
                                    <a id="txtFecha"></a><br>
                                    <br>
                                    <div style="display: none;">
                                        <input id="cuenta">
                                        <input id="descri">
                                        <input id="refere">
                                        <input id="fechar">
                                    </div>
                                    <!-- DETALLE DE ASIENTO AUXILIAR-->
                                    <div class="col-lg-8" style="width: 100%; height: 100%;">
                                        <div class="main-card mb-6 card">
                                            <div class="card-body" style="min-height: max-content; background-color: #dcdde1;">
                                                <div style="height: 170px; width: 700px;" class="scroll-area-md">
                                                    <div class="table-responsive">
                                                        <table id="glsIngresoAux">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th style="width: 60px;">Código</th>
                                                                    <th style="width: 200px;">Glosa</th>
                                                                    <th style="width: 90px;">D E B E</th>
                                                                    <th style="width: 90px;">H A B E R</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tblGlosaAux">
                                                                <tr>
                                                                    <td><input class="form text-rigth ctax" type="text" style="width: 60px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input class="form text-rigth glosax" type="text" style="width: 200px; background-color: #dcdde1; border: none;"></td> 
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth debe_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth haber_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input class="form text-rigth ctax" type="text" style="width: 60px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input class="form text-rigth glosax" type="text" style="width: 200px; background-color: #dcdde1; border: none;"></td> 
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth debe_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth haber_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input class="form text-rigth ctax" type="text" style="width: 60px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input class="form text-rigth glosax" type="text" style="width: 200px; background-color: #dcdde1; border: none;"></td> 
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth debe_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth haber_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input class="form text-rigth ctax" type="text" style="width: 60px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input class="form text-rigth glosax" type="text" style="width: 200px; background-color: #dcdde1; border: none;"></td> 
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth debe_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td>
                                                                    <td><input onchange="SumarColumnaAux()" class="form text-rigth haber_aux" style="width: 90px; background-color: #dcdde1; border: none;"></td></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot id="tblTotalesAux" BGCOLOR="#bdc3c7">
                                                                <th class="form text-rigth ct" style="width: 60px;"></td>
                                                                <th class="form text-center gl" style="width: 200px;">TOTALES</th>
                                                                <th class="form text-rigth tot_debe_aux" style="width: 90px;"></th>
                                                                <th class="form text-rigth tot_haber_aux" style="width: 90px;"></th>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <script text="text/javascript">
                                                        function SumarColumnaAux() {
                                                            var sum_debe_aux = 0;
                                                            var sum_haber_aux = 0;
                                                            $('.debe_aux').each(function() {
                                                                sum_debe_aux += Number($(this).val());
                                                            });

                                                            $('.haber_aux').each(function() {
                                                                sum_haber_aux += Number($(this).val());
                                                            });
                                                                        
                                                            $('#glsIngresoAux tfoot tr th').eq(2).html(sum_debe_aux);
                                                            $('#glsIngresoAux tfoot tr th').eq(3).html(sum_haber_aux);
                                                        }

                                                        function agregar_fila_aux(){
                                                            $('#tblGlosaAux')
                                                            .append(
                                                                $('<tr>')
                                                                .append(
                                                                    $('<td>')
                                                                    .append(
                                                                        $('<input class="form text-rigth cta">').attr('type','text').attr('style','width: 60px; background-color: #dcdde1; border: none;')
                                                                    ),
                                                                    $('<td>')
                                                                    .append(
                                                                        $('<input class="form text-rigth glosa">').attr('type','text').attr('style','width: 200px; background-color: #dcdde1; border: none;')
                                                                    ),
                                                                    $('<td>')
                                                                    .append(
                                                                        $('<input onchange="SumarColumnaAux()" class="form text-rigth debe_aux">').attr('type','text').attr('style','width: 90px; background-color: #dcdde1; border: none;')
                                                                    ),
                                                                    $('<td>')
                                                                    .append(
                                                                        $('<input onchange="SumarColumnaAux()" class="form text-rigth haber_aux">').attr('type','text').attr('style','width: 90px; background-color: #dcdde1; border: none;')
                                                                    )
                                                                )
                                                            );
                                                        }
                                                        function cerrar_modal_aux(){
                                                            document.getElementById('reg_aux').style.display="none";
                                                        }

                                                        $(document).ready(() => {
                                                            $('tbody tr').hover(function() {
                                                                $(this).find('td').addClass('resaltar');
                                                            }, function() {
                                                                $(this).find('td').removeClass('resaltar');
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer col-lg-8" style="width: 100%;">
                                        <button onclick="grabar_cerrar()" class="btn btn-primary pe-7s-check"> Aceptar</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LISTADO DE PLAN DE CUENTAS -->
    <div id="cuentas" class="caja modal sombra show" tabindex="-1" style="display: none; margin-left: 60%; margin-top: 13%;">
        <div class="modal-header">
            <h5 class="title pe-7s-note2"> Listado de Cuentas</h5>
        </div>
        <div class="cuerpoCaja">
            <div class="card-body" > 
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div>
                                <input class="form-control md-2 light-table-filter" data-table="order-table" type="text" 
                                autocomplete="off" placeholder="Buscar...">
                            </div>
                            <div class="scroll-area-md">
                                <table style="width: 100%; padding: 1px;" class="order-table">
                                    <thead class="table-success">
                                        <tr>
                                            <th style="width: 90px;">Cta</th>
                                            <th style="width: 200px;">Descripción</th>
                                            <th style="width: 10px;">Tipo</th>
                                            <th style="width: 15px;">Clase</th>
                                            <th style="width: 5px;">M.</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            require "conectar.php";
                                            
                                            $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                            $res = mysqli_query($conexion, $cons_emp);

                                            $emp_id = mysqli_fetch_array($res);
                                            $cod_empresa = $emp_id['cod_empresa'];

                                            $sql="SELECT * FROM tblplancta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                            $resul=mysqli_query($conexion,$sql);

                                            while($mostrar=mysqli_fetch_array($resul)){
                                            ?>
                                                <tr>
                                                    <td><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                    <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                    <td><font size="2"><?php echo $mostrar['tipo'] ?></font></td>
                                                    <td><font size="2"><?php echo $mostrar['clase'] ?></font></td>
                                                    <td><font size="2"><?php 
                                                            if($mostrar['moneda'] == 'Bolivianos'){
                                                                echo 'Bs.';
                                                            }else{ if($mostrar['moneda'] == 'Dólares'){
                                                                echo '$us';
                                                            }else{
                                                                echo '';
                                                            }
                                                            }
                                                        ?></font>
                                                    </td>
                                                    <td><a></a></td>
                                                    <td><a onclick="copiar_cuenta('<?php echo $mostrar['cta'] ?>')" title="Copiar Cuenta" class="btn btn-info pe-7s-copy-file"></a></td>
                                                </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LISTADO DE CUENTAS AUXILIARES -->
    <div id="ListAux" class="caja modal sombra bootstrap-dialog" tabindex="-1"
        style="display: none; margin-left: 75%; margin-top: 15%; max-width: 25%; max-height: 55%;">
        <div class="modal-header">
            <h5 class="modal-title pe-7s-paperclip my-2" > Listado de Cuentas Auxiliares</h5>
        </div>
        <div class="cuerpoCaja">
            <div class="card-body" > 
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div>
                                <input class="form-control md-2 light-table-filter" data-table="order-table" type="text" 
                                autocomplete="off" placeholder="Buscar...">
                            </div>
                            <div class="scroll-area-md">
                                <table style="width: 100%; padding: 1px;" class="order-table">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Descripción</th>
                                            <th hidden></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            require "conectar.php";
                                            $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                            $res = mysqli_query($conexion, $cons_emp);

                                            $emp_id = mysqli_fetch_array($res);
                                            $cod_empresa = $emp_id['cod_empresa'];

                                            $sql="SELECT * FROM tblauxiliarcta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                            $resul=mysqli_query($conexion,$sql);

                                            while($mostrar=mysqli_fetch_array($resul)){
                                            ?>
                                                <tr>
                                                    <td><font size="2"><?php echo $mostrar['cod_aux'] ?></font></td>
                                                    <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                    <td hidden><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                    <td><a onclick="copiar_aux('<?php echo $mostrar['cod_aux']?>')" title="Copiar Auxiliar" class="btn btn-info pe-7s-copy-file"></a></td>
                                                </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE PLAN DE CUENTAS -->
    <div class="modal fade modal-plan-cuentas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
         style="margin-top: 3%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-content">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-copy-file" id="ModalPlanCtas"> Plan de Cuentas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body"> 
                        <div class="container mt-20"> 
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Pestaña de registro de cuentas -->
                                    <form action="insertar_plancta.php" method="POST">
                                        <div class="position-relative form-group">
                                            <input name="nrocta" id="IdCta" autocomplete="off" 
                                            placeholder="Nro de Cuenta" type="text" required autofocus
                                            class="form-control">
                                        <br>
                                            <input name="descrip" id="IdDescripCta" autocomplete="off" 
                                            placeholder="Descripción" type="text" required 
                                            class="form-control">
                                        <br>
                                            <select required name="tipo" type="select" id="IdTipCta" class="custom-select">
                                                <option value='' disabled selected>Tipo de cuenta...</option>
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="PASIVO">PASIVO</option>  
                                                <option value="CAPITAL">CAPITAL</option>
                                                <option value="COSTO">COSTO</option>
                                                <option value="INGRESO">INGRESO</option>
                                                <option value="EGRESO">EGRESO</option>
                                            </select>
                                        <br><br>
                                            <select required name="clase" type="select" id="IdClaseCta" class="custom-select">
                                                <option value='' disabled selected>Clase de cuenta...</option>
                                                <option value="AUXILIAR">AUXILIAR</option>
                                                <option value="CONTROL">CONTROL</option>  
                                            </select>
                                        <br><br>
                                            <select name="monedaCta" type="select" id="IdMonCta" class="custom-select">
                                                <option value='' disabled selected>Tipo de moneda...</option>
                                                <option value="BOL">Bolivianos</option>
                                                <option value="USD">Dólares</option>
                                                <option value="NNN">Ninguna</option>   
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mt-1 btn btn-primary">Grabar</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Pestaña de listado de cuentas -->
                                <div class="col-md-9">
                                    <div class="scroll-area-md">
                                        <div class="scrollbar-container ps--active-y ps">
                                            <table style="width: 100%; padding: 1px;" >
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Cta</th>
                                                        <th>Descripción</th>
                                                        <th>Tipo</th>
                                                        <th>Clase</th>
                                                        <th>M.</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        require "conectar.php";

                                                        $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                                        $res = mysqli_query($conexion, $cons_emp);

                                                        $emp_id = mysqli_fetch_array($res);
                                                        $cod_empresa = $emp_id['cod_empresa'];

                                                        $sql="SELECT * FROM tblplancta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                                        $resul=mysqli_query($conexion,$sql);

                                                        while($mostrar=mysqli_fetch_array($resul)){
                                                        ?>
                                                            <tr>
                                                                <td><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['tipo'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['clase'] ?></font></td>
                                                                <td><font size="2"><?php 
                                                                        if($mostrar['moneda'] == 'Bolivianos'){
                                                                            echo 'Bs.';
                                                                        }else{ if($mostrar['moneda'] == 'Dólares'){
                                                                            echo '$us';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                        }
                                                                    ?></font>
                                                                </td>
                                                                <td><a href="actualizar_cta.php?cta=<?php echo $mostrar['cta'] ?>" title="Editar Cuenta" class="btn btn-info pe-7s-pen"></a></td>
                                                                <td><a href="eliminar_cta.php?cta=<?php echo $mostrar['cta'] ?>" title="Eliminar Cuenta" class="btn btn-danger pe-7s-trash"></a></td> 
                                                            </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="report_plancta.php?empresa=<?php echo $nombre_empresa_activa; ?>" class="nav-link">
                                            <i class="nav-link-icon fa pe-7s-print"></i>
                                            Imprimir listado
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE AUXILIAR DE PLAN DE CUENTAS -->
    <div class="modal fade Auxiliar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 3%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-paperclip" id="Auxiliar"> Cuentas Auxiliares</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <form action="insertar_auxiliar.php" method="POST">
                                <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-11">
                                                    <div class="position-relative form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-8">
                                                                <input name="ctamadre" id="Ctamadre" autocomplete="off" 
                                                                class="form-control" placeholder="Nro de Cuenta madre" 
                                                                type="text" required autofocus>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a type="text" name="listcta" id="listcta" value="1" style="cursor: pointer"
                                                                data-toggle="modal" data-target=".CBcta"> Listado de Ctas.</a>
                                                            </div>
                                                        </div>
                                                    <br>
                                                        <input name="cod_aux" id="cod_aux" autocomplete="off" 
                                                        placeholder="Cta. Aux." type="text" required 
                                                        class="form-control">
                                                    <br>
                                                        <input name="descripAux" id="DescripAux" autocomplete="off" 
                                                        placeholder="Descripción" type="text" required 
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="mt-1 btn btn-primary">Grabar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LISTA DE CUENTAS PARA AUXILIAR -->
    <div id="CBcta" class="modal fade CBcta" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 7%; left: 30%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-content">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-note2" > Listado de Cuentas1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="cuerpoCaja">
                    <div class="card-body" > 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <div>
                                        <input class="form-control md-2 light-table-filter" data-table="order-table" type="text" 
                                        autocomplete="off" placeholder="Buscar...">
                                    </div>
                                    <div class="scroll-area-md">
                                        <table style="width: 100%; padding: 1px;" class="order-table">
                                            <thead class="table-success">
                                                <tr>
                                                    <th style="width: 90px;">Cta</th>
                                                    <th style="width: 200px;">Descripción</th>
                                                    <th style="width: 10px;">Tipo</th>
                                                    <th style="width: 15px;">Clase</th>
                                                    <th style="width: 5px;">M.</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    require "conectar.php";
                                                    
                                                    $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                                    $res = mysqli_query($conexion, $cons_emp);

                                                    $emp_id = mysqli_fetch_array($res);
                                                    $cod_empresa = $emp_id['cod_empresa'];

                                                    $sql="SELECT * FROM tblplancta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                                    $resul=mysqli_query($conexion,$sql);

                                                    while($mostrar=mysqli_fetch_array($resul)){
                                                    ?>
                                                        <tr>
                                                            <td><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                            <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                            <td><font size="2"><?php echo $mostrar['tipo'] ?></font></td>
                                                            <td><font size="2"><?php echo $mostrar['clase'] ?></font></td>
                                                            <td><font size="2"><?php 
                                                                    if($mostrar['moneda'] == 'Bolivianos'){
                                                                        echo 'Bs.';
                                                                    }else{ if($mostrar['moneda'] == 'Dólares'){
                                                                        echo '$us';
                                                                    }else{
                                                                        echo '';
                                                                    }
                                                                    }
                                                                ?></font>
                                                            </td>
                                                            <td><a></a></td>
                                                            <td><a onclick="copiar_cuenta('<?php echo $mostrar['cta'] ?>')" title="Copiar Cuenta" class="btn btn-info pe-7s-copy-file"></a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <script>
                                            $(document).ready(() => {
                                                $('tbody tr').hover(function() {
                                                    $(this).find('td').addClass('resaltar');
                                                }, function() {
                                                    $(this).find('td').removeClass('resaltar');
                                                });
                                            });

                                            function copiar_cuenta(c){
                                                $cta_madre = c
                                                navigator.clipboard.writeText($cta_madre)
                                                    .then(() => {
                                                    console.log($cta_madre);
                                                })
                                                    .catch(err => {
                                                    console.log('Sucedió un error, no se pudo copiar', err);
                                                })
                                                document.getElementById('CBcta').style.display = 'none';
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LISTADO DE PLAN DE CUENTAS -->
    <div id="CBcta2" class="modal fade CBcta2" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 3%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-content" style="height: 80%;">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-note2" > Listado de Plan de Cuentas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body" style="height: 100%;"> 
                        <div class=""> 
                            <div class="row">
                                <div class="col-md-20">
                                    <div class="scroll-area-lg" >
                                        <div class="scrollbar-container ps--active-y ps">
                                            <table style="width: 100%; padding: 1px;">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Cta</th>
                                                        <th>Descripción</th>
                                                        <th>Tipo</th>
                                                        <th>Clase</th>
                                                        <th>M.</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        require "conectar.php";

                                                        $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                                        $res = mysqli_query($conexion, $cons_emp);

                                                        $emp_id = mysqli_fetch_array($res);
                                                        $cod_empresa = $emp_id['cod_empresa'];

                                                        $sql="SELECT * FROM tblplancta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                                        $resul=mysqli_query($conexion,$sql);

                                                        while($mostrar=mysqli_fetch_array($resul)){
                                                        ?>
                                                            <tr>
                                                                <td><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['tipo'] ?></font></td>
                                                                <td><font size="2"><?php echo $mostrar['clase'] ?></font></td>
                                                                <td><font size="2"><?php 
                                                                        if($mostrar['moneda'] == 'Bolivianos'){
                                                                            echo 'Bs.';
                                                                        }else{ if($mostrar['moneda'] == 'Dólares'){
                                                                            echo '$us';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                        }
                                                                    ?></font>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="report_plancta.php?empresa=<?php echo $nombre_empresa_activa; ?>" class="nav-link">
                    <i class="nav-link-icon fa pe-7s-print"></i>
                    Imprimir listado
                </a>
            </div>
        </div>
    </div>
    <!-- LISTADO DE CUENTAS AUXILIARES -->
    <div id="ListaAux" class="modal fade ListaAux" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 3%; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-content">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-paperclip" > Listado de Cuentas Auxiliares</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body"> 
                        <div class="container mt-10"> 
                            <div class="row">
                                <div class="col-md-20">
                                    <div class="scroll-area-md">
                                        <form action="actualizar_aux.php" method="POST">
                                            <div class="scrollbar-container ps--active-y ps">
                                                <table style="width: 100%; padding: 1px;" >
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>Cta. Madre</th>
                                                            <th>Cod.</th>
                                                            <th>Descripción</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            require "conectar.php";
                                                            $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nombre_empresa_activa'";
                                                            $res = mysqli_query($conexion, $cons_emp);

                                                            $emp_id = mysqli_fetch_array($res);
                                                            $cod_empresa = $emp_id['cod_empresa'];

                                                            $sql="SELECT * FROM tblauxiliarcta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                                                            $resul=mysqli_query($conexion,$sql);

                                                            while($mostrar=mysqli_fetch_array($resul)){
                                                            ?>
                                                                <tr>
                                                                    <td><font size="2"><?php echo $mostrar['cta'] ?></font></td>
                                                                    <td><font size="2"><?php echo $mostrar['cod_aux'] ?></font></td>
                                                                    <td><font size="2"><?php echo $mostrar['descrip'] ?></font></td>
                                                                    <td><a href="actualizar_aux.php?cod_aux=<?php echo $mostrar['cod_aux'] ?>" class="btn btn-info pe-7s-pen" title="Editar Auxiliar"></a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
   
   
   
   
    <!-- FORMULARIO DE EGRESOS -->
    <div class="modal fade modal-egresos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-next-2" id="ModalPlanCtas"> COMPROBANTE DE EGRESO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <!-- Encabezado -->
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="nro_comp_egr" id="Idnro_comp_egr" autocomplete="off" 
                                                        placeholder="Número" type="text" required autofocus
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="fecha_egr" id="Idfecha_egr" autocomplete="off" 
                                                        placeholder="Fecha" type="date" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <input name="pagado_egr" id="IdPagado_egr" autocomplete="off" 
                                                        placeholder="Pagado a..." type="text" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <select name="monedaegr" type="select" id="IdMonegr" class="custom-select">
                                                            <option value='' disabled selected>Moneda...</option>
                                                            <option value="BOL">Bolivianos</option>
                                                            <option value="USD">Dólares</option>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">  
                                                        <input name="importe_egr" id="IdImporte_egr" autocomplete="off" 
                                                        placeholder="Importe" type="number" step="0.1" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <input name="detalle_egr" id="Iddetalle_egr" autocomplete="off" 
                                                        placeholder="Detalle/Glosa" type="text" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">  
                                                        <input name="cheque" id="IdCheque" autocomplete="off" 
                                                        placeholder="Nro de cheque" type="number" 
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">  
                                                        <input name="banco" id="IdBanco" autocomplete="off" 
                                                        placeholder="Banco" type="text" 
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- DETALLE DE ASIENTO -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <div class="scroll-area-md">
                                                            <div class="scrollbar-container ps--active-y ps">
                                                                <div class="table-responsive">
                                                                    <table id="table_eg" class="mb-0 table">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Cuenta: activate to sort column descending" style="width: 200px;" 
                                                                                aria-sort="ascending">Cuenta</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Glosa/Detalle: activate to sort column ascending" 
                                                                                style="width: 800px;">Glosa/Detalle</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="D E B E: activate to sort column ascending" 
                                                                                style="width: 300px;">D E B E</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="H A B E R: activate to sort column ascending" 
                                                                                style="width: 300px;">H A B E R</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1.1.1.01.01</td> <td>Caja M/Nal.</td> <td></td> <td>180</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6.1.1.02.04</td> <td>Internet</td> <td>180</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot BGCOLOR="#bdc3c7">
                                                                            <th></th> <th ALIGN=right>Totales</th> <th>180</th> <th>180</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Grabar</button>
                                    <button type="button" class="btn btn-secondary">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE TRASPASO -->
    <div class="modal fade modal-traspaso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-exapnd2" id="ModalPlanCtas"> COMPROBANTE DE TRASPASO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <!-- Encabezado -->
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="nro_comp_tras" id="Idnro_comp_tras" autocomplete="off" 
                                                        placeholder="Número" type="text" required autofocus
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="fecha_tras" id="Idfecha_tras" autocomplete="off" 
                                                        placeholder="Fecha" type="date" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <input name="detalle_tras" id="Iddetalle_tras" autocomplete="off" 
                                                        placeholder="Detalle/Glosa" type="text" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <select name="monedatras" type="select" id="IdMontras" class="custom-select">
                                                            <option value='' disabled selected>Moneda...</option>
                                                            <option value="BOL">Bolivianos</option>
                                                            <option value="USD">Dólares</option>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">  
                                                        <input name="importe_tras" id="IdImporte_tras" autocomplete="off" 
                                                        placeholder="Importe" type="number" step="0.1" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- DETALLE DE ASIENTO -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <div class="scroll-area-md">
                                                            <div class="scrollbar-container ps--active-y ps">
                                                                <div class="table-responsive">
                                                                    <table id="table_tras" class="mb-0 table">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Cuenta: activate to sort column descending" style="width: 200px;" 
                                                                                aria-sort="ascending">Cuenta</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Glosa/Detalle: activate to sort column ascending" 
                                                                                style="width: 800px;">Glosa/Detalle</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="D E B E: activate to sort column ascending" 
                                                                                style="width: 300px;">D E B E</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="H A B E R: activate to sort column ascending" 
                                                                                style="width: 300px;">H A B E R</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1.1.1.01.01</td> <td>Caja M/Nal.</td> <td>3.600</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.1.1.01.02</td> <td>Caja M/Ext.</td> <td></td> <td>3.600</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot BGCOLOR="#bdc3c7">
                                                                            <th></th> <th ALIGN=right>Totales</th> <th>3.600</th> <th>3.600</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Grabar</button>
                                    <button type="button" class="btn btn-secondary">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO DE AJUSTE -->
    <div class="modal fade modal-ajuste" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-calculator" id="ModalPlanCtas"> COMPROBANTE DE AJUSTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <!-- Encabezado -->
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="nro_comp_ajus" id="Idnro_comp_ajus" autocomplete="off" 
                                                        placeholder="Número" type="text" required autofocus
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <input name="fecha_ajus" id="Idfecha_ajus" autocomplete="off" 
                                                        placeholder="Fecha" type="date" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="position-relative form-group">
                                                        <input name="detalle_ajus" id="Iddetalle_ajus" autocomplete="off" 
                                                        placeholder="Detalle/Glosa" type="text" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <select name="monedaajus" type="select" id="IdMonajus" class="custom-select">
                                                            <option value='' disabled selected>Moneda...</option>
                                                            <option value="BOL">Bolivianos</option>
                                                            <option value="USD">Dólares</option>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group">  
                                                        <input name="importe_ajus" id="IdImporte_ajus" autocomplete="off" 
                                                        placeholder="Importe" type="number" step="0.1" required
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- DETALLE DE ASIENTO -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <div class="scroll-area-md">
                                                            <div class="scrollbar-container ps--active-y ps">
                                                                <div class="table-responsive">
                                                                    <table id="table_ajus" class="mb-0 table">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Cuenta: activate to sort column descending" style="width: 200px;" 
                                                                                aria-sort="ascending">Cuenta</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="Glosa/Detalle: activate to sort column ascending" 
                                                                                style="width: 800px;">Glosa/Detalle</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="D E B E: activate to sort column ascending" 
                                                                                style="width: 300px;">D E B E</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" 
                                                                                aria-label="H A B E R: activate to sort column ascending" 
                                                                                style="width: 300px;">H A B E R</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1.1.1.01.01</td> <td>Caja M/Nal.</td> <td>5</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6.1.3.02.01</td> <td>Diferencia de Cambio</td> <td></td> <td>5</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot BGCOLOR="#bdc3c7">
                                                                            <th></th> <th ALIGN=right>Totales</th> <th>5</th> <th>5</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Grabar</button>
                                    <button type="button" class="btn btn-secondary">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
            
    </script>
</body>

</html>