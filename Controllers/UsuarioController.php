<?php

require_once "Models/Conexao.php";
require_once "Models/UsuarioDAO.php";
require_once "Models/Usuarios.php";

class UsuarioController {
  public function login() {
    $msg = array("", "", "");
    $erro = false;

    if ($_POST) {
      // verificar os dados
      if (empty($_POST["email"])) {
        $msg[0] = "Preencha o email.";
        $erro = true;
      }
      if (empty($_POST["senha"])) {
        $msg[1] = "Preencha a senha.";
        $erro = true;
      }

      // verificar no banco de dados se existe esse usuário
      if (!$erro) {
        $usuario = new Usuarios(email: $_POST["email"]);
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->login($usuario);

        // verificar se a senha corresponde
        if (is_array($retorno)) {
          if (count($retorno) > 0) {
            if (password_verify($_POST["senha"], $retorno[0]->senha)) {
              $msg[2] = "Login com sucesso!";
            }
            else {
              $msg[2] = "Credenciais inválidas!";
            }
          }
          else {
            $msg[2] = "Credenciais inválidas!";
          }
        }
      }
    }
    // require views formulário
    require_once "Views/login.php";
  }

  public function inserir() {
    $msg = array("", "", "", "");
    $erro = false;

    if ($_POST) {
      if (empty($_POST["nome"])) {
        $msg[0] = "O campo nome é obrigatório.";
        $erro = true;
      }

      if (empty($_POST["email"])) {
        $msg[1] = "O campo email é obrigatório.";
        $erro = true;
      }
      else {
        // verificar se já não tem um usuário com esse email cadastrado
        $usuario = new Usuarios(email: $_POST["email"]);
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->valida_email($usuario);

        if (is_array($retorno)) {
          if (count($retorno) > 0) {
            $msg[1] = "Esse email já está cadastrado!";
            $erro = true;
          }
        }
      }

      if (empty($_POST["senha"])) {
        $msg[2] = "O campo senha é obrigatório.";
        $erro = true;
      }

      if (empty($_POST["telefone"])) {
        $msg[3] = "O campo telefone é obrigatório.";
        $erro = true;
      }

      if (!$erro) {
        $usuario = new Usuarios(0, $_POST["nome"], $_POST["email"], password_hash($_POST["senha"], PASSWORD_DEFAULT), $_POST["telefone"]);
        // cadastrar no banco de dados
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->inserir($usuario);
      }
    }

    require_once "Views/form-usuario.php";
  }
}

?>