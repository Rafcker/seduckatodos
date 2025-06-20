<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vídeo-Aulas - Frações</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style_video-aula.css">
  <script src="js/leitura_guiada.js"></script>
  <script src="js/separar_silabas.js"></script>
  <script src="js/calmo.js"></script>  
    <script src="js/pomodoro.js"></script>
  <script src="js/foco.js"></script>
   <audio id="ding" src="sons/ding.mp3" preload="auto"></audio>
  <audio id="alarme" src="sons/alarme.mp3" preload="auto" loop></audio>
  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
  <link href="https://fonts.cdnfonts.com/css/open-dyslexic" rel="stylesheet">
  <?php } else { ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&family=Lexend+Exa&family=Poppins:wght@700&display=swap" rel="stylesheet">
  <?php } ?>
     <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open-Dyslexic', Arial, sans-serif;
        line-height: 1.5;
        .leitura-frase.highlight {
            text-decoration: underline red;
            text-decoration-thickness: 3px; /* Aumenta a espessura do sublinhado */
            text-underline-offset: 3px;
          }
      }
    </style>
    
</head>
<body>
  <div class="top-bar-fixed">
    <div class="top-buttons">
      <div class="foco-botao">
        <a href="escolha_disciplina.php">
          <img src="imagens/inicio.png" alt="Início">
        </a>
        <span>Início</span>
      </div>

      <?php if ($_SESSION['perfil'] == 'TDAH'){ ?>
      <div class="foco-botao" onclick="ativarPomodoro()">
        <img src="imagens/pomodoro.png" alt="Pomodoro">
        <span id="pomodoroTimer">Pomodoro</span>
      </div>

      <div class="foco-botao" onclick="ativarModoFoco()">
        <img src="imagens/foco.png" alt="Modo Foco">
        <span>Modo Foco</span>
      </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'TEA'){ ?>
      <div class="foco-botao" onclick="alternarModoCalmo(this)">
        <img src="imagens/calmo.png" alt="Modo Calmo">
        <span>Modo Calmo</span>
      </div>

      <div class="foco-botao" onclick="window.location.href='pausa.php'">
        <img src="imagens/pausa.png" alt="Pausa">
        <span>Pausa</span>
      </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'DISLEXIA'){ ?>
      <div class="foco-botao" id="btnSilabas" onclick="alternarSeparacaoSilabas()">
        <img src="imagens/pomodoro.png" alt="Separar Sílabas">
        <span id="labelSilabas">Separar Sílabas</span>
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

    <div class="status-box">
      <strong>Etapa 3 de 10</strong><br>
      Pontuação: <span style="color: green; font-size: 24px;">10</span>
    </div>
  </div>

  <div  id="conteudoPrincipal" class="container">
    <div class="header-box">
      <div class="titulo">Vídeo-Aulas</div>
      <div class="subtitulo">Frações</div>
    </div>

    <iframe class="video" src="https://www.youtube.com/embed/r2JCz8na_40" title="Aula sobre Frações" frameborder="0" allowfullscreen></iframe>

    <div class="comentario-box">
      <h3>O que você achou da aula?</h3>
      <input type="text" class="comentario-input" placeholder="Escreva seu comentário...">
      <button class="comentario-btn" onclick="enviarComentario()">Enviar</button>
    </div>

    <div style="position: fixed; right: 30px; bottom: 40px; text-align: center; cursor: pointer;" onclick="window.location.href='materiais.php'">
  <img src="imagens/proxima.png" alt="Próximo" style="width: 90px; height: 90px;">
  <div style="font-size: 22px; font-family: <?php echo ($_SESSION['perfil'] == 'DISLEXIA') ? 'Open-Dyslexic' : 'Lexend Deca'; ?>; text-decoration: underline; margin-top: 5px;">
    Próximo Material
  </div>
  
  </div>

  <div   class="ada-box">
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
      Olá, Lucas! O Professor preparou uma aula excelente para você. Vamos juntos?
    </div>
  </div>


<script src="script/script_video-aula.js"></script>
</body>
</html>