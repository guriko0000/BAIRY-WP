<div class="c-block-product">
  <dl>

    <?php if (have_rows('product')): ?>
      <?php while (have_rows('product')) : the_row(); ?>
        <div class="c-block-product__row">
          <?php if (get_sub_field('title')) { ?>
            <dt><?php echo get_sub_field('title'); ?></dt>
          <?php } ?>
          <?php if (get_sub_field('text')) { ?>
            <dd><?php echo get_sub_field('text'); ?></dd>
          <?php } ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </dl>
</div>