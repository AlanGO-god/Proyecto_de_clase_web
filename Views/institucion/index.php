 
 <h1 id="tittle-inst">Instituciones</h1>
 <div class="container text-center">
  <div class="row">
<?php

    foreach ($instituciones as $institucion) {
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card" style="width: 18rem;">';
        echo "<img src='images/institucion/" . $institucion['logotipo'] . "' class='card-img-top img-logo' alt=''>";
        echo '<div class="card-body">';
        echo  '<h5 class="card-title">' . $institucion['institutcion'] . '</h5>';
        echo '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>';
        echo '<a href="#" class="btn btn-primary">Go somewhere</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
?>
 </div>
</div>