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
  document.body.style.backgroundColor = '#E3F2FD';
  document.querySelectorAll('img').forEach(img => {
    img.style.filter = 'grayscale(20%)';
  });
  alert("Modo calmo ativado.");
}

function ativarLeituraGuiada() {
  const container = document.getElementById('conteudo');
  wrapTextNodes(container);
  const spans = Array.from(container.querySelectorAll('span.leitura-frase'));
  let i = 0;

  function lerProxima() {
    if (i >= spans.length) return;
    spans.forEach(s => s.classList.remove('highlight-palavra'));
    const atual = spans[i];
    atual.classList.add('highlight-palavra');

    const utterance = new SpeechSynthesisUtterance(atual.innerText);
    utterance.lang = 'pt-BR';
    utterance.rate = 0.9;
    utterance.pitch = 1.0;

    utterance.onend = () => {
      i++;
      lerProxima();
    };

    speechSynthesis.cancel();
    speechSynthesis.speak(utterance);
  }

  lerProxima();
}

function wrapTextNodes(element) {
  for (const node of element.childNodes) {
    if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== '') {
      const span = document.createElement('span');
      span.className = 'leitura-frase';
      span.textContent = node.textContent;
      element.replaceChild(span, node);
    } else if (node.nodeType === Node.ELEMENT_NODE) {
      wrapTextNodes(node);
    }
  }
}

function separarSilabas() {
  const vogais = 'aeiouáéíóúâêôãõà';

  function separarPalavra(palavra) {
    let partes = [];
    for (let i = 0; i < palavra.length; i++) {
      if (vogais.includes(palavra[i].toLowerCase()) && i !== 0) {
        partes.push('-');
      }
      partes.push(palavra[i]);
    }
    return partes.join('');
  }

  function processarTexto(texto) {
    return texto
      .split(/\b/)
      .map(token => /^[a-zA-ZÀ-ÿ]{2,}$/.test(token) ? separarPalavra(token) : token)
      .join('');
  }

  const ignorarTags = ['SCRIPT', 'STYLE', 'IMG', 'NOSCRIPT'];

  function percorrer(elemento) {
    if (elemento.nodeType === Node.TEXT_NODE && elemento.textContent.trim() !== '') {
      if (!elemento.parentNode.dataset.original) {
        elemento.parentNode.dataset.original = elemento.parentNode.innerHTML;
      }
      elemento.textContent = processarTexto(elemento.textContent);
    } else if (elemento.nodeType === Node.ELEMENT_NODE && !ignorarTags.includes(elemento.tagName)) {
      elemento.childNodes.forEach(percorrer);
    }
  }

  percorrer(document.body);
}

function juntarSilabas() {
  const elementos = document.querySelectorAll('[data-original]');
  elementos.forEach(el => {
    el.innerHTML = el.dataset.original;
    delete el.dataset.original;
  });
}

let silabasSeparadas = false;

function alternarSeparacaoSilabas() {
  if (!silabasSeparadas) {
    separarSilabas();
    document.getElementById('labelSilabas').textContent = 'Juntar Sílabas';
    silabasSeparadas = true;
  } else {
    juntarSilabas();
    document.getElementById('labelSilabas').textContent = 'Separar Sílabas';
    silabasSeparadas = false;
  }
}
