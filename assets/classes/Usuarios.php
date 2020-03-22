<?php
session_start();
require_once 'Conexao.php';

class Usuarios extends Conexao{
    public function login($email, $senha){
        $sql = "SELECT * FROM usuario WHERE email=:email";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindParam(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = "SELECT * FROM usuario WHERE email=:email AND senha=:senha";
            $sql = $this->Conectar()->prepare($sql);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':senha', $senha);
            $sql->execute();
            if($sql->rowCount() > 0){
                $usuario = $sql->fetch();
                $_SESSION['id'] = $usuario['id'];
                header('Location: index.php');
            } else {
                echo "<script>";
                echo "alert('Senha inconrreta!!');";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert('E-mail não cadastrado!');";
            echo "</script>";
        }
    }
}