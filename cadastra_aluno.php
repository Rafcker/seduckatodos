<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Aluno</title>
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
      width: 60px;
      height: 60px;
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
      width: 45px;
      height: 45px;
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
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
      font-size: 14px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      background-color: #FFFFF3;
    }

    .linha {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .linha > div {
      flex: 1;
    }

    .botao {
      margin-top: 20px;
      width: 200px;
      padding: 12px;
      font-size: 18px;
      font-weight: bold;
      background: #FFEB3B;
      border: 1px solid black;
      border-radius: 8px;
      cursor: pointer;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .mensagem {
      margin-top: 30px;
      background: #d4edda;
      color: #155724;
      padding: 15px;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
      font-weight: bold;
      text-align: center;
      display: none;
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
    <label>Nome</label>
    <input type="text" value="Lucas Antonio Mendes">

    <label>Escola</label>
    <select>
      <option>CETI Angelina Mendes Braga</option>
      <option>Escola Castro Lopes</option>
      <option>Escola João XXIII</option>
    </select>

    <label>Matrícula</label>
    <input type="text" value="31590@cognitus">

    <div class="linha">
      <div>
        <label>Série</label>
        <select>
          <option>1º ano</option>
          <option>2º ano</option>
          <option>3º ano</option>
        </select>
      </div>
      <div>
        <label>Turma</label>
        <select>
          <option>A</option>
          <option>B</option>
          <option>C</option>
        </select>
      </div>
      <div>
        <label>Perfil</label>
        <select>
          <option>TEA</option>
          <option>TDAH</option>
          <option>Dislexia</option>
        </select>
      </div>
      <div>
        <label>Turno</label>
        <select>
          <option>Integral</option>
          <option>Manhã</option>
          <option>Tarde</option>
        </select>
      </div>
    </div>

    <label>E-mail</label>
    <input type="email" value="lucas@cognitus.com">

    <label>Fone Responsável</label>
    <input type="text" value="(86) 3271-****">

    <button class="botao" onclick="mostrarMensagem()">Cadastrar Aluno</button>

    <div class="mensagem" id="mensagem">
      ✅ Aluno cadastrado com sucesso!
    </div>

    <button class="botao" onclick="history.back()" style="margin-top: 15px; background: #f1f1f1;">⬅ Voltar</button>
  </div>

  <script>
    function mostrarMensagem() {
      const msg = document.getElementById('mensagem');
      msg.style.display = 'block';
      msg.scrollIntoView({ behavior: 'smooth' });
    }
  </script>

</body>
</html>
