<?php
// Inicia a sessão para usar variáveis de sessão, como o perfil do usuário
session_start();
// $_SESSION['perfil'] = 'TEA'; // Descomente para testar localmente
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações - SEDUCKATODOS</title>

  <!-- Ícones da biblioteca Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Fonte adaptada ao perfil DISLEXIA -->
  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
    <link href="https://cdn.jsdelivr.net/gh/antijingoist/opendyslexic@0.91/open-dyslexic.css" rel="stylesheet">
  <?php } else { ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <?php } ?>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: <?php echo ($_SESSION['perfil'] == 'DISLEXIA') ? "'OpenDyslexic', Arial, sans-serif" : "'Lexend Deca', sans-serif"; ?>;
    }
    body {
      background: #E3F2FD;
      overflow-x: hidden;
    }
    .logo-inicio {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 65px;
      height: 65px;
    }
    .perfil-titulo {
      position: absolute;
      top: 35px;
      left: 100px;
      font-size: 22px;
      font-weight: bold;
    }
    .cabecalho-topo {
      position: absolute;
      top: 35px;
      left: 30%;
      font-size: 28px;
    }
    .container-botoes {
      position: relative;
      margin-top: 130px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
    }
    .btn-config-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .btn-config {
      width: 820px;
      height: 100px;
      background: #F7F6F3;
      border-radius: 18px;
      border: 2px #A69765 solid;
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.25);
      display: flex;
      align-items: center;
      padding-left: 25px;
      gap: 20px;
      cursor: pointer;
    }
    .btn-config span {
      font-size: 28px;
      color: black;
    }
    .ouvir-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-left: 10px;
    }
    .ouvir-btn img {
      width: 35px;
    }
    .ouvir-btn span {
      font-size: 14px;
      text-decoration: underline;
      margin-top: 4px;
    }
    .logo-seducka {
      position: fixed;
      bottom: 20px;
      right: 40px;
      width: 180px;
    }
    h1 {
      font-family: 'OpenDyslexic', sans-serif;
      font-size: 36px;
      margin-bottom: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <img src="imagens/inicio.png" alt="Voltar" class="logo-inicio" onclick="window.location.href='escolha_disciplina.php'" style="cursor: pointer;">
<div class="perfil-titulo">Voltar para o Início</div>


  <h1> Configurações </h1>

  <div class="container-botoes">

    <div class="btn-config-wrapper">
      <a href="foto_perfil.php" style="text-decoration: none; color: inherit;">
        <div class="btn-config">
          <img src="imagens/perfil_<?php echo strtolower($_SESSION['perfil']); ?>.png" alt="Foto Perfil" style="width: 75px; height: 75px; border-radius: 50%; border: 1px solid black;">
          <span>Alterar foto de Perfil</span>
        </div>
      </a>
      <div class="ouvir-btn" onclick="falarTexto('Alterar foto de perfil')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="btn-config-wrapper">
      <a href="altera_mascote.php" style="text-decoration: none; color: inherit;">
        <div class="btn-config">
          <img src="imagens/alterar_mascote.png" alt="Mascote" style="width: 75px; height: 75px;">
          <span>Alterar Mascote</span>
        </div>
      </a>
      <div class="ouvir-btn" onclick="falarTexto('Alterar mascote')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="btn-config-wrapper">
      <a href="preferencias.php" style="text-decoration: none; color: inherit;">
        <div class="btn-config">
          <img src="imagens/ajustes.png" alt="Preferências" style="width: 75px; height: 75px;">
          <span>Preferências Gerais</span>
        </div>
      </a>
      <div class="ouvir-btn" onclick="falarTexto('Preferências gerais')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="btn-config-wrapper">
      <a href="resultados.php" style="text-decoration: none; color: inherit;">
        <div class="btn-config">
          <img src="imagens/progresso.png" alt="Progresso" style="width: 75px; height: 75px;">
          <span>Revisar Progresso</span>
        </div>
      </a>
      <div class="ouvir-btn" onclick="falarTexto('Revisar progresso')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

  </div>

  <img src="imagens/seduckatodos-logo.png" alt="Logo SEDUCKATODOS" class="logo-seducka">

  <script>
    function falarTexto(texto) {
      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      utterance.rate = 0.9;
      utterance.pitch = 1.0;
      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);
    }
  </script>
</body>
</html>
