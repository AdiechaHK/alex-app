<h2>
  Menu
  <?=anchor('admin/menus', "Back to list", ['class' => "btn btn-default pull-right"]);?>
</h2>
<hr>
<?=$menu->title?>


<table>
  <tr>
    <th>Type: </th>
    <td><?=$menu->type?></td>
  </tr>
  <?php if($menu->type == 'LINK') { ?>
    <tr>
      <th>Link: </th>
      <td><?=$menu->link?></td>
    </tr>
  <?php } ?>
</table>