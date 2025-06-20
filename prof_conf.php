<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
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
      margin: 150px auto;
      padding: 20px;
      max-width: 900px;
      display: flex;
      flex-direction: column;
      gap: 30px;
    }

    .btn-config {
      background: #F7F6F3;
      border: 2px solid #A69765;
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.25);
      border-radius: 20px;
      height: 120px;
      display: flex;
      align-items: center;
      gap: 25px;
      padding: 20px 30px;
      font-size: 30px;
      cursor: pointer;
      transition: 0.2s;
    }

    .btn-config:hover {
      transform: scale(1.02);
    }

    .btn-config img {
      width: 85px;
      height: 85px;
    }

    .btn-texto {
      font-size: 30px;
      color: black;
    }
  </style>
</head>
<body>

  <!-- Barra superior -->
  <header>
    <div class="perfil-area">
      <img src="imagens/perfil_prof.png" alt="Foto do Professor">
      <div>
        <strong>Bem Vindo,<br>Professor(a) Antônio Luis</strong>
      </div>
    </div>
    <img src="imagens/sino.png" alt="Notificação" style="width: 40px; height: 40px;">
  </header>

  <!-- Barra lateral -->
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

  <!-- Conteúdo central -->
<div class="container">
  <button class="btn-config" onclick="location.href='prof_foto.php'">
    <img src="imagens/perfil_prof.png" alt="Foto Perfil">
    <div class="btn-texto">Alterar foto de<br>Perfil</div>
  </button>

  <button class="btn-config" onclick="location.href='altera_senha.php'">
    <img src="imagens/senha.png" alt="Senha">
    <div class="btn-texto">Alterar Senha</div>
  </button>
</div>

</body>
</html>
