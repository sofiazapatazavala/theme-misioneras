
    <div class="container-fluid footer" style="padding-top: 1em;">
        <div class="row">
            <div class="col-sm-3">
                <?php
                    if ( is_active_sidebar( 'sidebar-footer-3' ) ) : 
                    dynamic_sidebar( 'sidebar-footer-3' );
                    endif;
                ?>
            </div>
            <div class="col-sm-3">
                <?php
                    if ( is_active_sidebar( 'sidebar-footer-1' ) ) : 
                    dynamic_sidebar( 'sidebar-footer-1' );
                    endif;
                ?>
            </div>
            <div class="col-sm-3">
                <?php
                    if ( is_active_sidebar( 'sidebar-footer-4' ) ) : 
                    dynamic_sidebar( 'sidebar-footer-4' );
                    endif;
                ?>
            </div>
            <div class="col-sm-3">
                <?php
                    if ( is_active_sidebar( 'sidebar-footer-2' ) ) : 
                    dynamic_sidebar( 'sidebar-footer-2' );
                    endif;
                ?>
            </div>
        </div>
    </div>
      
    <!-- jQuery -->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.12.4.min.js"></script>
    <!-- JS de Bootstrap -->
	<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>    
    
      <?php wp_footer(); ?>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/consultas.js"></script>

    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>