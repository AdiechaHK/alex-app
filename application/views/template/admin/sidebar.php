<ul class="nav nav-pills nav-stacked">
  <?php foreach (array('pages', 'menus') as $item) { ?>
    <li class="<?=isset($section) && $section == $item?'active':''?>"><?=anchor("admin/" . $item, ucfirst($item))?></li>
  <?php } ?>
</ul>
