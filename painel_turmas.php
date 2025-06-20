<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar Turmas</title>
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
      margin-left: 120px;
      margin-top: 140px;
      padding: 20px;
      display: flex;
      gap: 60px;
    }

    .painel-escolas {
      flex: 1;
    }

    .escola {
      border: 1px solid #000;
      border-radius: 6px;
      margin-bottom: 25px;
      background: white;
      padding: 10px;
    }

    .escola h2 {
      font-size: 20px;
      margin: 10px;
    }

    .turma {
      background: #FFFACD;
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px 20px;
      margin: 10px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 2px 3px 4px rgba(0,0,0,0.2);
    }

    .turma-info {
      display: flex;
      flex-direction: column;
    }

    .turma-info strong {
      font-size: 18px;
    }

    .turma-info small {
      font-size: 14px;
      color: #333;
    }

    .turma-acoes img {
      width: 32px;
      height: 32px;
      margin-left: 10px;
      cursor: pointer;
    }

    .acoes-laterais {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .acoes-laterais button {
      padding: 15px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      background: #FFEB3B;
      cursor: pointer;
      width: 160px;
      box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .acoes-laterais button:hover {
      background: #f1da2b;
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
    <div class="painel-escolas">
      <div class="escola">
        <h2>Escola Castro Lopes</h2>
        <div class="turma">
          <div class="turma-info">
            <strong>1º Ano “A”</strong>
            <small>4 alunos</small>
          </div>
          <div class="turma-acoes">
            <img src="imagens/editar.png" alt="Editar">
            <img src="imagens/lixeira.png" alt="Excluir">
          </div>
        </div>
        <div class="turma">
          <div class="turma-info">
            <strong>2º Ano “C”</strong>
            <small>6 alunos</small>
          </div>
          <div class="turma-acoes">
            <img src="imagens/editar.png" alt="Editar">
            <img src="imagens/lixeira.png" alt="Excluir">
          </div>
        </div>
      </div>

      <div class="escola">
        <h2>Escola Angelina Mendes</h2>
        <div class="turma">
          <div class="turma-info">
            <strong>1º Ano “A”</strong>
            <small>7 alunos</small>
          </div>
          <div class="turma-acoes">
            <img src="imagens/editar.png" alt="Editar">
            <img src="imagens/lixeira.png" alt="Excluir">
          </div>
        </div>
        <div class="turma">
          <div class="turma-info">
            <strong>3º Ano “B”</strong>
            <small>2 alunos</small>
          </div>
          <div class="turma-acoes">
            <img src="imagens/editar.png" alt="Editar">
            <img src="imagens/lixeira.png" alt="Excluir">
          </div>
        </div>
      </div>
    </div>

    <div class="acoes-laterais">
      <div class="botoes-acoes" style="text-align: center; margin-top: 30px;">
        <button onclick="location.href='cadastra_aluno.php'">
          ➕ Cadastrar Aluno
        </button>
        <button onclick="location.href='cadastra_turma.php'">
          🏫 Cadastrar Turma
        </button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const botoesEditar = document.querySelectorAll('.turma-acoes img[alt="Editar"]');
      const botoesExcluir = document.querySelectorAll('.turma-acoes img[alt="Excluir"]');

      botoesEditar.forEach((btn) => {
        btn.addEventListener('click', () => {
          const turma = btn.closest('.turma').querySelector('strong').innerText;
          alert(`📝 Editar informações da turma: ${turma}`);
          // Exemplo: redirecionamento futuro
          // window.location.href = `editar_turma.php?turma=${encodeURIComponent(turma)}`
        });
      });

      botoesExcluir.forEach((btn) => {
        btn.addEventListener('click', () => {
          const turmaBox = btn.closest('.turma');
          const turmaNome = turmaBox.querySelector('strong').innerText;
          const confirmacao = confirm(`❌ Deseja realmente excluir a turma "${turmaNome}"?`);
          if (confirmacao) {
            turmaBox.remove();
            alert(`Turma "${turmaNome}" foi excluída com sucesso.`);
            // Aqui pode adicionar fetch para excluir no backend
          }
        });
      });
    });
  </script>

</body>
</html>
