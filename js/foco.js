  function ativarModoFoco() {
      if (!document.fullscreenElement) {
          document.documentElement.requestFullscreen(); // Ativa tela cheia
      } else {
          document.exitFullscreen(); // Sai da tela cheia
      }
  }
