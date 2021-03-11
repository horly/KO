<!-- Footer -->
  <footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <div class="col-md-12">

          <!-- footer logo -->
          <div class="footer-logo">
            <a href="home.php"><img src="../img/K@Online-sans.png" alt="logo"></a>
          </div>
          <!-- /footer logo -->

          <!-- footer follow -->
          <div class="text-center">
            <a href="https://twitter.com/" target="_blank" class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
            <a href="https://web.facebook.com" target="_blank" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
            <a href="https://fr.linkedin.com/" target="_blank" class="btn btn-social-icon btn-linkedin"><span class="fa fa-linkedin"></span></a>
            <a href="https://plus.google.com/collections/featured" target="_blank" class="btn btn-social-icon btn-google"><span class="fa fa-google"></span></a>
          </div>
                    
          <!-- /footer follow -->
          <p class="text-center"><i class="fa fa-envelope"></i> Email : contact@kedisonline.com</p>
          <!-- footer copyright -->
          <div class="footer-copyright">
            <?php
                setlocale(LC_TIME, 'fr_FR'); //serveur
                $year = date("Y");
              ?>
            <p>© <?php echo $year; ?> <a href="https://kedisonline.com">KEDIS Online!</a> | Tous droits réservés | <a href="mention_legal.php">Mentions légales</a> | <a href="Conditions_utilisation.php">Conditions d'utilisation</a> | <a href="potitique_confidentialite.php"> Politique de confidentialité</a></p>
          </div>
          <!-- /footer copyright -->

        </div>

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </footer>
  <!-- /Footer -->

  


  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146799627-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146799627-1');
</script>