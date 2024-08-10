<?php
    include_once 'Models/Producto.php';

    class ProductoController{
        
        public $modelProducto;

        public function __construct(){
            $this->modelProducto = new Producto();
        }

        public function index(){
            include_once 'Views/home.php';
        }

        public function nuevo(){
            $reg = new Producto();
            $header = 'Nuevo Producto';
            if(isset($_REQUEST['id'])){
                $reg = $this->modelProducto->edit($_REQUEST['id']);
                $header = 'Editar Producto';
            }
            include_once 'Views/save.php';
        }

        public function recibir(){
            $reg = new Producto();
            $reg->id = $_POST['id'];
            $reg->nombre = $_POST['nombre'];
            $reg->descripcion = $_POST['descripcion'];
            $reg->precio = $_POST['precio'];
            $reg->stock = $_POST['stock'];

            $reg->id > 0 ? $this->modelProducto->actualizar($reg) : $this->modelProducto->insertar($reg);
            
            header('Location: index.php');
        }

        public function eliminar(){
            $this->modelProducto->delete($_REQUEST['id']);
            header('Location: index.php');
        }

    }
?>