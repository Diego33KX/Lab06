<?php
include_once 'crud.php'
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejemplo CRUD</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <center>
        <br>
        <br>
        <div id="form">
            <form method="post">
                <table width="100%" border="1" cellpadding="15">
                    <tr>
                      <td>
                          <input type="text" name="fn" value="<?php if(isset($_GET['edit'])) echo $getROW['fn']; ?>" placeholder="Nombre">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <input type="text" name="ln" value="<?php if(isset($_GET['edit'])) echo $getROW['ln']; ?>" placeholder="Apellido">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <?php
                          //Si se ha hecho clic en el boton edit
                              if (isset($_GET['edit'])) {
                                ?>
                                  <button type="submit" name="update">Editar</button>
                                <?php
                              }else {
                                ?>
                                  <button type="submit" name="save">Registrar</button>
                                <?php
                              }
                           ?>
                      </td>
                    </tr>
                </table>
            </form>
            <br><br>
            <table width="100%" border="1" cellpadding="15" align="center">
                <?php
                    $res = $MySQLiconn->query("SELECT * FROM data");
                    //CON ESTA SENTENCIA REPETITIVA SE LISTAN TODOS LOS ELEMENTOS DE LA LISTA
                    while ($row=$res->fetch_array()){
                      ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fn']; ?></td>
                            <td><?php echo $row['ln']; ?></td>
                            <td><a href="?edit=<?php echo $row['id'];?>"
                                onclick="return confirm('Confirmar edicion')">Editar</a></td>

                            <td><a href="?del=<?php echo $row['id'];?>"
                                onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                        </tr>
                      <?php
                    }
                 ?>
            </table>
        </div>
    </center>
  </body>
</html>
