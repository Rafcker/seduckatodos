<div class="top-bar-fixed">
  <div class="top-buttons">
    <a href="escolha_disciplina.php" class="foco-botao">
      <img src="imagens/inicio.png" alt="Início">
      <span>Início</span>
    </a>

    <?php if ($_SESSION['perfil'] == 'TDAH') { ?>
      <div class="foco-botao" onclick="ativarPomodoro()">
        <img src="imagens/pomodoro.png" alt="Pomodoro">
        <span id="pomodoroTimer">Pomodoro</span>
      </div>
      <div class="foco-botao" onclick="ativarModoFoco()">
        <img src="imagens/foco.png" alt="Modo Foco">
        <span>Modo Foco</span>
      </div>
    <?php } ?>

    <?php if ($_SESSION['perfil'] == 'TEA') { ?>
      <div class="foco-botao" onclick="ativarModoCalmo()">
        <img src="imagens/calmo.png" alt="Modo Calmo">
        <span>Modo Calmo</span>
      </div>
      <div class="foco-botao" onclick="window.location.href='pausa.php'">
        <img src="imagens/pausa.png" alt="Pausa">
        <span>Pausa</span>
      </div>
    <?php } ?>

    <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
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
      <img src="imagens/conf.png" alt="Configurações">
      <span>Configurações</span>
    </div>
  </div>

  <div class="status-box">
    <strong>Etapa 3 de 10</strong><br>
    Pontuação: <span style="color: green; font-size: 24px;">10</span>
  </div>
</div>
