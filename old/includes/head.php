<?php
/**
 * includes/head.php
 * Universal <head> for every page.
 *
 * Page variables (set before require):
 *   $pageTitle  — browser tab title
 *   $pageDesc   — meta description
 *   $bodyClass  — extra class(es) on <body>
 *   $extraHead  — raw HTML injected before </head>
 *                 (e.g. Leaflet CSS on pre-construction.php)
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

  <!-- PP Fragment local fonts -->
  <link rel="stylesheet" href="assets/font/style.css" />

  <!-- Urbanist — Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet" />

  <!-- Global stylesheet -->
  <link rel="stylesheet" href="assets/css/main.css" />

  <!-- Tailwind design tokens -->
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

<?php if (!empty($extraHead)) echo $extraHead; ?>
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
