<?php
require_once '/home/endorama/code/github/techlabtl/techlab.tl/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html>
<head>
  <?php echo render_partial("layouts/head"); ?>

</head><body>
<div class="page-wrapper">
<header class="site-header">
  <?php echo render_partial("layouts/header"); ?>

</header><section class="site-content">
  <?php echo wl_yield(); ?>

</section><footer class="site-footer">
  <?php echo render_partial("layouts/footer"); ?>

</footer></div>  <?php wp_footer(); ?>
</body></html>