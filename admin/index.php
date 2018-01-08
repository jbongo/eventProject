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
  <title>Page d'administration</title>
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Mon Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $candidat->nombreCandidatParStatut(5)['nb'];?> inscrits!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Voir Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo $candidat->nombreCandidatParStatut(0)['nb'];?>  en attente de validation</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="attente_validation.php">
              <span class="float-left">Voir Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $candidat->nombreCandidatParStatut(1)['nb'];?>  Validés</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="valide.php">
              <span class="float-left">Voir Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo $candidat->nombreCandidatParStatut(2)['nb'];?>  réfusés!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="refuse.php">
              <span class="float-left">Voir Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
 
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Candidats en attente de validation</div>
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


                ?>
                <tr>
                  <td><?php echo $results[$i]["nom"] ; ?></td>
                  <td><?php echo $results[$i]["email"] ;?></td>
                  <td><?php echo $results[$i]["adresse"]; ?></td>
                  <td><?php echo $results[$i]["question1"] ;?></td>
        
                  <td><?php echo $results[$i]["date_inscription"]; ?></td>
                  
                   
                    <?php 
                    if( $results[$i]["statut"] == 1) 
                     { ?>

                      <td> <button type="button" class="btn">Déja validé</button> -<a class="btn btn-warning" href="index.php?anl=<?php echo $results[$i]["numero"];  ?>" >Annuler</a>   </td>
                    <?php } elseif( $results[$i]["statut"] == 2) 
                     { ?>

                      <td> <button type="button" class="btn">Déja réfusé</button> -<a class="btn btn-warning" href="index.php?anl=<?php echo $results[$i]["numero"];  ?>" >Annuler</a>   </td>
                    <?php } 
                     else 
                    { ?> 
                    <td> <a class="btn btn-success" href="index.php?idv=<?php echo $results[$i]["numero"];  ?>" >Valider</a>-<a class="btn btn-danger" href="index.php?idr=<?php echo $results[$i]["numero"];  ?>" >Réfuser</a>   </td>
                    <?php } 


                }?>
                 
                </tr>
               
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  </div>
  
  <?php
    include ("footer.php");
  ?>
  
</body>

</html>
