<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container">
        <!--Inicio formulario-->
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-4 mt-5 columna">
                <h2>Ingresa tus datos</h2>
                <form action="validar.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="nombre" placeholder="">
                        <label class="form-label" for="nombre">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="edad" placeholder="">
                        <label class="form-label" for="nombre">Edad</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="email" name="email" placeholder="ejemplo@email.com">
                        <label class="form-label" for="nombre">Email</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" placeholder="">
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="repetirPassword" placeholder="">
                        <label for="password">Repetir password</label>
                    </div>

                    <!-- <div class="form-group mb-3">
                        <label class="form-label" for="nombre">Programa</label>
                        <select class="form-select" name="programa" id="">
                            <option value="">Selecciona un programa</option>
                            <option value="adso">ADSO</option>
                            <option value="tps">TPS</option>
                            <option value="multimedia">Multimedia</option>
                        </select>
                    </div> -->


                    <div class="input-group mb-3">
                        <label class="input-group-text" for="programa">Programas</label>
                        <select class="form-select" id="programa" name="programa">
                            <option value="" selected>Selecciona un programa</option>
                            <option value="adso">Adso</option>
                            <option value="tps">tps</option>
                            <option value="multimedia">Multimedia</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="imagen" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".jpg,.jpeg,.png">
                    </div>


                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <!--Fin de formulario-->

        <div class="row justify-content-center mt-2">
            <div class="col-4">
                <?php
                if (isset($_GET['var'])) {
                    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php
                        echo $_GET['var'];
                        ?>
                </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!--fin de container-->
    <script src="js/bootstrap.bundle.min.js">
    </script>
</body>

</html>