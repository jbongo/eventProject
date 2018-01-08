

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>création de compte</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body style="background-color: #f6f6f5">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"> <h3>Créer votre compte</h3></div>
      <div class="card-body">
        <form action="controller/candidat.php" method="post">
          <div class="form-group">
            <label for="civi">Civilité</label>
            <select name="civilite">
                <option value="Mr">Mr</option>
                <option value="Mme">Mme</option>
                <option value="Mlle">Mlle</option>
            </select>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Prénom </label>
                <input class="form-control" name="prenom" id="exampleInputName" required="" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Nom</label>
                <input class="form-control" name="nom" id="exampleInputLastName" required="" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputAdresse">Adresse </label>
                <input class="form-control" name="adresse" id="exampleInputAdresse" required="" type="text" aria-describedby="nameHelp" placeholder=" 5 avenue des gaulois">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastPostal">Code Postale</label>
                <input class="form-control" name="codePostal" id="exampleInputLastPostal" required="" type="text" aria-describedby="nameHelp" placeholder="75000">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputVille">Ville </label>
                <input class="form-control" name="Ville" id="exampleInputVille" required="" type="text" aria-describedby="nameHelp" placeholder="Paris">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastContact">Pays</label>
                <input class="form-control" name="Contact" id="exampleInputLastContact" required="" type="text" aria-describedby="nameHelp" placeholder="France">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Adresse email</label>
            <input class="form-control" name="email" id="exampleInputEmail1" required="" type="email" aria-describedby="emailHelp" placeholder="alex@site.com">
          </div>
          <div class="form-group">
            <label for="exampleInputQuestion1">Pourquoi voulez vous participer au salon ?</label>
            <input class="form-control" name="question1" id="exampleInputQuestion1" required="" type="text" aria-describedby="emailHelp" placeholder=" ">
          </div>
          <div class="form-group">
            <label for="exampleInputQuestion2">Avez vous déjà participé à l'un de nos salons ?</label>
            <input class="form-control" name="question2" id="exampleInputQuestion2" required="" type="text" aria-describedby="emailHelp" placeholder=" ">
          </div>
          

           <input name="ajout" type="hidden" >
          <button class="btn btn-primary btn-block">Je m'inscris</button>

        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
