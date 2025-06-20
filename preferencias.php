<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações de Acessibilidade</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Lexend Deca', sans-serif;
    }
    body {
      background: #E3F2FD;
      padding: 100px 40px 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    h1 {
      font-size: 36px;
      margin-bottom: 40px;
      text-align: center;
    }
    .config-container {
      width: 100%;
      max-width: 1000px;
    }
    .config-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #F7F6F3;
      border-radius: 20px;
      padding: 20px 30px;
      margin-bottom: 20px;
      border: 2px solid #A69765;
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .config-info {
      display: flex;
      align-items: center;
      gap: 20px;
      flex: 1;
    }
    .config-info img.icon {
      width: 70px;
      height: 70px;
    }
    .config-label {
      font-size: 30px;
    }
    .switch-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-left: 20px;
    }
    .switch {
      position: relative;
      width: 60px;
      height: 30px;
      background: #ccc;
      border-radius: 30px;
      transition: 0.3s;
      cursor: pointer;
    }
    .switch::before {
      content: '';
      position: absolute;
      width: 26px;
      height: 26px;
      top: 2px;
      left: 2px;
      background: white;
      border-radius: 50%;
      transition: 0.3s;
    }
    .switch.ativo {
      background: #4CAF50;
    }
    .switch.ativo::before {
      transform: translateX(30px);
    }
    .status {
      font-size: 18px;
      font-weight: bold;
      color: #666;
    }
    .status.ligado {
      color: green;
    }
    .ouvir {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      margin-left: 20px;
    }
    .ouvir img {
      width: 40px;
      height: 40px;
    }
    .ouvir span {
      font-size: 20px;
      text-decoration: underline;
    }
    .voltar {
      position: fixed;
      top: 30px;
      left: 30px;
      cursor: pointer;
      text-align: center;
    }
    .voltar img {
      width: 70px;
    }
    .voltar div {
      font-size: 30px;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="voltar" onclick="history.back()">
    <img src="imagens/voltar.png" alt="Voltar">
    <div>Voltar</div>
  </div>
  <h1>Criado para aprender do seu jeito!</h1>
  <div class="config-container">
    <div class="config-card">
      <div class="config-info">
        <img src="imagens/foco.png" class="icon" alt="Foco">
        <div class="config-label">Modo foco<br>sempre ativo</div>
      </div>
      <div class="switch-container">
        <div class="switch" onclick="alternar(this)"></div>
        <div class="status">Desligado</div>
      </div>
      <div class="ouvir" onclick="falar('Modo foco sempre ativo')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="config-card">
      <div class="config-info">
        <img src="imagens/pomodoro1.png" class="icon" alt="Pomodoro">
        <div class="config-label">Pomodoro<br>sempre ativo</div>
      </div>
      <div class="switch-container">
        <div class="switch" onclick="alternar(this)"></div>
        <div class="status">Desligado</div>
      </div>
      <div class="ouvir" onclick="falar('Pomodoro sempre ativo')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="config-card">
      <div class="config-info">
        <img src="imagens/velocidade_audio.png" class="icon" alt="Áudio">
        <div class="config-label">Velocidade<br>do áudio</div>
      </div>
      <select style="font-size: 24px; padding: 5px 10px; border-radius: 10px;">
        <option>0.5X</option>
        <option>0.8X</option>
        <option selected>1X</option>
        <option>1.3X</option>
        <option>1.5X</option>
        <option>2X</option>
      </select>
      <div class="ouvir" onclick="falar('Velocidade do áudio')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="config-card">
      <div class="config-info">
        <img src="imagens/ada_ativa.png" class="icon" alt="Mascote">
        <div class="config-label">Ativar<br>Mascote</div>
      </div>
      <div class="switch-container">
        <div class="switch ativo" onclick="alternar(this)"></div>
        <div class="status ligado">Ligado</div>
      </div>
      <div class="ouvir" onclick="falar('Ativar mascote')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>

    <div class="config-card">
      <div class="config-info">
        <img src="imagens/ada_muda.png" class="icon" alt="Mascote silencioso">
        <div class="config-label">Modo mascote<br>silencioso</div>
      </div>
      <div class="switch-container">
        <div class="switch" onclick="alternar(this)"></div>
        <div class="status">Desligado</div>
      </div>
      <div class="ouvir" onclick="falar('Modo mascote silencioso')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>
    </div>
  </div>

  <script>
    function alternar(el) {
      const ativo = el.classList.toggle('ativo');
      const status = el.parentElement.querySelector('.status');
      if (ativo) {
        status.textContent = 'Ligado';
        status.classList.add('ligado');
      } else {
        status.textContent = 'Desligado';
        status.classList.remove('ligado');
      }
    }
    function falar(texto) {
      const utter = new SpeechSynthesisUtterance(texto);
      utter.lang = 'pt-BR';
      utter.rate = 1;
      speechSynthesis.cancel();
      speechSynthesis.speak(utter);
    }
  </script>
</body>
</html>
