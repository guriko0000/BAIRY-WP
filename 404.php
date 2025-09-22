<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <div class="p-under-mv__title">
      <p class="ja">お探しのページが見つかりませんでした。</p>
      <span class="en">404</span>
    </div>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>
<section class="l-section l-section--full">
  <div class="l-inner">
    <div class="c-secondary-title">
    <h2 class="c-secondary-title__ja">お探しのページが<br class="u-onliy-sp">見つかりませんでした。</h2>
    </div>
    <p class="u-pc-mt60 u-sp-mt40 u-text-center">アクセスしようとしたページは、移動したか、削除されたか、RLが間違っていた可能性があります。<br>お手数をおかけしますが、トップページから再度お探しください。</p>
    <div class="u-btn-wrap u-btn-center">
      <a href="<?php echo esc_url(home_url()); ?>/" class="c-btn">トップページに戻る<span class="c-btn__icon"></span></a>
    </div>
</section>
<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>