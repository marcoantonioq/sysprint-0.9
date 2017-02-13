<?php
class HelloShell extends AppShell {
    public function main() {
        $this->out('Hello world.');
    }
    public function teste() {
        $this->out('Teste.');
        $this->out($this->args);
        sleep(5);
        echo "terminou";

    }
}


 ?>
