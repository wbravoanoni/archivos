<?php
#https://programandoointentandolo.com/2013/09/mostrar-archivos-de-una-carpeta-con-php.html

function obtener_estructura_directorios($ruta,$id){

    $ruta = $ruta."/".$id;
    // Se comprueba que realmente sea la ruta de un directorio
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);
        echo "<ul>";

        // Recorre todos los elementos del directorio
        while (($archivo = readdir($gestor)) !== false)  {
                
            $ruta_completa = $ruta . "/" . $archivo;

            // Se muestran todos los archivos y carpetas excepto "." y ".."
            if ($archivo != "." && $archivo != "..") {
                // Si es un directorio se recorre recursivamente

                     $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                     $extension = strtolower($extension);

                if (is_dir($ruta_completa)) {
                   # echo "<li>" . $archivo . "</li>";
                	#  echo "<img width=40% src=archivos/10/" . $archivo . ">";





                    if($extension=="pdf"){

                         echo "<a href='archivos/{$id}/". $archivo ."'><img width=40% src=pdf.jpg". $archivo ."'></a>";
                    obtener_estructura_directorios($ruta_completa);
                    }

            echo "<a href='archivos/{$id}/". $archivo ."'><img width=40% src='archivos/{$id}/". $archivo ."'></a>";
                    obtener_estructura_directorios($ruta_completa);
                } else {

                     if($extension=="pdf"){

                          echo "<a href='archivos/{$id}/". $archivo ."'><img width: 60px; src='pdf.jpg'></a>";
                     }else{
                            echo "<a href='archivos/{$id}/". $archivo ."' ><img style='width: 60px;' src='archivos/{$id}/". $archivo ."'></a>";
                     }
                    #echo "<li>" . $archivo . "</li>";
                 
                }
            }
        }
        
        // Cierra el gestor de directorios
        closedir($gestor);
        echo "</ul>";
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}


if(isset($_GET["idCliente"])){
    $idCliente = $_GET["idCliente"];

     obtener_estructura_directorios("./archivos",$idCliente);
}





?>