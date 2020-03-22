<?php
require_once '../assets/classes/Modelos.php';
$modelo = new Modelos();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $modelo->ativarModelo($id);
    echo "<script>";
    echo "alert('Modelo ativa novamente!'); location.href = 'index.php';";
    echo "</script>";
}