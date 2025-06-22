// Envolve todos os nós de texto com <span> apenas se forem visíveis e não estiverem em tags ignoradas
function wrapTextNodes(el) {
    const ignorarTags = ['BUTTON', 'A', 'INPUT', 'TEXTAREA', 'SCRIPT', 'STYLE', 'NAV', 'FOOTER', 'HEADER', 'FORM', 'IMG'];

    for (let node of el.childNodes) {
        if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== "") {
            const parentTag = node.parentNode.tagName;
            if (!ignorarTags.includes(parentTag)) {
                const span = document.createElement("span");
                span.textContent = node.textContent.trim();
                span.classList.add("leitura-frase");
                node.parentNode.replaceChild(span, node);
            }
        } else if (node.nodeType === Node.ELEMENT_NODE && !ignorarTags.includes(node.tagName)) {
            wrapTextNodes(node); // Recursivo
        }
    }
}

// Ativa a leitura guiada apenas na div #conteudoPrincipal
function ativarLeituraGuiada() {
    const areaLeitura = document.getElementById("conteudoPrincipal");
    if (!areaLeitura) return;

    // Só aplica spans se ainda não tiver
    if (!areaLeitura.querySelector(".leitura-frase")) {
        wrapTextNodes(areaLeitura);
    }

    const spans = Array.from(areaLeitura.querySelectorAll(".leitura-frase")).filter(s => s.innerText.trim() !== "");
    let indice = 0;

    function lerProxima() {
        if (indice >= spans.length) return;

        spans.forEach(s => s.classList.remove("highlight"));

        const spanAtual = spans[indice];
        spanAtual.classList.add("highlight");

        const utterance = new SpeechSynthesisUtterance(spanAtual.innerText);
        utterance.lang = 'pt-BR';
        utterance.rate = 0.9;
        utterance.pitch = 1.1;

        const voices = speechSynthesis.getVoices();
        utterance.voice = voices.find(v => v.lang === 'pt-BR' && v.name.toLowerCase().includes("female")) || voices[0];

        utterance.onend = () => {
            indice++;
            lerProxima();
        };

        speechSynthesis.cancel();
        setTimeout(() => {
            speechSynthesis.speak(utterance);
        }, 100);
    }

    lerProxima();
}
