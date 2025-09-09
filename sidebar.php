<aside class="p-sidebar l-outer__sub">
  <div class="p-sidebar__container">
    <h2 class="p-sidebar__title">記事カテゴリ</h2>
    <ul class="p-sidebar__list">
      <?php
      $args = [
        'taxonomy' => 'category'
      ];
      $categories = get_terms($args);
      foreach ($categories as $category) {
        echo '<li class="p-sidebar__item"><a href="' . get_category_link($category->term_id) . '" class="p-sidebar__link">';
        echo $category->name;
        echo '</a></li>';
      }
      ?>
    </ul>
  </div>
</aside>