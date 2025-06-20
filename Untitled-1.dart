<script>
    let vozAda = null;

    function obterVozFeminina() {
      const voices = speechSynthesis.getVoices();
      return voices.find(v => v.name === "Microsoft Maria - Portuguese (Brazil)") ||
             voices.find(v => v.lang === "pt-BR" && v.name.toLowerCase().includes("maria")) ||
             voices.find(v => v.lang === "pt-BR") ||
             voices[0];
    }

    function falarTexto(texto) {
      if (!vozAda || !texto) return;
      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      utterance.voice = vozAda;
      utterance.rate = 0.9;
      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);
    }

    function falarAda(texto) {
      if (!vozAda) return;

      const falaEl = document.getElementById("ada-msg");
      falaEl.innerHTML = "";

      const palavras = texto.split(/\s+/);
      let indice = 0;

      const utterance = new SpeechSynthesisUtterance(texto);
      utterance.lang = 'pt-BR';
      utterance.voice = vozAda;
      utterance.rate = 0.9;
      speechSynthesis.cancel();
      speechSynthesis.speak(utterance);

      const intervalo = setInterval(() => {
        if (indice < palavras.length) {
          falaEl.innerHTML += (indice > 0 ? " " : "") + `<span style="text-decoration: underline red;">${palavras[indice]}</span>`;
          indice++;
        } else {
          clearInterval(intervalo);
        }
      }, 400);

      setTimeout(() => {
        falaEl.style.display = 'none';
      }, 15000);
    }

    function inicializarVozAda() {
      vozAda = obterVozFeminina();
    }

    window.addEventListener('load', () => {
      if (speechSynthesis.getVoices().length > 0) {
        inicializarVozAda();
        falarAda("Olá, Lucas! Eu sou a Ada, estou aqui para aprender com você. Vamos juntos?");
      } else {
        speechSynthesis.onvoiceschanged = () => {
          inicializarVozAda();
          falarAda("Olá, Lucas! Eu sou a Ada, estou aqui para aprender com você. Vamos juntos?");
        };
      }
    });
  </script>