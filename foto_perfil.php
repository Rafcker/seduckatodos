<?php
session_start();
// $_SESSION['perfil'] = 'TEA'; // Ative para testes locais
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha sua Foto de Perfil</title>
  <link rel="stylesheet" href="css/style_materiais.css">
  <link rel="stylesheet" href="css/style_video-aula.css">
  <!-- Fontes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
    <link href="https://cdn.jsdelivr.net/gh/antijingoist/opendyslexic@0.91/open-dyslexic.css" rel="stylesheet">
  <?php } else { ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">
  <?php } ?>

  <!-- Estilo -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: <?php echo ($_SESSION['perfil'] == 'DISLEXIA') ? "'OpenDyslexic', Arial, sans-serif" : "'Lexend Deca', sans-serif"; ?>;
    }

    body {
      background: #E3F2FD;
    }

    h1 {
      text-align: center;
      margin-top: 80px;
      font-size: 36px;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 150px);
      gap: 25px;
      justify-content: center;
      margin-top: 40px;
    }

    .avatar-card {
      width: 150px;
      height: 150px;
      border-radius: 12px;
      border: 3px solid transparent;
      overflow: hidden;
      position: relative;
      cursor: pointer;
      transition: 0.2s;
    }

    .avatar-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 12px;
    }

    .avatar-card .check-icon {
      position: absolute;
      top: 8px;
      left: 8px;
      width: 24px;
      height: 24px;
      background: green;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border-radius: 50%;
      display: none;
      align-items: center;
      justify-content: center;
    }

    .avatar-card.selected {
      border: 3px solid green;
    }

    .avatar-card.selected .check-icon {
      display: flex;
    }

    .upload-card {
      width: 150px;
      height: 150px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      border-radius: 20px;
      border: 2px dashed #999;
      background-color: #f0f0f0;
      cursor: pointer;
      transition: 0.3s;
    }

    .upload-card:hover {
      background-color: #e0e0e0;
      transform: scale(1.05);
    }

    .upload-card i {
      font-size: 36px;
      color: #555;
    }

    .upload-card span {
      margin-top: 10px;
      font-size: 14px;
      color: #555;
      text-align: center;
    }

    .salvar-btn {
      position: fixed;
      right: 40px;
      bottom: 40px;
      background: #79F390;
      border: 2px solid #A69765;
      border-radius: 20px;
      padding: 20px 40px;
      font-size: 28px;
      font-weight: 600;
      cursor: pointer;
    }

    .ada {
      position: fixed;
      left: 80px;
      bottom: 160px;
      width: 220px;
    }

    .fala-ada-box {
      position: fixed;
      left: 320px;
      bottom: 160px;
      width: 400px;
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 2px 4px 8px rgba(0,0,0,0.2);
      font-size: 20px;
      line-height: 28px;
      text-align: center;
    }

    .voltar {
  position: fixed;
  left: 30px;
  top: 30px;
  cursor: pointer;
  text-align: center;
  z-index: 1000;
}

.voltar img {
  width: 60px;
}

.voltar div {
  font-size: 20px;
  text-decoration: underline;
}

  </style>
</head>
<body>

<div class="voltar" onclick="window.location.href='config.php'">
  <img src="imagens/voltar.png" alt="Voltar">
  <div>Voltar</div>
</div>

  <h1>Escolha sua Foto de Perfil</h1>

  <div class="grid-container" id="avatarGrid">
    <?php for ($i = 1; $i <= 6; $i++) { ?>
      <div class="avatar-card" onclick="selecionarAvatar(this)" data-src="imagens/img<?php echo $i; ?>.png">
        <img src="imagens/img<?php echo $i; ?>.png" alt="Avatar <?php echo $i; ?>">
        <div class="check-icon">✔</div>
      </div>
    <?php } ?>

    <!-- Upload -->
    <label for="upload">
      <div class="upload-card">
        <i class="fas fa-upload"></i>
        <span>Carregar Foto</span>
      </div>
    </label>
    <input type="file" id="upload" style="display: none;" accept="image/*">
  </div>

      <div  class="ada-box">
  <?php
    // Exibe a imagem do mascote conforme o perfil
    if ($_SESSION['perfil'] == "TDAH") {
      echo '<img src="imagens/ada.png" alt="Ada">';
    } elseif ($_SESSION['perfil'] == "TEA") {
      echo '<img src="imagens/eniac.png" alt="Eniac">';
    } elseif ($_SESSION['perfil'] == "DISLEXIA") {
      echo '<img src="imagens/alan.png" alt="Alan">';
    }
     ?>    
     <div class="ada-msg">
      Escolha o rostinho que mais parece com você,<br> ou carregue uma imagem sua. Depois é só clicar em <strong>Salvar</strong>!
    </div>
  </div>
  


  <!-- Botão salvar -->
  <button class="salvar-btn" onclick="salvarFoto()">Salvar</button>

  <script>
    let selecionado = null;

    function selecionarAvatar(el) {
      document.querySelectorAll('.avatar-card').forEach(card => card.classList.remove('selected'));
      el.classList.add('selected');
      selecionado = el.getAttribute('data-src');
    }

    function salvarFoto() {
      if (!selecionado) {
        alert("Escolha um avatar ou carregue uma foto primeiro!");
        return;
      }
      alert("Foto salva com sucesso! (simulado)");
      // Aqui você pode fazer o envio para salvar no banco com PHP
    }
  </script>
</body>
</html>
