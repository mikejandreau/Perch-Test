<?php
/**
 * The template for displaying portfolio archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Perch_Test
 */

get_header();
?>

  <main id="primary" class="site-main">

    <div class="section">
      <div class="container">
        <div class="row">

          <div class="column col-sm-12 text-center">
            <h1>Recent Work</h1>

            <?php // the filter buttons can be used for all categories, or for specific category or post type ?>
            <div class="button-group filter-buttons">
              <button class="is-checked" data-filter="*">Show All</button>
              <?php 
                // $terms = get_terms("category"); // get all categories, but you can use any taxonomy
                // $terms = get_terms('category', array('parent' => 37)); // get specific parent category by ID
                $terms = get_terms("portfolio-categories"); // get portfolio items, taxonomy set in functions.php
                $count = count($terms); //How many are they?
                if ( $count > 0 ){  //If there are more than 0 terms
                  foreach ( $terms as $term ) {  //for each term:
                    echo "<button data-filter='.".$term->slug."'>" . $term->name . "</button>\n";
                    //create a list item with the current term slug for sorting, and name for label
                  }
                }
              ?>
            </div>


            <div class="grid row row-cols-1 row-cols-sm-2 row-cols-md-3">

              <?php // Query the custom post type only
                $args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 ); // change 12 to -1 to get ALL posts
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post(); 
                  /* pull category for each unique post using the ID  */
                  $terms = get_the_terms( $post->ID, 'portfolio-categories' ); 
                  if ( $terms && ! is_wp_error( $terms ) ) : 
                    $links = array();
                    foreach ( $terms as $term ) {
                      $links[] = $term->name;
                    }
                    $tax_links = join( " ", str_replace(' ', '-', $links));          
                    $tax = strtolower($tax_links);
                  else : 
                    $tax = '';         
                  endif; 
                  /* Insert category name into portfolio-item class */ 

                  /* grab the url for the full size featured image */
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

                  echo '
                  <div class="grid-item col mb-4 '. $tax .'">
                  <div class="card h-100 text-left">
                  <a href="' . get_permalink( get_the_ID() ) . '"><img src="' . $featured_img_url . '" class="card-img-top" alt="' . $the_title . '"></a>
                  <div class="card-body">
                  ';

                  // echo '<a href="'. get_permalink() .'">';
                  // echo the_post_thumbnail();
                  // echo '</a>'; 

                  echo the_title( '<h5 class="card-title">', '</h5>' );
                  echo the_excerpt( '<p class="card-text">', '</p>' );
                  echo '<a href="' . get_permalink( get_the_ID() ) . '">Continue Reading</a>';

                  echo '
                  </div>
                  </div>
                  </div>'; 
                  
                endwhile;
                wp_reset_postdata(); 
              ?>
            </div>


          </div>

        </div>
      </div>
    </div>

	</main><!-- #main -->

<?php
get_footer();
