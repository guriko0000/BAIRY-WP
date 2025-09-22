<div class="c-block-message">
  <div class="c-block-message__img-area">
    <div class="c-block-message__img"><img src="<?php echo get_field('message_img'); ?>" alt="" width="151" height="151" loading="lazy"></div>
    <?php if( get_field('message_name') ) { ?>
    <span class="c-block-message__name"><?php echo get_field('message_name'); ?></span>
    <?php } ?>
  </div>
  <div class="c-block-message__bubble">
    <p class="c-block-message__text"><?php echo get_field('message_text'); ?></p>
  </div>
</div>