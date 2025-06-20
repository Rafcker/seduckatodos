<?php
// Inicia a sessão PHP para guardar informações do usuário (como perfil de acessibilidade)
session_start();
// Exemplo para testes: descomente a linha abaixo para simular um perfil
// $_SESSION['perfil'] = 'DISLEXIA';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz - Programação Python</title>

  <!-- Importa os ícones do Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="js/script_quiz.js"></script>
  <script src="js/leitura_guiada.js"></script>

  <!-- Define a fonte com base no perfil do usuário -->
  <?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
    <!-- Fonte acessível para dislexia -->
  <link href="https://fonts.cdnfonts.com/css/open-dyslexic" rel="stylesheet">  
  <?php } else { ?>
    <!-- Fonte moderna e limpa para leitura -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
  <?php } ?>

  <style>
    /* Reset de espaçamento e fonte baseada no perfil */  
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: <?php echo ($_SESSION['perfil'] == 'DISLEXIA') ? "'Open-Dyslexic', Arial, sans-serif" : "'Lexend Deca', sans-serif"; ?>;
      line-height: 1.5;
    }
    /* Define fundo azul claro e espaço superior para a barra fixa */
    body {
      background-color: #E3F2FD; /* Cor clara e suave para fundo */
      padding-top: 100px; /* Espaço para a barra fixa no topo */
      max-width: 100%;
      overflow-x: hidden;
    }

    
    /* Barra fixa no topo com botões de controle */
    .top-bar-fixed {
        position: fixed;           /* Fixa na tela, mesmo ao rolar */
        top: 0;                    /* Encosta no topo da tela */
        left: 0;                   /* Encosta na esquerda da tela */
        width: 100%;              /* Ocupa toda a largura da tela */
        background-color: #ffffff; /* Fundo branco */
        border-bottom: 2px solid #000; /* Borda inferior preta de 2px */
        display: flex;            /* Usa layout flexível */
        justify-content: space-between; /* Espaço entre os itens */
        align-items: center;      /* Alinha os itens verticalmente ao centro */
        padding: 10px 20px;       /* Espaço interno: 10px vertical, 20px horizontal */
        z-index: 1000;            /* Fica sobre outros elementos */
    }

    /* Botões do topo (Início, Modo Foco, etc.) */
      .top-buttons {
        display: flex;        /* Organiza os botões lado a lado */
        gap: 20px;            /* Espaço de 20px entre eles */
        align-items: center;  /* Alinha os botões verticalmente ao centro */
      }

    /* Estilo individual dos botões */
    .foco-botao {
      display: flex;               /* Usa layout flexível */
      flex-direction: column;     /* Organiza os itens em coluna (um abaixo do outro) */
      align-items: center;        /* Centraliza os itens na horizontal */
      font-size: 12px;            /* Define o tamanho da fonte como 12px */
      cursor: pointer;            /* Mostra o cursor de clique (mãozinha) */
      text-align: center;         /* Centraliza o texto dentro do elemento */
    }

    .foco-botao img {
      transition: transform 0.2s; /* Anima transformações suavemente em 0.2s */
      width: 40px;                /* Define a largura como 40 pixels */
    }

    .foco-botao:hover img {
      transform: scale(1.1); /* Aumenta o tamanho em 10% (efeito de zoom) */
    }

    .foco-botao span {
      margin-top: 5px;        /* Espaço de 5px acima do elemento */
      font-weight: bold;      /* Texto em negrito */
    }

    /* Caixa que mostra a pontuação atual */
    .status-box {
      text-align: right; /* Alinha o texto à direita */
    }

    #pomodoroTimer {
      font-weight: bold;     /* Texto em negrito */
      color: #D32F2F;         /* Cor vermelha escura (tom de alerta) */
      font-size: 20px;        /* Tamanho da fonte: 20px */
    }

    /* Cabeçalho do quiz */
    .header {
      background-color: #FFF59D; /* Fundo amarelo claro (tipo destaque/aviso) */
      border: 2px solid #000;    /* Borda preta de 2px */
      border-radius: 12px;       /* Cantos arredondados com 12px */
      padding: 10px 20px;        /* Espaço interno: 10px vertical, 20px horizontal */
      font-size: 24px;           /* Tamanho da fonte: 24px (grande) */
      text-align: center;        /* Texto centralizado */
      margin: 20px auto;         /* Margem vertical de 20px e centralização horizontal */
      max-width: 600px;          /* Largura máxima de 600px */
    }

    /* Container central do quiz */
    .quiz-container {
      max-width: 900px;   /* Largura máxima de 900px */
      margin: 0 auto;     /* Centraliza horizontalmente com margem automática */
    }

    /* Caixa da pergunta */
    .question-box {
      background: white;                        /* Fundo branco */
      border-radius: 12px;                      /* Cantos arredondados com 12px */
      padding: 20px;                            /* Espaço interno de 20px */
      margin-top: 20px;                         /* Espaço de 20px acima do elemento */
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);    /* Sombra leve ao redor do elemento */
      position: relative;                      /* Posição relativa (permite posicionar elementos filhos com absoluta) */
    }

    .question-box h3 {
        font-size: 20px;           /* Tamanho da fonte: 20px */
        margin-bottom: 10px;       /* Espaço de 10px abaixo do elemento */
    }

    /* Estilo para o trecho de código */
    .code-snippet {
      font-family: monospace;       /* Fonte monoespaçada (ideal para códigos) */
      font-size: 18px;              /* Tamanho da fonte: 18px */
      color: #2E7D32;               /* Cor do texto: verde escuro */
      background-color: #F1F8E9;    /* Fundo verde claro (destaque suave) */
      padding: 6px 10px;            /* Espaçamento interno: 6px vertical, 10px horizontal */
      display: inline-block;        /* Ocupa só o espaço necessário, permite padding/margem */
      border-radius: 6px;           /* Cantos arredondados com 6px */
    }

    /* Botão de áudio para ouvir a pergunta */
    .audio-btn {
      position: absolute;        /* Posiciona em relação ao elemento pai com posição relativa */
      right: 20px;               /* Distância de 20px da borda direita */
      top: 20px;                 /* Distância de 20px do topo */
      cursor: pointer;           /* Mostra o cursor de clique (mãozinha) */
      display: flex;             /* Usa layout flexível */
      flex-direction: column;    /* Organiza os itens em coluna (um abaixo do outro) */
      align-items: center;       /* Centraliza os itens na horizontal */
      background: none;              /* Fundo transparente */
    }

  .audio-btn:hover {
    transform: scale(1.1);  /* Zoom no botão ao passar o mouse */
  }

    .audio-btn img {
        width: 28px; /* Largura definida em 28 pixels */
    }

  /* Botão de "ouvir" no título da pergunta */
  .btn-ouvir-titulo {
    background: none;              /* Fundo transparente */
    border: none;                 /* Sem borda */
    cursor: pointer;             /* Mãozinha ao passar o mouse */
    padding: 4px;                /* Espaço interno */
    margin-left: 4px;            /* Espaço à esquerda */
    transition: transform 0.2s;  /* Suaviza o zoom no hover */
  }

  .btn-ouvir-titulo:hover {
    transform: scale(1.1);  /* Zoom no botão ao passar o mouse */
  }

 .audio-btn span {
  font-size: 14px;              /* Tamanho da fonte */
  text-decoration: underline;   /* Sublinhado no texto */
  }

  
