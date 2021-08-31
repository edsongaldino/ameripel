<?php require_once("../sistema_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();

if($_GET["codigo_fabricante"]){

    $codigo_fabricante        = protege(decodifica($_GET["codigo_fabricante"]));
 
	$deleta_fabricante = $pdo->prepare('DELETE FROM fabricante WHERE codigo_fabricante = :codigo_fabricante');
    $deleta_fabricante->bindParam(':codigo_fabricante', $codigo_fabricante); 
    $deleta_fabricante->execute();

    if(!$deleta_fabricante){
        $error_log[] = $deleta_fabricante->errorInfo();
    }

    if($error_log){
        redireciona("/sistema/sessao_fabricante/consultar.php?me=".codifica(1,true)."&mm=".codifica("Ops, algo deu errado ao excluir a fabricante!")); 
    }else{
        redireciona("/sistema/sessao_fabricante/consultar.php?me=".codifica(0,false)."&mm=".codifica("A fabricante foi removida com sucesso!")); 
    }

}

if($_GET["codigo_lista"]){

    $codigo_lista        = protege(decodifica($_GET["codigo_lista"]));

    //consulta fabricantes
    $sql_consulta_turma = "SELECT codigo_turma FROM lista WHERE codigo_lista = '".$codigo_lista."'";
    $result = $pdo->query( $sql_consulta_turma );
    $turma = $result->fetch( PDO::FETCH_ASSOC );
 
	$deleta_lista = $pdo->prepare('DELETE FROM lista WHERE codigo_lista = :codigo_lista');
    $deleta_lista->bindParam(':codigo_lista', $codigo_lista); 
    $deleta_lista->execute();

    if(!$deleta_lista){
        $error_log[] = $deleta_lista->errorInfo();
    }

    if($error_log){
        redireciona("/sistema/sessao_fabricante/lista.php?codigo_turma=".codifica($turma["codigo_turma"])."&me=".codifica(1,true)."&mm=".codifica("Ops, algo deu errado ao excluir a fabricante!")); 
    }else{
        redireciona("/sistema/sessao_fabricante/lista.php?codigo_turma=".codifica($turma["codigo_turma"])."&me=".codifica(0,false)."&mm=".codifica("A fabricante foi removida com sucesso!")); 
    }

}

if($_GET["codigo_turma"]){

    $codigo_turma = protege(decodifica($_GET["codigo_turma"]));

    //consulta fabricantes
    $sql_consulta_fabricante = "SELECT turma.codigo_fabricante FROM turma WHERE turma.codigo_turma = '".$codigo_turma."'";
    $query_fabricante = $pdo->query( $sql_consulta_fabricante );
    $fabricante = $query_fabricante->fetch( PDO::FETCH_ASSOC );
 
	$deleta_turma = $pdo->prepare('DELETE FROM turma WHERE codigo_turma = :codigo_turma');
    $deleta_turma->bindParam(':codigo_turma', $codigo_turma); 
    $deleta_turma->execute();

    if(!$deleta_turma){
        $error_log[] = $deleta_turma->errorInfo();
    }

    if($error_log){
        redireciona("/sistema/sessao_fabricante/turmas.php?codigo_fabricante=".codifica($fabricante["codigo_fabricante"])."&me=".codifica(1,true)."&mm=".codifica("Ops, algo deu errado ao excluir a turma!")); 
    }else{
        redireciona("/sistema/sessao_fabricante/turmas.php?codigo_fabricante=".codifica($fabricante["codigo_fabricante"])."&me=".codifica(0,false)."&mm=".codifica("A turma foi removida com sucesso!")); 
    }

}

?>