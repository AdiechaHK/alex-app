<h2>
  Menus
  <?=anchor('admin/menu_form', "New", ['class' => "btn btn-success pull-right"]); ?>
</h2>
<hr>

<?php if (sizeof($menus) > 0) { ?>
<table class="table table-bordered">
  <tr>
    <th>Title</th>
    <th colspan="3">Actions</th>
  </tr>
  <?php foreach ($menus as $menu) { ?>
  <tr>
    <td><?=$menu->title?></td>
    <td><?=anchor('admin/menu_show/' . $menu->id, "Show", ['class' => "btn btn-default"])?></td>
    <td><?=anchor('admin/menu_form/' . $menu->id, "Edit", ['class' => "btn btn-default"])?></td>
    <td><?=anchor('admin/menu_del/' . $menu->id, "Delete", [
      'class' => "btn btn-default",
      'onClick' => "return confirm('are you sure');"
      ])?></td>
  </tr>
  <?php } ?>
</table>
<?php } else { ?>
<h3>No menus to show.</h3>
<?php } ?>