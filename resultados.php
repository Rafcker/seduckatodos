<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados do Aluno</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap">
  <link href="https://cdn.jsdelivr.net/gh/antijingoist/opendyslexic@0.91/open-dyslexic.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background: #E3F2FD;
      font-family: 'Lexend Deca', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 100px 20px 40px;
    }
    h1 {
      font-family: 'OpenDyslexic', sans-serif;
      font-size: 36px;
      margin-bottom: 10px;
      text-align: center;
    }
    .resumo {
      background: #FFF59D;
      border: 2px solid black;
      border-radius: 20px;
      padding: 20px 40px;
      font-size: 28px;
      line-height: 1.6;
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.25);
      margin-bottom: 40px;
    }
    .quadro {
      width: 100%;
      max-width: 900px;
      background: white;
      border: 5px solid #BCBCBC;
      border-radius: 30px;
      padding: 30px;
      box-shadow: 2px 4px 8px rgba(0,0,0,0.2);
    }
    .linha {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 6px solid #BCBCBC;
      padding: 20px 0;
    }
    .linha:last-child {
      border: none;
    }
    .linha img {
      width: 50px;
      height: 50px;
      margin-right: 15px;
    }
    .materia {
      display: flex;
      align-items: center;
      font-size: 28px;
    }
    .nota {
      font-size: 28px;
      font-weight: bold;
    }
    .voltar {
      position: fixed;
      top: 30px;
      left: 30px;
      cursor: pointer;
      text-align: center;
    }
    .voltar img {
      width: 70px;
    }
    .voltar div {
      font-size: 24px;
      text-decoration: underline;
    }
    @media (max-width: 600px) {
      .linha {
        flex-direction: column;
        align-items: flex-start;
      }
      .nota {
        align-self: flex-end;
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="voltar" onclick="window.history.back()">
    <img src="imagens/voltar.png" alt="Voltar">
    <div>Voltar</div>
  </div>

  <h1>Resultados!</h1>

  <div class="resumo">
    Disciplinas concluídas: 7<br>
    Aulas restantes: 3<br>
    Progresso geral: 75%
  </div>

  <div class="quadro">
    <div class="linha">
      <div class="materia"><img src="imagens/mat.png">Matemática</div>
      <div class="nota">6/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/port.png">Português</div>
      <div class="nota">9/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/geo.png">Geografia</div>
      <div class="nota">7/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/prog.png">Programação</div>
      <div class="nota">10/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/banco.png">Banco de Dados</div>
      <div class="nota">8/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/qui.png">Química</div>
      <div class="nota">5/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/bio.png">Biologia</div>
      <div class="nota">6/10</div>
    </div>
    <div class="linha">
      <div class="materia"><img src="imagens/his.png">História</div>
      <div class="nota">9/10</div>
    </div>
  </div>
</body>
</html>
