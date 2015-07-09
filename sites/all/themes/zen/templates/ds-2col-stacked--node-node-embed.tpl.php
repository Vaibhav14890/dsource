<?php

/**
 * @file
 * Display Suite 2 column stacked template.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-2col-stacked <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <?php print '<div class="row">'?>
  <<?php print $header_wrapper ?>>
    <?php print $header; ?>
  </<?php print $header_wrapper ?>>
  <?php print '</div>'?>
  <?php print '<div class="row">'?>
  <<?php print $left_wrapper ?> class="col-sm-3">
    <?php print $left; ?>
  </<?php print $left_wrapper ?>>

  <<?php print $right_wrapper ?> class="col-sm-9">
    <?php print $right; ?>
  </<?php print $right_wrapper ?>>
  <?php print '</div>'?>
</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
