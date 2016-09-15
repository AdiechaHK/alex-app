<h2>
  <?=$title?>
  <?=anchor('admin/menus', "Back to list", ['class' => "btn btn-default pull-right"]);?>
</h2>
<hr>
<?=form_open('admin/menu_save'. (isset($menu)?'/'.$menu->id:''))?>

  <div class="form-group">
    <label for="title">Enter title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?=isset($menu)?$menu->title:''?>">
  </div>

  <div class="form-group">
    <label for="type">Select type</label>
    <select name="type" id="type" class="form-control">
      <?php foreach (['page', 'link', 'parent'] as $type) { ?>
        <option
          value="<?=strtoupper($type)?>"
          <?=(isset($menu) && $menu->type == $type)?'selected':''?> >
            <?=ucfirst($type)?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="link">Enter link</label>
    <input type="text" name="link" id="link" class="form-control" value="<?=isset($menu)?$menu->link:''?>">
  </div>

  <div class="form-group">
    <label for="page">Select page</label>
    <select name="page" id="page" class="form-control">
      <?php foreach ($pages as $page) { ?>
        <option value="<?=$page->id?>" <?=(isset($menu) && $menu->page == $page->id)? "selected": ""?> >
          <?=$page->title?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="parent">Select parent</label>
    <select name="parent" id="parent" class="form-control">
      <?php foreach ($parents as $parent) { ?>
        <option value="<?=$parent->id?>" <?=(isset($menu) && $menu->parent == $parent->id)? "selected": ""?> >
          <?=$parent->title?>
        </option>
      <?php } ?>
      <option value="none" <?=(isset($menu) && $menu->parent == NULL)? "selected": ""?> >
        -- None --
      </option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" value="Save Page" class="btn btn-success">
  </div>
  
<?=form_close()?>