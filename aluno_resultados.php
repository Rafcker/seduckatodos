<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Revisar Progresso</title>
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
      margin: 160px auto 80px auto;
      padding: 30px;
      background: #FFFFFF;
      border-radius: 20px;
      border: 2px solid #A69765;
      width: 90%;
      max-width: 1200px;
      box-shadow: 3px 4px 6px rgba(0,0,0,0.2);
    }

    h1 {
      font-size: 32px;
      margin-bottom: 10px;
      text-align: center;
      color: #1b4778;
    }

    .btn-voltar {
      display: block;
      margin: 0 auto 20px auto;
      background-color: #FBFADC;
      border: 1px solid #1b4778;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
    }

    .filtro {
      display: flex;
      justify-content: flex-end;
      gap: 15px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .filtro label {
      font-weight: bold;
      font-size: 16px;
      margin-right: 5px;
    }

    .filtro select {
      font-size: 16px;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 18px;
      margin-bottom: 40px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 14px;
      text-align: center;
    }

    th {
      background-color: #1b4778;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    tr.destacado {
      background-color: #ffe0e0;
      font-weight: bold;
    }

    .resumo {
      font-size: 20px;
    }

    .barra {
      background-color: #ccc;
      border-radius: 20px;
      height: 25px;
      margin-top: 5px;
      margin-bottom: 20px;
    }

    .progresso {
      height: 100%;
      border-radius: 20px;
    }

    .verde { background-color: #4caf50; }
    .azul { background-color: #2196f3; }
    .laranja { background-color: #ff9800; }
    .roxo { background-color: #9c27b0; }
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

  <a href="logout.php">
    <img src="imagens/sair.png" alt="sair">
  </a>


  </div>

  <div class="container">
    <h1>Progresso dos Alunos</h1>
    <button class="btn-voltar" onclick="history.back()">🔙 Voltar</button>

    <div class="filtro">
      <div>
        <label for="escola">Escola:</label>
        <select id="escola">
          <option value="">Todas</option>
          <option value="escola1">CETI Angelina Mendes Braga</option>
          <option value="escola2">Escola João XXIII</option>
        </select>
      </div>
      <div>
        <label for="serie">Série:</label>
        <select id="serie">
          <option value="">Todas</option>
          <option value="1">1º Ano</option>
          <option value="2">2º Ano</option>
          <option value="3">3º Ano</option>
        </select>
      </div>
      <div>
        <label for="turma">Turma:</label>
        <select id="turma">
          <option value="">Todas</option>
          <option value="A">Turma A</option>
          <option value="B">Turma B</option>
          <option value="C">Turma C</option>
        </select>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Escola</th>
          <th>Série</th>
          <th>Turma</th>
          <th>Vídeo-aulas</th>
          <th>Materiais</th>
          <th>Atividades</th>
          <th>Quizzes</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João Silva</td>
          <td>CETI Angelina Mendes Braga</td>
          <td>3º Ano</td>
          <td>A</td>
          <td>✅ 8/10</td>
          <td>✅ 6/10</td>
          <td>✅ 7/10</td>
          <td>✅ 9/10</td>
        </tr>
        <tr class="destacado">
          <td>Maria Souza</td>
          <td>CETI Angelina Mendes Braga</td>
          <td>3º Ano</td>
          <td>B</td>
          <td>⚠️ 3/10</td>
          <td>⚠️ 2/10</td>
          <td>⚠️ 4/10</td>
          <td>⚠️ 5/10</td>
        </tr>
        <tr>
          <td>Carlos Lima</td>
          <td>Escola João XXIII</td>
          <td>2º Ano</td>
          <td>C</td>
          <td>✅ 10/10</td>
          <td>✅ 9/10</td>
          <td>✅ 10/10</td>
          <td>✅ 10/10</td>
        </tr>
      </tbody>
    </table>

    <h2 style="text-align:center; color:#1B4778;">Resumo de Conclusão</h2>

    <div class="resumo">
      <label>📹 Vídeo-aulas concluídas: 80%</label>
      <div class="barra"><div class="progresso verde" style="width: 80%;"></div></div>

      <label>📘 Materiais lidos: 60%</label>
      <div class="barra"><div class="progresso azul" style="width: 60%;"></div></div>

      <label>📝 Atividades entregues: 70%</label>
      <div class="barra"><div class="progresso laranja" style="width: 70%;"></div></div>

      <label>❓ Quizzes respondidos: 90%</label>
      <div class="barra"><div class="progresso roxo" style="width: 90%;"></div></div>
    </div>
  </div>

</body>
</html>
