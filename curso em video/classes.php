<?php
require_once 'interface.php';
?>


<body>

<?php
class ControleRemoto implements Controlador {
    private $volume;
    private $ligado;
    private $tocando;

    public function __construct() {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getLigado() {
        return $this->ligado;
    }

    public function getTocando() {
        return $this->tocando;
    }

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    public function setLigado($ligado) {
        $this->ligado = $ligado;
    }

    public function setTocando($tocando) {
        $this->tocando = $tocando;
    }

    public function ligar() {
        $this->setLigado(true);
        $imagemURL = 'https://dicas.olx.com.br/wp-content/uploads/2023/12/smart-tv-4k-ou-8k.jpg';
        echo "<div class='menu-container'>";
        echo "<div class='imagem-container'>";
        echo "<img src='$imagemURL' alt='tv ligada'>";
        echo "</div>";
        echo "</div>";
        
    }

    public function desligar() {
        $this->setLigado(false);
        $imagemURL = 'https://olhardigital.com.br/wp-content/uploads/2020/02/20200228085524.jpg';
        echo "<div class='menu-container'>";
        echo "<div class='imagem-container'>";
        echo "<img src='$imagemURL' alt='tv desligada'>";
        echo "</div>";
        echo "</div>";
    }

    public function abrirMenu() {
        if ($this->getLigado()) {
            echo "<div class='menu-container'>";
            echo "<div class='table-container'>";
            echo "<table class='table table-bordered'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th colspan='2'>MENU</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr><td>Está ligado?</td><td>" . ($this->getLigado() ? "SIM" : "NÃO") . "</td></tr>";
            echo "<tr><td>Está tocando?</td><td>" . ($this->getTocando() ? "SIM" : "NÃO") . "</td></tr>";
            echo "<tr><td>Volume:</td><td>" . $this->getVolume() . "</td></tr>";
            echo "<tr><td colspan='2'>";
            for ($i = 0; $i <= $this->getVolume(); $i += 10) {
                echo "|";
            }
            echo "</td></tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "ERRO! É NECESSÁRIO LIGAR A TV ANTES DE ABRIR O MENU!";
        }
    }
    

    public function fecharMenu() {
        if ($this->getLigado()) {
            $this->setLigado(false);
            echo "Fechando menu..";
        } else {
            echo "A TV já está desligada. Não é possível fechar o menu.";
        }
    }
    

    public function maisVolume() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 5);
        }
    }

    public function menosVolume() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() - 5);
        }
    }

    public function ligarMudo() {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);
        }
    }

    public function desligarMudo() {
        if ($this->getLigado() && $this->getVolume() == 0) {
            $this->setVolume(50);
        }
    }

    public function play() {
        if ($this->getLigado() && !$this->getTocando()) {
            $this->setTocando(true);
        }
    }

    public function pause() {
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }
}

