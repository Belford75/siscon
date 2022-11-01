<?php 
    require 'conectar.php';

    $cod_aux=$_GET['cod_aux'];

    $sql="SELECT * FROM tblauxiliarcta WHERE cod_aux='$cod_aux'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    require 'index.php';
?>

<!doctype html>
<html lang="es">

<?php require 'recursos.php'; ?>

<body>
    <div class="modal fade ModifAuxiliar show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-paperclip" id="ModifAuxiliar"> Modificar Cuenta Auxiliar</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="tab-content">
                            <form action="update_aux.php" method="POST">
                                <div class="tab-pane show active" id="tab-usr-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-11">
                                                    <div class="position-relative form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-8">
                                                                <input name="Mctamadre" id="MCtamadre" autocomplete="off" 
                                                                class="form-control" placeholder="Nro de Cuenta madre" 
                                                                type="text" readonly="readonly" value="<?php echo $row['cta'] ?>">
                                                            </div>
                                                        </div>
                                                    <br>
                                                        <input name="Mcod_aux" id="Mcod_aux" autocomplete="off" 
                                                        placeholder="Cta. Aux." type="text" readonly="readonly" 
                                                        class="form-control" value="<?php echo $row['cod_aux'] ?>">
                                                    <br>
                                                        <input name="MdescripAux" id="MDescripAux" autocomplete="off" 
                                                        placeholder="Descripción" type="text" required 
                                                        class="form-control" value="<?php echo $row['descrip'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="mt-1 btn btn-primary">Modificar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>