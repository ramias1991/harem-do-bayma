<?php
require_once '../assets/classes/Modelos.php';
$modelo = new Modelos();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $modelo->desativarModelo($id);
    echo "<script>";
    echo "alert('Modelo desativada!'); location.href = 'index.php';";
    echo "</script>";
}