<?php

require_once 'app/helpers.php';
$userAuth = user_auth();

if ($userAuth) {

    header('location: blog.php');
    exit;

}


$errors = [
    'name' => '',
    'email' => '',
    'password' => '',
    'image' => '',
];

if (isset($_POST['submit'])) {

    

    if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
        mysqli_query($link, "SET NAMES utf8");
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $name = mysqli_real_escape_string($link, $name);
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $email = mysqli_real_escape_string($link, $email);
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $password = mysqli_real_escape_string($link, $password);
        $profile_image = 'default_profile.png';
        $formValid = true;

        if (!$name || mb_strlen($name) < 2 || mb_strlen($name) > 255) {

            $errors['name'] = '* Name is required for at least 2 - 255 characters';
            $formValid = false;

        }

        if (!$email) {
            $errors['email'] = '* A valid email is required';
            $formValid = false;
        } elseif (email_exist($link, $email)) {
            $errors['email'] = '* This email is taken';
            $formValid = false;
        }

        if (!$password || strlen($password) < 6 || strlen($password) > 20) {

            $errors['password'] = '* Password is required for at least 6 - 20 characters';
            $formValid = false;

        }
       

        if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {

            $max_size = 1024 * 1024 * 5;
            $ex = ['png', 'jpeg', 'jpg', 'gif', 'bmp'];

            if (isset($_FILES['image']['size']) && $_FILES['image']['size'] <= $max_size) {

                $fileInfo = pathinfo($_FILES['image']['name']);

                if (in_array(strtolower($fileInfo['extension']), $ex)) {

                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $profile_image = date('Y.m.d.H.m.i.u') . '-' . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], 'pic/' . $profile_image);

                    }

                }

            }

        }

        if ($formValid) {

            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users VALUES(null,'$name','$email','$password','$profile_image')";
            $result = mysqli_query($link, $sql);

            if ($result && mysqli_affected_rows($link) == 1) {

                $_SESSION['uid'] = mysqli_insert_id($link);
                $_SESSION['uname'] = $name;
                $_SESSION['uip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['uagent'] = $_SERVER['HTTP_USER_AGENT'];
                header('location: blog.php');

            }

        }

    }

    $token = csrf_token();

} else {

    $token = csrf_token();

}

$page_title = 'Signup Page';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="tpn/singupcss.css">
    
    
</head>
<?php include 'tpn/header.php';?>


<main>
<link rel="stylesheet" href="https://cdn.lineicons.com/1.0.0/LineIcons.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
<div class="container-fluid bg">
	<div class="container">
	    <div class="row">
		<div class="col-md-8 ">
		    <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="lni lni-enter" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Register</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		     <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="lni lni-user" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Make Your Profile</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		      <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="lni lni-cloud-upload" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Upload Resume</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		    <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="lni lni-search" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Search for information</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		</div>
		
		<div class="col-md-4">
		        <div class="card regform wow bounce animated" data-wow-delay="0.05s">
		            <div class="card-body regform">
		               <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 class="sign">Signup</h1>
                           </div>
                        </div>
												<form method="POST" action="" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="token" value="<?=$token;?>">
          <div class="form-group">
            <label for="name">Name:</label>
            <input value="<?=old('name');?>" type="text" name="name" id="name" class="form-control">
            <span class="text-danger"><?=$errors['name'];?></span>
          </div>
                           
          <div class="form-group">
            <label for="email">Email:</label>
            <input value="<?=old('email');?>" type="email" name="email" id="email" class="form-control">
            <span class="text-danger"><?=$errors['email'];?></span>
          </div>



                           <div class="form-group">
            <label for="password">Password:</label>
            <input  type="password" name="password" id="password" class="form-control">
            <span class="text-danger"><?=$errors['password'];?></span>




						   <div class="form-group">
            <label for="image">Profile image:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image"
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-group">
					<span class="text-danger"><?=$errors['image'];?></span>
          </div>


					<button name="submit" type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Singup</button>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
								 <p>
  									Already a member? <a href="signin.php">Sign 	in</a>
  										</p>
                              </div>
                           </div>
                            </div>
		            </div>
		        </div>
		    </div>
	</div>
	</div>
</div>
</form>
</main>
<?php include 'tpn/footer.php';?>
<script src="tpn/singupjs.js"></script>

</body>
</html>