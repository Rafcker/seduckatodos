
function falarTexto(texto) {
    if (!texto) return;
    const utterance = new SpeechSynthesisUtterance(texto);
    utterance.lang = 'pt-BR';
    utterance.rate = 0.9;
    utterance.voice = speechSynthesis.getVoices().find(v => v.lang === "pt-BR") || speechSynthesis.getVoices()[0];
    speechSynthesis.cancel();
    speechSynthesis.speak(utterance);
}

window.addEventListener('load', () => {
    if (speechSynthesis.getVoices().length === 0) {
    speechSynthesis.onvoiceschanged = () => {};
    }
});
