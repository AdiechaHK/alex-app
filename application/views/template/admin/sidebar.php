<ul class="nav nav-pills nav-stacked">
  <?php foreach (array('pages', 'menus', 'langs') as $item) { ?>
    <li class="<?=isset($section) && $section == $item?'active':''?>"><?=anchor("admin/" . $item, ucfirst($item))?></li>
  <?php } ?>
</ul>
