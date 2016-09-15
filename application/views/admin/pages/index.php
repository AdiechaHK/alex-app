<h2>
  Pages
  <?=anchor('admin/page_form', "New", ['class' => "btn btn-success pull-right"]); ?>
</h2>
<hr>

<?php if (sizeof($pages) > 0) { ?>
<table class="table table-bordered">
  <tr>
    <th>Title</th>
    <th colspan="3">Actions</th>
  </tr>
  <?php foreach ($pages as $page) { ?>
  <tr>
    <td><?=$page->title?></td>
    <td><?=anchor('admin/page_show/' . $page->id, "Show", ['class' => "btn btn-default"])?></td>
    <td><?=anchor('admin/page_form/' . $page->id, "Edit", ['class' => "btn btn-default"])?></td>
    <td><?=anchor('admin/page_del/' . $page->id, "Delete", [
      'class' => "btn btn-default",
      'onClick' => "return confirm('are you sure');"
      ])?></td>
  </tr>
  <?php } ?>
</table>
<?php } else { ?>
<h3>No pages to show.</h3>
<?php } ?>