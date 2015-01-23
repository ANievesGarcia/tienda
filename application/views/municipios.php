<?php  

if(empty($municipios))
 {
 echo "<option value=''>No hay municipios</option>";
 }
 else
 {
 foreach($municipios as $municipio)
 {
 echo "<option value='$municipio->cv_municipio'>$municipio->nombre</option>";
 }
 }

 ?>