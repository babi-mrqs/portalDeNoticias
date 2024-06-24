<?php
    require_once 'DAL/usuarioDAO.php';
    
    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nomeUsuario;
        public ?string $emailUsuario;
        public ?string $senhaUsuario;

        public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nomeUsuario = null, ?string $emailUsuario = null, ?string $senhaUsuario = null)
        {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nomeUsuario = $nomeUsuario;
            $this->emailUsuario = $emailUsuario;
            $this->senhaUsuario = $senhaUsuario;
        }

        public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($email, $senha);
        
            return $retorno;
        }
  
        public function inserirUsuario(string $nome, string $email, string $senha) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->inserirUsuario($nome, $email, $senha);

            return $retorno;
        }
    }
?>