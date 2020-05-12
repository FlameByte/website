<?php
// Sessioon
session_start();
require('tekst.php');



?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pilkuse puhkemaja</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>



<body>
  <div class="amazing-bg">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-center">
                    <?php if (isset($_SESSION["loggedin"])){ ?> <li class="nav-item active">
                        <a class="nav-link" href="#">Puhkemaja tutvustus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hinnakiri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galerii</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontaktandmed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Asukoht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logi välja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="broneeri.php">Broneeri</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Puhkemaja tutvustus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hinnakiri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galerii</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontaktandmed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Asukoht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Broneeri</a>
                    </li> <?php }
          ?>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="img/korras1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="img/korras1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="img/korras1.jpg" alt="Third slide">
                </div>
            </div>
        </div>
    </div>






    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="tutvustus" id="text_1"><?php load_text(1); ?></h1>
          <?php if (isset($_SESSION["loggedin"])){ ?>
        </div>
      </div>
      <div class="row">
        <div class="col-6 offset-6">
          <button type="button" class="btn-primary" onclick='edit_text(1);'>Edit</button>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <p id="text_2" class="col-lg-12"><?php load_text(2); ?>
            </p>
        </div>
      </div>
      <div class="row">
        <div class="col-6 offset-6">
            <?php if (isset($_SESSION["loggedin"])){ ?>
            <button type="button" class="btn-primary" onclick='edit_text(2);'>Edit</button>
            <?php } ?> 
        </div>
      </div>
    </div>
<div class="korrused">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="">
                  <h1 id="ruumipealkiri">Maja esimesel korrusel asub</h1>
                  <ul>
                      <li>puhke- ja peoruum suure maakivist kaminaga kuni 20 inimesele</li>
                      <li>elektrikerisega saun</li>
                      <li>pesemisruum</li>
                      <li>WC ja väike köök kõige vajalikuga toidu valmistamiseks</li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="">
                  <h1 id="ruumipealkiri">Maja teisel korrusel asub</h1>
                  <ul>
                      <li>tuba nr.1 - üks kahene voodi</li>
                      <li>tuba nr.2 - üks kahene ja üks ühene voodi</li>
                      <li>tuba nr.3 - kolm ühest voodit ja diivanvoodi (2 kohta)</li>
                      <li>tuba nr.4 - kaks kahest voodit</li>
                      <li>tuba nr.5 - üks kahene, üks ühene voodi</li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
  </div>
    <div class="container">
      <div class="col-lg-12">
        <section class="galerii-links">
            <div class="wrapper">
                <h1 style="text-align:center;">Galerii</h1>

                <div class="galerii-container">
                    <?php
          include_once 'dbh.php';
          $sql = "SELECT * FROM galerii ORDER BY ordergalerii DESC";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "SQL statement failed";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a onclick="fullscreen(\''.$row["imgfullname"].'\');return false;"><div style="background-image: url(img/galerii/'.$row["imgfullname"].');">';
              if(isset($_SESSION['loggedin']) == true){
                  echo $row["ordergalerii"];
              }
              echo '</div></a>';
          }
        }
          ?>
                </div>
            </div>
        </section>
        </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php if (isset($_SESSION["loggedin"])){ ?>
            <br>
          <h1 class="col-12">Üles laadimine</h1>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-12">
        <div class="col-6">
          <div class="galerii-upload">
              <form action="galerii-upload.inc.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="filename" placeholder="faili nimi">
                  <input type="file" name="file">
                  <button type="submit" name="submit">Lae üles</button>
              </form>
          </div>
        </div>
        <?php } ?>
        <?php if (isset($_SESSION["loggedin"])){ ?>
        <div class="col-6">
          <form action="kustuta.php" method="post">
              <input type="number" min="1" max="15" name="number">
              <input type="submit" value="kustuta">
          </form>
        </div>
        </div>
        <?php } ?> 
      </div>
    </div>



    <div class="container">
        <div class="house-description">
            <div class="container">
            <div class="col-12">  
            <div class="row">
              <div class="col-12">  
            <h1 class="kontaktandmed">Kontaktandmed</h1>
            </div>
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="">
                            <p><strong>Asume</strong></p>
                            <p>Pilkuse küla</p>
                            <p>67416 Otepää vald</p>
                            <p>Valga maakond</p>
                            <p><strong>Kontakt</strong></p>
                            <p>Tel +372 51 17 109</p>
                            <p>E-mail: info@pilkuse.ee</p>
                            <p>Info in english +372 52 33 628</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="">
                            <form method="post" name="myemailform" action="kontakt.php">
                                <div class="form-group">
                                    <label for="Nimi">Nimi</label>
                                    <input type="text" class="form-control" id="nimi" placeholder="Sisestage Nimi"
                                        name="nimi">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        placeholder="Sisestage E-mail" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="Teema">Teema</label>
                                    <input type="text" class="form-control" id="teema" aria-describedby="emailHelp"
                                        placeholder="" name="teema">
                                </div>
                                <div class="form-group">
                                    <label for="Lisainfo">Lisainfo</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="lisainfo"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" value="Send Form">Saada</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>











    



    <div class="container">
        <div class="container-fluid">
            <div class="map-responsive">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1055.658995905483!2d26.537581358357553!3d58.05017061466984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eb10c0846159d7%3A0x2d1f72e94a30c849!2sUnnamed+Road%2C+Pilkuse%2C+67416+Valga+maakond!5e0!3m2!1set!2see!4v1558374040721!5m2!1set!2see"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    </div>








    <script src="nupud.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>