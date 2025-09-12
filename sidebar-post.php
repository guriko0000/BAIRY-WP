            <aside class="p-sider l-post__sub">
              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">カテゴリ一覧</h2>
                <ul class="p-sidebar__list">
                <?php
                  $terms = get_terms([
                    'taxonomy'   => 'category',
                    'hide_empty' => true,
                    'orderby'    => 'description', // ← ディスクリプション順
                    'order'      => 'ASC',         // 昇順（DESCで降順）
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
                <!-- <select name="monthly-select" onchange="document.location.href=this.options[this.selectedIndex].value;">
                  <option value="">選択してください</option>
                  <option value=""> 2025年8月 </option>
                  <option value=""> 2025年7月 </option>
                  <option value=""> 2025年6月 </option>
                </select> -->

                <select name="monthly-select" onChange='document.location.href=this.options[this.selectedIndex].value;'>
                  <option value="">選択してください</option>
                  <?php
                    wp_get_archives(array(
                      'type' => 'monthly',
                      'format' => 'option',
                      'post_type' => 'post'
                    ));
                  ?>
                </select>

                </div>
              </div>

              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">タグ</h2>
                <ul class="c-tags">
                  <li><a href="" class="c-tags__item">新製品</a></li>
                  <li><a href="" class="c-tags__item">リニューアル</a></li>
                  <li><a href="" class="c-tags__item">オフィス移転</a></li>
                  <li><a href="" class="c-tags__item">休業日</a></li>
                  <li><a href="" class="c-tags__item">セキュリティカメラ</a></li>
                  <li><a href="" class="c-tags__item">アクセスポイント</a></li>
                  <li><a href="" class="c-tags__item">NAS</a></li>
                  <li><a href="" class="c-tags__item">UTM</a></li>
                </ul>
              </div>
            </aside>