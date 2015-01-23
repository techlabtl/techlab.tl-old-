<?php
require_once '/home/endorama/code/github/techlabtl/techlab.tl/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html>
<head>
  <?php echo render_partial("layouts/head"); ?>

</head><body>
<div class="container-fluid">
<header class="tl-page-header">
  <?php echo render_partial("layouts/header"); ?>

</header>  <?php echo wl_yield(); ?>

<footer class="tl-page-footer">
  <?php echo render_partial("layouts/footer"); ?>

</footer></div>  <?php wp_footer(); ?>
  <?php echo javascript_include_tag("bootstrap"); ?>

  <?php if (is_front_page()) { ?>

  <?php echo javascript_include_tag("home"); ?>

<?php } ?>
</body></html>