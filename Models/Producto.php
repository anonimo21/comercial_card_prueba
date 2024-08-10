<?php
    class Producto{
        
        public $con;
        public $id;
        public $nombre;
        public $descripcion;
        public $precio;
        public $stock;
        
        public function __construct(){
            try{
                $this->con = Conexion::conectar();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function listar(){
            try{
                $query = 'SELECT * FROM producto';
                $stm = $this->con->prepare($query);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function insertar(Producto $datos){
            try{
                $query = 'INSERT INTO producto(nombre, descripcion, precio, stock) VALUES (?,?,?,?)';
                $this->con->prepare($query)->execute(
                    array(
                        $datos->nombre,
                        $datos->descripcion,
                        $datos->precio,
                        $datos->stock
                    )
                );
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function delete($id){
            try{
                $query = 'DELETE FROM producto WHERE id = ?';
                $stm = $this->con->prepare($query);
                $stm->execute(array($id));
            }catch(Exception $e){   
                die($e->getMessage());
            }
        }

        public function edit($id){
            try{
                $query = 'SELECT * FROM producto WHERE id = ?';
                $stm = $this->con->prepare($query);
                $stm->execute(array($id));
                return $stm->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function actualizar(Producto $datos){
            try{
                $query = 'UPDATE producto SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?';
                $this->con->prepare($query)->execute(
                    array(
                        $datos->nombre,
                        $datos->descripcion,
                        $datos->precio,
                        $datos->stock,
                        $datos->id
                    )
                );
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function totalInventario(){
            try{
                $query = 'SELECT SUM(precio*stock) AS total_inventario FROM crud_app.producto;';
                $stm = $this->con->prepare($query);
                $stm->execute();
                return $stm->fetchColumn();
            }catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function mayorInventario(){
            try{
                $query = 'SELECT nombre, (precio*stock) AS mayor_inventario
                FROM producto
                ORDER BY mayor_inventario DESC
                LIMIT 1;';
                $stm = $this->con->prepare($query);
                $stm->execute();
                return $stm->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $e) {
                die($e->getMessage());
            }
        }

    }
?>