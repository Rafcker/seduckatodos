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

    select {
      appearance: none;
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

    .botoes {
      margin-top: 40px;
      display: flex;
      justify-content: space-between;
    }

    .btn-preview,
    .btn-publicar {
      width: 48%;
      padding: 15px;
      font-size: 22px;
      font-weight: bold;
      border: 1px solid black;
      border-radius: 10px;
      cursor: pointer;
      background-color: #FBFADC;
    }

    .btn-preview:hover,
    .btn-publicar:hover {
      background-color: #f1f1b0;
    }

    .video-preview {
      display: none;
      margin-top: 40px;
      text-align: center;
    }

    iframe {
      max-width: 100%;
      border-radius: 10px;
      border: 2px solid #ccc;
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

    <label for="youtube">Link Incorporado do YouTube</label>
    <input type="text" id="youtube" value="<iframe width='875' height='492' src='https://www.youtube.com/embed/r2JCz8na_40' allowfullscreen></iframe>">

    <label for="descricao">Descrição (Opcional)</label>
    <input type="text" id="descricao" value="Assista a essa aula completa.">

    <label for="turma">Turma</label>
    <select id="turma">
      <option selected>3ª Série B</option>
      <option>3ª Série A</option>
      <option>2ª Série B</option>
    </select>

    <div class="linha-horizontal">
      <div>
        <label for="data-inicio">Início de Liberação</label>
        <input type="date" id="data-inicio" value="2025-05-10">
      </div>
      <div>
        <label for="hora-inicio">Horário Início</label>
        <input type="time" id="hora-inicio" value="07:00">
      </div>
    </div>

    <div class="linha-horizontal">
      <div>
        <label for="data-fim">Término</label>
        <input type="date" id="data-fim" value="2025-05-10">
      </div>
      <div>
        <label for="hora-fim">Horário Fim</label>
        <input type="time" id="hora-fim" value="22:00">
      </div>
    </div>

    <div class="botoes">
      <button class="btn-preview" onclick="mostrarVideo()">pré-visualização</button>
      <button class="btn-publicar" onclick="publicarVideo()">Publicar</button>
    </div>

    <div class="video-preview" id="videoPreview">
      <h2>Pré-visualização da Aula</h2>
      <div id="playerArea"></div>
    </div>

    <div id="mensagemSucesso" class="mensagem-sucesso">
      Vídeo aula publicada com sucesso!
    </div>
  </div>

  <script>
    function mostrarVideo() {
      const campo = document.getElementById("youtube").value;
      const playerArea = document.getElementById("playerArea");
      const videoPreview = document.getElementById("videoPreview");

      playerArea.innerHTML = campo;
      videoPreview.style.display = "block";
      videoPreview.scrollIntoView({ behavior: 'smooth' });
    }

    function publicarVideo() {
      const msg = document.getElementById("mensagemSucesso");
      msg.style.display = "block";
      msg.scrollIntoView({ behavior: 'smooth' });

      // Ocultar a mensagem após 4 segundos
      setTimeout(() => {
        msg.style.display = "none";
      }, 4000);
    }
  </script>

</body>
</html>
