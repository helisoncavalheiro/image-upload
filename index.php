<!DOCTYPE html>

<?php
include "Upload.php";
include "config.php";
$dir_files = scandir($uploaddir);


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
                <ul class="navbar-nav mr-auto align-middle">
                    <li class="nav-item active">
                        <a class="nav-link " href="/">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalForm">
                                Nova imagem
                            </button>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 outline-success" type="search" placeholder="Pesquisar"
                        aria-label="Search">
                </form>
            </div>
        </nav>
    </header>
    <br>
    <main>
        <div class="container">
            <div class="row">
                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="POST" enctype="multipart/form-data" action="/">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload de imagem</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input hidden name="action" value="upload" />

                                    <div class="form-group">
                                        <label for="image_name">Nome para o arquivo </label>
                                        <input required class="form-control" id="image_name" type="text"
                                            name="image_name" />
                                    </div>

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image_file" type="file" class="custom-file-input"
                                                id="image_file" />
                                            <label class="custom-file-label" for="image_file"
                                                id="label_image_file">Escolha
                                                um
                                                arquivo</label>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Carregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 offset-md-1">
                    <?php
                    if(isset($msg)){
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?php
                            echo $msg;
                        ?>
                    </div>
                    <?php
                        }
                    ?>
                    <ul class="list-group">
                        <li class="list-group-item active">Imagens carregadas</li>
                        <?php
                            for($i = 2; $i < count($dir_files); $i++){
                        ?>
                        <li class="list-group-item"><?php echo $dir_files[$i]; ?></li>
                        <?php        
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="assets/index.js"></script>
</body>

</html>