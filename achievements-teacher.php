<?php
$dir = __DIR__ . '/assets/img/achievements/teacher';
$images = [];
$patterns = ['*.jpg','*.jpeg','*.png','*.webp','*.gif'];
foreach ($patterns as $pattern) {
  $images = array_merge($images, glob($dir . '/' . $pattern));
}
sort($images, SORT_NATURAL | SORT_FLAG_CASE);
function make_caption($path) {
  $name = pathinfo($path, PATHINFO_FILENAME);
  $name = str_replace(['-','_'], ' ', $name);
  $name = preg_replace('/\s+/', ' ', $name);
  return trim($name);
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Достижения преподавателя — Портфолио</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
  <header class="header">
    <div class="container">
      <div class="navbar">
        <div class="brand">Портфолио</div>
        <button class="burger" data-burger aria-label="Меню" aria-expanded="false">☰ <span style="font-size:13px;color:var(--muted)">Меню</span></button>

        <nav class="nav" data-nav>
          <a href="index.html">Главная</a>
          <a href="education.html">Образование</a>
          <a href="work-experience.html">Опыт работы</a>

          <div class="dropdown open" data-dropdown>
            <button data-dropdown-btn aria-expanded="true">Достижения ▾</button>
            <div class="dropdown-panel">
              <a class="active" href="achievements-teacher.php">Преподавателя</a>
              <a href="achievements-students.php">Студентов</a>
            </div>
          </div>

          <a href="photos.html">Фотографии</a>
          <a href="mentions.html">Упоминания</a>
        </nav>
      </div>
    </div>
  </header>

  <main class="container">
    <h1 class="page-title">Достижения преподавателя</h1>
    <p class="subtitle">Сертификаты, благодарности, награды и подтверждения результатов</p>

    <section class="section">
      <h2>Документы и награды</h2>

      <?php if (count($images) === 0): ?>
        <p class="meta">Пока нет изображений. Добавьте файлы в папку <b>assets/img/achievements/teacher</b>.</p>
      <?php else: ?>
        <div class="gallery">
          <?php foreach ($images as $path):
            $file = basename($path);
            $url = 'assets/img/achievements/teacher/' . $file;
            $caption = make_caption($file);
          ?>
            <div class="tile">
              <img src="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>" alt="Документ" />
              <div class="cap"><?= htmlspecialchars($caption, ENT_QUOTES, 'UTF-8') ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <p class="meta" style="margin-top:12px">Совет: используйте понятные имена файлов (например, <b>2025-olimpiada</b> или <b>gramota-2024</b>).</p>
      <p class="meta">Актуально на: 06.02.2026</p>
    </section>

    <div class="footer">
      © <span id="y"></span> Портфолио.
    </div>
  </main>

  <script>
    document.getElementById('y').textContent = new Date().getFullYear();
  </script>
  <script src="assets/js/main.js"></script>
</body>
</html>
