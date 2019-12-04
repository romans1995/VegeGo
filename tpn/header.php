<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="tpn/style.css">
 


  <title>vegeGO | <?=$page_title;?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
      <div class="container">
        <a class="navbar-brand text-white" href="./">vegeGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-align-justify text-white"></i> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-white" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="blog.php">Blog</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['uid'])): ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="signin.php">Signin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="singup.php">Singup</a>
            </li>
          </ul>
          <?php else: ?>

          <li class="nav-item">
            <a class="nav-link text-white" href='#'><?=$_SESSION['uname'];?></a>
          </li>
          <a class="nav-link text-white" href="logout.php">Logout</a>
          </li>
          <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
  </header>