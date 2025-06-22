let vozAda = null;

function obterVozFeminina() {
    const voices = speechSynthesis.getVoices();
    return voices.find(v => v.lang === 'pt-BR') || voices[0];
}

const perfilUsuario = "<?php echo $_SESSION['perfil']; ?>";

function falarTexto(texto) {
if (!vozAda || !texto) return;

const utterance = new SpeechSynthesisUtterance(texto);
utterance.lang = 'pt-BR';
utterance.voice = vozAda;

if (perfilUsuario === 'TDAH') {
    utterance.rate = 2.0;
} else if (perfilUsuario === 'DISLEXIA') {
    utterance.rate = 0.5;
} else {
    utterance.rate = 1.0;
}

speechSynthesis.cancel();
speechSynthesis.speak(utterance);
}


function inicializarVozAda() {
    vozAda = obterVozFeminina();
}

function falarAda() {
    const falaEl = document.getElementById("ada-msg");
    const textoOriginal = "Olá, Lucas. Tudo bem? Você ainda tem 3 tarefas de Matemática. Vamos resolver juntos?";
    const palavras = textoOriginal.split(/\s+/);
    let indice = 0;
    falaEl.innerHTML = "";
    const intervalo = setInterval(() => {
    if (indice < palavras.length) {
        falaEl.innerHTML += (indice > 0 ? " " : "") + `<span style=\"text-decoration: underline red;\">${palavras[indice]}</span>`;
        indice++;
    } else {
        clearInterval(intervalo);
    }
    }, 400);
}

window.addEventListener('load', () => {
    if (speechSynthesis.getVoices().length > 0) {
    inicializarVozAda();
    falarAda();
    } else {
    speechSynthesis.onvoiceschanged = () => {
        inicializarVozAda();
        falarAda();
    };
    }
    setTimeout(() => {
    const fala = document.querySelector('.ada-message');
    if (fala) fala.style.display = 'none';
    }, 15000);
});

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.audio-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const card = e.target.closest('.card');
        const disciplina = card.querySelector('h3').innerText;
        falarTexto(disciplina);
    });
    });
});
