<?php 
    require 'conectar.php';

    $tipo_doc=$_GET['tipo_doc'];

    $sql="SELECT tipo_doc, numeracion FROM tblnumeracion WHERE tipo_doc='$tipo_doc'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    require 'index.php';
?>

<!doctype html>
<html lang="es">

<?php require 'recursos.php'; ?>

<body>
    <div class="modal fade modal-actualiza-doc show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
         style="margin-top: 5%; display: block;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pe-7s-folder" id="ModalCambio"> Actualización del Documento</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="col-md-12">
                            <!-- Pestaña de modificación de documentos -->
                            <form action="update_doc.php" method="POST">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="position-relative form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h6 style="text-decoration: bold;">Documento de:</h6>
                                                         <input name="Mtipo_doc" id="Mtipo_doc" autocomplete="off" 
                                                                class="form-control" placeholder="Tipo de documento" 
                                                                type="text" readonly="readonly" value="<?php echo $row['tipo_doc'] ?>">
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div id="toastTypeGroup">
                                                            <h6>Numeración:</h6>
                                                            <div class="form-check">
                                                                <input type="radio" name="Mnumeracion" class="form-check-input" value="Automático">
                                                                <label class="form-check-label" id="numeracion">Automático (Proporcionado por el Sistema)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="Mnumeracion" class="form-check-input" value="Manual">
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
                                    <button class="mt-1 btn btn-primary">Grabar cambios</button>
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