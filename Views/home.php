<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="../Functions/listadoCombinaciones.php">
                    <div class="form-group">
                        <label for="numero">Ingrese un valor númerico</label>
                        <input type="number" class="form-control" id="numero" name="numero" placeholder="numero">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
                <h2>Valor total del inventario: </h2> <h5><?php echo $this->modelProducto->totalInventario()?></h5>
                <h2>Producto con mayor valor en inventario: </h2> <?php foreach ($this->modelProducto->mayorInventario() as $row) : ?> <h5><?= $row ?></h5> <?php endforeach; ?>
                <hr>
                <h3 class="text-center">CRUD DE PRODUCTOS</h3>
                <hr>
                <a href="?c=nuevo" class="btn btn-primary mb-2">Nuevo Producto</a>
                <table class="table" id="myTable">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->modelProducto->listar() as $row) : ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->nombre ?></td>
                            <td><?= $row->descripcion ?></td>
                            <td><?= $row->precio ?></td>
                            <td><?= $row->stock ?></td>
                            <td><a href="?c=nuevo&id=<?=$row->id;?>" class="btn btn-info btn-sm">Editar</a></td>
                            <td><a href="?c=eliminar&id=<?=$row->id;?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">"Sabías que...".</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            $response = getApiData('https://meowfacts.herokuapp.com/?count=2');
                            $json=json_decode($response);
                            foreach ($json->data as $item) {
                                echo "- " . $item . "</br>";
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <footer class="p-2 d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-success">
            <h3>Dato inútil del dia: </h3>
            <p>
                <?php
                    $response = getApiData2('https://uselessfacts.jsph.pl/api/v2/facts/today');
                    $response = 'Half the foods eaten throughout the world today were developed by farmers in the Andes Mountains (including potatoes, maize, sweet potatoes, squash, all varieties of beans, peanuts, manioc, papayas, strawberries, mulberries and many others).';
                    echo $response;
                ?>
            </p>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#exampleModal').modal('show');
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>