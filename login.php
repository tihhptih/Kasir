<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';

		if($_POST['remember']) {
			setcookie("remember", $_POST['user'], time() + 86400 * 30,);
		}
			
		$user = $_POST['user'];
		$pass = ($_POST['pass']);
		$sql = 'select * FROM login WHERE user=? AND pass= MD5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
			$hasil = $row -> fetch();
			$_SESSION['admin'] = $hasil;
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../kasir_tih/assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="./assets/js/html5-qrcode.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="icon" href="./src/Logo Rajawali.png">

	<style>
		body {
			background: #007bff;
			background: linear-gradient(to right, #0062E6, #33AEFF);
		}

		.btn-login {
			font-size: 0.9rem;
			letter-spacing: 0.05rem;
			padding: 0.75rem 1rem;
		}

		.btn-google {
			color: white !important;
			background-color: #ea4335;
		}

		.btn-facebook {
			color: white !important;
			background-color: #3b5998;
		}
	</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <form method="POST">
              <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" value="<?=  isset($_COOKIE['remember']) ? $_COOKIE['remember'] : '' ?>" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" <?=  isset($_COOKIE['remember']) ? 'checked' : '' ?> id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="proses" type="submit">Sign
                  in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>