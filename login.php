<?php 
// ============================
// INÍCIO DO SCRIPT DE LOGIN
// ============================

session_start(); // Inicia a sessão para armazenar dados do usuário

// Simulação de um banco de dados com 3 usuários, cada um com matrícula, senha e perfil
$usuarios = [
  "1" => ["senha" => "1", "perfil" => "TEA"],
  "2" => ["senha" => "2", "perfil" => "TDAH"],
  "3" => ["senha" => "3", "perfil" => "DISLEXIA"]
];

// Captura os dados enviados pelo formulário (via POST)
$matricula = $_POST['matricula'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se é o login do professor (usuário e senha igual a 4)
if ($matricula === "4" && $senha === "4") {
    $_SESSION['perfil'] = "PROFESSOR";
    header("Location: inicio_prof.php");
    exit;
}

// Verifica se a matrícula existe e a senha está correta
if (isset($usuarios[$matricula]) && $usuarios[$matricula]["senha"] === $senha) {
    $_SESSION['perfil'] = $usuarios[$matricula]["perfil"];
    header("Location: escolha_disciplina.php");
    exit;
}
?>

<!-- ============================ -->
<!-- PÁGINA DE ERRO DE LOGIN     -->
<!-- ============================ -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resultado do Login</title>
  <link href="https://cdn.jsdelivr.net/gh/antijingoist/opendyslexic@0.91/open-dyslexic.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e3f2fd;
      font-family: 'OpenDyslexic', Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
      padding: 20px;
    }
    .box {
      background: white;
      border: 2px solid #000;
      border-radius: 15px;
      padding: 40px;
      max-width: 500px;
      width: 90%;
      box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
    }
    h1 {
      font-size: 32px;
      margin-bottom: 20px;
    }
    p {
      font-size: 20px;
      margin-bottom: 30px;
    }
    a {
      padding: 12px 25px;
      background-color: #ffd83f;
      border: 2px solid #000;
      border-radius: 30px;
      text-decoration: none;
      color: black;
      font-size: 18px;
      font-weight: bold;
      transition: background 0.3s;
    }
    a:hover {
      background-color: #f4c900;
    }
  </style>
</head>
<body>
  <div class="box">
    <h1>❌ Matrícula ou senha incorretos.</h1>
    <p>Por favor, verifique suas informações e tente novamente.</p>
    <a href="index.html">Voltar</a>
  </div>
</body>
</html>
