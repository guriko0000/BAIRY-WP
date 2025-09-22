<?php
$cols = get_field('table'); // 外側リピーター（各列）
if (!$cols || !is_array($cols)) return;

// thead出力判定（どれかの列タイトルが入っていれば表示）
$has_header = false;
foreach ($cols as $col) {
  if (isset($col['title']) && trim((string)$col['title']) !== '') { $has_header = true; break; }
}

// 各列の行数の最大値を取得
$max_rows = 0;
foreach ($cols as $col) {
  $rows = isset($col['text-repeat']) && is_array($col['text-repeat']) ? $col['text-repeat'] : [];
  $max_rows = max($max_rows, count($rows));
}
// 全列が0行なら出力しない
if ($max_rows === 0) return;
?>
<div class="c-block-table">
  <div class="c-block-table__inner js-scroll-1">
    <table>
      <?php if ($has_header): ?>
        <thead>
          <tr>
            <?php foreach ($cols as $col): ?>
              <th><?= esc_html($col['title'] ?? '') ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
      <?php endif; ?>

      <tbody>
        <?php for ($i = 0; $i < $max_rows; $i++): ?>
          <?php
          // 行全体が空ならスキップするための判定
          $cells = [];
          $row_has_any = false;
          foreach ($cols as $col) {
            $rows = isset($col['text-repeat']) && is_array($col['text-repeat']) ? $col['text-repeat'] : [];
            $cell = isset($rows[$i]) ? trim((string)($rows[$i]['text'] ?? '')) : ''; // ← 内側サブフィールド名が text
            $cells[] = $cell;
            if ($cell !== '') $row_has_any = true;
          }
          if (!$row_has_any) continue;
          ?>
          <tr>
            <?php foreach ($cells as $cell): ?>
              <td><?= $cell !== '' ? esc_html($cell) : '' ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>