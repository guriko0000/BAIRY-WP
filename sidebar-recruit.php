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
                  <select name="select" onchange="location.href=value;" class="">
                    <option>選択してください</option>
                    <option value="">東京</option>
                    <option value="">福岡</option>
                    <option value="">神戸</option>
                    <option value="">広島</option>
                    <option value="">久留米</option>
                  </select>
                </div>

                <p>test</p>
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


                  <!-- <?php
                        $taxonomy_slug = 'product-categories';
                        $terms = get_terms($taxonomy_slug);

                        if ($terms && !is_wp_error($terms)) {


                          $current_term_id = 0;
                          if (is_tax($taxonomy_slug)) {
                            $qo = get_queried_object();
                            if (isset($qo->term_id)) {
                              $current_term_id = (int) $qo->term_id;
                            }
                          }

                          echo '<select name="select" onChange="location.href=this.value;" class="c-select">';
                          echo '<option value="">選択してください</option>';

                          foreach ($terms as $term) {
                            $term_link = get_term_link($term, $taxonomy_slug);
                            $selected  = ((int) $term->term_id === $current_term_id) ? ' selected' : '';
                            echo '<option value="' . esc_url($term_link) . '"' . $selected . '>' . esc_html($term->name) . '</option>';
                          }

                          echo '</select>';
                        }
                        ?> -->
                </div>
            </aside>