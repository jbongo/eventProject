<?php
require('config/BDConnect.php');
require "model/candidat.class.php";
require "controller/candidat.php";

$candidat = new candidat($pdo);

$results = displayAllCandidats($candidat);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  
  <?php
  require "navbar.php";
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Validés</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Adresse</th>
                  <th>Question1</th>
                  <th>Date d'inscription</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>Nom</th>
                  <th>Email</th>
                  <th>Adresse</th>
                  <th>Question1</th>
                  <th>Date d'inscription</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                 <?php for ($i = 0; $i < sizeof($results); $i++ ) {

                if($results[$i]['statut'] == 1)
                {


                ?>
                <tr>
                  <td><?php echo $results[$i]["nom"] ; ?></td>
                  <td><?php echo $results[$i]["email"] ;?></td>
                  <td><?php echo $results[$i]["adresse"]; ?></td>
                  <td><?php echo $results[$i]["question1"] ;?></td>
        
                  <td><?php echo $results[$i]["date_inscription"]; ?></td>

                  <td> <a type="button" class="btn btn-info" href="details.php?cand=<?php echo $results[$i]['numeroCandidat'] ;?>">Voir détail</a>  </td>
        

                </tr>
             <?php } }?>

                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

  <?php
    include ("footer.php");
  ?>
</body>

</html>
