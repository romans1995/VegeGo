<?php

require_once 'app/helpers.php';
$userAuth = user_auth();

if ($userAuth) {

    header('location: blog.php');
    exit;

}

$error = '';

if (isset($_POST['submit'])) {

    if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

        $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        if (!$email) {

            $error = ' * A valid email is required';

        } elseif (!$password) {

            $error = ' * Please enter your password';

        } else {

            $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
            $email = mysqli_real_escape_string($link, $email);
            $password = mysqli_real_escape_string($link, $password);
            $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

            $result = mysqli_query($link, $sql);

            if ($result && mysqli_num_rows($result) == 1) {

                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['password'])) {

                    $_SESSION['uid'] = $user['id'];
                    $_SESSION['uname'] = $user['name'];
                    $_SESSION['uip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['uagent'] = $_SERVER['HTTP_USER_AGENT'];
                    header('location: blog.php');

                } else {

                    $error = ' * Wrong email or password combination';

                }

            } else {

                $error = ' * Wrong email or password combination';

            }

        }

    }

    $token = csrf_token();

} else {

    $token = csrf_token();

}

$page_title = 'Sign in page';

?>
<?php include 'tpn/header.php';?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 mt-5">
        <h1 class="display-4">Signin With your account</h1>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="" novalidate="novalidate" autocomplete="off">
          <input type="hidden" name="token" value="<?=$token;?>">
          <div class="form-group">
            <label for="email">Email:</label>
            <input value="<?=old('email');?>" type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Signin</button>
          <span class="text-danger"><?=$error;?></span>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include 'tpn/footer.php';?>
