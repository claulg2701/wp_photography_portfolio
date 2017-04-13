      <!-- BEGINNING OF FOOTER - END SECTION CONTENT -->
      <footer class="footer row">
        <div class="cd-logo twelve columns">
          <a href="/photography-site">
            <img src="/photography-site/wp-content/uploads/2017/04/logo-full-w.svg" alt="" title="BnB">
          </a>
        </div>
        <div class="twelve columns">
          <?php
          wp_nav_menu(array(
          'sort_column' => 'menu_order',
          'container_class' => 'footer-menu-header'
          ));?>
        </div>
        <p id="copyright">Coppyright 2017 &copy; | BnB Story Telling Photography</p>
      <div class="social twelve columns">
        <ul>
          <li class="facebook"><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
    			<li class="instagram"><a href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
    			<li class="twitter"><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
        </ul>
      </div>
    <?php wp_footer(); ?>
    </footer>
    <script>
      $(function() { $('.my-unslider').unslider({
          autoplay: false,
          arrows: false,
          fluid:true
          });
      });
    </script>
  </body>
</html>
