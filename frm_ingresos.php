<?php
    require 'recursos.php';
?>
<style>
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

<!-- FORMULARIO DE INGRESOS -->
<div id="ingresos" class="modal show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
     style="margin-left: 5%; display: block;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pe-7s-cash" id="ModalPlanCtas"> COMPROBANTE DE INGRESO</h5>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                            <div class="main-card mb-3 card" >
                                <div class="card-body">
                                    <!-- Encabezado -->
                                    <div class="position-relative form-group">
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="position-relative form-group">
                                                    <input name="nro_comp_ing" id="nro_comp_ing" autocomplete="off" 
                                                    placeholder="Número" type="text" required autofocus
                                                    class="form-control" style="text-align:right; color: red;">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="position-relative form-group">
                                                    <input name="fecha_ing" id="Idfecha_ing" autocomplete="off" 
                                                    placeholder="Fecha" type="date" required
                                                    class="form-control" onchange="documento_ingreso(this.value)">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <input name="recibi_ing" id="Idrecibi_ing" autocomplete="off" 
                                                    placeholder="Recibimos de..." type="text" required
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <input name="detalle_ing" id="Iddetalle_ing" autocomplete="off" 
                                                    placeholder="Detalle/Glosa" type="text" required
                                                    class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="position-relative form-group">
                                                    <select name="monedaing" type="select" id="IdMoning" class="custom-select">
                                                        <option value='' disabled selected>Moneda...</option>
                                                        <option value="BOL">Bolivianos</option>
                                                        <option value="USD">Dólares</option>   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="position-relative form-group">  
                                                    <input name="importe_ing" id="IdImporte_ing" autocomplete="off" 
                                                    placeholder="Importe" type="number" step="0.1" required
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group" style="float: right;">
                                            <a onclick="agregar_fila()" class="btn btn-info fas fa-plus" title="Añadir fila" style="color: white;"></a>
                                            <br><br>
                                            <a id="btnCta" class="btn btn-info pe-7s-file" title="Mostrar Plan de Cuentas" style="color: white;"></a>
                                            <br><br>
                                            <a id="btnAux" hidden onclick="abrir_frm()" role="button" class="btn btn-info pe-7s-chat" title="Registrar asiento Auxiliar" style="color: white;"></a>
                                        </div>
                                    </div>
                                    <!-- DETALLE DE ASIENTO -->
                                    <div class="row">
                                        <div class="col-lg-12" style="width: 100%;">
                                            <div class="main-card mb-12 card">
                                                <div class="card-body" style="min-height: max-content; background-color: #dcdde1;">
                                                    <div style="height: 170px;" class="scroll-area-md">
                                                        <div class="scrollbar-container ps--active-y ps">
                                                            <div class="table-responsive">
                                                                <table id="glsIngreso">
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
                                                                    <tbody id="tblGlosa">
                                                                        <tr>
                                                                            <td><input onmousemove="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta" type="text" style="width: 150px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input class="form text-rigth glosa" type="text" style="width: 465px; background-color: #dcdde1; border: none;"></td> 
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth debe" style="width: 145px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth haber" style="width: 145px; background-color: #dcdde1; border: none;"></td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input onmousemove="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta" type="text" style="width: 150px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input class="form text-rigth glosa" type="text" style="width: 465px; background-color: #dcdde1; border: none;"></td> 
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth debe" style="width: 145px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth haber" style="width: 145px; background-color: #dcdde1; border: none;"></td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input onmousemove="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta" type="text" style="width: 150px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input class="form text-rigth glosa" type="text" style="width: 465px; background-color: #dcdde1; border: none;"></td> 
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth debe" style="width: 145px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth haber" style="width: 145px; background-color: #dcdde1; border: none;"></td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input onmousemove="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta" type="text" style="width: 150px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input class="form text-rigth glosa" type="text" style="width: 465px; background-color: #dcdde1; border: none;"></td> 
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth debe" style="width: 145px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth haber" style="width: 145px; background-color: #dcdde1; border: none;"></td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input onmousemove="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta" type="text" style="width: 150px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input class="form text-rigth glosa" type="text" style="width: 465px; background-color: #dcdde1; border: none;"></td> 
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth debe" style="width: 145px; background-color: #dcdde1; border: none;"></td>
                                                                            <td><input onchange="SumarColumna()" class="form text-rigth haber" style="width: 145px; background-color: #dcdde1; border: none;"></td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot id="tblTotales" BGCOLOR="#bdc3c7">
                                                                        <th class="form text-rigth ct" style="width: 150px;"></td>
                                                                        <th class="form text-center gl" style="width: 465px;">TOTALES</th>
                                                                        <th class="form text-rigth tot_debe" style="width: 145px;"></th>
                                                                        <th class="form text-rigth tot_haber" style="width: 145px;"></th>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                            <script text="text/javascript">
                                                                function documento_ingreso(f){
                                                                    $fecha = f;
                                                                    var mes = new Date(f);
                                                                    $mes_docu = mes.getMonth();

                                                                    $.ajax({
                                                                    method: "POST",
                                                                    url: "nro_doc.php",
                                                                    data: { text: 'INGRESO', mes: $mes_docu }
                                                                    })
                                                                    .done(function( response ) {
                                                                        $nroDoc = response;
                                                                        document.getElementById('nro_comp_ing').value=$nroDoc;
                                                                    });
                                                                        
                                                                }
                                                                
                                                                function buscarCuenta(v){
                                                                    var $aBuscar = v.trim();
                                                                    $cta_madre = $aBuscar;

                                                                    if($aBuscar == ''){
                                                                        $nomCta = '';
                                                                        document.getElementById('NomCta').innerHTML='Cuenta: '+$nomCta;
                                                                        document.getElementById('btnAux').hidden=true;
                                                                    } else
                                                                    {
                                                                        $.ajax({
                                                                        method: "POST",
                                                                        url: "descrip_cta.php",
                                                                        data: { text: $aBuscar }
                                                                        })
                                                                        .done(function( response ) {
                                                                            $nomCta = response;
                                                                        });
                                                                        document.getElementById('NomCta').innerHTML='Cuenta: '+$nomCta;

                                                                        $.ajax({
                                                                        method: "POST",
                                                                        url: "verif_aux.php",
                                                                        data: { text: $aBuscar }
                                                                        })
                                                                        .done(function( response ) {
                                                                            $nomAux = response;
                                                                        });
                                                                        console.log($nomAux);
                                                                        if($nomAux==0){
                                                                            document.getElementById('btnAux').hidden=true;
                                                                        } else {
                                                                            document.getElementById('btnAux').hidden=false;
                                                                        }   
                                                                    } 
                                                                }

                                                                function SumarColumna() {
                                                                    var sum_debe = 0;
                                                                    var sum_haber = 0;
                                                                    $('.debe').each(function() {
                                                                        sum_debe += Number($(this).val());
                                                                    });

                                                                    $('.haber').each(function() {
                                                                        sum_haber += Number($(this).val());
                                                                    });
                                                                                
                                                                    $('#glsIngreso tfoot tr th').eq(2).html(sum_debe);
                                                                    $('#glsIngreso tfoot tr th').eq(3).html(sum_haber);
                                                                }

                                                                function agregar_fila(){
                                                                    $('#tblGlosa')
                                                                    .append(
                                                                        $('<tr>')
                                                                        .append(
                                                                            $('<td>')
                                                                            .append(
                                                                                $('<input onchange="buscarCuenta(this.value)" onfocus="buscarCuenta(this.value)" class="form text-rigth cta">').attr('type','text').attr('style','width: 150px; background-color: #dcdde1; border: none;')
                                                                            ),
                                                                            $('<td>')
                                                                            .append(
                                                                                $('<input class="form text-rigth glosa">').attr('type','text').attr('style','width: 465px; background-color: #dcdde1; border: none;')
                                                                            ),
                                                                            $('<td>')
                                                                            .append(
                                                                                $('<input onchange="SumarColumna()" class="form text-rigth debe">').attr('type','text').attr('style','width: 145px; background-color: #dcdde1; border: none;')
                                                                            ),
                                                                            $('<td>')
                                                                            .append(
                                                                                $('<input onchange="SumarColumna()" class="form text-rigth haber">').attr('type','text').attr('style','width: 145px; background-color: #dcdde1; border: none;')
                                                                            )
                                                                        )
                                                                    );
                                                                }
                                                                function cerrar_modal(){
                                                                    document.getElementById('ingresos').style.display="none";
                                                                    location.href='index.php';
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a id="NomCta" class="form-control NomCta" style="text-shadow: blue; text-align: left; max-width: 81%"></a>
                                <button onclick="grabar_ingresos()" type="button" class="btn btn-primary">Grabar</button>
                                <button onclick="cerrar_modal()" type="button" class="btn btn-secondary">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<script>
    $(document).ready(() => {
        $('tbody tr').hover(function() {
            $(this).find('td').addClass('resaltar');
        }, function() {
            $(this).find('td').removeClass('resaltar');
        });
    });

    function grabar_ingresos(){
        //Graba en la tabla de ingresos tblingresos
        var $nro_comp_ing = document.getElementById('nro_comp_ing').value;
        console.log('Nro: '+$nro_comp_ing);
        var $fecha = document.getElementById('Idfecha_ing').value;
        console.log('Fecha: '+$fecha);
        //var $tcambio = $cambio;
        console.log('Cambio: '+$cambio);
        var $moneda = document.getElementById('IdMoning').value;
        var $importe = document.getElementById('IdImporte_ing').value;
        var $recibi = document.getElementById('Idrecibi_ing').value;
        var $glosa = document.getElementById('Iddetalle_ing').value;
        var $gcod_empresa = $cod_empresa;
        var $cod_usr = $usuario;
        var i=0;
        
    }

    function grabar_cerrar(){
        //Graba en la tabla auxiliar de ingresos tblregauxiliar
        var $ctaregaux = document.getElementById('cuenta').value;
        var $desregaux = document.getElementById('descri').value;
        var $refregaux = document.getElementById('refere').value;
        var $fecregaux = document.getElementById('fechar').value;
        var $iteregaux = 0;
        var $cod_aux= '';
        var $glosa_aux = '';
        var $debe_aux = 0;
        var $haber_aux = 0;
        var i=0;

        //Graba en la tabla de detalle de ingresos tbldeting
        $("#glsIngresoAux tbody tr").each(function () {
            //console.log(i);
            $iteregaux = i+1;
            $cod_aux= $('.ctax:eq('+i+')').val();
            $glosa_aux = $('.glosax:eq('+i+')').val();
            $debe_aux = parseFloat($('.debe_aux:eq('+i+')').val());
            $haber_aux = parseFloat($('.haber_aux:eq('+i+')').val());
            
            if ($cod_aux!=''){
                $.post(url="grabar_reg_aux.php",
                    {
                        refregaux: $refregaux,
                        iteregaux: $iteregaux, 
                        ctaregaux: $ctaregaux, 
                        desregaux: $desregaux,
                        fecregaux: $fecregaux,
                        cod_aux: $cod_aux,
                        glosa_aux: $glosa_aux,
                        debe_aux: $debe_aux,
                        haber_aux: $haber_aux
                    },
                    function(data){
                        if(data!="");
                    });
            }
            i++;
        });
        document.getElementById('reg_aux').style.display = 'none';
    }

    function copiar_cuenta(c){
        $cta_madre = c
        navigator.clipboard.writeText($cta_madre)
            .then(() => {
            console.log($cta_madre);
        })
            .catch(err => {
            console.log('Sucedió un error, no se pudo copiar', err);
        })
        document.getElementById('cuentas').style.display = 'none';
    }

    function copiar_aux(a){
        $cta_aux = a;
        navigator.clipboard.writeText($cta_aux)
            .then(() => {
            console.log($cta_aux);
        })
            .catch(err => {
            console.log('Sucedió un error, no se pudo copiar', err);
        })
        document.getElementById('ListAux').style.display = 'none';
    }

    function abrir_frm(){
        document.getElementById('txtCta').innerHTML='Cuenta: '+$cta_madre; 
        document.getElementById('txtDesc').innerHTML='Descripción: '+$nomCta;
        document.getElementById('txtRef').innerHTML='Referencia: '+$nroDoc;
        document.getElementById('txtFecha').innerHTML='Fecha: '+$fecha; 
        document.getElementById('cuenta').value=$cta_madre; 
        document.getElementById('descri').value=$nomCta;
        document.getElementById('refere').value=$nroDoc; 
        document.getElementById('fechar').value=$fecha; 
        document.getElementById('reg_aux').style.display = 'block';
    }

    function abrir_frm_aux(){
        document.getElementById('ListAux').style.display = 'block';
    }    

    $(document).on('click', '#btnCta', function() {
        document.getElementById('cuentas').style.display = 'block';
    });

    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
</script>