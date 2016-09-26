<div>
  <h1>Lang configs !</h1>

  <table class="table table-bordered" id="lang-list">
    <tr>
      <th>Key</th>
      <th>French</th>
      <th>Netherland</th>
      <th>Actions</th>
    </tr>

    <?php foreach ($langs as $lang) { ?>
      
      <tr data-lang-id="<?=$lang->id?>">
        <td data-lang-field="key"><?=$lang->key?></td>
        <td data-lang-field="value_l1"><?=$lang->value_l1?></td>
        <td data-lang-field="value_l2"><?=$lang->value_l2?></td>
        <td data-action>
          <button class="btn btn-default edit" data-lang-id="<?=$lang->id?>"> Edit </button>
          <button class="btn btn-default delete" data-lang-id="<?=$lang->id?>"> Delete </button>
        </td>
      </tr>

    <?php } ?>

    <tr>
      <td colspan="4">
        <button class="btn btn-primary add">Add new</button>
      </td>
    </tr>

  </table>



</div>

