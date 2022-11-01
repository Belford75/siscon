<?php 
    require 'conectar.php';

    $cta=$_GET['cta'];

    $sql="SELECT * FROM tblplancta WHERE cta='$cta'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    require 'index.php';
?>

<!doctype html>
<html lang="es">

<?php require 'recursos.php'; ?>

<body>
    <div class="modal fade modal-update-cuentas show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
        style="margin-top: 5%; display: block;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-content">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-copy-file" id="ModalModPlanCtas"> Modificar la Cuenta</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                <form action="update_plancta.php" method="POST">
                                    <div class="position-relative form-group">
                                        <input name="Ncta" id="Ncta"  readonly="readonly" value="<?php echo $row['cta'] ?>"
                                        placeholder="Nro de Cuenta" type="text" 
                                        class="form-control">
                                    <br>
                                        <input name="Ndescrip" id="IdNDescripCta" autocomplete="off" autofocus
                                        placeholder="Descripción" type="text" required value="<?php echo $row['descrip'] ?>"
                                        class="form-control">
                                    <br>
                                        <select required name="Ntipo" type="select" id="IdNTipCta" class="custom-select">
                                            <option style="color: red;" value="<?php echo $row['tipo'] ?>"><?php echo $row['tipo'] ?></option>
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="PASIVO">PASIVO</option>  
                                            <option value="CAPITAL">CAPITAL</option>
                                            <option value="COSTO">COSTO</option> 
                                            <option value="INGRESO">INGRESO</option>  
                                            <option value="EGRESO">EGRESO</option>
                                        </select>
                                    <br><br>
                                        <select required name="Nclase" type="select" id="IdNClaseCta" class="custom-select">
                                            <option style="color: red;" value="<?php echo $row['clase'] ?>"><?php echo $row['clase'] ?></option>
                                            <option value="AUXILIAR">AUXILIAR</option>
                                            <option value="CONTROL">CONTROL</option>  
                                        </select>
                                    <br><br>
                                        <select required name="NmonedaCta" type="select" id="IdNMonCta" class="custom-select">
                                            <option style="color: red;" value="<?php echo $row['moneda'] ?>"><?php echo $row['moneda'] ?></option>
                                            <option value="Bolivianos">Bolivianos</option>
                                            <option value="Dólares">Dólares</option>
                                            <option value="NNN">Ninguna</option>   
                                        </select>
                                    </div>
                                    <input  type="hidden" name="cod_empresa" value="<?php echo $row['cod_empresa'] ?>">
                                    <input  type="hidden" name="usr" value="<?php echo $row['cod_usr'] ?>">
                                    <div class="modal-footer">
                                        <button class="mt-1 btn btn-primary">Modificar</button>
                                    </div>
                                </form>
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
</body>

</html>