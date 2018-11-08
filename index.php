<?php



if(isset($_POST['idUsuario'])){
	  $estructura = './archivos/'.$_POST['idUsuario'];

if (is_dir($estructura) == false){
	mkdir($estructura, 0777, true);
}

}

$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
if ($archivo) {
   $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
   $extension = strtolower($extension);
   $extension_correcta = ($extension == 'jpg' or $extension == 'jpeg' or $extension == 'gif' or $extension == 'png' or $extension == 'pdf');
   if ($extension_correcta) {

    #$estructura = './nivel1/nivel2/nivel3/';
  
      $ruta_destino_archivo = "./archivos/".$_POST['idUsuario']."/{$archivo['name']}";
      $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
   }
}
?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Subir archivos </title>
 </head>
 <body>  
    <?php if (isset($archivo)): ?>
       <?php if (!$extension_correcta): ?>
         <span style="color: #f00;"> La extensión es incorrecta, el archivo debe ser jpg, jpeg, gif o png. </span> 
       <?php elseif (!$archivo_ok): ?>
         <span style="color: #f00;"> Error al intentar subir el archivo. </span>
      <?php else: ?>
         <strong> El archivo ha sido subido correctamente. </strong>
         <br />
         <img src="archivos/<?php echo $archivo['name'] ?>" alt="" />
      <?php endif ?>
   <?php endif; ?>
   <form method="post" action="index.php" enctype="multipart/form-data">
      <label> Archivo </label>
      <input type="file" name="archivo" required="required" />
       <input type="subtextmit" name="idUsuario" />
      <input type="submit" value="Subir" />

   </form>
 </body>
</html>