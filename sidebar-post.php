            <aside class="p-sider l-post__sub">
              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">カテゴリ一覧</h2>
                <ul class="p-sidebar__list">
                <?php
                  $terms = get_terms([
                    'taxonomy'   => 'category',
                    'hide_empty' => true,
                    'orderby'    => 'description', // ← ディスクリプション順
                    'order'      => 'ASC',
                    // 'parent'   => 0,            // 親タームだけにしたい場合は有効化
                  ]);

                  if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                      $url = get_term_link($term);
                      if (is_wp_error($url)) { continue; }
                      echo '<li><a href="' . esc_url($url) . '">';
                      echo '<span class="text">' . esc_html($term->name) . '</span>';
                      echo '<span class="num">(' . intval($term->count) . ')</span>';
                      echo '</a></li>';
                    }
                  }
                ?>
                </ul>
              </div>

              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">アーカイブ</h2>
                <div class="c-select">
                <select name="monthly-select" onChange='document.location.href=this.options[this.selectedIndex].value;'>
                  <option value="">選択してください</option>
                  <?php
                    wp_get_archives(array(
                      'type' => 'monthly',
                      'format' => 'option',
                      'post_type' => 'post',
                    ));
                  ?>
                </select>

                </div>
              </div>

              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">タグ</h2>
                <ul class="c-tags">
                  <?php
                    $args = [
                      'taxonomy' => 'post_tag',
                      'hide_empty' => true,
                    ];
                    $categories = get_terms($args);
                    foreach ($categories as $category) {
                      echo '<li><a href="' . get_category_link($category->term_id) . '" class="c-tags__item">';
                      echo $category->name;
                      echo '</a><li>';
                    }
                  ?>
                </ul>
              </div>
            </aside>