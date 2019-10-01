<!DOCTYPE html>

<?php
include "Upload.php";

if(isset($_POST['action'])){

    if(file_exists($_FILES['image_file']['tmp_name'])){
        $uploadedimage = $_FILES['image_file'];
    }else{
        $msg = "Nenhuma imagem selecionada.";
        die();
    }

    if($_POST['image_name'] != null){
        $image_name = $_POST['image_name'];
        
    }else{
        echo "O nome da imagem não foi especificado.";
        die();
    }
    
    $msg = uploadImage($uploadedimage, $image_name);
}

?>
<html>

<head>
    <title>Repositório de Fluxos - ADO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Repositório de Fluxos - ADO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Upload de Imagem</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 outline-success" type="search" placeholder="Pesquisar" aria-label="Search">
                </form>
            </div>
        </nav>
    </header>
    <br>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <form method="POST" enctype="multipart/form-data" action="/">

                        <input hidden name="action" value="upload" />

                        <div class="form-group">
                            <label class="text-white" for="image_name">Nome para o arquivo </label>
                            <input required class="form-control" id="image_name" type="text" name="image_name" />
                        </div>

                        <div class="input-group">
                            <div class="custom-file">
                                <input name="image_file" type="file" class="custom-file-input" id="image_file"/>
                                <label class="custom-file-label" for="image_file" id="label_image_file">Escolha um arquivo</label>
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Carregar</button>

                    </form>
                </div>
            </div>
            <br>


            <?php
            if(isset($msg)){
        ?>

            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3 alert alert-info">

                    <?php
                echo $msg;
                ?>

                </div>
            </div>
            <?php
            }
            ?>


        </div>
    </main>
    <script src="assets/index.js"></script>
</body>

</html>