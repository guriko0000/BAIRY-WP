<?php if (!is_front_page()) { ?>
  <?php if (function_exists('bcn_display')) { ?>
    <div class="p-under-mv__breadcrumb">
      <div class="c-breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">
        <?php bcn_display(); ?>
      </div>
    </div>
  <?php } ?>
<?php } ?>