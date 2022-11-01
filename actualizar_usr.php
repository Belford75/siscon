<?php 
    require 'conectar.php';

    $cod_usr=$_GET['cod_usr'];

    $sql="SELECT * FROM tbluser WHERE cod_usr='$cod_usr'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

    require 'index.php';
?>

<!doctype html>
<html lang="es">

<?php require 'recursos.php'; ?>

<body>
    <div class="modal fade modal-update_usr show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true" 
         style="margin-top: 5%; display: block;">
        <form action="update_usr.php" method="POST"><br/>
            <div class="modal-dialog modal-md">
                <div class="modal-content"></br>
                    <div class="modal-header">
                        <h5 class="modal-title pe-7s-users" id="ModalUsuario"> Usuarios</h5>
                    </div>
                    <div class="modal-body">
                    <div class="card-body">
                        <div class="container mt-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Pestaña de registro de usuarios -->
                                    <form action="update_usr.php" method="POST">
                                        <input type="hidden" name="cod_usr" value="<?php echo $row['cod_usr']  ?>">
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend"><span class="input-group-text">Alias</span></div>
                                            <input type="text" style="text-transform:uppercase;" id="IdAusr" name="usr"
                                            autocomplete="off" class="form-control" value="<?php echo $row['usr']  ?>" required autofocus>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Nombre</span></div>
                                            <input type="text" class="form-control" id="Idnombre" name="nombre" 
                                            autocomplete="off" value="<?php echo $row['nombre']  ?>" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Contraseña</span></div>
                                            <input type="password" class="form-control" id="IdPaswd" name="contraseña" 
                                            autocomplete="off" value="<?php echo $row['contraseña']  ?>" required>
                                            <img src="assets/images/mostrar.png" id="btnClave">
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
                                            <button class="mt-1 btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    var boton = document.getElementById('btnClave');
                                    var input = document.getElementById('IdPaswd');

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