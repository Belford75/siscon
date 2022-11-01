<?php
ob_start();
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="./main.css" rel="stylesheet">
    <script src="./assets/scripts/jquery.js"></script>
    <script src="./assets/scripts/jquery.dataTables.min.js"></script>
    <style>
        .page-break{
            page-break-after: always;
        }
        #footer { position: fixed; right: 0px; bottom: 5px; text-align: center; border-top: 1px solid black;}
        #footer .page:after { content: counter(page, decimal); }
        @page { margin: 20px 30px 40px 50px; }
    </style>
</head>

<body>
    <div id="footer">
        <p class="page" style="font-size: 12px;">Pág. </p>
    </div>

    <?php
        require "conectar.php";
        $nom_emp = $_GET['empresa']; echo $nom_emp;
    ?>
    

    <h2>PLAN DE CUENTAS</h2>
    <table width='550px' style="font-size: 12px; ">
        <thead>
            <tr align="left">
                <th>Cta</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Clase</th>
                <th>Moneda</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                require "conectar.php";
                $cons_emp = "SELECT cod_empresa FROM tblempresa WHERE nombre='$nom_emp'";
                $res = mysqli_query($conexion, $cons_emp);

                $emp_id = mysqli_fetch_array($res);
                $cod_empresa = $emp_id['cod_empresa'];

                $sql="SELECT * FROM tblplancta WHERE cod_empresa='$cod_empresa' ORDER BY cta";
                $resul=mysqli_query($conexion,$sql);
                
                while($mostrar=mysqli_fetch_array($resul)){
                ?>
                    <tr>
                        <td><?php echo $mostrar['cta'] ?></td>
                        <td><?php echo $mostrar['descrip'] ?></td>
                        <td><?php echo $mostrar['tipo'] ?></td>
                        <td><?php echo $mostrar['clase'] ?></td>
                        <td>
                            <?php 
                                if($mostrar['moneda'] == 'Bolivianos'){
                                    echo 'Bs.';
                                }else{ if($mostrar['moneda'] == 'Dólares'){
                                    echo '$us';
                                }else{
                                    echo '';
                                }
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
    
</body>

<?php
$html=ob_get_clean();
//echo $html;

require_once '../siscon/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use FontLib\Font;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
//$dompdf->setPaper('letter','Landscape');
//$dompdf->setPaper('A4','Landscape');

$dompdf->render();

$dompdf->stream("plan_de_cuentas.pdf", array("Attachment" => false));

?>

