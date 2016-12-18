<?php
?>
<div class="row">
    <div class="col-sm-5">
        <div id="gt_carousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators : qui indiquent l'image affichée -->
            <ol class="carousel-indicators">
                <li data-target="#gt_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#gt_carousel" data-slide-to="1"></li>
                <li data-target="#gt_carousel" data-slide-to="2"></li>
                <li data-target="#gt_carousel" data-slide-to="3"></li>
                <li data-target="#gt_carousel" data-slide-to="4"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                <img src="./admin/images/affiches/shaun.jpg" alt="First slide">
              </div>
              <div class="item">
                <img src="./admin/images/affiches/2001espacejpg.jpg" alt="Second slide">
              </div>
              <div class="item">
                <img src="./admin/images/affiches/Gone-Girl.jpg" alt="Third slide">
              </div>
			  <div class="item">
                <img src="./admin/images/affiches/american-beauty.jpg" alt="Fourth slide">
              </div>
            </div>
            <!-- Carousel controls -->

            <a class="carousel-control left" href="#gt_carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#gt_carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div id="intro2" class="col-sm-7"><br/>
            <?php
                if (file_exists('./admin/lib/php/introAccueil.php')) {
                    include ('./admin/lib/php/introAccueil.php');
                } 
                ?>
        </p> 
    </div>
</div>

