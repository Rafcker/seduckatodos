<?php
session_start(); // Inicia a sessão para acessar o perfil do usuário
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha a Disciplina</title>

  <!-- Ícones do Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Estilo principal da tela -->
  <link rel="stylesheet" href="css/style_escolha_disciplina.css">

  <!-- Scripts JavaScript principais -->
  <script src="js/script_escolha_disciplina.js"></script>  
  <script src="js/separar_silabas.js"></script>  
  <script src="js/calmo.js"></script>
  <script src="js/leitura_guiada.js"></script>
  <script src="js/pomodoro.js"></script>
  <script src="js/foco.js"></script>
  
  <audio id="ding" src="sons/ding.mp3" preload="auto"></audio>
  <audio id="alarme" src="sons/alarme.mp3" preload="auto" loop></audio>

  <!-- Define fonte conforme o perfil -->
  <?php
  if ($_SESSION['perfil'] == 'DISLEXIA') {
  ?>
    <!-- Fonte OpenDyslexic para Dislexia -->
    <link href="https://fonts.cdnfonts.com/css/open-dyslexic" rel="stylesheet">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open-Dyslexic', Arial, sans-serif;
        line-height: 2.5;
        .leitura-frase.highlight {
            text-decoration: underline red;
          }
      }
    </style>
  <?php } else { ?>
    <!-- Fonte padrão para demais perfis -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <?php } ?>
</head>

<body>

<!-- ========================= -->
<!-- BARRA FIXA DE NAVEGAÇÃO  -->
<!-- ========================= -->
<div class="top-bar-fixed">

  <div class="top-buttons">

    <!-- Botão Início -->
    <div class="foco-botao">
      <a href="escolha_disciplina.php"><img src="imagens/inicio.png" alt="Início"></a>
      <span>Inicio</span>
    </div>

    <!-- Botões específicos por perfil -->
    <?php if ($_SESSION['perfil'] == 'TDAH') { ?>
      <div class="foco-botao" onclick="ativarPomodoro(this)">
        <img src="imagens/pomodoro.png" alt="Pomodoro">
        <span id="pomodoroTimer">Pomodoro</span>
      </div>
      
      <div class="foco-botao" onclick="ativarModoFoco()">
        <img src="imagens/foco.png" alt="Modo Foco">
        <span>Modo Foco</span>
      </div>
    <?php } elseif ($_SESSION['perfil'] == 'TEA') { ?>
      <div class="foco-botao" onclick="alternarModoCalmo(this)">
        <img src="imagens/calmo.png" alt="Modo Calmo">
        <span>Modo Calmo</span>
      </div>
      <div class="foco-botao" onclick="window.location.href='pausa.php'">
        <img src="imagens/pausa.png" alt="Pausa">
        <span>Pausa</span>
      </div>
    <?php } elseif ($_SESSION['perfil'] == 'DISLEXIA') { ?>
      <div class="foco-botao" id="btnSilabas" onclick="alternarSeparacaoSilabas()">
        <img src="imagens/pomodoro.png" alt="Separar Sílabas">
        <span id="labelSilabas">Separar Sílabas</span>
      </div>
      
      <div class="foco-botao" onclick="ativarLeituraGuiada()">
        <img src="imagens/foco.png" alt="Leitura Guiada">
        <span>Leitura Guiada</span>
      </div>
    <?php } ?>

    <!-- Botões comuns -->
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

  <!-- Foto de perfil dinâmica por perfil -->
  <div class="perfil-foto" onclick="alert('Alterar Foto')">
    <img src="imagens/perfil_<?php echo strtolower($_SESSION['perfil']); ?>.png" alt="Foto do Perfil">
  </div>
</div>

<!-- Título da seção -->
<br>
<div class="title">Escolha a Disciplina que Vamos Estudar hoje!</div>

<!-- ========================= -->
<!-- CARDS DE DISCIPLINAS     -->
<!-- ========================= -->
<div class="main-content">
  <?php
    // Lista de disciplinas
    $disciplinas = [ 
      'Banco de Dados', 
      'Biologia', 
      'Geografia', 
      'História', 
      'Matemática', 
      'Português', 
      'Programação', 
      'Química'
    ];

    // Geração dinâmica de cards
    foreach ($disciplinas as $disciplina) {
      $icone = strtolower($disciplina); // nome da imagem
      $alerta = ($disciplina === 'Matemática') ? '<div class="alert">3 pendentes</div>' : '<div class="status">Tudo ok!</div>';

      echo "
      <div class='audio-wrapper'>
        <img class='audio-btn' src='imagens/ouvir.png' width='50' alt='Ouvir' onclick=\"falarTexto('$disciplina')\">
        <div class='card'>
          <form method='POST' action='selecionar_atividade.php'>
            <input type='hidden' name='disciplina' value='$disciplina'>
            <button type='submit' title='Ir para $disciplina'></button>
          </form>
          <img class='icon' src='imagens/logos_disciplinas/$icone.png' alt='$disciplina'>
          <h3>$disciplina</h3>
          $alerta
        </div>
      </div>";
    }
  ?>
</div>

<!-- ========================= -->
<!-- SEÇÃO DA MASCOTE ADA     -->
<!-- ========================= -->
<div class="ada-section">
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
  <!-- Balão de fala da mascote -->
  <div class="ada-message" id="ada-msg"></div>
</div>

</body>
</html>
