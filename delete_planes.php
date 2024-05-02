

<?php include("../php/db.php"); ?>

<?php if(isset($_GET['id_plan'])) {
  $id_plan = $_GET['id_plan'];
  $query = "DELETE FROM plan WHERE id_plan = $id_plan";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Plan Eliminado Satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: planes.php');
}

?>
