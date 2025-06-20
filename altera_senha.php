<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Senha</title>
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
      margin: 160px auto;
      padding: 40px;
      background: #FFFFFF;
      border-radius: 20px;
      border: 2px solid #A69765;
      width: 600px;
      box-shadow: 3px 4px 6px rgba(0,0,0,0.2);
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 20px;
      font-size: 20px;
    }

    .campo-senha {
      display: flex;
      align-items: center;
      margin-top: 5px;
      background: #FBFADC;
      border: 1px solid black;
      border-radius: 8px;
      padding: 5px 10px;
    }

    .campo-senha input[type="password"],
    .campo-senha input[type="text"] {
      flex: 1;
      font-size: 20px;
      border: none;
      background: transparent;
      padding: 10px;
      outline: none;
    }

    .campo-senha img {
      width: 24px;
      height: 24px;
      cursor: pointer;
    }

    .botoes {
      margin-top: 30px;
      text-align: center;
    }

    button {
      padding: 12px 30px;
      font-size: 18px;
      font-weight: bold;
      background-color: #FBFADC;
      border: 1px solid #000;
      border-radius: 10px;
      cursor: pointer;
    }

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
    <div class="perfil-area">
      <img src="imagens/perfil_prof.png" alt="Foto do Professor">
      <div><strong>Bem Vindo,<br>Professor(a) Antônio Luis</strong></div>
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
  </div>

  <div class="container">
    <label>Senha Atual</label>
    <div class="campo-senha">
      <input type="password" id="senhaAtual">
      <img src="imagens/olho2.png" onclick="toggleSenha('senhaAtual', this)">
    </div>

    <label>Nova Senha</label>
    <div class="campo-senha">
      <input type="password" id="novaSenha">
      <img src="imagens/olho2.png" onclick="toggleSenha('novaSenha', this)">
    </div>

    <label>Confirmar Nova Senha</label>
    <div class="campo-senha">
      <input type="password" id="confirmarSenha">
      <img src="imagens/olho2.png" onclick="toggleSenha('confirmarSenha', this)">
    </div>

    <div class="botoes">
      <button onclick="alterarSenha()">Salvar Senha</button>
    </div>

    <div class="mensagem-sucesso" id="mensagemSucesso">
      ✅ Senha alterada com sucesso!
    </div>

    <div class="botoes">
      <button onclick="window.history.back()">← Voltar</button>
    </div>
  </div>

  <script>
    function toggleSenha(idCampo, icone) {
      const campo = document.getElementById(idCampo);
      campo.type = campo.type === 'password' ? 'text' : 'password';
    }

    function alterarSenha() {
      const atual = document.getElementById('senhaAtual').value;
      const nova = document.getElementById('novaSenha').value;
      const confirmar = document.getElementById('confirmarSenha').value;

      if (!atual || !nova || !confirmar) {
        alert('Por favor, preencha todos os campos.');
        return;
      }

      if (nova !== confirmar) {
        alert('A nova senha e a confirmação não coincidem.');
        return;
      }

      document.getElementById('mensagemSucesso').style.display = 'block';
    }
  </script>
</body>
</html>
