<!-- info section -->
<section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_menu">
            <h5>
              QUICK LINKS
            </h5>
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catagories.php"> catagories </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registerform.php"> Register </a>
              </li>
              <?php  
                              
                              if(isset($_SESSION['email_name']))
                              {
                                echo "<a class='nav-link scrollto' href='logout.php'>log Out</a>";
                              }
                              else
                              {
                                echo  "<a class='nav-link scrollto'  href='login.php'>log In</a>";
                              }
                            ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
        
        </div>

        
      </div>
    </div>
  </section>

  <!-- end info section -->
<!-- footer section -->
<footer class="container-fluid footer_section">
    <div class="container">
      <p>
          Doctor Appointment System(Online Platform)
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
</body>

</html>