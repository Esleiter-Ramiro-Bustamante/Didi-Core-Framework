<?php 

class homeController extends Controller {
  function __construct()
  {
  }

  function index()
  {

    
    $data =
    [
      'title' => 'Home',
      'bg'    => 'dark'
    ];

    View::render('didi', $data);
  }

  function test()
  {
    echo 'Probando nuestra base de datos<br><br><br>';
    echo '<pre>';
    
    try {

      // SELECT
      $sql = 'SELECT * FROM tests WHERE id=:id AND name=:name';
      $res = Db::query($sql, ['id' => 2, 'name' => 'Esleiter']);
      print_r($res);

      // INSERT
      $sql = 'INSERT INTO tests (name, email, created_at) VALUES (:name, :email, :created_at)';
      $registro =
      [
        'name'       => 'Pablo',
        'email'      => 'pabl@gmail.com',
        'created_at' => now()
      ];
      //<==========Habilitar para insertar Registro==========>
     /*  $id = Db::query($sql, $registro);
      print_r($id); */

      // UPDATE
      $sql = 'UPDATE tests SET name=:name WHERE id=:id';
      $registro_actualizado = 
      [
        'name' => 'Ricardo',
        'id'   => 4
      ];
       //<==========Habilitar para editar Registro==========>
      /* print_r(Db::query($sql, $registro_actualizado)); */

      // DELETE
      $sql = 'DELETE FROM tests WHERE id=:id LIMIT 1';
      //<==========Habilitar para Eliminar Registro==========>
      /* print_r(Db::query($sql, ['id' => 4])); */

      //<==========Query para realizar subconsultas==========>
      // ALTER TABLE
      //$sql = 'TRUNCATE tests';
      $sql = 'ALTER TABLE tests ADD COLUMN username VARCHAR(255) NULL AFTER name';
      print_r(Db::query($sql));



    } catch (Exception $e) {
      echo 'Hubo un error: '.$e->getMessage();
    }

    echo '</pre>';
    die;
    View::render('test');
  }

  function flash()
  {
    Flasher::new('Te has registrado con éxito', 'info');
    View::render('flash');
  }

  function gastos()
  {
    View::render('gastos');
  }
}