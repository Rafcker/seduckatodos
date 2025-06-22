  function falarTexto(texto) {
      const utterance = new SpeechSynthesisUtterance(texto); // Cria objeto de fala
      utterance.lang = 'pt-BR'; // Define idioma
      utterance.rate = 0.9; // Velocidade de leitura
      const voices = speechSynthesis.getVoices(); // Obtém vozes disponíveis
      utterance.voice = voices.find(v => v.lang === 'pt-BR') || voices[0]; // Escolhe voz em português
      speechSynthesis.cancel(); // Cancela falas anteriores
      speechSynthesis.speak(utterance); // Inicia leitura
  }

  function ativarPomodoro() {
      let tempo = 0.5 * 60; // Define tempo de estudo (30 segundos)
      const display = document.getElementById("pomodoroTimer"); // Elemento que exibe o tempo
      const ding = document.getElementById("ding"); // Som de aviso
      const intervalo = setInterval(() => { // Inicia contagem regressiva
          const minutos = Math.floor(tempo / 60); // Calcula minutos
          const segundos = tempo % 60; // Calcula segundos
          display.textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`; // Atualiza texto
          tempo--;

          if (tempo < 0) {
              ding.play(); // Toca som
              alert("Hora de descansar! 5 minutos."); // Alerta
              clearInterval(intervalo); // Encerra contagem
              display.textContent = "Descanso: 5:00"; // Exibe pausa
              let descanso = 5 * 60; // Tempo de descanso
              const pausa = setInterval(() => { // Contagem da pausa
                  const m = Math.floor(descanso / 60);
                  const s = descanso % 60;
                  display.textContent = `Descanso: ${m}:${s < 10 ? '0' : ''}${s}`;
                  descanso--;
                  if (descanso < 0) {
                      clearInterval(pausa); // Encerra pausa
                      display.textContent = "Pomodoro"; // Reseta botão
                  }
              }, 1000);
          }
      }, 1000);
  }

  function ativarModoFoco() {
      if (!document.fullscreenElement) {
          document.documentElement.requestFullscreen(); // Ativa tela cheia
      } else {
          document.exitFullscreen(); // Sai da tela cheia
      }
  }

  function marcarRespostaCorreta() {
      const alternativas = document.querySelectorAll('.option-container'); // Pega todas as opções
      let acertou = false; // Controle de acerto

      alternativas.forEach(container => {
          const option = container.querySelector('.option'); // Pega o botão da opção
          const input = option.querySelector('input[type="radio"]'); // Pega o input
          option.classList.remove('option-correct', 'option-wrong'); // Remove classes anteriores

          if (input.checked) { // Se essa opção foi marcada
              if (input.value === 'a') { // Se for a correta
                  option.classList.add('option-correct'); // Marca como certa
                  document.getElementById('adaMsg').innerHTML = 'Parabéns, <strong>Lucas</strong>! Você acertou!';
                  acertou = true;
              } else {
                  option.classList.add('option-wrong'); // Marca como errada
                  document.getElementById('adaMsg').innerHTML = mensagemErroAleatoria(); // Mensagem de erro
              }
              document.getElementById('adaMsg').style.display = 'block'; // Mostra mensagem
              setTimeout(() => {
                  document.getElementById('adaMsg').style.display = 'none'; // Oculta após 15s
              }, 15000);
          }
      });

      const proximaBtn = document.getElementById('proximaBtn'); // Botão próxima
      if (acertou) {
          proximaBtn.style.display = 'inline-block'; // Mostra botão se acertou
      } else {
          proximaBtn.style.display = 'none'; // Oculta se errou
      }
  }

  document.addEventListener('DOMContentLoaded', () => {
      const radios = document.querySelectorAll('input[name="resposta"]'); // Pega os rádios
      radios.forEach(radio => {
          radio.addEventListener('change', marcarRespostaCorreta); // Chama ao selecionar
      });
  });

  let silabasSeparadas = false;

  function alternarSeparacaoSilabas() {
      if (!silabasSeparadas) {
          separarSilabas(); // Aplica separação
          document.getElementById('labelSilabas').textContent = 'Juntar Sílabas';
          silabasSeparadas = true;
      } else {
          juntarSilabas(); // Restaura original
          document.getElementById('labelSilabas').textContent = 'Separar Sílabas';
          silabasSeparadas = false;
      }
  }

  function separarSilabas() {
      const vogais = 'aeiouáéíóúâêôãõà'; // Vogais consideradas

      function separarPalavra(palavra) {
          let partes = [];
          let i = 0;
          while (i < palavra.length) {
              if (vogais.includes(palavra[i].toLowerCase()) && i !== 0) {
                  partes.push("-");
              }
              partes.push(palavra[i]);
              i++;
          }
          return partes.join('');
      }

      function processarTexto(texto) {
          return texto
              .split(/\b/)
              .map(token => /^[a-zA-ZÀ-ÿ]{2,}$/.test(token) ? separarPalavra(token) : token)
              .join('');
      }

      const ignorarTags = ['SCRIPT', 'STYLE', 'IMG'];

      const percorrer = (elemento) => {
          if (elemento.nodeType === Node.TEXT_NODE && elemento.textContent.trim() !== '') {
              if (!elemento.parentNode.dataset.original) {
                  elemento.parentNode.dataset.original = elemento.parentNode.innerHTML;
              }
              elemento.textContent = processarTexto(elemento.textContent); // Aplica separação
          } else if (elemento.nodeType === Node.ELEMENT_NODE && !ignorarTags.includes(elemento.tagName)) {
              elemento.childNodes.forEach(percorrer); // Recursivo
          }
      };

      percorrer(document.body); // Começa pelo body
  }

  function juntarSilabas() {
      const elementos = document.querySelectorAll('[data-original]');
      elementos.forEach(el => {
          el.innerHTML = el.dataset.original; // Restaura conteúdo
          delete el.dataset.original;
      });
  }

  function ativarLeituraGuiada() {
      const areaLeitura = document.querySelector(".quiz-container") || document.body; // Área alvo
      const botaoLeitura = document.querySelector(".audio-button"); // Botão (se tiver)

      wrapTextNodes(areaLeitura); // Envolve textos em span

      const spans = Array.from(areaLeitura.querySelectorAll(".leitura-frase")).filter(s => s.innerText.trim() !== "");
      let indice = 0;

      function lerProxima() {
          if (indice >= spans.length) {
              if (botaoLeitura) botaoLeitura.classList.remove('active');
              return;
          }

          spans.forEach(s => s.classList.remove("highlight"));
          const spanAtual = spans[indice];
          spanAtual.classList.add("highlight");

          const utterance = new SpeechSynthesisUtterance(spanAtual.innerText); // Cria leitura
          utterance.lang = 'pt-BR';
          utterance.rate = 0.9;
          utterance.pitch = 1.1;

          const voices = window.speechSynthesis.getVoices();
          utterance.voice = voices.find(v => v.lang === 'pt-BR' && v.name.toLowerCase().includes("female")) || voices[0];

          utterance.onend = () => {
              indice++;
              lerProxima(); // Chama próxima
          };

          window.speechSynthesis.cancel(); // Interrompe anterior
          window.speechSynthesis.speak(utterance); // Lê palavra atual
      }

      if (botaoLeitura) botaoLeitura.classList.add('active');
      lerProxima(); // Inicia leitura
  }

  function 
  Guiada(botao) {
      const alvo = botao.previousElementSibling || botao.parentElement.querySelector('label, h3, .code-snippet, .ada-msg');
      if (!alvo) return;

      const textoOriginal = alvo.textContent.trim(); // Texto a ser lido
      const palavras = textoOriginal.split(/\s+/); // Divide em palavras
      let index = 0;

      const utterance = new SpeechSynthesisUtterance(textoOriginal);
      utterance.lang = 'pt-BR';
      utterance.rate = 0.9;
      const voices = speechSynthesis.getVoices();
      utterance.voice = voices.find(v => v.lang === 'pt-BR' && v.name.toLowerCase().includes('female')) || voices[0];

      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);

      const intervalo = setInterval(() => {
          if (index >= palavras.length) {
              alvo.textContent = textoOriginal;
              clearInterval(intervalo);
              return;
          }

          const antes = palavras.slice(0, index).join(' ');
          const atual = `<span style="text-decoration: underline red;">${palavras[index]}</span>`;
          const depois = palavras.slice(index + 1).join(' ');
          alvo.innerHTML = [antes, atual, depois].filter(Boolean).join(' ');
          index++;
      }, 400); // Intervalo entre palavras
  }

  function ativarModoCalmo() {
      const adaBox = document.querySelector('.ada-box'); // Oculta Ada
      if (adaBox) adaBox.style.display = 'none';

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
      const adaBox = document.querySelector('.ada-box');
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

  function aumentarFonte() {
      document.body.style.fontSize = 'larger'; // Aumenta fonte
      document.querySelectorAll('*').forEach(el => {
          if (!el.style.fontSize) el.style.fontSize = 'inherit';
      });
  }

  let contrasteAtivo = false;

  function alternarContraste() {
      contrasteAtivo = !contrasteAtivo;
      document.body.style.filter = contrasteAtivo ? 'invert(100%) contrast(120%)' : 'none';
  }

  let modoEscuro = false;

  function alternarModoEscuro() {
      modoEscuro = !modoEscuro;
      document.body.style.backgroundColor = modoEscuro ? '#121212' : '#E3F2FD';
      document.querySelectorAll('*').forEach(el => {
          el.style.color = modoEscuro ? '#ffffff' : '';
          if (el.style.backgroundColor) {
              el.style.backgroundColor = modoEscuro ? '#333' : '';
          }
      });
  }

  function ativarAcessibilidadePura() {
      aumentarFonte();
      if (!contrasteAtivo) alternarContraste();
      if (!modoEscuro) alternarModoEscuro();
  }

  function mensagemErroAleatoria() {
      const index = Math.floor(Math.random() * mensagensErro.length); // Sorteia índice
      return mensagensErro[index]; // Retorna mensagem
  }

  const mensagensErro = [
      "Não foi dessa vez, <strong>Lucas</strong>! Mas você está indo muito bem!",
      "Quase lá, <strong>Lucas</strong>! Vamos tentar de novo?",
      "Ops! Resposta incorreta, <strong>Lucas</strong>. Mas não desanime!",
      "Erros fazem parte do aprendizado, <strong>Lucas</strong>!",
      "Hmm... ainda não é isso, <strong>Lucas</strong>, continue tentando!",
      "Força, <strong>Lucas</strong>! Você está no caminho certo!",
      "Respira fundo, <strong>Lucas</strong>. Dá pra melhorar!",
      "Você está aprendendo, <strong>Lucas</strong>. Tente mais uma vez!",
      "Errar é normal, <strong>Lucas</strong>. Vamos de novo?",
      "Não desista agora, <strong>Lucas</strong>! Sua evolução está só começando!",
      "Errou? Tudo bem, <strong>Lucas</strong>! Tente novamente com calma.",
      "Acontece, <strong>Lucas</strong>. Reflita e tente outra vez!",
      "Continue firme, <strong>Lucas</strong>! O acerto vem com a prática.",
      "Erros mostram que você está tentando, <strong>Lucas</strong>. Parabéns por isso!",
      "Você está indo bem, <strong>Lucas</strong>. Só mais uma tentativa!",
      "Quase lá! <strong>Lucas</strong>, ajuste o foco e tente outra vez.",
      "Isso faz parte do processo, <strong>Lucas</strong>! Não desista.",
      "Cada erro te deixa mais perto do acerto, <strong>Lucas</strong>!",
      "Pode confiar, <strong>Lucas</strong>! Você vai conseguir!",
      "Calma, <strong>Lucas</strong>. O importante é seguir tentando!"
  ];

  function wrapTextNodes(el) {
      for (let node of el.childNodes) {
          if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== "") {
              const span = document.createElement("span");
              span.textContent = node.textContent.trim();
              span.classList.add("leitura-frase"); // Marca como trecho lido
              el.replaceChild(span, node);
          } else if (node.nodeType === Node.ELEMENT_NODE) {
              wrapTextNodes(node); // Recursivo
          }
      }
  }

  function ativarLeituraGuiada() {
      const areaLeitura = document.querySelector(".quiz-container") || document.body;
      const botaoLeitura = document.querySelector(".audio-button");

      wrapTextNodes(areaLeitura);

      const spans = Array.from(areaLeitura.querySelectorAll(".leitura-frase")).filter(s => s.innerText.trim() !== "");

      let indice = 0;

      function lerProxima() {
          if (indice >= spans.length) {
              if (botaoLeitura) botaoLeitura.classList.remove('active');
              return;
          }

          spans.forEach(s => s.classList.remove("highlight"));

          const spanAtual = spans[indice];
          spanAtual.classList.add("highlight");

          const utterance = new SpeechSynthesisUtterance(spanAtual.innerText);
          utterance.lang = 'pt-BR';
          utterance.rate = 0.9;
          utterance.pitch = 1.1;

          const voices = window.speechSynthesis.getVoices();
          utterance.voice = voices.find(v => v.lang === 'pt-BR' && v.name.toLowerCase().includes("female")) || voices[0];

          utterance.onend = () => {
              indice++;
              lerProxima();
          };

          window.speechSynthesis.cancel();
          window.speechSynthesis.speak(utterance);
      }

      if (botaoLeitura) botaoLeitura.classList.add('active');
      lerProxima();
  }