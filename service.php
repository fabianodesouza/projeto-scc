<?php

    class Service {

        private $usuario;
        private $conexao;

        public function __construct(Usuario $usuario, Conexao $conexao)
        {
            $this->usuario = $usuario;
            $this->conexao = $conexao->conectar();
        }

        //Função para verificar se email já existe
        public function verificarEmail() {

            $query= 'select 
                        id,nome,email
                     from
                        tb_usuarios
                     where
                        email = ?
            ';
            $stmt= $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->usuario->__get('email'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Função para cadastrar usuário
        public function cadastrar() {

            $query = " INSERT INTO 
                            tb_usuarios(nome, senha, email, telefone, genero, nascimento, cidade, estado, endereco)
                        Values(:nome, :senha, :email, :telefone, :genero, :nascimento, :cidade, :estado, :endereco)
            ";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->usuario->__get('nome'));
            $stmt->bindValue(':senha', $this->usuario->__get('senha'));
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':telefone', $this->usuario->__get('telefone'));
            $stmt->bindValue(':genero', $this->usuario->__get('genero'));
            $stmt->bindValue(':nascimento', $this->usuario->__get('nascimento'));
            $stmt->bindValue(':cidade', $this->usuario->__get('cidade'));
            $stmt->bindValue(':estado', $this->usuario->__get('estado'));
            $stmt->bindValue(':endereco', $this->usuario->__get('endereco'));
            $stmt->execute();
        }

        //Função para logar no sistema
        public function login() {

            $query = 'select 
                        id, nome, email 
                      from
                        tb_usuarios
                      where
                        email = ? and senha = ?    
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->usuario->__get('email'));
            $stmt->bindValue(2, $this->usuario->__get('senha'));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //Função para exibir registros
        public function exibirRegistros() {

            $query = " 
                select 
                    id,
                    nome,
                    email,
                    telefone,
                    genero,
                    DATE_FORMAT(nascimento, '%d/%m/%Y') as nascimento,
                    cidade,
                    estado,
                    endereco
                from 
                    tb_usuarios";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Função para recuperar registro a ser editado
        public function recuperarRegistro() {

            $query = 'select * from tb_usuarios where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->usuario->__get('id'));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function editarRegitro() {

            $query = '
                update
                    tb_usuarios
                set 
                    nome = :nome,
                    senha = :senha,
                    email = :email,
                    telefone = :telefone,
                    genero = :genero,
                    nascimento = :nascimento,
                    cidade = :cidade,
                    estado = :estado,
                    endereco = :endereco
                where
                    id = :id
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->usuario->__get('id'));
            $stmt->bindValue(':nome', $this->usuario->__get('nome'));
            $stmt->bindValue(':senha', $this->usuario->__get('senha'));
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':telefone', $this->usuario->__get('telefone'));
            $stmt->bindValue(':genero', $this->usuario->__get('genero'));
            $stmt->bindValue(':nascimento', $this->usuario->__get('nascimento'));
            $stmt->bindValue(':cidade', $this->usuario->__get('cidade'));
            $stmt->bindValue(':estado', $this->usuario->__get('estado'));
            $stmt->bindValue(':endereco', $this->usuario->__get('endereco'));
            $stmt->execute();
        }

        //Função para excluir registro
        public function deletarRegisto() {

            $query = 'delete from tb_usuarios where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->usuario->__get('id'));
            $stmt->execute();
        }

        //Função para pesquisar registro
        public function pesquisarRegistro() {

            $query = "
                select 
                    id,
                    nome,
                    email,
                    telefone,
                    genero,
                    DATE_FORMAT(nascimento, '%d/%m/%Y') as nascimento,
                    cidade,
                    estado,
                    endereco 
                from
                     tb_usuarios where nome like :nome or email like :email
                     or telefone like :telefone or genero like :genero or DATE_FORMAT(nascimento, '%d/%m/%Y') like :nascimento
                     or cidade like :cidade or estado like :estado or endereco like :endereco";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome','%'.$this->usuario->__get('nome').'%');
            $stmt->bindValue(':email', '%'.$this->usuario->__get('email').'%');
            $stmt->bindValue(':telefone','%'.$this->usuario->__get('telefone').'%');
            $stmt->bindValue(':genero', '%'.$this->usuario->__get('genero').'%');
            $stmt->bindValue(':nascimento', '%'.$this->usuario->__get('nascimento').'%');
            $stmt->bindValue(':cidade', '%'.$this->usuario->__get('cidade').'%');
            $stmt->bindValue(':estado', '%'.$this->usuario->__get('estado').'%');
            $stmt->bindValue(':endereco', '%'.$this->usuario->__get('endereco').'%');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    }

   
?>