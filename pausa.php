<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pausa</title>
  <style>
    body {
      background: #D7F1FF;
      font-family: 'Lexend Deca', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }

    img {
      max-width: 300px;
    }

    .mensagem {
      font-size: 20px;
      margin-top: 20px;
      color: #333;
    }

    .botao {
      margin-top: 30px;
      padding: 12px 24px;
      font-size: 18px;
      background-color: #8EC7E3;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .botao:hover {
      background-color: #6CB2D4;
    }
  </style>
</head>
<body>
  <img src="imagens/ursinho-pausa.png" alt="Pausa com Ursinho" />
  <div class="mensagem">
    Está tudo bem fazer uma pausa. Respire fundo...<br>
    Quando estiver pronto, voltamos juntos!
  </div>
  <button class="botao" onclick="history.back()">Voltar para Aula</button>
</body>
</html>
