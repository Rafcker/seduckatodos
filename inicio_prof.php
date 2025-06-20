<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
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

    .centro-conteudo {
      margin-left: 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 100px;
    }

    .btn-acao {
      width: 600px;
      background: #FBFADC;
      border: 1px solid black;
      border-radius: 10px;
      display: flex;
      align-items: center;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-acao:hover {
      transform: scale(1.02);
    }

    .btn-acao img {
      width: 80px;
      height: auto;
      margin-right: 30px;
    }

    .btn-acao span {
      font-size: 32px;
      text-decoration: underline;
      color: black;
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

  <div class="centro-conteudo">
    <div class="btn-acao" onclick="window.location.href='prof_video.php'">
      <img src="imagens/pvideo.png" alt="Video Aula">
      <span>Inserir Vídeo-Aula</span>
    </div>

    <div class="btn-acao" onclick="window.location.href='prof_material.php'">
      <img src="imagens/pmaterial.png" alt="Material">
      <span>Inserir Material</span>
    </div>

    <div class="btn-acao" onclick="window.location.href='professor_quiz.php'">
      <img src="imagens/pquiz.png" alt="Quiz">
      <span>Inserir Quiz</span>
    </div>
  </div>
</body>
</html>