<?php
session_start();

// Guarda a URL anterior (se ainda não estiver salva)
if (!isset($_SESSION['pagina_anterior'])) {
  $_SESSION['pagina_anterior'] = $_SERVER['HTTP_REFERER'] ?? 'index.php';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Deseja sair?</title>

  <!-- Ícones do Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #E3F2FD;
      font-family: 'Lexend Deca', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }

    .caixa {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0,0,0,0.2);
      max-width: 400px;
    }

    .ada-triste {
      width: 150px;
      margin-bottom: 20px;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 22px;
    }

    .botoes {
      display: flex;
      gap: 20px;
      justify-content: center;
    }

    .botao {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .sair {
      background-color: #e57373;
      color: white;
    }

    .sair:hover {
      background-color: #d32f2f;
    }

    .voltar {
      background-color: #90caf9;
    }

    .voltar:hover {
      background-color: #42a5f5;
    }
  </style>
</head>
<body>
  <div class="caixa">
    <!-- Imagem da Ada triste -->

      <?php
      if ($_SESSION['perfil'] == "TDAH") {
        echo '<img src="imagens/ada-triste.png" alt="Ada triste" class="ada-triste">';
      } elseif ($_SESSION['perfil'] == "TEA") {
        echo '<img src="imagens/eniac_triste.png" alt="Eniac triste" class="ada-triste">';
      } elseif ($_SESSION['perfil'] == "DISLEXIA") {
        echo '<img src="imagens/alan-triste.png" alt="Alan triste" class="ada-triste">';
      }
      ?>

    <h2>Você realmente deseja sair?</h2>
    <div class="botoes">
      <form method="post" action="index.html">
        <button class="botao sair" type="submit">
          <i class="fas fa-door-open"></i> Sim, sair
        </button>
      </form>
      <form method="post" action="<?php echo $_SESSION['pagina_anterior']; ?>">
        <button class="botao voltar" type="submit">
          <i class="fas fa-arrow-left"></i> Não, voltar
        </button>
      </form>
    </div>
  </div>
</body>
</html>
