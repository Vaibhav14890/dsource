<?php

/**
 * @file
 *
 * Template file for generating the CSS file used for the menu-items
 */

/**
 * Variables:
 * $mlid
 * $path
 * padding-<?php print "$pos:($size)"?>px;
 */
?>
a.menu-<?php print $mlid ?>, ul.links li.menu-<?php print $mlid ?> a {
  <?php $path1=substr($path,20) ?>
  background-image: url(<?php print "..".$path1 ?>);
  padding-<?php print "$pos:22"?>px;
  background-repeat: no-repeat;
  background-position: <?php print $pos?>;
  height: <?php print $height?>px;
}

