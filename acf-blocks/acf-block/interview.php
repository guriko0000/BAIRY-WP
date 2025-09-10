<dl class="c-interview">
<?php if( get_field('interview_question') ) { ?>
  <dt class="c-interview__question"><?php echo get_field('interview_question'); ?></dt>
<?php } ?>
<?php if( get_field('interview_answer') ) { ?>
  <dd class="c-interview__answer"> <?php echo get_field('interview_answer'); ?></dd>
  <?php } ?>
</dl>