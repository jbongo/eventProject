<?php
require('config/BDConnect.php');
require "model/candidat.class.php";
require "controller/candidat.php";
$candidat = new candidat($pdo);


// affichage du detail d'un candidat

if(isset($_GET['cand']))
{
   $numero = $_GET['cand'];

  $resultat = detailsCandidat($candidat, $numero);
}

if(isset($_GET['sup']))
{
  $numero = $_GET['sup'];

  supCandidat($candidat, $numero);
}




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
        <li class="breadcrumb-item active">My Dashboard</li>
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
          <i class="fa fa-table"></i> Details du candidat</div>
        <div class="card-body">
          <div class="table-responsive">
  
  <?php if($resultat != null)

  {

  ?> 
        <form method="post" action="controller/candidat.php" id="idForm">


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <span class="btn btn-primary" id="modifier" href="" onclick="activeAll();">Modifier</span>---
                <a class="btn btn-danger" id="supprimer" href="details.php?sup=<?php echo $resultat['numero']; ?>">Supprimer</a>
              </div>
              
            </div>
          </div>

         <div class="form-group">
            <label for="civilite">Civilité</label>
            <select name="civilite" id="civilite" disabled value="<?php echo $resultat['civilite']; ?>" >
                <option value="Mr">Mr</option>
                <option value="Mme">Mme</option>
                <option value="Mlle">Mlle</option>
            </select>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Prénom </label>
                <input class="form-control" name="prenom" id="exampleInputName" type="text" disabled="true" value="<?php echo $resultat['prenom']; ?>" aria-describedby="nameHelp" placeholder="vide">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Nom</label>
                <input class="form-control" name="nom" id="exampleInputLastName" type="text" disabled value="<?php echo $resultat['nom']; ?>"  aria-describedby="nameHelp" placeholder="vide">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputAdresse">Adresse </label>
                <input class="form-control" name="adresse" id="exampleInputAdresse" type="text" disabled value="<?php echo $resultat['adresse']; ?>"  aria-describedby="nameHelp" placeholder="vide">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastPostal">Code Postale</label>
                <input class="form-control" name="codePostal" id="exampleInputLastPostal" type="text" disabled value="<?php echo $resultat['code_postal']; ?>"  aria-describedby="nameHelp" placeholder="vide">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputVille">Ville </label>
                <input class="form-control" name="Ville" id="exampleInputVille" type="text" disabled value="<?php echo $resultat['ville']; ?>"  aria-describedby="nameHelp" placeholder="vide">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastPays">Pays</label>
                <input class="form-control" name="pays" id="exampleInputLastPays" type="text" disabled value="<?php echo $resultat['pays']; ?>"  aria-describedby="nameHelp" placeholder="vide">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Adresse email</label>
            <input class="form-control" name="email" id="exampleInputEmail1" type="email" disabled value="<?php echo $resultat['email']; ?>"  aria-describedby="emailHelp" placeholder="vide">
          </div>
          <div class="form-group">
            <label for="exampleInputQuestion1">Pourquoi voulez vous participer au salon ?</label>
            <input class="form-control" name="question1" id="exampleInputQuestion1" type="text" disabled value="<?php echo $resultat['question1']; ?>"  aria-describedby="emailHelp" placeholder="vide">
          </div>
          <div class="form-group">
            <label for="exampleInputQuestion2"> vous déjà participé à l'un de nos salons ?</label>
            <input class="form-control" name="question2" id="exampleInputQuestion2" type="text" disabled value="<?php echo $resultat['question2']; ?>"  aria-describedby="emailHelp" placeholder="vide">
          </div>
                  <input  name="modifier"  type="hidden" ">
                  <input  name="numero"  type="hidden" value="<?php echo $resultat['numero']; ?>">
                  <button type="submit" name="xxx"  class="btn btn-primary" hidden="true" id="btnValider">Valider</button>
            </form>
      <?php } ?>

          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  </div>
  
  <?php
    include ("footer.php");
  ?>

  <script type="text/javascript" src="js/activationBouton.js"></script>
  
</body>

</html>
