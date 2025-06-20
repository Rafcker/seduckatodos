<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Turma</title>
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
      max-width: 600px;
      margin: 150px auto;
      padding: 40px;
      background: white;
      border-radius: 20px;
      border: 2px solid #A69765;
      box-shadow: 3px 4px 6px rgba(0,0,0,0.2);
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
      font-size: 14px;
    }

    select, input[type="text"] {
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
      gap: 20px;
      margin-top: 10px;
    }

    .linha > div {
      flex: 1;
    }

    .botao {
      margin-top: 25px;
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
    <div class="linha">
      <div>
        <label for="estado">UF</label>
        <select id="estado" onchange="carregarCidades()">
          <option disabled selected>Selecionar Estado</option>
          <option value="PI">Piauí</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
      </div>
      <div>
        <label for="cidade">Cidade</label>
        <select id="cidade" disabled>
          <option>Selecione o estado primeiro</option>
        </select>
      </div>
    </div>

    <label for="escola">Escola</label>
    <select id="escola">
      <option>CETI Professora Angelina Mendes Braga</option>
      <option>Escola Castro Lopes</option>
    </select>

    <div class="linha">
      <div>
        <label for="serie">Série</label>
        <select id="serie">
          <option>1º ano</option>
          <option>2º ano</option>
          <option>3º ano</option>
        </select>
      </div>
      <div>
        <label for="turma">Turma</label>
        <input type="text" id="turma" placeholder="Ex: A, B, C">
      </div>
    </div>

    <label for="turno">Turno</label>
    <select id="turno">
      <option>Manhã</option>
      <option>Tarde</option>
      <option>Integral</option>
    </select>

    <button class="botao" onclick="mostrarMensagem()">Cadastrar Turma</button>

    <button class="botao" onclick="history.back()" style="margin-top: 15px; background: #f1f1f1;">⬅ Voltar</button>

    <div class="mensagem" id="mensagem">
      ✅ Turma cadastrada com sucesso!
    </div>
  </div>

  <script>
    const cidadesPorEstado = {
      PI: ['Pedro II', 'Teresina', 'Parnaíba', 'Picos', 'Floriano'],
      CE: ['Fortaleza', 'Juazeiro do Norte'],
      MA: ['São Luís', 'Imperatriz'],
      SP: ['São Paulo', 'Campinas'],
      RJ: ['Rio de Janeiro', 'Niterói'],
      DF: ['Brasília']
    };

    function carregarCidades() {
      const estado = document.getElementById('estado').value;
      const cidadeSelect = document.getElementById('cidade');
      cidadeSelect.innerHTML = '';

      if (cidadesPorEstado[estado]) {
        cidadesPorEstado[estado].forEach(cidade => {
          const option = document.createElement('option');
          option.textContent = cidade;
          cidadeSelect.appendChild(option);
        });
        cidadeSelect.disabled = false;
      } else {
        const option = document.createElement('option');
        option.textContent = 'Nenhuma cidade disponível';
        cidadeSelect.appendChild(option);
        cidadeSelect.disabled = true;
      }
    }

    function mostrarMensagem() {
      const msg = document.getElementById('mensagem');
      msg.style.display = 'block';
      msg.scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html>
