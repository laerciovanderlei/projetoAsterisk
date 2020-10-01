<?php
//teste de comentario
require_once '../config/conexao.php';

if (isset($_GET['acao'])) $acao = $_GET['acao'];
else $acao = "listar";
//ROnaldo
/**
 * Ação de listar
 */
if ($acao == "listar") {
    $sql   = "SELECT * FROM usuario";
    $query = $con->query($sql);

    $registros = $query->fetchAll();


    require_once '../template/cabecalho.php';
    require_once 'lista_administrador.php';
    require_once '../template/rodape.php';
}
/**
    * Ação Novo
    **/
else if ($acao == "novo") {
    require_once '../template/cabecalho.php';
    require_once 'form_administrador.php';
    require_once '../template/rodape.php';
}
/**
    * Ação Gravar
    **/
else if ($acao == "gravar") {
    $registro = $_POST;

    // var_dump($registro);
    $nome = $registro["nome"];
    $usuario = $registro["usuario"];
    $senha_md5 = md5($registro["senha"]);

    $sql = "INSERT INTO usuario(nome, usuario, senha) VALUES('" . $nome . "', '" . $usuario . "', '" . $senha_md5 . "')";

    $result = $conn->query($sql);

    if ($result) {
        header('Location: ./administrador.php');
    } else {
        echo "Erro ao tentar inserir o Usuario: " . $nome;
    }
}
/**
    * Ação Excluir
    **/
else if ($acao == "excluir") {
    $id    = $_GET['id'];
    $sql   = "DELETE FROM usuario WHERE id = $id";

    $result = $conn->query($sql);

    //$result = $query->execute();
    if ($result) {
        header('Location: ./administrador.php');
    } else {
        echo "Erro ao tentar remover o administrador de id: " . $id;
    }
}
/**
    * Ação Excluir
    **/
else if ($acao == "buscar") {
    $id    = $_GET['id'];
    $sql   = "SELECT * FROM usuario WHERE id = :id";
    $query = $con->prepare($sql);
    $query->bindParam(':id', $id);

    $query->execute();
    $registro = $query->fetch();

    // var_dump($registro); exit;

    require_once '../template/cabecalho.php';
    require_once 'form_administrador.php';
    require_once '../template/rodape.php';
}
/**
    * Ação Atualizar
    **/
else if ($acao == "atualizar") {
    //update usuario set senha=md5('polonia@2020') where id = '2';
    //$sql   = "UPDATE usuario SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id";

    $registro = $_POST;

    $id = $registro["idRegistro"];
    $nome = $registro["nome"];
    $usuario = $registro["usuario"];

    $senhaAntiga = $registro["oldSenha"];

    /**
     * valida se a senha foi digitada, então deve ser trocada
     * caso contrário permanece a antiga
     */
    if ($registro["senha"] != "") {
        $senha_md5 = md5($registro["senha"]);
    } else {
        $senha_md5 = $senhaAntiga;
    }

    $sql   = "UPDATE usuario
                  SET nome = '$nome',
                      usuario = '$usuario',
                      senha= '$senha_md5'
                  WHERE id = $id";

    $result = $conn->query($sql);

    if ($result) {
        header('Location: ./administrador.php');
    } else {
        echo "Erro ao tentar atualizar os dados do Usuario";
    }
}
