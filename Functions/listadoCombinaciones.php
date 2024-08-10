<?php
function obtenerCombinaciones($valorMaximo) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "root", "crud_app");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para obtener los productos
    $sql = "SELECT nombre, precio FROM producto";
    $resultado = $conexion->query($sql);

    $productos = [];
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
    }

    $combinaciones = [];
    $n = count($productos);

    // Generar combinaciones de 2 productos
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $suma = $productos[$i]['precio'] + $productos[$j]['precio'];
            if ($suma <= $valorMaximo) {
                $combinaciones[] = [
                    'productos' => [$productos[$i]['nombre'], $productos[$j]['nombre']],
                    'suma' => $suma
                ];
            }
        }
    }

    // Generar combinaciones de 3 productos
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            for ($k = $j + 1; $k < $n; $k++) {
                $suma = $productos[$i]['precio'] + $productos[$j]['precio'] + $productos[$k]['precio'];
                if ($suma <= $valorMaximo) {
                    $combinaciones[] = [
                        'productos' => [$productos[$i]['nombre'], $productos[$j]['nombre'], $productos[$k]['nombre']],
                        'suma' => $suma
                    ];
                }
            }
        }
    }

    $conexion->close();
    return $combinaciones;
}

$valorMaximo = $_POST['numero'];
$combinaciones = obtenerCombinaciones($valorMaximo);
echo '<pre>';
print_r($combinaciones);
echo '</pre>';
?>