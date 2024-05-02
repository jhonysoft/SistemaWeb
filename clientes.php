<?php require_once "vistas/vista_superior.php"?>
<?php include("../php/db.php");?>
<?php
$clientes = "select * from clientes";
?>
<!-- Inicio de contenido principal-->
<main class="container-fluid">
        <div>
        <!-- FORMULARIO -->
          <h1 class="h2 text-center display-4">REGISTRO DE CLIENTES</h1>
          <form action="../php/guardar_dato.php" method="POST">
          <br>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputLastname">Nombres</label>
        <input type="text" class="form-control form-control-sm" id="inputLastname1" name="nombres" placeholder="nombres" autofocus required>
      </div>
      <div class="form-group col-md-3">
        <label for="inputLastname1">Apellido Paterno</label>
        <input type="text" class="form-control form-control-sm" id="inputLastname1" name="apellido_paterno" placeholder="apellido paterno" >
      </div>
      <div class="form-group col-md-3">
        <label for="inputLastname2">Apellido Paterno</label>
        <input type="text" class="form-control form-control-sm" id="inputLastname2" name="apellido_materno" placeholder="apellido materno" >
      </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputdni">DNI</label>
      <input type="number" class="form-control form-control-sm" id="inputdni" name="dni" maxlength="8" placeholder="dni">
    </div>
    <div class="form-group col-md-10">
      <label for="inputDate">Fecha Nacimiento</label>
      <input type="date" class="form-control form-control-sm" id="inputDate" name="fecha_nacimiento" placeholder="fecha de nacimiento">
    </div>
  </div>
  <div class="form-group">
      <label for="inputAddress">Direccion</label>
      <input type="text" class="form-control form-control-sm" id="inputAddress" name="direccion" placeholder="comas 124..." maxlength="50">
  </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="inputPhone">Celular</label>
        <input type="tel" class="form-control form-control-sm" id="inputPhone" name="celular" placeholder="celular" maxlength="9">
      </div>
      <div class="form-group col-md-6">
        <label for="inputLastname1">Email</label>
        <input type="email" class="form-control form-control-sm" id="inputLastname1" name="email" placeholder="nombre@email.com">
      </div>
      <div class="form-group col-md-4">
        <label for="inputSex">Sexo</label>
        <select id="inputSex" name="sexo" class="custom-select custom-select-sm">
          <option selected>Seleccione tipo de sexo</option>
          <option value="femenino">Femenino</option>
          <option value="masculino">Masculino</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFacebook">Facebook</label>
        <input type="text" class="form-control form-control-sm" id="inputFacebook" name="facebook" placeholder="facebook" maxlength="50">
      </div>
      <div class="form-group col-md-6">
        <label for="inputContact">Contacto</label>
        <select id="inputContact" name="contacto" class="custom-select custom-select-sm">
          <option selected>Seleccione como nos contacto</option>
          <option value="redes">Facebook</option>
          <option value="amigo">Amigos</option>
          <option value="familia">Familia</option>
          <option value="volante">Volante</option>
          <option value="volante">Otros</option>
        </select>
      </div>
    </div>
    <div class="form-row">
       <input type="submit" name="Guardar_cliente" class="btn btn-primary btn-block" value="Registrar Cliente">
    </div>
    <div class="form-row pt-1">
       <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-block " data-toggle="modal" data-target="#exampleModal">
  Listado de clientes
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Listado de Clientes registrados en sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-sm table-hover" id="myTable">
              <thead class="bg-light">
           <tr>
               <th>Nombres</th>
               <th>Apellido Paterno</th>
               <th>Apellido Materno</th>
               <th>DNI</th>
               <th>F. Nacimiento</th>
               <th>Direccion</th>
               <th>Celular</th>
               <th>Email</th>
               <th>Sexo</th>
               <th>Facebook</th>
               <th>Contacto</th>
               <th>Operaciones</th>
           </tr>
         </thead>
         <tbody>
           <?php
           $resultado = mysqli_query($conn,$clientes);
           while($row=mysqli_fetch_assoc($resultado)){ ?>
           <tr>
               <td><?php echo $row["nombres"];?></td>
               <td><?php echo $row["apellido_paterno"];?></td>
               <td><?php echo $row["apellido_materno"];?></td>
               <td><?php echo $row["dni"];?></td>
               <td><?php echo $row["fecha_nacimiento"];?></td>
               <td><?php echo $row["direccion"];?></td>
               <td><?php echo $row["celular"];?></td>
               <td><?php echo $row["email"];?></td>
               <td><?php echo $row["sexo"];?></td>
               <td><?php echo $row["facebook"];?></td>
               <td><?php echo $row["contacto"];?></td>
               <td class="text-center">
               <a href="edit_cliente.php?id_clientes=<?php echo $row['id_clientes']; ?>"><i class="fas fa-user-edit"></i></a>&nbsp;
               <!--<a class="tabla-item" href="delete_cliente.php?id=<?php echo $row['id_clientes']; ?>"><i class="fas fa-trash"></i></a></td>-->
           <?php } mysqli_free_result($resultado);?>
           </tr>
           </tbody>
       </table>
      </div>
    </div>
  </div>
</div>  
       </div>
  </form>
   </div>

    </main>
<!-- Fin de contenido principal-->
<?php require_once "vistas/vista_inferior.php"?>
