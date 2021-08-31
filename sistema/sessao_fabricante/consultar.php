<?php require_once("../sistema_mod_include.php");?>
<?php
    $msg_erro        = protege(decodifica($_GET["me"]));
    $mensagem        = protege(decodifica($_GET["mm"]));

    //Abre a conexão
    $pdo = Database::conexao();
    
	//consulta fabricantes
    $sql_consulta_fabricantes = "SELECT fabricante.codigo_fabricante, fabricante.nome_fabricante, fabricante.status FROM fabricante WHERE fabricante.status <> 'E'";
    $result = $pdo->query( $sql_consulta_fabricantes );
    $fabricantes = $result->fetchAll( PDO::FETCH_ASSOC );

?>
<!doctype html>
<html lang="pt-br">
<head>
    <?php include_once("../sistema_mod_head.php");?>

    <script type="text/javascript">
        window.onload = function(){
            <?php if($msg_erro){ ?>
                demo.showNotification('top','center', 'warning', '<?php echo $mensagem;?>');
            <?php }elseif($_GET["mm"]){ ?>
                demo.showNotification('top','center', 'success', '<?php echo $mensagem;?>');
            <?php } ?>
        }

        function removerfabricante(id) {
           swal({
                    title: 'Deseja remover este item?',
                    text: 'Tenha certeza que deseja remover este item, não haverá como restaurá-lo.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, pode excluir!',
                    cancelButtonText: 'Não, quero manter',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).then(function() {
                    window.location.href = "/sistema/sessao_fabricante/excluir.php?codigo_fabricante="+id;
                }, function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Operação cancelada',
                      text: 'O item será mantido :)',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
                })
        }

        function removerSubfabricante(id) {
           swal({
                    title: 'Deseja remover este item?',
                    text: 'Tenha certeza que deseja remover este item, não haverá como restaurá-lo.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, pode excluir!',
                    cancelButtonText: 'Não, quero manter',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).then(function() {
                    window.location.href = "/sistema/sessao_fabricante/excluir.php?codigo_subfabricante="+id;
                }, function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Operação cancelada',
                      text: 'O item será mantido :)',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
                })
        }

        function adicionarfabricante(id) {
           swal({
                title: 'Insira o nome da fabricante',
                html: '<form id="myForm" method="post" action="/sistema/sessao_fabricante/adicionar.php" ><div class="form-group">' +
                        '<input id="input-field" name="nome_fabricante" type="text" class="form-control" />' +
                        '<input id="input-field" name="acao" type="hidden" class="form-control" value="<?php echo codifica("adicionar-fabricante");?>" />' +
                    '</div></form>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                confirmButtonText: 'Salvar fabricante',
                cancelButtonClass: 'btn btn-danger',
                cancelButtonText: 'Cancelar',
                buttonsStyling: false
                }).then(function(result) {
                    $('#myForm').submit();
                }).catch(swal.noop)
        }

        function adicionarTurma(id) {
           swal({
                title: 'Insira o nome da turma',
                html: '<form id="myForm" method="post" action="/sistema/sessao_fabricante/adicionar_turma.php" ><div class="form-group">' +
                        '<select id="fabricante" name="fabricante" class="form-control">'+
                        '<option value="">Selecione uma fabricante</opstion>'+
                        <?php foreach($fabricantes AS $fabricante_select):?>
                        '<option value="<?php echo $fabricante_select["codigo_fabricante"];?>"><?php echo $fabricante_select["nome_fabricante"];?></opstion>'+
                        <?php endforeach; ?>
                        '</select>'+
                        '<select id="nivel_turma" name="nivel_turma" class="form-control">'+
                        '<option value="">Selecione o nível</opstion>'+
                        '<option value="EI">Educação Infantil</opstion>'+
                        '<option value="EF">Ensino Fundamental</opstion>'+
                        '<option value="EM">Ensino Médio</opstion>'+
                        '</select>'+
                        '<input id="input-field" name="nome_turma" type="text" class="form-control" placeholder="Nome da turma" />' +
                        '<input id="input-field" name="acao" type="hidden" class="form-control" value="<?php echo codifica("adicionar-turma");?>" />' +
                    '</div></form>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                confirmButtonText: 'Salvar Turma',
                cancelButtonClass: 'btn btn-danger',
                cancelButtonText: 'Cancelar',
                buttonsStyling: false
                }).then(function(result) {
                    $('#myForm').submit();
                }).catch(swal.noop)
        }

        /*
        function adicionarfabricante(id){
            swal({
                    title: 'Input something',
                    html: '<div class="form-group">' +
                              '<input id="input-field" type="text" class="form-control" />' +
                          '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {
                    swal({
                        type: 'success',
                        html: 'You entered: <strong>' +
                                $('#input-field').val() +
                              '</strong>',
                        confirmButtonClass: 'btn btn-success',
                        buttonsStyling: false

                    })
                }).catch(swal.noop)
            }
        }

        function adicionarSubfabricante(id){
            swal({
                    title: 'Input something',
                    html: '<div class="form-group">' +
                              '<input id="input-field" type="text" class="form-control" />' +
                          '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {
                    swal({
                        type: 'success',
                        html: 'You entered: <strong>' +
                                $('#input-field').val() +
                              '</strong>',
                        confirmButtonClass: 'btn btn-success',
                        buttonsStyling: false

                    })
                }).catch(swal.noop)
            }
        }*/
        
    </script>

</head>

<body>
    <div class="wrapper">
        <?php include_once("../sistema_mod_lateral.php");?>
        <div class="main-panel">
            <?php include_once("../sistema_mod_topo.php");?>

            <div class="content">
           
                <div class="container-fluid">
                    <div class="row">
                    
                        <div class="col-md-12">

                                <a href="sessao_fabricante/adicionar.php">
                                <button type="button" rel="tooltip" class="btn btn-info">
                                            <span class="btn-label">
                                            <i class="material-icons">school </i>
                                            </span>
                                             ADICIONAR fabricante
                                        <div class="ripple-container"></div>
                                </button>
                                </a>

                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">fabricanteS</h4>
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Título do fabricante</th>
                                                        <th class="text-right">Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($fabricantes AS $fabricante):?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $fabricante["codigo_fabricante"];?></td>
                                                        <td><?php echo $fabricante["nome_fabricante"];?></td>
                                                        <td class="td-actions text-right">
                                                            <a href="sessao_fabricante/editar.php?codigo_fabricante=<?php echo codifica($fabricante["codigo_fabricante"]);?>">
                                                                <button type="button" rel="tooltip" class="btn btn-info" title="Editar fabricante">
                                                                    <i class="material-icons">create</i>
                                                                </button>
                                                            </a>
                                                            <button type="button" rel="tooltip" class="btn btn-danger" title="Remover fabricante" onclick="removerfabricante('<?php echo codifica($fabricante["codigo_fabricante"]);?>')">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <?php include_once("../sistema_mod_footer.php");?>
            </footer>
        </div>
    </div>
    <?php require_once("../sistema_include_configuracoes.php"); ?>
</body>
<?php require_once("../sistema_include_js.php"); ?>

</html>