<?php
/**
 * includes/head.php
 * Universal <head> — included on every page.
 *
 * Each page sets before including:
 *   $pageTitle  — tab title
 *   $pageDesc   — meta description
 *   $bodyClass  — optional extra body classes
 *   $extraHead  — optional HTML injected before </head> (e.g. Leaflet CSS)
 *
 * NO dark mode toggle — index.php is always dark (video bg), all others always light.
 */
$pageTitle = $pageTitle ?? 'Ethereal Estates';
$pageDesc  = $pageDesc  ?? 'Discover exclusive pre-construction and luxury real estate opportunities across Ontario with Ethereal Estates.';
$bodyClass = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- PP Fragment fonts -->
  <link rel="stylesheet" href="assets/font/style.css" />

  <!-- Urbanist -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet" />

  <!-- Tailwind config — shared design tokens -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            fragment: ['"PP Fragment Serif Regular"', 'Georgia', 'serif'],
            sans:     ['"Urbanist"', 'sans-serif'],
          },
          colors: {
            gold:          '#d5a94e',
            'gold-light':  '#e3b961',
            forest:        '#1a2e1e',
            'forest-dark': '#0f1f12',
          }
        }
      }
    }
  </script>

  <!-- Base styles shared across all pages -->
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; }
    body {
      font-family: "Urbanist", sans-serif;
      background: #fff;
      color: #111;
      -webkit-font-smoothing: antialiased;
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 4px; height: 4px; }
    ::-webkit-scrollbar-thumb { background: #d5a94e55; border-radius: 2px; }

    /* Nav link */
    .nav-link {
      font-size: 11px; letter-spacing: .14em; text-transform: uppercase;
      font-weight: 500; color: #555;
      display: flex; align-items: center; gap: 4px;
      transition: color .2s; white-space: nowrap; text-decoration: none;
    }
    .nav-link:hover { color: #d5a94e; }
    .nav-link.active { color: #d5a94e; }

    /* Gold divider line */
    .gold-line { display: block; width: 48px; height: 1px; background: #d5a94e; margin-bottom: 20px; }

    /* Selection highlight */
    ::selection { background: rgba(213,169,78,.25); }
  </style>

<?php if (!empty($extraHead)) echo $extraHead; ?>
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
