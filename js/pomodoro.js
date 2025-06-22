let pomodoroAtivo = false;
let intervaloEstudo = null;
let intervaloDescanso = null;

function ativarPomodoro(botao = null) {
    const display = document.getElementById("pomodoroTimer");
    const ding = document.getElementById("ding");
    const alarme = document.getElementById("alarme");

    if (pomodoroAtivo) {
        pararPomodoro(botao);
        return;
    }

    pomodoroAtivo = true;
    let tempo = 25 * 60; // Tempo de estudo (teste: 30s)

    if (botao) botao.querySelector('span').textContent = "Parar Pomodoro";

    if (alarme) {
        alarme.loop = false;
        alarme.pause();
        alarme.currentTime = 0;
        alarme.play(); // Som inicial chamativo
    }

    intervaloEstudo = setInterval(() => {
        const minutos = Math.floor(tempo / 60);
        const segundos = tempo % 60;
        display.textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
        tempo--;

        if (tempo < 0) {
            clearInterval(intervaloEstudo);
            if (ding) ding.play();
            alert("Hora de descansar! 5 minutos.");
            iniciarDescanso(display, botao);
        }
    }, 1000);
}

function iniciarDescanso(display, botao = null) {
    let descanso = 5 * 60; // Tempo de descanso (teste: 6s)
    display.textContent = "Descanso: 5:00";

    intervaloDescanso = setInterval(() => {
        const m = Math.floor(descanso / 60);
        const s = descanso % 60;
        display.textContent = `Descanso: ${m}:${s < 10 ? '0' : ''}${s}`;
        descanso--;

        if (descanso < 0) {
            clearInterval(intervaloDescanso);
            display.textContent = "Pomodoro";
            pomodoroAtivo = false;

            const alarme = document.getElementById("alarme");
            if (alarme) {
                alarme.loop = true;
                alarme.currentTime = 0;
                alarme.play(); // Som contínuo até parar
            }

            alert("Fim da pausa! Clique para parar o som e iniciar novamente.");
            if (botao) botao.querySelector('span').textContent = "Pomodoro";
        }
    }, 1000);
}

function pararPomodoro(botao = null) {
    clearInterval(intervaloEstudo);
    clearInterval(intervaloDescanso);
    pomodoroAtivo = false;

    const display = document.getElementById("pomodoroTimer");
    display.textContent = "Pomodoro";

    const alarme = document.getElementById("alarme");
    if (alarme) {
        alarme.loop = false;
        alarme.pause();
        alarme.currentTime = 0;
    }

    if (botao) botao.querySelector('span').textContent = "Pomodoro";
}
