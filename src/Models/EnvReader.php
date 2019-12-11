<?php

abstract class EnvReader {

    private $env;

    protected function __construct() {
       $this->env = parse_ini_file('../config.ini');
    }

    /**
     * Retourne les clés/valeurs de configuration du fichier config.ini
     *
     * @param string $KeyValue
     * @return void
     */
    protected function getValue(string $KeyValue) {
        if(isset($this->env[$KeyValue])){
            return $this->env[$KeyValue];
        }
    }

}
