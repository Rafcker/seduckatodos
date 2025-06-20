<?php
session_start();
// $_SESSION['perfil'] = 'TEA'; // Ative para testes locais
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha seu Mascote</title>
  <link rel="stylesheet" href="css/style_materiais.css">
  <link rel="stylesheet" href="css/style_video-aula.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
    <link href="https://cdn.jsdelivr.net/gh/antijingoist/opendyslexic@0.91/open-dyslexic.css" rel="stylesheet">
  <?php } else { ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">
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
      padding: 20px;
    }
    h1 {
      text-align: center;
      margin-bottom: 40px;
      font-size: 36px;
    }
    .mascote-container {
      display: flex;
      flex-direction: column;
      gap: 40px;
      align-items: center;
    }
    .mascote-card {
      display: flex;
      align-items: center;
      background: white;
      border: 3px solid transparent;
      border-radius: 12px;
      box-shadow: 2px 4px 8px rgba(0,0,0,0.2);
      width: 80%;
      max-width: 800px;
      padding: 16px;
      position: relative;
      cursor: pointer;
      transition: 0.3s;
    }
    .mascote-card.selected {
      border: 3px solid green;
    }
    .mascote-card img {
      width: 120px;
      height: 120px;
      object-fit: contain;
      border-radius: 12px;
    }
    .check-icon {
      position: absolute;
      top: 10px;
      left: 10px;
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
    .mascote-card.selected .check-icon {
      display: flex;
    }
    .mascote-info {
      margin-left: 20px;
      flex: 1;
    }
    .mascote-info p {
      font-size: 18px;
      line-height: 24px;
    }
    .ouvir-btn {
      position: absolute;
      right: -60px;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
    }
    .ouvir-btn img {
      width: 40px;
      height: 40px;
    }
    .ouvir-btn span {
      font-size: 14px;
      margin-top: 4px;
      text-decoration: underline;
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
  </style>
</head>
<body>
<div class="voltar" onclick="window.location.href='config.php'">
  <img src="imagens/voltar.png" alt="Voltar">
  <div>Voltar</div>
</div>
<h1>Escolha seu Mascote</h1>
<div class="mascote-container">
  <div class="mascote-card" onclick="selecionarMascote(this)" data-src="ada.png">
    <div class="check-icon">✔</div>
    <img src="imagens/ada.png" alt="Ada">
    <div class="mascote-info">
      <p id="desc1"><strong>Ada:</strong> Ada Lovelace foi a primeira programadora da história, conhecida por escrever o primeiro algoritmo para uma máquina.</p>
    </div>
    <div class="ouvir-btn" onclick="event.stopPropagation(); falarTexto('desc1')">
      <img src="imagens/ouvir.png" alt="Ouvir">
      <span>Ouvir</span>
    </div>
  </div>
  <div class="mascote-card" onclick="selecionarMascote(this)" data-src="alan.png">
    <div class="check-icon">✔</div>
    <img src="imagens/alan.png" alt="Alan">
    <div class="mascote-info">
      <p id="desc2"><strong>Alan:</strong> Alan Turing foi um matemático britânico que criou a base da computação moderna.</p>
    </div>
    <div class="ouvir-btn" onclick="event.stopPropagation(); falarTexto('desc2')">
      <img src="imagens/ouvir.png" alt="Ouvir">
      <span>Ouvir</span>
    </div>
  </div>
  <div class="mascote-card" onclick="selecionarMascote(this)" data-src="eniac.png">
    <div class="check-icon">✔</div>
    <img src="imagens/eniac.png" alt="ENIAC">
    <div class="mascote-info">
      <p id="desc3"><strong>Eniac:</strong> ENIAC foi o primeiro computador eletrônico digital de grande escala, criado em 1946 para cálculos militares nos EUA.</p>
    </div>
    <div class="ouvir-btn" onclick="event.stopPropagation(); falarTexto('desc3')">
      <img src="imagens/ouvir.png" alt="Ouvir">
      <span>Ouvir</span>
    </div>
  </div>
</div>
<button class="salvar-btn" onclick="salvarMascote()">Salvar</button>
<script>
  let selecionado = null;
  function selecionarMascote(el) {
    document.querySelectorAll('.mascote-card').forEach(card => card.classList.remove('selected'));
    el.classList.add('selected');
    selecionado = el.getAttribute('data-src');
  }
  function salvarMascote() {
    if (!selecionado) {
      alert("Escolha um mascote primeiro!");
      return;
    }
    alert("Mascote salvo com sucesso! (simulado)");
  }
  function falarTexto(id) {
    const el = document.getElementById(id);
    const texto = el.innerText;
    const utterance = new SpeechSynthesisUtterance(texto);
    utterance.lang = 'pt-BR';
    utterance.rate = 0.9;
    speechSynthesis.cancel();
    speechSynthesis.speak(utterance);
  }
</script>
</body>
</html>