<?php
    require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarUsuario(string $email, string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($email, $senha);
        
            session_start();
            
            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['idTipoUsuario'];

                if ($retorno['idTipoUsuario'] === 1) {
                    header('Location: ../views/cadastrarNoticia.php');
                }
                else {
                    header('Location: ../views/principal.php');
                }
            }
            else {
                header('Location: ../views/login.php');
            }
            
            exit();
        }

        public function cadastrarUsuario(string $nome, string $email, string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $retorno = $usuarioModel->inserirUsuario($nome, $email, $senha);
            
            if ($retorno === true) {
                header('Location: ../views/login.php');
            }
            else {
                header('Location: ../views/cadastro.php');
            }

            exit();
        }
    }
?>