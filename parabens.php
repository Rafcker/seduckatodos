<?php
session_start();
// $_SESSION['perfil'] = 'TEA'; // Para testes locais
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parabéns - Atividades Concluídas</title>

  <!-- Fontes e ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
    <link href="https://fonts.cdnfonts.com/css/open-dyslexic" rel="stylesheet">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open-Dyslexic', Arial, sans-serif;
        line-height: 1.5;
      }
    </style>
  <?php } else { ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Lexend Deca', sans-serif;
      }
    </style>
  <?php } ?>

  <style>
    body {
      background-color: #e3f2fd;
      width: 100vw;
      height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    .top-bar-fixed {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #fff;
      border-bottom: 2px solid #000;
      padding: 10px 20px;
      z-index: 1000;
    }

    .top-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: left;
      align-items: center;
      gap: 20px;
    }

    .foco-botao {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      text-align: center;
      font-size: 14px;
    }

    .foco-botao img {
      width: 40px;
      height: 40px;
    }

    .parabens-container {
      margin-top: 160px;
      text-align: center;
    }

    .parabens-container img {
      width: 180px;
      height: auto;
    }

    .linha-ouvir {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-top: 20px;
    }

    .linha-ouvir h1 {
      font-size: 36px;
      margin: 0;
    }

    .ouvir-inline {
      display: flex;
      align-items: center;
      gap: 5px;
      cursor: pointer;
      font-size: 16px;
      color: #000;
      text-decoration: underline;
    }

    .ouvir-inline img {
      width: 24px;
      height: 24px;
    }

    .parabens-container p {
      font-size: 20px;
      margin-top: 10px;
    }

    .btn-voltar {
      background-color: #83FF44;
      border: 1px solid black;
      border-radius: 40px;
      padding: 20px 40px;
      font-size: 28px;
      margin-top: 30px;
      text-decoration: none;
      color: black;
      display: inline-block;
    }

    .btn-voltar:hover {
      background-color: #76e63e;
    }
  </style>
</head>
<body>

  <!-- Barra superior com botões lado a lado -->
  <div class="top-bar-fixed">
    <div class="top-buttons">
      <div class="foco-botao">
        <a href="escolha_disciplina.php"><img src="imagens/inicio.png" alt="Início"></a>
        <span>Início</span>
      </div>

      <?php if ($_SESSION['perfil'] == 'TDAH'){ ?>
        <div class="foco-botao" onclick="ativarPomodoro()">
          <img src="imagens/pomodoro.png" alt="Pomodoro">
          <span>Pomodoro</span>
        </div>
        <div class="foco-botao" onclick="ativarModoFoco()">
          <img src="imagens/foco.png" alt="Modo Foco">
          <span>Modo Foco</span>
        </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'TEA'){ ?>
        <div class="foco-botao" onclick="alternarModoCalmo()">
          <img src="imagens/calmo.png" alt="Modo Calmo">
          <span>Modo Calmo</span>
        </div>
        <div class="foco-botao">
          <a href="pausa.php"><img src="imagens/pausa.png" alt="Pausa"></a>
          <span>Pausa</span>
        </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'DISLEXIA'){ ?>
        <div class="foco-botao" onclick="alternarSeparacaoSilabas()">
          <img src="imagens/pomodoro.png" alt="Separar Sílabas">
          <span>Separar Sílabas</span>
        </div>
        <div class="foco-botao" onclick="ativarLeituraGuiada()">
          <img src="imagens/foco.png" alt="Leitura Guiada">
          <span>Leitura Guiada</span>
        </div>
      <?php } ?>

      <div class="foco-botao">
        <a href="config.php"><img src="imagens/conf.png" alt="Configurações"></a>
        <span>Configurações</span>
      </div>

      <div class="foco-botao">
        <a href="resultados.php"><img src="imagens/progresso.png" alt="Resultados"></a>
        <span>Resultados</span>
      </div>

      <div class="foco-botao">
        <a href="logout.php"><img src="imagens/sair.png" alt="Sair"></a>
        <span>Sair</span>
      </div>
    </div>
  </div>

  <!-- Tela de Parabéns -->
  <div class="parabens-container">
    <img src="imagens/parabens.png" alt="Parabéns">

    <div class="linha-ouvir">
      <h1>Parabéns, Lucas</h1>
      <div class="ouvir-inline" onclick="falarTexto('Parabéns, Lucas. Você concluiu todas as atividades!')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <p>Você concluiu todas as atividades!</p>

    <a href="escolha_disciplina.php" class="btn-voltar">Voltar Para Tela de Atividades</a>
  </div>

  <!-- Scripts -->
  <script>
    let voz = null;

    function inicializarVoz() {
      const voices = speechSynthesis.getVoices();
      voz = voices.find(v => v.lang === 'pt-BR') || voices[0];
    }

    function falarTexto(texto) {
      if (!voz) inicializarVoz();
      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      utterance.voice = voz;

      const perfil = "<?php echo $_SESSION['perfil']; ?>";
      if (perfil === 'TDAH') {
        utterance.rate = 2.0;
      } else if (perfil === 'DISLEXIA') {
        utterance.rate = 0.7;
      } else {
        utterance.rate = 1.0;
      }

      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);
    }

    window.speechSynthesis.onvoiceschanged = inicializarVoz;

    function ativarPomodoro() {
      alert("Modo Pomodoro ativado!");
    }

    function ativarModoFoco() {
      alert("Modo Foco ativado!");
    }

    function alternarModoCalmo() {
      alert("Modo Calmo ativado!");
    }

    function alternarSeparacaoSilabas() {
      alert("Separar sílabas ativado!");
    }

    function ativarLeituraGuiada() {
      alert("Leitura guiada ativada!");
    }
  </script>
</body>
</html>
