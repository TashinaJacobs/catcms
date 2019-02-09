      <!-- column closes -->
        </div>
    <!-- row closes -->
      </div>
  <!-- container closes -->
    </div>
    
    <footer class="footer">
      <?php
      // If custom footer text exists, put that here, otherwise show default
          if( get_theme_mod( 'footer_text') !=""){
              echo get_theme_mod( 'footer_text' );
          }
          else {
              echo '© Cats Protection League 2019';
          }
      ?>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
