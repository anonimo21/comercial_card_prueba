<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?= $header; ?></h3><hr>
                <form method="POST" action="?c=recibir"> 
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $reg->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="<?= $reg->nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" value="<?= $reg->descripcion; ?>">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" value="<?= $reg->precio; ?>">
                    </div>
                    <div class="form-group">
                        <label for="stock">Strock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="stock" value="<?= $reg->stock; ?>">
                    </div>
                    <div class="form-group my-2">
                       <input type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>