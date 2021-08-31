<?php require_once("../sistema_mod_include.php");?>
<?php
//Abre a conexão
$pdo = Database::conexao();

if(decodifica($_POST["acao"]) == "adicionar-texto"){

    $titulo_texto             = $_POST["titulo_texto"];
    $data_inicial               = $_POST["data_inicial"];
    $data_final               = $_POST["data_final"];
    $tipo               = $_POST["tipo"];
    $status               = $_POST["status"];
    $ordem_texto               = $_POST["ordem_texto"];
    $link_texto               = $_POST["link_texto"];

    $diretorio = "../../conteudos/texto/"; 
    $filename = $_FILES['arquivo']['name'];
    $ext = strrchr($filename, '.'); 
    $filename = time().uniqid().$ext;
    move_uploaded_file($_FILES["arquivo"]["tmp_name"],$diretorio . $filename);

    // Insere o produto
    $texto = $pdo->prepare("INSERT INTO texto 
                            (titulo_texto, codigo_tipo_texto, data_inicial, data_final, link_texto, ordem_texto, arquivo, status)
                            VALUES
                            (:titulo_texto, :codigo_tipo_texto, :data_inicial, :data_final, :link_texto, :ordem_texto, :arquivo, :status)");

    $texto->execute(array(
        ':titulo_texto' => $titulo_texto,
        ':codigo_tipo_texto' => $tipo,
        ':data_inicial' => $data_inicial,
        ':data_final' => $data_final,
        ':link_texto' => $link_texto,
        ':ordem_texto' => $ordem_texto,
        ':arquivo' => $filename,
        ':status' => $status
    ));

    if(!$texto){
        $error_log[] = $texto->errorInfo();
    }

    if($error_log){
        redireciona("/sistema/sessao_texto/consultar.php?me=".codifica(1,true)."&mm=".codifica("Ops, algo deu errado na inclusão da texto!")); 
    }else{
        redireciona("/sistema/sessao_texto/consultar.php?me=".codifica(0,false)."&mm=".codifica("A texto foi adicionada com sucesso!")); 
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

                            <a href="sessao_texto/consultar.php">
                            <button class="btn btn-info">
                                        <span class="btn-label">
                                        <i class="material-icons">reply</i>
                                        </span>
                                        VOLTAR
                                    <div class="ripple-container"></div>
                            </button>
                            </a>

                            <div class="card">
                                <form method="post" action="sessao_texto/adicionar.php" class="form-horizontal" multipart="" enctype="multipart/form-data">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">DADOS DO texto</h4>
                                    </div>
                                    <div class="card-content">
                                        <?php require_once("form_texto.php");?>
                                    </div>
                                    <input type="hidden" name="acao" id="acao" value="<?php echo codifica("adicionar-texto"); ?>">
                                    <input type="hidden" name="codigo_texto" id="codigo_texto" value="<?php echo codifica($codigo_texto); ?>">
                                    <button type="submit" class="btn btn-fill btn-rose salvar">Gravar texto</button>
                                    
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