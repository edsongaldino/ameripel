<?php require_once("../sistema_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();

if(decodifica($_POST["acao"]) == "adicionar-fabricante"){

    $nome_fabricante      = $_POST["nome_fabricante"];
    $link_fabricante      = $_POST["link_fabricante"];
    $status             = $_POST["status"];
    $area_atuacao      = $_POST["area_atuacao"];


    $diretorio = "../../conteudos/fabricante/"; 
    $filename = $_FILES['arquivo']['name'];
    $ext = strrchr($filename, '.'); 
    $filename = time().uniqid().$ext;
    move_uploaded_file($_FILES["arquivo"]["tmp_name"],$diretorio . $filename);

    // Insere o produto
    $fabricante = $pdo->prepare("INSERT INTO fabricante 
                            (nome_fabricante, link_fabricante, arquivo, area_atuacao, status)
                            VALUES
                            (:nome_fabricante, :link_fabricante, :arquivo, :area_atuacao, :status)");

    $fabricante->execute(array(
        ':nome_fabricante' => $nome_fabricante,
        ':link_fabricante' => $link_fabricante,
        ':area_atuacao' => $area_atuacao,
        ':arquivo' => $filename,
        ':status' => $status
    ));

    if(!$fabricante){
        $error_log[] = $fabricante->errorInfo();
    }

    if($error_log){
        redireciona("/sistema/sessao_fabricante/consultar.php?me=".codifica(1,true)."&mm=".codifica("Ops, algo deu errado na inclusão da fabricante!")); 
    }else{
        redireciona("/sistema/sessao_fabricante/consultar.php?me=".codifica(0,false)."&mm=".codifica("A fabricante foi adicionada com sucesso!")); 
    }
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <?php include_once("../sistema_mod_head.php");?>
    <script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
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

                            <a href="sessao_fabricante/consultar.php">
                                <button class="btn btn-info">
                                            <span class="btn-label">
                                            <i class="material-icons">reply</i>
                                            </span>
                                            VOLTAR
                                        <div class="ripple-container"></div>
                                </button>
                            </a>
                            
                            <div class="card">
                                <form method="post" action="sessao_fabricante/adicionar.php" class="form-horizontal" multipart="" enctype="multipart/form-data">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">DADOS DA fabricante</h4>
                                    </div>
                                    <div class="card-content">
                                        <?php require_once("form.php");?>
                                    </div>
                                    <input type="hidden" name="acao" id="acao" value="<?php echo codifica("adicionar-fabricante"); ?>">
                                    <input type="hidden" name="codigo_fabricante" id="codigo_fabricante" value="<?php echo codifica($codigo_fabricante); ?>">
                                    <button type="submit" class="btn btn-fill btn-rose salvar">Gravar fabricante</button>
                                </form>
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
    <?php include_once("../sistema_include_configuracoes.php"); ?>
</body>
<!--   Core JS Files   -->
<script src="../sistema/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../sistema/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../sistema/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../sistema/assets/js/material.min.js" type="text/javascript"></script>
<script src="../sistema/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../sistema/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../sistema/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../sistema/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../sistema/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../sistema/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../sistema/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../sistema/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../sistema/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../sistema/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../sistema/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../sistema/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../sistema/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../sistema/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../sistema/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../sistema/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../sistema/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../sistema/assets/js/demo.js"></script>
</html>