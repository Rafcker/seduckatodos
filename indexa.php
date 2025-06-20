<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz - Programação Python</title>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Lexend Deca', sans-serif;
    }

    body {
      background-color: #E3F2FD;
      padding-top: 100px;
    }

    .top-bar-fixed {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #ffffff;
      border-bottom: 2px solid #000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      z-index: 1000;
    }

    .top-buttons {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .foco-botao {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 12px;
      cursor: pointer;
      text-align: center;
    }

    .foco-botao img {
      transition: transform 0.2s;
      width: 40px;
    }

    .foco-botao:hover img {
      transform: scale(1.1);
    }

    .foco-botao span {
      margin-top: 5px;
      font-weight: bold;
    }

    .status-box {
      text-align: right;
    }

    .header {
      background-color: #FFF59D;
      border: 2px solid #000;
      border-radius: 12px;
      padding: 10px 20px;
      font-size: 24px;
      text-align: center;
      margin: 20px auto;
      max-width: 600px;
    }

    .quiz-container {
      max-width: 900px;
      margin: 0 auto;
    }

    .question-box {
      background: white;
      border-radius: 12px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      position: relative;
    }

    .question-box h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .code-snippet {
      font-family: monospace;
      font-size: 18px;
      color: #2E7D32;
      background-color: #F1F8E9;
      padding: 6px 10px;
      display: inline-block;
      border-radius: 6px;
    }

    .audio-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .audio-btn img {
      width: 28px;
    }

    .audio-btn span {
      font-size: 14px;
      text-decoration: underline;
    }

    .answers {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-top: 20px;
    }

    .option-container {
      position: relative;
    }

    .option {
      background: #fff;
      border-radius: 10px;
      border: 1px solid #000;
      padding: 10px;
      display: flex;
      align-items: center;
      gap: 10px;
      box-shadow: 1px 2px 3px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .option-correct {
      background-color: #C8E6C9 !important;
      border-color: #2E7D32 !important;
    }

    .option-wrong {
      background-color: #FFCDD2 !important;
      border-color: #C62828 !important;
    }

    .custom-radio {
      appearance: none;
      -webkit-appearance: none;
      background-color: #000;
      border: 6px solid white;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 0 0 2px black;
      position: relative;
    }

    .custom-radio:checked::after {
      content: '';
      position: absolute;
      width: 10px;
      height: 20px;
      border: solid white;
      border-width: 0 4px 4px 0;
      transform: rotate(45deg);
      top: 8px;
      left: 14px;
    }

    .ouvir-btn {
      position: absolute;
      right: -60px;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .ouvir-btn img {
      width: 24px;
    }

    .ouvir-btn span {
      font-size: 12px;
      text-decoration: underline;
    }

    .ada-box {
      position: fixed;
      bottom: 20px;
      left: 20px;
      display: flex;
      align-items: flex-end;
      gap: 10px;
      z-index: 999;
    }

    .ada-box img {
      height: 140px;
    }

    .ada-msg {
      background: white;
      padding: 15px;
      border-radius: 10px;
      border: 2px solid black;
      max-width: 300px;
      font-size: 16px;
      box-shadow: 2px 3px 5px rgba(0,0,0,0.1);
    }

    #pomodoro-timer {
      font-size: 20px;
      font-weight: bold;
      margin-left: 15px;
    }
  </style>
</head>
<body>
  <div class="top-bar-fixed">
    <div class="top-buttons">
      <div class="foco-botao">
        <img src="imagens/inicio.png" alt="Início">
        <span>Início</span>
      </div>
      <div class="foco-botao" onclick="ativarPomodoro()">
        <img src="imagens/pomodoro.png" alt="Pomodoro">
        <span>Pomodoro</span>
        <span id="pomodoro-timer"></span>
      </div>
      <div class="foco-botao" onclick="ativarModoFoco()">
        <img src="imagens/foco.png" alt="Modo Foco">
        <span>Modo Foco</span>
      </div>
    </div>
    <div class="status-box">
      <strong>Etapa 3 de 10</strong><br>
      Pontuação: <span style="color: green; font-size: 24px;">10</span>
    </div>
  </div>

  <div class="header">
    <div><strong>Quiz</strong></div>
    <div>Programação Python</div>
  </div>

  <div class="quiz-container">
    <div class="question-box">
      <h3>1. O que esse código faz?</h3>
      <div class="code-snippet">print("Olá Mundo")</div>
      <div class="audio-btn" onclick="falarTexto('O que esse código faz? print Olá Mundo')">
        <img src="imagens/ouvir.png" alt="Ouvir">
        <span>Ouvir</span>
      </div>

      <div class="answers">
        <!-- Opções -->
      </div>
    </div>
  </div>

  <div class="ada-box">
    <img src="imagens/ada.png" alt="Ada">
    <div class="ada-msg" id="adaMsg">Olá, Lucas! Eu sou a Ada, estou aqui para aprender com você. Vamos juntos?</div>
  </div>

  <audio id="ding" src="https://actions.google.com/sounds/v1/alarms/beep_short.ogg"></audio>

  <script>
    function falarTexto(texto) {
      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      utterance.rate = 0.9;
      const voices = speechSynthesis.getVoices();
      utterance.voice = voices.find(v => v.lang === 'pt-BR') || voices[0];
      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);
    }

    function ativarPomodoro() {
      let tempo = 25 * 60;
      const timer = document.getElementById("pomodoro-timer");
      const ding = document.getElementById("ding");

      const intervalo = setInterval(() => {
        const minutos = Math.floor(tempo / 60);
        const segundos = tempo % 60;
        timer.textContent = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        tempo--;

        if (tempo < 0) {
          clearInterval(intervalo);
          ding.play();
          alert("Hora de descansar! 5 minutos.");
          iniciarDescanso();
        }
      }, 1000);
    }

    function iniciarDescanso() {
      let tempo = 5 * 60;
      const timer = document.getElementById("pomodoro-timer");
      const ding = document.getElementById("ding");

      const intervalo = setInterval(() => {
        const minutos = Math.floor(tempo / 60);
        const segundos = tempo % 60;
        timer.textContent = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        tempo--;

        if (tempo < 0) {
          clearInterval(intervalo);
          ding.play();
          alert("Hora de voltar aos estudos!");
        }
      }, 1000);
    }

    function ativarModoFoco() {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
      } else {
        document.exitFullscreen();
      }
    }

    function marcarRespostaCorreta() {
      const alternativas = document.querySelectorAll('.option-container');
      alternativas.forEach(container => {
        const option = container.querySelector('.option');
        const input = option.querySelector('input[type="radio"]');

        option.classList.remove('option-correct', 'option-wrong');

        if (input.checked) {
          if (input.value === 'a') {
            option.classList.add('option-correct');
            document.getElementById('adaMsg').textContent = 'Parabéns, Lucas! Você acertou!';
          } else {
            option.classList.add('option-wrong');
            document.getElementById('adaMsg').textContent = 'Não foi dessa vez, Lucas! Tente novamente, você consegue!';
          }

          setTimeout(() => {
            document.getElementById('adaMsg').textContent = '';
          }, 15000);
        }
      });
    }

    document.addEventListener('DOMContentLoaded', () => {
      const radios = document.querySelectorAll('input[name="resposta"]');
      radios.forEach(radio => {
        radio.addEventListener('change', marcarRespostaCorreta);
      });
    });
  </script>
</body>
</html>
