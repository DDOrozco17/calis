<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre_provedor" class="form-control" placeholder="Nombre Provedor" autofocus>
          </div>
          <div class="form-group">
            <textarea name="direccion" rows="2" class="form-control" placeholder="Direccion"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="telefono">
          </div>
          <div class="form-group">
            <input type="text" name="correo_electronico" class="form-control" placeholder="correo electronico">
          </div>
          <div class="form-group">
            <input type="text" name="producto_principal" class="form-control" placeholder="producto principal">
          </div>
          <div class="form-group">
            <input type="date" name="fecha_entrega" class="form-control" placeholder="fecha entrega">
          </div>
          <div class="form-group">
            <input type="text" name="total_productos" class="form-control" placeholder="total productos">
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id_provedor</th>
            <th>nombre_provedor</th>
            <th>direccion</th>
            <th>telefono</th>
            <th>correo_electronico</th>
            <th>producto_principal</th>
            <th>fecha_entrega</th>
            <th>total_productos</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_proveedor";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_provedor']; ?></td>
            <td><?php echo $row['nombre_provedor']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo_electronico']; ?></td>
            <td><?php echo $row['producto_principal']; ?></td>
            <td><?php echo $row['fecha_entrega']; ?></td>
            <td><?php echo $row['total_productos']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_provedor']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id_provedor']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
