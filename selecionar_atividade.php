<?php
// Inicia a sessão para acessar variáveis globais, como o perfil do usuário
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" /> <!-- Define a codificação como UTF-8 para suportar acentos -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna o site responsivo em dispositivos móveis -->
  <title><?php echo $_SESSION['perfil']; ?> - Bem-vindo</title> <!-- Título da aba com o nome do perfil -->

  <!-- Importa o CSS principal da página -->
  <link rel="stylesheet" href="css/style_selecionar_atividade.css">
  <script src="js/separar_silabas.js"></script>
  <script src="js/leitura_guiada.js"></script>
  <script src="js/calmo.js"></script>
  <script src="js/pomodoro.js"></script>
  <script src="js/foco.js"></script>

  <?php 
  // Caso o perfil seja DISLEXIA, aplica fonte especial para facilitar a leitura
  if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
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
             text-decoration-thickness: 3px; /* Aumenta a espessura do sublinhado */
            text-underline-offset: 3px;
          }
      }
    </style>
  <?php 
  } else { 
    // Caso contrário, usa fonte moderna padrão
  ?>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <?php } ?>
</head>

<body>
  <!-- Barra superior fixa com botões de navegação -->
  <div class="top-bar-fixed">
    <div class="top-buttons">

      <!-- Botão Início -->
      <div class="foco-botao">
        <a href="config.php"><img src="imagens/inicio.png" alt="Início"></a>
        <span>Inicio</span>
      </div>

      <!-- Botões específicos por perfil -->
      <?php if ($_SESSION['perfil'] == 'TDAH') { ?>
        <!-- TDAH: Pomodoro e Modo Foco -->
        <div class="foco-botao" onclick="ativarPomodoro()">
          <img src="imagens/pomodoro.png" alt="Pomodoro">
          <span id="pomodoroTimer">Pomodoro</span>
        </div>
        <div class="foco-botao" onclick="ativarModoFoco()">
          <img src="imagens/foco.png" alt="Modo Foco">
          <span>Modo Foco</span>
        </div>
      <?php } elseif ($_SESSION['perfil'] == 'TEA') { ?>
        <!-- TEA: Modo Calmo e Pausa -->
        <div class="foco-botao" onclick="alternarModoCalmo(this)">
          <img src="imagens/calmo.png" alt="Modo Calmo">
          <span>Modo Calmo</span>
        </div>
        <div class="foco-botao" onclick="window.location.href='pausa.php'">
          <img src="imagens/pausa.png" alt="Pausa">
          <span>Pausa</span>
        </div>
      <?php } elseif ($_SESSION['perfil'] == 'DISLEXIA') { ?>
        <!-- DISLEXIA: Separar Sílabas e Leitura Guiada -->
        <div class="foco-botao" id="btnSilabas" onclick="alternarSeparacaoSilabas()">
          <img src="imagens/pomodoro.png" alt="Separar Sílabas">
          <span id="labelSilabas">Separar Sílabas</span>
        </div>
        <div class="foco-botao" onclick="ativarLeituraGuiada()">
          <img src="imagens/foco.png" alt="Leitura Guiada">
          <span>Leitura Guiada</span>
        </div>
      <?php } ?>

      <!-- Botão Configurações -->
      <div class="foco-botao">
        <a href="config.php"><img src="imagens/conf.png" alt="Configurações"></a>
        <span>Configurações</span>
      </div>

      <!-- Botão Resultados -->
      <div class="foco-botao">
        <a href="config.php"><img src="imagens/progresso.png" alt="Resultados"></a>
        <span>Resultados</span>
      </div>

      <!-- Botão Sair -->
      <div class="foco-botao">
        <a href="logout.php"><img src="imagens/sair.png" alt="Sair"></a>
        <span>Sair</span>
      </div>
    </div>

    <!-- Foto de perfil do usuário com ícone de edição -->
    <div class="perfil-foto" onclick="alert('Alterar Foto')">
      <img src="imagens/perfil_<?php echo strtolower($_SESSION['perfil']); ?>.png" alt="Foto do Perfil">
    </div>
  </div>
  <div  id="conteudoPrincipal" class="container">

  <!-- Título principal da página -->
  <div class="title">Escolha a Disciplina que vamos estudar hoje!</div>

  <!-- Conteúdo principal -->
    <div class="main-content">
      <?php
        // Define as atividades conforme o perfil
        if ($_SESSION['perfil'] == 'TEA') {
          $atividades = [
            ['nome' => 'Vídeo-Aulas', 'img' => 'imagens/video_tea.png', 'status' => '2 pendentes'],
            ['nome' => 'Materiais',    'img' => 'imagens/materiais_tea.png', 'status' => 'Tudo ok!'],
            ['nome' => 'Quiz',         'img' => 'imagens/quiz_tea.png', 'status' => 'Tudo ok!']
          ];
        } elseif ($_SESSION['perfil'] == 'TDAH') {
          $atividades = [
            ['nome' => 'Vídeo-Aulas', 'img' => 'imagens/video_tdah.jpg', 'status' => '2 pendentes'],
            ['nome' => 'Materiais',    'img' => 'imagens/materiais_tdah.png', 'status' => 'Tudo ok!'],
            ['nome' => 'Quiz',         'img' => 'imagens/quiz_tdah.jpg', 'status' => 'Tudo ok!']
          ];
        } elseif ($_SESSION['perfil'] == 'DISLEXIA') {
          $atividades = [
            ['nome' => 'Vídeo-Aulas', 'img' => 'imagens/video_dislexia.png', 'status' => '2 pendentes'],
            ['nome' => 'Materiais',    'img' => 'imagens/materiais_dislexia.png', 'status' => 'Tudo ok!'],
            ['nome' => 'Quiz',         'img' => 'imagens/quiz_dislexia.png', 'status' => 'Tudo ok!']
          ];
        }

        // Exibe os cartões de atividades
        foreach ($atividades as $atv) {
          $nome = $atv['nome'];
          $imagem = $atv['img'];
          $status = $atv['status'];
          $corStatus = ($status == 'Tudo ok!') ? 'blue' : 'red';

          // Estrutura do card da atividade
          echo "
          <div class='card-container'>
            <div class='audio-btn-wrapper'>
              <img class='audio-btn' src='imagens/ouvir.png' width='35' alt='Ouvir $nome' onclick=\"falarTexto('$nome')\">
            </div>
            <div class='card'>
              <button onclick=\"irParaAtividade('$nome')\" title='Ir para $nome'></button>
              <img class='icon' src='$imagem' alt='$nome'>
              <h3>$nome</h3>
              <div class='status' style='color: $corStatus;'>$status</div>
            </div>
          </div>";
        }
      ?>
    </div>

    <!-- Seção da mascote Ada (ou Eniac/Alan) -->
    <div class="ada-section">
      <?php
        // Exibe a imagem do mascote de acordo com o perfil
        if ($_SESSION['perfil'] == "TDAH") {
          echo '<img src="imagens/ada.png" alt="Ada">';
        } elseif ($_SESSION['perfil'] == "TEA") {
          echo '<img src="imagens/eniac.png" alt="Eniac">';
        } elseif ($_SESSION['perfil'] == "DISLEXIA") {
          echo '<img src="imagens/alan.png" alt="Alan">';
        }
      ?>
      <!-- Mensagem de apoio da mascote -->
      <div class="ada-message">
        Olá! tudo bem? Posso te ajudar! Você ainda tem algumas atividades pendentes!
      </div>
    </div>

  <!-- Funções em JavaScript -->
  <script>
    // Redireciona para a página correspondente com base no nome da atividade
    function irParaAtividade(nome) {
      const nomeFormatado = nome.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();

      if (nomeFormatado.includes("video")) {
        window.location.href = "video-aula.php";
      } else if (nomeFormatado.includes("materiais")) {
        window.location.href = "materiais.php";
      } else if (nomeFormatado.includes("quiz")) {
        window.location.href = "quiz.php";
      } else {
        alert("Atividade desconhecida: " + nome);
      }
    }

    // Ativa a leitura em voz do texto passado
    function falarTexto(texto) {
      const fala = new SpeechSynthesisUtterance(texto);
      fala.lang = 'pt-BR';
      fala.rate = 0.9;
      speechSynthesis.cancel(); // Cancela qualquer leitura anterior
      speechSynthesis.speak(fala); // Inicia a leitura do texto
    }
  </script>

  <!-- Arquivo JS externo com funcionalidades adicionais -->
  <script src="js/script_selecionar_atividade.js"></script>
</body>
</html>
