<?php
require_once '/home/endorama/code/github/techlabtl/techlab.tl/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><h2>
  Post Details
</h2>  <?php the_post(); ?>
  <?php echo render_partial("posts/post"); ?>

