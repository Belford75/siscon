<?php 
    require 'conectar.php';

    $cod_empresa=$_GET['cod_empresa'];

    $sql="SELECT * FROM tblempresa WHERE cod_empresa='$cod_empresa'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    require 'index.php';
?>

<!doctype html>
<html lang="es">
    
<?php require 'recursos.php'; ?>

<body>
    <div class="modal fade modal-update_emp show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true" style="display: block;">
        <form action="update_emp.php" method="POST"><br/>
            <div class="modal-dialog modal-md">
                <div class="modal-content"></br>
                    <div class="modal-header">
                        <h5 class="modal-title pe-7s-users" id="ModalEmp"> Edición de datos de la Empresa</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                    <form action="update_emp.php" method="POST">
                                        <input type="hidden" name="cod_empresa" value="<?php echo $row['cod_empresa']  ?>">
                                        <div class="position-relative form-group"><a>Nombre de la empresa</a>
                                            <input name="nombre" id="IdNombre" autocomplete="off"
                                            placeholder="Nombre de la Empresa" type="text" value="<?php echo $row['nombre']  ?>"
                                            class="form-control" required autofocus>
                                            <br><a>Dirección</a>
                                            <input name="direccion" id="IdDirec" autocomplete="off" 
                                            placeholder="Dirección de la Empresa" type="text" value="<?php echo $row['direccion']  ?>"
                                            class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group"><a>Teléfono</a>
                                                        <input name="telefono" id="IdTelf" autocomplete="off"
                                                        placeholder="Teléfono" type="text" value="<?php echo $row['telefono']  ?>"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4"><a>NIT</a>
                                                    <input name="nit" id="IdNit" autocomplete="off"
                                                    placeholder="Nro de NIT" type="text" value="<?php echo $row['nit']  ?>"
                                                    class="form-control">
                                                </div>
                                                <div class="col-md-4"><a>Sigla</a>
                                                    <input name="sigla" id="IdSigla" autocomplete="off"
                                                    placeholder="Sigla" type="text" value="<?php echo $row['sigla']  ?>"
                                                    class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-6"><a>Moneda</a>
                                                    <select required name="moneda" type="select" id="IdTipMon" class="custom-select">
                                                        <option value='' disabled selected>Tipo de moneda...</option>
                                                        <option value="BOL">Bolivianos</option>
                                                        <option value="USD">Dólares</option>    
                                                        <option value="AMB">Ambas</option>                                    
                                                    </select>
                                                </div>
                                                <div class="col-md-6"><a>Ini. de Gest.</a>
                                                    <input name="inicio_gest" id="Idinicio_gest" autocomplete="off"
                                                    placeholder="Inicio de gestión" type="text" value="<?php echo $row['inicio_gest']  ?>"
                                                    class="form-control" required>
                                                </div>
                                                <input type="hidden" name="cod_usr" value="<?php echo $row['cod_usr']  ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mt-1 btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>