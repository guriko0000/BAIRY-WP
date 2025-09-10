<ul class="l-grid l-grid--col2 l-content__works">
<?php if( have_rows('cards') ): ?>
  <?php while ( have_rows('cards') ) : the_row(); ?>
<?php
$posts = get_sub_field('card');
if( $posts ):
?>
<?php foreach( $posts as $val ): ?>
    <li class="l-grid__item c-card-type1">
    <a href="<?php echo get_permalink( $val->ID ); ?>">
          <figure class="c-card-type1__thumb">
        <picture>
          <img decoding="async" src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" alt="" loading="lazy" width="330" height="187">
        </picture>
      </figure>
            <div class="c-card-type1__body">
              <p class="c-card-type1__title"><?php echo get_the_title( $val->ID ); ?></p>
              <span class="c-card-type1__cate">
                    <?php
                    $terms = wp_get_post_terms( $val->ID, 'works-cate');
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        echo $terms[0]->name;
                    }
                    ?>
                </span>
                <p class="c-card-type1__text"><?php the_sub_field('card-text'); ?></p>
              </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>
  
  <?php endwhile; ?>
  <?php endif; ?>
</ul>