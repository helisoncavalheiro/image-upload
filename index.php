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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="" width="30" height="30" alt="">
            </a>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <form method="POST" enctype="multipart/form-data" action="/">

                    <input hidden name="action" value="upload" />

                    <div class="form-group">
                        <label for="image_name">Nome para o arquivo </label>
                        <input required class="form-control" id="image_name" type="text" name="image_name" />
                    </div>

                    <div class="form-group">
                        <label for="image_file">Example file input</label>
                        <input type="file" name="image_file" class="form-control-file btn btn-success" id="image_file">
                    </div>

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
</body>

</html>