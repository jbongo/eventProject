<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Event</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body style="background-color: #f6f6f5">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><h3>Connectez-vous</h3></div>
      <div class="card-body">
        <form method="post" action="seconnecter.php">
          <div class="form-group">
            <label for="exampleInputLogin">Login</label>
            <input class="form-control" id="exampleInputLogin" name="login" type="text" required="" aria-describedby="emailHelp" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input class="form-control" required="" name="password" id="exampleInputPassword1" type="password" >
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox">Se rappeler de moi</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" >Login</button>
        </form>
        <div class="text-center">
          
        </div>
      </div>
    </div>
  </div>
 
</body>

</html>
