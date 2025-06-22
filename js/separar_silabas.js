let silabasSeparadas = false;

function alternarSeparacaoSilabas() {
    if (!silabasSeparadas) {
        separarSilabas();
        const label = document.getElementById('labelSilabas');
        if (label) label.textContent = 'Juntar Sílabas';
        silabasSeparadas = true;
    } else {
        juntarSilabas();
        const label = document.getElementById('labelSilabas');
        if (label) label.textContent = 'Separar Sílabas';
        silabasSeparadas = false;
    }
}

function separarSilabas() {
    const vogais = 'aeiouáéíóúâêôãõà';

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
            elemento.textContent = processarTexto(elemento.textContent);
        } else if (elemento.nodeType === Node.ELEMENT_NODE && !ignorarTags.includes(elemento.tagName)) {
            elemento.childNodes.forEach(percorrer);
        }
    };

    percorrer(document.body);
}

function juntarSilabas() {
    const elementos = document.querySelectorAll('[data-original]');
    elementos.forEach(el => {
        el.innerHTML = el.dataset.original;
        delete el.dataset.original;
    });
}
