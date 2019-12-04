<?php
require_once 'app/helpers.php';
session_start();
$page_title = 'home page';

?>
<?php include 'tpn/header.php'?>
<br>
<main>
  <div class="container">
    <div class="row ">
      <div class="mx-auto col-6">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active inline">
              <img src="pic/1.jpg" class="d-block w-200" alt="...">
            </div>
            <div class="carousel-item">
              <img src="pic/2.jpg" class="d-block w-200" alt="...">
            </div>
            <div class="carousel-item">
              <img src="pic/3.jpg" class="d-block w-200" alt="...">
            </div>
            
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>

  </div>
  <div class="container">
    <div class="row inline-set">
      <div class="col-sm text-center">
        <h1 class="display-4 text-center">share your diet with pepole</h1>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, rerum?</p>
        <p class="text-center"><a class="btn btn-outline-success btn-lh mt-3" href="signup.php">sign up</a></p>
      </div>

<br>
<br>
<br>
<br>
<br>
      
      <table class="table">
 

  
  <tbody cellspacing="50">
    <tr style=background-color:#8AFF33>
<table>
<th scope="col">
      <button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
      cooking
</button>




</th>
  <tr>
    <td>Stews</td>
  </tr>
  <tr>
    <td>Desserts</td>
  </tr>
  <tr>
    <td>special meals</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table> 
<br>
<br>
<br>

    </tr>
    <!-- seuym -->
    <tr>
    
      <table>
        
        <th scope="col">
<button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
      Diet
</button>
</th>

          <td></td>
        </tr>
        <tr>
          <td>Guids for begginers</td>
        </tr>
        <tr>
          <td>storys and opinion</td>
        </tr>
        <td>Advices</td>
      </table>
    </tr>
    <!-- seuym -->
    <tr>
    
      <table>
      <th scope="col">
<button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
      Sport
</button>
</th>
        <tr>
          <td>GYM</td>
        </tr>
        <tr>
          <td>Street workout</td>
        </tr>
        <tr>
          <td>Martial arts</td>
        </tr>
        <tr>
          <td>crossfit</td>
        </tr>
        
      </table>


    </tr>
<!-- seyum -->
    <tr>
    <table>
    <th scope="col">
<button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
      Life Style
</button>

      </th>
    <tr>
      <td>Books</td>
    </tr>
    <tr>
      <td>Magazins</td>
    </tr>
    <tr>
      <td>spirituality</td>
    </tr>
    </table>
      
  </tbody>
</table>
        </div>
      </div>
</main>
<br>
<br>
<br>
<br>
<?php include 'tpn/footer.php'?>