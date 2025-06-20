<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Professor</title>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Lexend Deca', sans-serif;
      background: #E3F2FD;
    }

    header {
      background-color: #1b4778;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

    .perfil-area {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .perfil-area img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 0px solid white;
    }

    .lateral {
      position: fixed;
      left: 0;
      top: 100px;
      width: 80px;
      height: calc(100% - 100px);
      background: #1b4778;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 20px;
      gap: 20px;
    }

    .lateral img {
      width: 50px;
      height: 50px;
      cursor: pointer;
    }

    .container {
      margin: 150px auto 50px auto;
      padding: 40px;
      background: #FFFFFF;
      border-radius: 20px;
      border: 2px solid #A69765;
      width: 1000px;
      box-shadow: 3px 4px 6px rgba(0,0,0,0.2);
    }

    h1 {
      font-size: 36px;
      margin-bottom: 40px;
      text-align: center;
      color: #2F2E2E;
    }

    label {
      font-size: 18px;
      font-weight: 700;
      margin-top: 20px;
      display: block;
      color: #2F2E2E;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    select {
      width: 100%;
      height: 50px;
      border: 1px solid #000;
      border-radius: 10px;
      padding: 10px;
      font-size: 18px;
      margin-top: 5px;
      background-color: #FFFFF3;
    }

    .linha-horizontal {
      display: flex;
      justify-content: space-between;
      gap: 40px;
      margin-top: 30px;
    }

    .linha-horizontal div {
      flex: 1;
    }

    .toolbar {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    .toolbar button,
    .toolbar input[type="color"] {
      background: #FBFADC;
      border: 1px solid #000;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      font-weight: bold;
    }

    .editor {
      border: 1px solid #000;
      background: #FFFFF3;
      min-height: 200px;
      padding: 15px;
      border-radius: 10px;
      margin-top: 10px;
    }

    .botoes {
      margin-top: 40px;
      display: flex;
      justify-content: space-between;
    }

    .botoes button {
      width: 32%;
      padding: 15px;
      font-size: 18px;
      font-weight: bold;
      border: 1px solid black;
      border-radius: 10px;
      cursor: pointer;
      background-color: #FBFADC;
    }

    .mensagem-sucesso {
      display: none;
      margin-top: 30px;
      background-color: #d4edda;
      color: #155724;
      padding: 20px;
      border: 1px solid #c3e6cb;
      border-radius: 10px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }

    .perfil-checkboxes {
      margin-top: 10px;
      display: flex;
      gap: 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <header>
    <div class="perfil-area">
      <img src="imagens/perfil_prof.png" alt="Foto do Professor">
      <div>
        <strong>Bem Vindo,<br>Professor(a) Antônio Luis</strong>
      </div>
    </div>
    <img src="imagens/sino.png" alt="Notificação" style="width: 40px; height: 40px;">
  </header>

  <div class="lateral">
    <a href="inicio_prof.php">
    <img src="imagens/inicio.png" alt="Inicio">
  </a>

    <a href="prof_conf.php">
    <img src="imagens/conf.png" alt="Configurações">
  </a>

  <a href="aluno_resultados.php">
    <img src="imagens/resultados.png" alt="Resultados">
  </a>

  <a href="painel_turmas.php">
    <img src="imagens/cadastro.png" alt="Cadastro">
  </a>

  <a href="logout.php">
    <img src="imagens/sair.png" alt="sair">
  </a>
  
  </div>

  <div class="container">
    <h1>Conteúdo da Aula</h1>

    <label for="titulo">Título</label>
    <input type="text" id="titulo" value="Frações">

    <label>Perfil:</label>
    <div class="perfil-checkboxes">
      <label><input type="checkbox" value="TEA"> TEA</label>
      <label><input type="checkbox" value="TDAH"> TDAH</label>
      <label><input type="checkbox" value="DISLEXIA"> Dislexia</label>
    </div>

    <label for="editor">Conteúdo</label>
    <div class="toolbar">
      <button onclick="execCmd('bold')"><b>B</b></button>
      <button onclick="execCmd('italic')"><i>I</i></button>
      <button onclick="execCmd('underlineC')"><u>U</u></button>
      <button onclick="execCmd('insertUnorderedList')">• Lista</button>
      <input type="color" title="Cor do texto" onchange="mudarCorTexto(this.value)">
    </div>
    <div id="editor" class="editor" contenteditable="true">
      Escreva aqui o conteúdo da aula...
    </div>

    <div class="linha-horizontal">
      <div>
        <label for="data-inicio">Data Início:</label>
        <input type="date" id="data-inicio">
      </div>
      <div>
        <label for="hora-inicio">Hora Início:</label>
        <input type="time" id="hora-inicio">
      </div>
    </div>

    <div class="linha-horizontal">
      <div>
        <label for="data-fim">Data Fim:</label>
        <input type="date" id="data-fim">
      </div>
      <div>
        <label for="hora-fim">Hora Fim:</label>
        <input type="time" id="hora-fim">
      </div>
    </div>

    <div class="botoes">
      <button onclick="alertarIA()">Adaptar com IA</button>
      <button onclick="publicar()">Publicar</button>
      <button onclick="limparEditor()">Limpar</button>
    </div>

    <div class="mensagem-sucesso" id="sucesso">
      ✅ Material publicado com sucesso!
    </div>
  </div>

  <script>
    function execCmd(comando) {
      document.execCommand(comando, false, null);
    }

    function mudarCorTexto(cor) {
      document.execCommand("foreColor", false, cor);
    }

    function alertarIA() {
      const editor = document.getElementById("editor");
      editor.innerHTML = `
        <p><strong>Este conteúdo foi adaptado com IA para facilitar a compreensão de alunos neurodivergentes.</strong></p>
        <ul>
          <li>Frases mais curtas</li>
          <li>Vocabulário simples</li>
          <li>Uso de imagens sempre que possível</li>
        </ul>
      `;
    }

    function publicar() {
      const perfilSelecionado = document.querySelectorAll('.perfil-checkboxes input:checked');
      const horaInicio = document.getElementById("hora-inicio").value;
      const horaFim = document.getElementById("hora-fim").value;
      const dataInicio = document.getElementById("data-inicio").value;

      if (perfilSelecionado.length === 0 || !horaInicio || !horaFim || !dataInicio) {
        alert("⚠️ Preencha o perfil, data e hora para publicar.");
        return;
      }

      document.getElementById("sucesso").style.display = "block";
      document.getElementById("sucesso").scrollIntoView({ behavior: "smooth" });
    }

    function limparEditor() {
      document.getElementById("editor").innerHTML = "";
      document.getElementById("sucesso").style.display = "none";
    }
  </script>
</body>
</html>
