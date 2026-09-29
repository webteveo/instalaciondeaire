<?php
$metricsConfig = [
    'enabled' => defined('METRICAS_HABILITADAS') && METRICAS_HABILITADAS,
    'endpoint' => $url . '?url=metricas/collect',
    'isMetricsPage' => str_starts_with($_GET['url'] ?? '', 'metricas/'),
    // Tipo de pagina y zona declarados por la vista con cta_contexto(); main.js los manda con cada evento
    'pageType' => cta_contexto()[0],
    'zona' => cta_contexto()[1],
];
?>
<script>
  window.siteMetricsConfig = <?= json_encode($metricsConfig, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
  document.body.dataset.pageType = window.siteMetricsConfig.pageType || '';
  if (window.siteMetricsConfig.zona) document.body.dataset.zona = window.siteMetricsConfig.zona;
</script>
<script src="<?= $ruta ?>/js/main.js?v=<?= @filemtime('public/js/main.js') ?: 1 ?>"></script>
</body>
</html>
