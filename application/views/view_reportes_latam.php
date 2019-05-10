
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
       <h3>Reportes</h3>

 <link href="/landing/contents/css/bootstrap.min.css" rel="stylesheet" media="screen">
  
  </head>


<bR>
    <table class="table" class="table table-nonfluid">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
          <th>Email</th>
          <th>Pais</th>
          <th>Fecha</th>
          <th>Curriculum</th>
          <th>Titulo</th>
        </tr>
      </thead>
      <tbody>
<?php
  foreach ($candidatos as $row){
    echo "<tr>";
    echo "<td>".$row->nombre."</td>";
    echo "<td>".$row->apellidos."</td>";
    echo "<td>".$row->edad."</td>";
    echo "<td>".$row->email."</td>";
    echo "<td>".$row->pais."</td>";
    echo "<td>".$row->fecha."</td>";
    echo "<td><a class='btn btn-success' href='".site_url("reporte_latam/descargar1/".$row->id)."'>Descargar</a></td>";
    echo "<td><a class='btn btn-success' href='".site_url("reporte_latam/descargar2/".$row->id)."'>Descargar</a></td>";
    echo "</tr>";
  }
?>
      </tbody>
    </table>

  </div>
 
    <?php echo $links;?><br><br>
    <a class='btn btn-lg btn-primary' href= '<?php echo site_url("latam/index")?>' >Volver</a>
    <a class='btn btn-lg btn-info' href= '<?php echo site_url("reporte_latam/export_candidatos")?>' >Exportar</a>


      </body>
</html>