.ouvir-btn {
  position: absolute;                 /* Posiciona fora do fluxo normal */
  right: -60px;                       /* Empurra para fora pela direita */
  top: 50%;                           /* Centraliza verticalmente */
  display: flex;                      /* Layout flexível */
  flex-direction: column;            /* Organiza ícone e texto em coluna */
  align-items: center;               /* Centraliza horizontalmente */
}

  .ouvir-btn:hover {
    transform: scale(1.1);  /* Zoom no botão ao passar o mouse */
  }


.ouvir-btn img {
  width: 24px;                        /* Tamanho da imagem (ícone) */
}

.ouvir-btn span {
  font-size: 12px;                   /* Tamanho da fonte do texto */
  text-decoration: underline;        /* Sublinhado */
}

/* Opções de resposta */
.answers {
  display: flex;                /* Layout flexível */
  flex-direction: column;       /* Organiza em coluna */
  gap: 12px;                    /* Espaço entre as opções */
  margin-top: 20px;             /* Espaço acima do bloco */
}

/* Estilo de cada opção */
.option-container {
  position: relative;           /* Permite posicionar elementos filhos absolutamente */
}

.option {
  background: #fff;             /* Fundo branco */
  border-radius: 10px;          /* Cantos arredondados */
  border: 1px solid #000;       /* Borda preta */
  padding: 10px;                /* Espaço interno */
  display: flex;                /* Layout flexível */
  align-items: center;          /* Alinha itens verticalmente */
  gap: 10px;                    /* Espaço entre itens */
  box-shadow: 1px 2px 3px rgba(0,0,0,0.1); /* Sombra suave */
  cursor: pointer;             /* Cursor de clique */
  transition: background-color 0.3s; /* Anima mudança de fundo */
}

