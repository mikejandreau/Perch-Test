<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Perch_Test
 */

get_header();
?>


  <main id="primary" class="site-main">

    <!-- <div class="home-banner" data-flickity='{ "wrapAround": true, "contain": true }'> -->
    <div class="home-banner" data-flickity='{ "wrapAround": true, "contain": true, "prevNextButtons": false, "pageDots": false }'>

     <?php 
        $args = array( 
          'post_type'       => 'portfolio', // your custom post type
          'posts_per_page'  => -1, // change 12 to -1 to get ALL posts
          // 'orderby'         => 'date',
          'orderby'         => 'menu_order',
          'order' => 'ASC'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();

          // get the selected color from the custom post type
          $bgColor = get_field('background_color'); 

          // open div and, set background color to override default
          echo '<div class="home-banner-cell" style="background-color: ' .  $bgColor . '"><div class="container-fluid h-100 d-flex"><div class="banner-cell-inner">';

          // get the title
          echo the_title( '<h1>', '</h1>' );

          // get creative field type
          echo '<p class="banner-item-type">';
          echo the_terms( $post->ID, 'portfolio-categories', ' ', ' / ' );
          echo '</p>';

          // list applicable categories
          echo '<p class="banner-item-cat">';
          $terms = get_the_terms($post->ID, 'category' );
          foreach ($terms as $term) {
            echo '<span>'.$term_name = $term->name.'</span>';
          }
          echo '</p>';

          // get excerpt
          echo the_excerpt( '<p>', '</p>' );

          echo '<a href="' . get_permalink( get_the_ID() ) . '" class="banner-item-text-link">See what we did ></a>';

          // grab the url for the featured image and link to post 
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
          echo '<a href="' . get_permalink( get_the_ID() ) . '" class="banner-item-link"><img src="' . $featured_img_url . '"></a>';

          echo '</div></div></div>';

        endwhile;
        wp_reset_postdata(); 
      ?>

      <!-- edit with ACF pn hompeage -->
      <div class="home-banner-cell">
        <div class="container-fluid h-100 d-flex">
          <div class="banner-cell-inner">
            <?php if(get_field('contact_form_block_title'))
              { echo '<h1>' . get_field('contact_form_block_title') . '</h1>'; } ?>

            <?php if(get_field('contact_form_block_content'))
              { echo get_field('contact_form_block_content'); } ?>

            <?php if(get_field('contact_form_block_image'))
              { echo '<img class="your-project-block" src="' . get_field('contact_form_block_image') . '" alt="Card image">'; }?>
          </div>
        </div>
      </div>

    </div><!-- close home-banner -->



    <div class="container">
        <?php
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content', 'page' );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>
    </div>



  </main><!-- #main -->

<?php
get_footer();
