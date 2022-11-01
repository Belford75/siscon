<?php
require 'conectar.php';

$text = $_POST['text'];
$ultimo = $_POST['mes']+1;
$aa = date('Y');

switch ($ultimo) {
    case 1:
        $q1 = "SELECT ult_ene FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_ene']==null or $no_doc['ult_ene']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_ene']+1;}
        break;
    case 2:
        $q1 = "SELECT ult_feb FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_feb']==null or $no_doc['ult_feb']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_feb']+1;}
        break;
    case 3:
        $q1 = "SELECT ult_mar FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_mar']==null or $no_doc['ult_mar']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_mar']+1;}
        break;
    case 4:
        $q1 = "SELECT ult_abr FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_abr']==null or $no_doc['ult_abr']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_abr']+1;}
        break;
    case 5:
        $q1 = "SELECT ult_may FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_may']==null or $no_doc['ult_may']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_may']+1;}
        break;
    case 6:
        $q1 = "SELECT ult_jun FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_jun']==null or $no_doc['ult_jun']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_jun']+1;}
        break;
    case 7:
        $q1 = "SELECT ult_jul FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_jul']==null or $no_doc['ult_jul']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_jul']+1;}
        break;
    case 8:
        $q1 = "SELECT ult_ago FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_ago']==null or $no_doc['ult_ago']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_ago']+1;}
        break;
    case 9:
        $q1 = "SELECT ult_sep FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_sep']==null or $no_doc['ult_sep']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_sep']+1;}
        break;
    case 10:
        $q1 = "SELECT ult_oct FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_oct']==null or $no_doc['ult_oct']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_oct']+1;}
        break;
    case 11:
        $q1 = "SELECT ult_nov FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_nov']==null or $no_doc['ult_nov']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_nov']+1;}
        break;
    case 12:
        $q1 = "SELECT ult_dic FROM tblnumeracion WHERE tipo_doc='$text'";
        $Ejec = mysqli_query($conexion, $q1);
        $no_doc = mysqli_fetch_array($Ejec);
        if($no_doc['ult_dic']==null or $no_doc['ult_dic']==''){
            $doc_num = $aa.$ultimo.'001';
        }else{$doc_num = $no_doc['ult_dic']+1;}
        break;
}

echo $doc_num;
?>