<?php if( have_rows('contents') ): ?>
<ul class="l-grid l-grid--col2 l-content__text-box">
  <?php while ( have_rows('contents') ) : the_row(); ?>
  <li class="l-grid__item">
  <?php if( get_sub_field('contents-title') ) { ?>
    <h3><?php the_sub_field('contents-title'); ?></h3>
    <?php } ?>
    <?php if( get_sub_field('contents-text') ) { ?>
    <p><?php the_sub_field('contents-text'); ?></p>
    <?php } ?>
  </li>
  <?php endwhile; ?>
</ul>
<?php endif; ?>