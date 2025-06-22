function toggleSenha() {
  const senhaInput = document.getElementById("senha");
  senhaInput.type = senhaInput.type === "password" ? "text" : "password";
}

function wrapTextNodes(el) {
  for (let node of el.childNodes) {
    if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== "") {
      const span = document.createElement("span");
      span.textContent = node.textContent.trim();
      span.classList.add("leitura-frase");
      el.replaceChild(span, node);
    } else if (node.nodeType === Node.ELEMENT_NODE) {
      wrapTextNodes(node);
    }
  }
}

function ouvirTexto() {
  const wrapper = document.querySelector(".login-wrapper");
  const botaoAudio = document.querySelector(".audio-button");

  wrapTextNodes(wrapper);

  const spans = Array.from(wrapper.querySelectorAll(".leitura-frase")).filter(s => s.innerText.trim() !== "");

  let indice = 0;

  function lerProxima() {
    if (indice >= spans.length) {
      botaoAudio.classList.remove('active');
      return;
    }

    spans.forEach(s => s.classList.remove("highlight"));

    const spanAtual = spans[indice];
    spanAtual.classList.add("highlight");

    const utterance = new SpeechSynthesisUtterance(spanAtual.innerText);
    utterance.lang = 'pt-BR';

    utterance.onend = () => {
      indice++;
      lerProxima();
    };

    speechSynthesis.cancel();
    speechSynthesis.speak(utterance);
  }

  botaoAudio.classList.add('active');
  lerProxima();
}
