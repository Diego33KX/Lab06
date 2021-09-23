<?php
//LLAMA (INCLUYE) A UN ARCHIVO
include_once 'db.php';
/*code for data insert */
if(isset($_POST['save']))
{
  $fn = $MySQLiconn->real_escape_string($_POST['fn']);
  $ln = $MySQLiconn->real_escape_string($_POST['ln']);

  $SQL = $MySQLiconn->query("INSERT INTO data(fn,ln) VALUES('$fn','$ln')");
/*SI NO SE HA CREADO O SI HUBO PROBLEMAS CON EL OBJETO MYSQL */
  if(!$SQL)
  {
    echo $MySQLiconn->error;
  }

}
/*code for data insert */

/*code for data delete */
if(isset($_GET['del']))
{
  $SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
  /*PARA QUE SE PUEDA VISUALIZAR EL CAMBIO EN LA PAGINA (ESTA SE ACTUALIZA) */
  header("Location: index.php");
}
/* code for data delete */

/* code for data update */
/*se hace en dos partes, una para obtener los datos y otra para enviar los cambios */
if(isset($_GET['edit']))
{
  $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
  /*CONVIERTE LA DATA DE UN OBJETO EN UN ARREGLO*/
  /*LEE CADA OBJETO Y LO VA AÑADIENDO EN UN ARRAY */
  $getROW = $SQL->fetch_array();
}
if (isset($_POST['update'])) {
  $SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."'
  WHERE id=".$_GET['edit']);
  header("Location: index.php");
}
/* code for data update */
 ?>
