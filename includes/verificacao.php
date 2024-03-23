<?php 

// Inicializa a sessão
session_start();

// Verifica se o usuário está ativo no banco de dados

$veri = $pdo->prepare("SELECT id,active FROM users WHERE id=:id");
$veri->bindParam(":id", $param_id, PDO::PARAM_INT);
$param_id = $_SESSION["id"];
$veri->execute();
$veriDADOS = $veri->fetch(PDO::FETCH_ASSOC);
$uAC = $veriDADOS["active"];


// Se o usuário estiver desativado no banco de dados, faz logout
if($uAC == 0){
    header("location: ../admin/logout.php");
} 
else { if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../admin/login.php");
    exit;
}
}

// Pega todos os dados do usuário
$uss = $pdo->prepare("SELECT id,rank,name,username,role,image,rg,passport FROM users WHERE id=:id");
$uss->bindParam(":id", $param_id, PDO::PARAM_INT);
$param_id = $_SESSION["id"];
$uss->execute();
$veruser = $uss->fetch(PDO::FETCH_ASSOC);

$uss_id = $veruser["id"];
$uss_rank = $veruser["rank"];
$uss_name = $veruser["name"];
$uss_username = $veruser["username"];
$uss_role = $veruser["role"];
$uss_image = $veruser["image"];
$uss_rg = $veruser["rg"];
$uss_passport = $veruser["passport"];

if($uss_name == NULL){
    $err_profile = true;
    $uss_name = "DESCONHECIDO";
} else {
    $err_profile = false;
}
?>