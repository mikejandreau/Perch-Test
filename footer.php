<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Perch_Test
 */

?>


	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="social-block">

			    <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/perch-logo.svg" />
			    </a>
			    

				<?php if ($footerTagline = get_option('perchtest_options')['perchtest-footer-tagline']) { 
					echo '<p>' . $footerTagline . '</p>';
				} else { /* do nothing */ } ?>


				<?php  // These fields are controlled using the theme options located in Appearance -> Theme Options

				if ($instagram = get_option('perchtest_options')['perchtest-social-instagram']) { 
					echo '<a id="instagram" class="footer-social-icon" title="Instagram" target="_blank" href="' . $instagram . '"><i class="fab fa-instagram fa-2x"></i></a>';
				} else { /* do nothing */ }
				
				if ($twitter = get_option('perchtest_options')['perchtest-social-twitter']) { 
					echo '<a id="twitter" class="footer-social-icon" title="Twitter" target="_blank" href="' . $twitter . '"><i class="fab fa-twitter fa-2x"></i></a>';
				} else { /* do nothing */ }

				if ($facebook = get_option('perchtest_options')['perchtest-social-facebook']) { 
					echo '<a id="facebook" class="footer-social-icon" title="Facebook" target="_blank" href="' . $facebook . '"><i class="fab fa-facebook-f fa-2x"></i></a>';
				} else { /* do nothing */ }
				?>
			</div>

			<div class="copyright">
				&copy; Copyright <?php echo date("Y"); ?> Perch
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page .site -->

<a class="scrollup js-scroll-trigger" id="scrollUpButton" href="#page-top"><svg class="scrollup-chevron" xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/></svg><span class="sr-only">to top</span></a>

<?php wp_footer(); ?>

</body>
</html>