/* Estilo para opções certas e erradas */
.option-correct {
  background-color: #C8E6C9 !important; /* Fundo verde claro */
  border-color: #2E7D32 !important;     /* Borda verde escuro */
}

.option-wrong {
  background-color: #FFCDD2 !important; /* Fundo vermelho claro */
  border-color: #C62828 !important;     /* Borda vermelha escura */
}

/* Botão de rádio personalizado */
.custom-radio {
  appearance: none;             /* Remove estilo padrão */
  -webkit-appearance: none;     /* Compatibilidade com WebKit */
  background-color: #000;       /* Fundo preto */
  border: 6px solid white;      /* Borda branca grossa */
  width: 42px;                  /* Largura do botão */
  height: 42px;                 /* Altura do botão */
  border-radius: 50%;           /* Formato circular */
  cursor: pointer;              /* Cursor de clique */
  box-shadow: 0 0 0 2px black;  /* Sombra de borda */
  position: relative;           /* Necessário para ::after funcionar */
}

.custom-radio:checked::after {
  content: '';                          /* Cria o elemento visual */
  position: absolute;                   /* Posiciona dentro do botão */
  width: 5px;                           /* Largura do traço */
  height: 10px;                         /* Altura do traço */
  border: solid white;                 /* Cor branca */
  border-width: 0 4px 4px 0;            /* Desenha o "check" */
  transform: rotate(45deg);            /* Rotaciona para parecer um "✓" */
  top: 8px;                             /* Ajusta a posição vertical */
  left: 14px;                           /* Ajusta a posição horizontal */
}
.ada-box {
  position: fixed;                   /* Fixa na tela */
  bottom: 0px;                      /* Distância da base */
  left: 0px;                        /* Distância da esquerda */
  display: flex;                     /* Layout flexível */
  align-items: flex-end;            /* Alinha elementos à base */
  gap: 5px;                         /* Espaço entre a Ada e a mensagem */
  z-index: 1000;                     /* Fica sobre outros elementos */
}

.ada-box img {
  height: 250px;                     /* Altura da imagem da Ada */
}

.ada-msg {
  background: white;                 /* Fundo da mensagem */
  padding: 15px;                     /* Espaçamento interno */
  border-radius: 10px;               /* Bordas arredondadas */
  border: 2px solid black;           /* Borda preta */
  max-width: 300px;                  /* Largura máxima */
  font-size: 16px;                   /* Tamanho da fonte */
  box-shadow: 2px 3px 5px rgba(0,0,0,0.1); /* Sombra leve */
}

.botao-proxima {
  position: absolute;               /* Posiciona dentro do container pai */
  top: 50%;                         /* Alinha verticalmente ao centro */
  right: 100px;                     /* Distância da borda direita */
  transform: translateY(-50%);      /* Ajusta para centralização vertical */
  width: 64px;                      /* Largura do botão */
  height: 64px;                     /* Altura do botão */
  cursor: pointer;                 /* Cursor de clique */
  transition: transform 0.2s;       /* Anima ao interagir */
}

