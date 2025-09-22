<div class="c-block-product">
  <dl>
    <?php if (get_field('product_name')) { ?>
      <div class="c-block-product__row">
        <dt>製品名</dt>
        <dd><?php echo get_field('product_name'); ?></dd>
      </div>
    <?php } ?>
    <?php if (get_field('product_day')) { ?>
      <div class="c-block-product__row">
        <dt>発売開始日</dt>
        <dd><?php echo get_field('product_day'); ?></dd>
      </div>
    <?php } ?>

    <div class="c-block-product__row">
      <dt>製品ページ</dt>
      <dd>
        <?php if (have_rows('product_page')): ?>
          <?php while (have_rows('product_page')) : the_row(); ?>
            <p><?php echo get_sub_field('type'); ?>　<a href="<?php echo get_sub_field('url'); ?>" target="_blank" rel="noopener"><?php echo get_sub_field('url'); ?></a></p>
          <?php endwhile; ?>
        <?php endif; ?>
      </dd>
    </div>
    <?php if (get_field('product_contact')) { ?>
      <div class="c-block-product__row">
        <dt>製品のお問い合わせ</dt>
        <dd><?php echo get_field('product_contact'); ?></dd>
      </div>
    <?php } ?>
  </dl>
</div>