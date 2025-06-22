 function ativarModoCalmo() {
    const adaBox = document.querySelector('.ada-section'); // Oculta Ada
    if (adaBox) adaBox.style.display = 'none';
    alert("Modo Calmo Ativado!");

    document.querySelectorAll('.ada-msg').forEach(msg => {
      msg.style.display = 'none'; // Oculta balões
    });

    document.body.style.backgroundColor = '#E3F2FD'; // Fundo calmo
    document.querySelectorAll('.question-box, .option').forEach(el => {
      el.style.boxShadow = 'none';
      el.style.backgroundColor = '#ffffff';
    });

    document.querySelectorAll('img').forEach(img => {
      img.style.filter = 'grayscale(20%) brightness(1.05)'; // Menos estímulo visual
    });
  }

  function desativarModoCalmo() {
    const adaBox = document.querySelector('.ada-section');
    if (adaBox) adaBox.style.display = 'flex'; // Exibe Ada

    document.querySelectorAll('.ada-msg').forEach(msg => {
      msg.style.display = 'block'; // Exibe mensagens
    });

    document.body.style.backgroundColor = '#E3F2FD';
    document.querySelectorAll('.question-box, .option').forEach(el => {
      el.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
      el.style.backgroundColor = '#ffffff';
    });

    document.querySelectorAll('img').forEach(img => {
      img.style.filter = 'none'; // Restaura imagens
    });

    alert("Modo Calmo desativado. Ada voltou!");
  }

  let modoCalmoAtivo = false;

  function alternarModoCalmo(botao) {
    if (!modoCalmoAtivo) {
      ativarModoCalmo();
      modoCalmoAtivo = true;
      botao.querySelector('span').textContent = "Desativar Modo Calmo";
    } else {
      desativarModoCalmo();
      modoCalmoAtivo = false;
      botao.querySelector('span').textContent = "Modo Calmo";
    }
  }