.botao-proxima:hover {
  transform: translateY(-50%) scale(1.1); /* Efeito de zoom ao passar o mouse */
}

/* Ajustes dos botões de acessibilidade */
.acessibilidade-botoes {
  position: fixed;                 /* Fixa no canto da tela */
  top: 90px;                       /* Distância do topo */
  right: 10px;                     /* Distância da direita */
  display: flex;                   /* Layout flexível */
  flex-direction: column;         /* Um botão abaixo do outro */
  gap: 8px;                        /* Espaço entre os botões */
  z-index: 2000;                   /* Fica sobre outros elementos */
}

.acessibilidade-botoes button {
  background: #fff;               /* Fundo branco */
  border: 1px solid #ccc;         /* Borda cinza */
  border-radius: 6px;             /* Cantos arredondados */
  padding: 4px;                   /* Espaçamento interno */
  cursor: pointer;               /* Cursor de clique */
  font-size: 16px;                /* Tamanho da fonte */
  width: 32px;                    /* Largura do botão */
  height: 32px;                   /* Altura do botão */
  display: flex;                  /* Alinha conteúdo */
  align-items: center;           /* Alinha verticalmente */
  justify-content: center;       /* Alinha horizontalmente */
}

.option img {
  margin-right: 10px;             /* Espaço à direita da imagem */
  border-radius: 6px;             /* Arredonda os cantos da imagem */
  background-color: white;        /* Fundo branco da imagem */
  border: 1px solid #ccc;         /* Borda cinza clara */
  padding: 2px;                   /* Espaço interno da imagem */
}

.logo-seduckatodos {
  position: fixed;                /* Fixa no canto da tela */
  bottom: 10px;                   /* Distância da base */
  right: 10px;                    /* Distância da direita */
  z-index: 1000;                  /* Camada elevada */
}

.logo-seduckatodos img {
  height: 60px;                   /* Altura do logo */
  width: auto;                    /* Largura automática (proporcional) */
  opacity: 0.95;                  /* Leve transparência */
  transition: transform 0.2s;     /* Efeito suave de transformação */
}

.logo-seduckatodos img:hover {
  transform: scale(1.05);         /* Leve zoom ao passar o mouse */
}

/* Texto sublinhado */ 
.leitura-frase.highlight {
  text-decoration: underline !important;         /* Sublinhado forçado */
  text-decoration-color: red !important;         /* Cor do sublinhado: vermelho */
  text-decoration-thickness: 3px !important;     /* Espessura do sublinhado */
  text-underline-offset: 4px;                    /* Distância entre texto e linha */
}

@media (max-width: 768px) {
  .top-bar-fixed {
    flex-direction: column;
    align-items: flex-start;
    padding: 10px;
    gap: 10px;
  }

  .top-buttons {
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
  }

  .status-box {
    text-align: center;
    width: 100%;
  }

  .header {
    font-size: 20px;
    padding: 10px;
    max-width: 90%;
  }

  .quiz-container {
    padding: 0 10px;
    max-width: 100%;
  }

  .question-box {
    padding: 15px;
  }

  .option {
    flex-direction: column;
    align-items: flex-start;
  }

  .option img {
    height: 32px;
  }

  .ouvir-btn {
    position: static;
    margin-top: 10px;
  }

  .botao-proxima {
    right: 20px;
    width: 50px;
    height: 50px;
  }

  .ada-box {
    flex-direction: column;
    align-items: center;
    bottom: 80px;
    left: 0;
  }

  .ada-box img {
    height: 180px;
  }

  .ada-msg {
    font-size: 14px;
    max-width: 90%;
  }

  .acessibilidade-botoes {
    top: auto;
    bottom: 10px;
    right: 10px;
    flex-direction: row;
    gap: 5px;
  }

  .logo-seduckatodos img {
    height: 40px;
  }

  .btn-ouvir-titulo span {
    font-size: 10px;
  }

  .audio-btn {
    top: auto;
    bottom: 10px;
    right: 10px;
  }
}

