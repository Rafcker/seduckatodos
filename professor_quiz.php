<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela do Professor</title>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Lexend Deca', sans-serif;
      background-color: #e3f2fd;
      display: flex;
      flex-direction: column;
    }
    header {
      background: #1b4778;
      color: white;
      padding: 15px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    header .perfil {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    header img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }
    .main {
      display: flex;
    }
    .sidebar {
      width: 80px;
      background: #1b4778;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px 0;
    }
    .sidebar img {
      width: 50px;
      height: 50px;
      margin: 10px 0;
      border-radius: 50%;
      cursor: pointer;
    }
    .content {
      display: flex;
      flex: 1;
      padding: 20px;
      gap: 20px;
    }
    .left {
      flex: 2;
      background-color: #f5fbff;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #bcdffb;
    }
    .right {
      flex: 1;
      background: #fffde7;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }
    input[type="text"], input[type="date"], input[type="time"], textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #999;
      margin-top: 5px;
    }
    textarea {
      resize: vertical;
      height: 100px;
    }
    .questao {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      margin-top: 20px;
      border: 2px solid #c6e0f5;
    }
    .resposta {
      background: #fdfdfd;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
    }
    .resposta input[type="text"] {
      flex: 1;
      margin-right: 10px;
    }
    .resposta button {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }
    .resposta img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
      cursor: pointer;
    }
    .botoes {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .botoes button {
      padding: 10px 20px;
      border-radius: 5px;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }
    .btn-add { background-color: #fce303; }
    .btn-ia { background-color: #009781; color: white; }
    .btn-publicar { background-color: #f5f5dc; }
    .orientacoes ul {
      padding-left: 20px;
    }
    .correct { color: green; }
    .wrong { color: red; }
    .mensagem-sucesso {
      display: none;
      margin-top: 20px;
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      border: 1px solid #c3e6cb;
      border-radius: 10px;
      text-align: center;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <header>
    <div class="perfil">
      <img src="imagens/perfil_prof.png" alt="Foto professor">
      <div><strong>Bem Vindo,<br>Professor(a) Antônio Luis</strong></div>
    </div>
    <img src="imagens/sino.png" alt="Sino">
  </header>

  <div class="main">
    <div class="sidebar">
      <a href="inicio_prof.php"><img src="imagens/inicio.png" alt="Inicio"></a>
      <a href="prof_conf.php"><img src="imagens/conf.png" alt="Configurações"></a>
      <a href="aluno_resultados.php"><img src="imagens/resultados.png" alt="Resultados"></a>
      <a href="painel_turmas.php"><img src="imagens/cadastro.png" alt="Cadastro"></a>
      <a href="logout.php"><img src="imagens/sair.png" alt="Sair"></a>
    </div>

    <div class="content">
      <div class="left">
        <label>Perfil:</label>
        <input type="checkbox"> TEA
        <input type="checkbox"> TDAH
        <input type="checkbox"> Dislexia

        <label>Título</label>
        <input type="text" placeholder="Frações">

        <div id="questoes"></div>

        <div class="botoes">
          <button class="btn-add" onclick="adicionarQuestao()">+ Questão</button>
          <button class="btn-ia" onclick="adaptarComIA()">Adaptar com IA</button>
          <button class="btn-publicar" onclick="publicar()">Publicar</button>
        </div>

        <div class="mensagem-sucesso" id="mensagemSucesso">✅ Atividade publicada com sucesso!</div>
      </div>

      <div class="right">
        <label>Data Início:</label>
        <input type="date">
        <label>Data Fim:</label>
        <input type="date">
        <label>Hora Início:</label>
        <input type="time">
        <label>Hora Fim:</label>
        <input type="time">

        <div class="orientacoes">
          <strong>ORIENTAÇÕES PARA PROFESSORES</strong>
          <ul>
            <li>📝 Criar perguntas curtas</li>
            <li>🧠 Usar linguagem simples</li>
            <li>🎨 Inserir imagens para TEA</li>
            <li>📌 Indicar perfil correto</li>
            <li>🛠️ Sugestões de verbos fáceis</li>
            <li>🎯 Preferir frases afirmativas</li>
          </ul>
        </div>
        <img src="https://placehold.co/100x50" alt="Logo SEDUC" style="margin-top: 20px">
      </div>
    </div>
  </div>

  <script>
    let contadorQuestoes = 1;

    function marcarCorreta(botao) {
      const botoes = botao.closest('.questao').querySelectorAll('.resposta button');
      botoes.forEach(b => {
        b.textContent = '❌';
        b.classList.remove('correct');
        b.classList.add('wrong');
      });
      botao.textContent = '✅';
      botao.classList.remove('wrong');
      botao.classList.add('correct');
    }

    function abrirSeletorImagem() {
      const input = document.createElement('input');
      input.type = 'file';
      input.accept = 'image/*';
      input.click();
    }

    function adicionarQuestao() {
      const questoesDiv = document.getElementById('questoes');
      const bloco = document.createElement('div');
      bloco.classList.add('questao');
      bloco.innerHTML = `
        <label>${contadorQuestoes}. Questão:</label>
        <textarea id="pergunta${contadorQuestoes}">
Durante uma gincana escolar, os alunos de uma turma arrecadaram alimentos para doação. Ao final do evento, os organizadores contabilizaram que 1/4 da arrecadação era composta por pacotes de arroz, 2/5 por pacotes de feijão e o restante por pacotes de macarrão. Sabendo que, no total, foram arrecadados 200 pacotes de alimentos, quantos pacotes de macarrão foram arrecadados?
        </textarea>
        <label>Respostas</label>
        <div class="resposta"><input type="text" value="Foram arrecadados 80 pacotes de macarrão"><img src="imagens/icon_img.png" onclick="abrirSeletorImagem()"><button class="wrong" onclick="marcarCorreta(this)">❌</button></div>
        <div class="resposta"><input type="text" value="Foram arrecadados 70 pacotes de macarrão"><img src="imagens/icon_img.png" onclick="abrirSeletorImagem()"><button class="correct" onclick="marcarCorreta(this)">✅</button></div>
        <div class="resposta"><input type="text" value="Foram arrecadados 60 pacotes de macarrão"><img src="imagens/icon_img.png" onclick="abrirSeletorImagem()"><button class="wrong" onclick="marcarCorreta(this)">❌</button></div>
        <div class="resposta"><input type="text" value="Foram arrecadados 50 pacotes de macarrão"><img src="imagens/icon_img.png" onclick="abrirSeletorImagem()"><button class="wrong" onclick="marcarCorreta(this)">❌</button></div>
      `;
      questoesDiv.appendChild(bloco);
      contadorQuestoes++;
    }

    function adaptarComIA() {
      const pergunta = document.querySelector("textarea[id^='pergunta']");
      if (pergunta) {
        pergunta.value =
          "Em uma gincana, os alunos arrecadaram 200 pacotes de alimentos.\n• 1/4 era de arroz\n• 2/5 era de feijão\n• O resto era macarrão\n\nQuantos pacotes de macarrão foram arrecadados?";
      }

      const alternativas = document.querySelectorAll(".resposta input");
      const botoes = document.querySelectorAll(".resposta button");

      const novas = [
        "80 pacotes de macarrão",
        "70 pacotes de macarrão",
        "60 pacotes de macarrão",
        "50 pacotes de macarrão"
      ];

      alternativas.forEach((el, i) => {
        el.value = novas[i];
        botoes[i].textContent = i === 1 ? "✅" : "❌";
        botoes[i].classList.remove("correct", "wrong");
        botoes[i].classList.add(i === 1 ? "correct" : "wrong");
      });
    }

    function publicar() {
      const msg = document.getElementById('mensagemSucesso');
      msg.style.display = 'block';
      msg.scrollIntoView({ behavior: 'smooth' });
    }

    window.onload = adicionarQuestao;
  </script>
</body>
</html>
