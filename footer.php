      <!-- BEGINNING OF FOOTER - END SECTION CONTENT -->
      <footer class="footer row">
        <div class="logo twelve columns">

        </div>
        <div class="search twelve columns">
          <?php
          wp_nav_menu(array(
          'sort_column' => 'menu_order',
          'container_class' => 'menu-header'
          ));?>
        </div>
        <p id="copyright"><p>Coppyright 2017 &copy; | BnB Story Telling Photography</p>
      </footer>
      <div class="social twelve columns">
        <ul>
          <li class="facebook"><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
    			<li class="instagram"><a href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
    			<li class="twitter"><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
        </ul>
      </div>
    <?php wp_footer(); ?>
  </body>
</html>