<?php if ($_SESSION['perfil'] == 'DISLEXIA') { ?>
  /* Estilos adaptados para o perfil DISLEXIA */

  .header {
    background-color: #FFF59D;  /* Amarelo claro – destaca o cabeçalho */
    color: black;               /* Texto preto para melhor contraste */
  }

  .question-box {
    background-color: #E3F2FD;  /* Azul claro – fundo da pergunta */
    border: 2px solid #64B5F6;  /* Borda azul suave */
  }

  /* Cores diferentes para cada alternativa */
  .option-container:nth-child(1) .option { background-color: #C8E6C9; } /* verde claro */
  .option-container:nth-child(2) .option { background-color: #F8BBD0; } /* rosa suave */
  .option-container:nth-child(3) .option { background-color: #D1C4E9; } /* lilás */
  .option-container:nth-child(4) .option { background-color: #B3E5FC; } /* azul claro */

  .ada-msg {
    background-color: #BBDEFB;  /* Azul leve para fundo da fala da Ada */
    border-color: #2196F3;      /* Azul forte para a borda */
    color: #000;                /* Texto preto */
  }
<?php } ?>

<?php if ($_SESSION['perfil'] == 'TEA') { ?>
  /* Estilos adaptados para o perfil TEA (Transtorno do Espectro Autista) */

  .header {
    background-color: #B3E5FC;  /* Azul suave no cabeçalho */
    color: black;               /* Texto preto */
  }

  .question-box {
    background-color: #E1F5FE;  /* Azul mais claro para a área da pergunta */
    border: 2px solid #4FC3F7;  /* Borda azul viva */
  }


  /* Destaque visual para leitura */
  .leitura-frase.highlight {
    text-decoration: underline red 3px; /* Sublinhado vermelho grosso */
    text-underline-offset: 4px;         /* Distância da linha para o texto */
    background-color: transparent;      /* Fundo transparente */
  }

  .btn-ouvir-titulo:hover {
    transform: scale(1.1);  /* Zoom no botão ao passar o mouse */
  }

  /* Cores distintas para cada alternativa */
  .option-container:nth-child(1) .option { background-color: #A5D6A7; } /* verde água */
  .option-container:nth-child(2) .option { background-color: #E1BEE7; } /* rosa lavanda */
  .option-container:nth-child(3) .option { background-color: #FFE082; } /* amarelo claro */
  .option-container:nth-child(4) .option { background-color: #B2EBF2; } /* ciano pastel */

  .ada-msg {
    background-color: #D7CCC8;  /* Bege suave – fundo da fala da Ada */
    border-color: #5D4037;      /* Marrom escuro – borda */
    color: #000;                /* Texto preto */
  }
<?php } ?>
</style>
</head>
<body>
  <div class="top-bar-fixed">
    <div class="top-buttons">
      <div class="foco-botao">
        <a href="escolha_disciplina.php">
          <img src="imagens/inicio.png" alt="Início">
        </a>
        <span>Início</span>
      </div>

      <?php if ($_SESSION['perfil'] == 'TDAH'){ ?>
      <div class="foco-botao" onclick="ativarPomodoro()">
        <img src="imagens/pomodoro.png" alt="Pomodoro">
        <span id="pomodoroTimer">Pomodoro</span>
      </div>

      <div class="foco-botao" onclick="ativarModoFoco()">
        <img src="imagens/foco.png" alt="Modo Foco">
        <span>Modo Foco</span>
      </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'TEA'){ ?>
      <div class="foco-botao" onclick="alternarModoCalmo(this)">
        <img src="imagens/calmo.png" alt="Modo Calmo">
        <span>Modo Calmo</span>
      </div>

      <div class="foco-botao" onclick="window.location.href='pausa.php'">
        <img src="imagens/pausa.png" alt="Pausa">
        <span>Pausa</span>
      </div>
      <?php } ?>

      <?php if ($_SESSION['perfil'] == 'DISLEXIA'){ ?>
      <div class="foco-botao" id="btnSilabas" onclick="alternarSeparacaoSilabas()">
        <img src="imagens/pomodoro.png" alt="Separar Sílabas">
        <span id="labelSilabas">Separar Sílabas</span>
      </div>

      <div class="foco-botao" onclick="ativarLeituraGuiada()">
        <img src="imagens/foco.png" alt="Leitura Guiada">
        <span>Leitura Guiada</span>
      </div>
      <?php } ?>

      <div class="foco-botao">
      <a href="config.php"><img src="imagens/conf.png" alt="Configurações"></a>
      <span>Configurações</span>
    </div>

       <div class="foco-botao">
      <a href="resultados.php"><img src="imagens/progresso.png" alt="Resultados"></a>
      <span>Resultados</span>
    </div>

    <div class="foco-botao">
      <a href="logout.php"><img src="imagens/sair.png" alt="Sair"></a>
      <span>Sair</span>
    </div>

</div> <!-- Fecha .top-buttons -->

<!-- Caixa de status com etapa e pontuação -->
<div class="status-box">
  <strong>Etapa 3 de 10</strong><br> <!-- Indica progresso no quiz -->
  Pontuação: 
  <span style="color: green; font-size: 24px;">10</span> <!-- Pontuação atual em destaque -->
</div>
</div> <!-- Fecha .top-bar-fixed -->

<!-- Botões de acessibilidade fixos no canto da tela -->
<div class="acessibilidade-botoes" role="region" aria-label="Botões de Acessibilidade">
  <button onclick="aumentarFonte()" aria-label="Aumentar fonte"><i class="fas fa-text-height"></i></button> <!-- Aumentar texto -->
  <button onclick="alternarContraste()" aria-label="Ativar contraste"><i class="fas fa-adjust"></i></button> <!-- Contraste -->
  <button onclick="alternarModoEscuro()" aria-label="Ativar modo escuro"><i class="fas fa-moon"></i></button> <!-- Modo escuro -->
  <button onclick="ativarAcessibilidadePura()" aria-label="Acessibilidade Total"><i class="fas fa-universal-access"></i></button> <!-- Modo total -->
</div> 

<!-- Áudio de alerta ao acertar uma resposta -->
<audio id="ding" src="https://actions.google.com/sounds/v1/alarms/beep_short.ogg"></audio>

<div id="conteudoPrincipal">
<!-- Cabeçalho principal com o título do quiz -->
<div class="header" id="headerTitulo">
  <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
    <strong>Quiz</strong> <!-- Título em negrito -->
    <span style="font-weight: normal;">- Programação Python</span> <!-- Subtítulo -->

    <!-- Botão de ouvir o título, com ícone e texto abaixo -->
    <button onclick="falarTexto('Quiz de Programação Python')" class="btn-ouvir-titulo" aria-label="Ouvir Título">
      <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="imagens/ouvir.png" alt="Ouvir" style="height: 24px;"> <!-- Ícone de áudio -->
        <span style="font-size: 12px; text-decoration: underline; margin-top: 2px;">Ouvir</span> <!-- Texto do botão -->
      </div>
    </button>
  </div>
</div>

 <div class="quiz-container"> <!-- Container principal do quiz -->

  <div class="question-box"> <!-- Caixa da pergunta -->
    <h3>1. O que esse código faz?</h3> <!-- Texto da pergunta -->

    <div class="code-snippet">print("Olá Mundo")</div> <!-- Código exibido em destaque -->

    <!-- Botão de ouvir a pergunta -->
    <div class="audio-btn"  onclick="falarTexto('O que esse código faz? print Olar Mundo')">
      <img src="imagens/ouvir.png" alt="Ouvir">
      <span>Ouvir</span>
    </div>

    <div class="answers"> <!-- Bloco com as opções de resposta -->

      <?php if ($_SESSION['perfil'] == 'TEA') { ?> <!-- Opções adaptadas para TEA -->

        <!-- ALTERNATIVA A -->
        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="a">
            <img src="imagens/tela.png" alt="Imagem A" style="height: 40px;">
            a) Mostra a mensagem "Olá, mundo!" na tela
          </label>
          <!-- Botão ouvir para alternativa A -->
          <div class="ouvir-btn" onclick="falarTexto('Mostra a mensagem Olá mundo na tela')">
            <img src="imagens/ouvir.png" alt="Ouvir">
            <span>Ouvir</span>
          </div>
        </div>

        <!-- ALTERNATIVA B -->
        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="b">
            <img src="imagens/cadeado.png" alt="Imagem B" style="height: 40px;">
            b) O computador guarda a frase dentro de uma caixa secreta
      </label>
            <div class="ouvir-btn" onclick="falarTexto('O computador guarda a frase dentro de uma caixa secreta')">
            <img src="imagens/ouvir.png" alt="Ouvir">
            <span>Ouvir</span>
          </div>
        </div>

        <!-- ALTERNATIVA C -->
        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="c">
            <img src="imagens/lixeira.png" alt="Imagem C" style="height: 40px;">
            c) O computador apaga todos os arquivos
          </label>
          <div class="ouvir-btn" onclick="falarTexto('O computador apaga todos os arquivos')">
            <img src="imagens/ouvir.png" alt="Ouvir">
            <span>Ouvir</span>
          </div>
        </div>

      <?php } else { ?> <!-- Versão padrão para outros perfis (TDAH, DISLEXIA ou geral) -->

        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="a">
            a) Mostra a mensagem "Olá, mundo!" na tela
          </label>
        </div>

        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="b">
            b) O computador guarda a frase dentro de uma caixa secreta
          </label>
        </div>

        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="c">
            c) O computador apaga todos os arquivos
          </label>
        </div>

        <div class="option-container">
          <label class="option">
            <input type="radio" class="custom-radio" name="resposta" value="d">
            d) Pede para o usuário digitar Olá Mundo
          </label>
        </div>

      <?php } ?>

    </div> <!-- Fim das respostas -->
  </div> <!-- Fim da question-box -->
</div> <!-- Fim da quiz-container -->

<!-- Botão "Próxima pergunta" (imagem), inicialmente escondido -->
<img id="proximaBtn" src="imagens/proxima.png" alt="Próxima Pergunta" class="botao-proxima" style="display: none;">


<!-- Botão "Próxima Pergunta" com texto, versão acessível -->
<div style="text-align: right; margin-top: 20px;">
  <button id="proximaBtn" style="display: none; padding: 10px 20px; font-size: 16px; border-radius: 8px; background-color: #0288d1; color: white; border: none; cursor: pointer;">
    Próxima Pergunta →
  </button>
</div>

<!-- Caixa da personagem Ada -->
 <div class="ada-box">
  <?php
    // Exibe a imagem do mascote conforme o perfil
    if ($_SESSION['perfil'] == "TDAH") {
      echo '<img src="imagens/ada.png" alt="Ada">';
    } elseif ($_SESSION['perfil'] == "TEA") {
      echo '<img src="imagens/eniac.png" alt="Eniac">';
    } elseif ($_SESSION['perfil'] == "DISLEXIA") {
      echo '<img src="imagens/alan.png" alt="Alan">';
    }
     ?>    
  <div class="ada-msg" id="adaMsg">
    Olá, <strong>Lucas</strong>! Estou aqui para aprender com você. Vamos juntos?
  </div>
</div>
      </div>
<div class="logo-seduckatodos" aria-hidden="true">
  <img src="imagens/seduckatodos-logo.png" alt="Logo SEDUCKATODOS">
</div>
</body>
</html>

<script>
  // Quando o botão de próxima pergunta for clicado, vai para a página parabens.php
  document.getElementById('proximaBtn').addEventListener('click', function () {
    window.location.href = 'parabens.php';
  });
</script>
