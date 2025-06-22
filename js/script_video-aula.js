    function ativarPomodoro() {
      let tempo = 10;
      const display = document.getElementById("pomodoroTimer");
      const intervalo = setInterval(() => {
        const minutos = Math.floor(tempo / 60);
        const segundos = tempo % 60;
        display.textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
        tempo--;
        if (tempo < 0) {
          clearInterval(intervalo);
          alert("Hora de descansar!");
          display.textContent = "Pomodoro";
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

    function alternarModoCalmo(botao) {
      const adaBox = document.querySelector('.ada-box');
      adaBox.style.display = adaBox.style.display === 'none' ? 'flex' : 'none';
      document.body.style.backgroundColor = '#E3F2FD';
    }

    let silabasSeparadas = false;

    function alternarSeparacaoSilabas() {
      const el = document.body;
      if (!silabasSeparadas) {
        el.innerHTML = el.innerHTML.replace(/(\w{2,})/g, (match) => match.split('').join('-'));
        document.getElementById('labelSilabas').textContent = 'Juntar Sílabas';
        silabasSeparadas = true;
      } else {
        location.reload();
      }
    }

    function ativarLeituraGuiada() {
      const texto = document.body.innerText;
      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      speechSynthesis.speak(utterance);
    }

    function enviarComentario() {
      const input = document.querySelector('.comentario-input');
      if (input.value.trim() !== '') {
        alert('Comentário enviado: ' + input.value);
        input.value = '';
      } else {
        alert('Digite seu comentário antes de enviar.');
      }
    }