            <aside class="p-sider l-post__sub">
              <div class="p-sidebar__container">
                <h2 class="p-sidebar__title">業種から探す</h2>
                <ul class="p-sidebar__list">
                <?php
                  $terms = get_terms([
                    'taxonomy'   => 'jobs-type',
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
                <h2 class="p-sidebar__title">給与から探す</h2>
                <ul class="p-sidebar__list">
                <?php
                  $terms = get_terms([
                    'taxonomy'   => 'jobs-salary',
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
                <h2 class="p-sidebar__title">勤務地から探す</h2>
                  <div class="c-select">
                    <?php
                    $taxonomy_slug = 'jobs-area';

                    // タクソノミー存在チェック（ないと Notice が出やすい）
                    if (taxonomy_exists($taxonomy_slug)) {
                      $terms = get_terms(array(
                        'taxonomy'   => $taxonomy_slug, // ← 新シグネチャ（推奨）
                        'orderby'    => 'description',
                        'order'      => 'ASC',
                        'hide_empty' => false,
                        'parent'     => 0,              // 親のみ。不要なら削除
                      ));

                      // WP_Error や空配列に備える
                      if (! is_wp_error($terms) && ! empty($terms)) {
                        echo '<select name="select" class="c-select" onchange="if(this.value)location.href=this.value;">';
                        echo '<option value="">選択してください</option>';

                        foreach ($terms as $term) {
                          // 念のため型を確認
                          if (! ($term instanceof WP_Term)) continue;

                          $link = get_term_link($term); // タクソノミーはオブジェクト内に含まれるので省略OK
                          if (is_wp_error($link) || empty($link)) continue;

                          echo '<option value="' . esc_url($link) . '">' . esc_html($term->name) . '</option>';
                        }

                        echo '</select>';
                      }
                    }
                    ?>
                  </div>
                </div>

                <div class="p-sidebar__container">
                  <a href="<?php echo esc_url(home_url()); ?>/voices/" class="p-sidebar__banner-link"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/under/banner_voice.png" alt="社員の声はこちら" width="" height=""></a>
                </div>
            </aside>