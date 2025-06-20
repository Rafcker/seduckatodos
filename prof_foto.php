<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Foto de Perfil</title>
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
      width: 600px;
      box-shadow: 3px 4px 6px rgba(0,0,0,0.2);
      text-align: center;
    }

    h2 {
      font-size: 32px;
      color: #2F2E2E;
      margin-bottom: 30px;
    }

    .preview-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 3px solid #1b4778;
      object-fit: cover;
      margin-bottom: 20px;
    }

    input[type="file"] {
      font-size: 16px;
      margin-bottom: 20px;
    }

    button {
      padding: 12px 24px;
      font-size: 18px;
      font-weight: bold;
      background-color: #FBFADC;
      border: 1px solid #000;
      border-radius: 10px;
      cursor: pointer;
      margin: 10px;
    }

    button:hover {
      background-color: #f1f1b0;
    }

    .mensagem-sucesso {
      display: none;
      margin-top: 20px;
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      border: 1px solid #c3e6cb;
      border-radius: 10px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <!-- Barra Superior -->
  <header>
    <div class="perfil-area">
      <img src="imagens/perfil_prof.png" alt="Foto do Professor">
      <div><strong>Bem Vindo,<br>Professor(a) Antônio Luis</strong></div>
    </div>
    <img src="imagens/sino.png" alt="Notificação" style="width: 40px; height: 40px;">
  </header>

  <!-- Barra Lateral -->
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

  <!-- Conteúdo Central -->
  <div class="container">
    <h2>Alterar Foto de Perfil</h2>

    <img src="imagens/perfil_prof.png" alt="Prévia" class="preview-img" id="preview">

    <input type="file" accept="image/*" onchange="mostrarPreview(event)">
    <br>

    <button onclick="confirmarAlteracao()">Salvar Foto</button>
    <button onclick="voltarTelaAnterior()">🔙 Voltar</button>

    <div class="mensagem-sucesso" id="sucesso">
      ✅ Foto de perfil alterada com sucesso!
    </div>
  </div>

  <script>
    function mostrarPreview(event) {
      const img = document.getElementById('preview');
      const file = event.target.files[0];
      if (file) {
        const leitor = new FileReader();
        leitor.onload = function(e) {
          img.src = e.target.result;
        };
        leitor.readAsDataURL(file);
      }
    }

    function confirmarAlteracao() {
      document.getElementById('sucesso').style.display = 'block';
    }

    function voltarTelaAnterior() {
      window.history.back();
    }
  </script>

</body>
</html>
