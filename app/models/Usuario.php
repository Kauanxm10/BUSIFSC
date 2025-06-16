<?php
    require_once('Conexao.php');

    class Usuario
    {
        private $id; //nao tem setId()
        private $nome;
        private $email;
        private $senha;
        private $banco;

        public function __construct()
        {
            $this->banco = new Conexao();
        }

        public function getId()
        {
            return $this->id;
        }


        public function getNome()
        {
            return $this->nome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getSenha()
        {
            return $this->senha;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }


        public function salvar()
        {
            $sql = 'INSERT INTO usuario (Nome, Email, Senha) VALUES (:Nome, :Email, :Senha)';
            $conexao = $this->banco->getConexao();
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(':Nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(':Email', $this->email, PDO::PARAM_STR);
            $consulta->bindValue(':Senha', $this->senha, PDO::PARAM_STR);
            

            try 
            {
                $resultado = $consulta->execute();
                return $resultado;
            } 
            catch (PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function selecionarPorIdUsuario($id)
        {
            $conexao = $this->banco->getConexao();
            $sql = 'SELECT * FROM usuario WHERE id = :id';
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            if ($consulta->execute() == false)
                return false;
            return $consulta->fetchObject('Usuario');
        }

        public function selecionarTodos()
        {
            $conexao = $this->banco->getConexao();
            $sql = 'SELECT * FROM usuario';
            $resultados = $conexao->query($sql);
            $registros = $resultados->fetchAll(PDO::FETCH_CLASS, 'Usuario');
            return $registros;
        }

        public function atualizar()
        {
            $sql = 'UPDATE usuario SET Nome = :Nome, Email = :Email, Senha = :Senha WHERE id = :id';
            $conexao = $this->banco->getConexao();
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(':Nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(':Email', $this->email, PDO::PARAM_STR);
            $consulta->bindValue(':Senha', $this->senha, PDO::PARAM_STR);
            $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $resultado = $consulta->execute();
            if ($resultado == false) return false;
            return true;
        }

        public function excluir($id)
        {
            $conexao = $this->banco->getConexao();
            $sql = 'DELETE FROM usuario WHERE id = :id';
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            $resultado = $consulta->execute();

            if ($resultado == false) 
            {
                return false; 
            }

            return true;
        }
    }

?>

