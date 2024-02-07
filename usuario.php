<?php

    class Usuario {

        private $id;
        private $nome;
        private $senha;
        private $email;
        private $telefone;
        private $genero;
        private $nascimento;
        private $cidade;
        private $estado;
        private $endereco;

        public function __get($name)
        {
            return $this->$name;
        }


        public function __set($name, $value)
        {
            $this->$name = $value;
            return $this;
        }


    }


?>