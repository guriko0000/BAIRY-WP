<?php if( have_rows('system') ): ?>
<ul class="l-grid l-grid--col2 l-content__system">
  <?php while ( have_rows('system') ) : the_row(); ?>
  <li class="l-grid__item c-box">
    <div class="c-box__inner">
    <?php if( get_sub_field('system-title') ) { ?>
      <h3 class="c-box__title"><?php the_sub_field('system-title'); ?></h3>
      <?php } ?>
      <?php if( get_sub_field('system-text') ) { ?>
      <p class="c-box__text"><?php the_sub_field('system-text'); ?></p>
      <?php } ?>
    </div>
  </li>
  <?php endwhile; ?>
</ul>
<?php endif; ?>