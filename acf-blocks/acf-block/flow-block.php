<?php if( have_rows('flow') ): ?>
<ol class="c-flow l-content__flow">
  <?php 
  $counter = 0; // counter初期化
  while ( have_rows('flow') ) : the_row();
  $counter++;
  ?>
  <li class="c-flow__item">
    <div class="c-flow__title">
      <span class="c-flow__title-num"><?php printf('%02d', $counter); ?></span>
      <?php if( get_sub_field('flow-title') ) { ?>
      <h3 class="c-flow__title-main"><?php the_sub_field('flow-title'); ?></h3>
      <?php } ?>
    </div>
    <?php if( get_sub_field('flow-text') ) { ?>
    <div class="c-flow__text"><?php the_sub_field('flow-text'); ?></div>
    <?php } ?>
  </li>
  <?php endwhile; ?>
</ol>
<?php endif; ?>



