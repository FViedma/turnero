<html>
<head>
   <title>Calcular edad</title>
 
   <script type="text/javascript" language="javascript">
     function cambiar(){
       var year = document.getElementById('year').value;
       var year_serv = <?php echo date('Y')?>;
 
       var edad = year_serv-year-1;
 
       if(document.getElementById('mes').value==<?php echo date('m')?>){
         if(document.getElementById('dia').value<=<?php echo date('d')?>){
           edad += 1;
          }
       }else if(document.getElementById('mes').value<=<?php echo date('m')?>){
         edad += 1;
       }
 
       document.getElementById('edad').value = edad;
     }
   </script>
 
</head>
 
<body>
   <?php
      echo "Fecha del servidor: ".date('d/m/Y');
   ?>
<br/><br/>
   D&iacute;a: <select id="dia" onChange="cambiar()">
      <?php 
        for($i=1; $i<32; $i++){
          echo "<option value='".$i."'>".$i."</option>\n";
        }
      ?>
   </select>
<br/>
   Mes: <select id="mes" onChange="cambiar()">
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
   </select>
<br/>
   A&ntilde;o: <select id="year" onChange="cambiar()">
      <?php 
        for($i=1950; $i<2012; $i++){
          echo "<option value='".$i."'>".$i."</option>\n";
        }
      ?>
   </select>
<br/>
<br/>
Tu edad es: <input type="text" id="edad" />
</body>
</html>