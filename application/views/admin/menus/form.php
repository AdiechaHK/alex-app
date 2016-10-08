<h2>
  <?=$title?>
  <?=anchor('admin/menus', "Back to list", array('class' => "btn btn-default pull-right"));?>
</h2>
<hr>
<?=form_open('admin/menu_save'. (isset($menu)?'/'.$menu->id:''))?>
  <div class="row">
    <div class="col-md-6">
      <h4>General details</h4>
      <hr>
      <div class="form-group">
        <label for="title">Enter title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?=isset($menu)?$menu->title:''?>" required>
      </div>

      <div class="form-group" id="type-field">
        <label for="type">Select type</label>
        <select name="type" id="type" class="form-control">
          <?php foreach (array('page', 'link', 'parent') as $type) { ?>
            <option
              value="<?=strtoupper($type)?>"
              <?=(isset($menu) && strtolower($menu->type) == $type)?'selected':''?> >
                <?=ucfirst($type)?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group conditional hide" id="link-field">
        <label for="link">Enter link</label>
        <input type="text" name="link" id="link" class="form-control" value="<?=isset($menu)?$menu->link:''?>">
      </div>

      <div class="form-group conditional hide" id="page-field">
        <label for="page">Select page</label>
        <select name="page" id="page" class="form-control">
          <option value="none" <?=(isset($menu) && $menu->page == NULL)? "selected": ""?> >
            -- None --
          </option>
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
          <option value="none" <?=(isset($menu) && $menu->parent == NULL)? "selected": ""?> >
            -- None --
          </option>
          <?php foreach ($parents as $parent) { ?>
            <option value="<?=$parent->id?>" <?=(isset($menu) && $menu->parent == $parent->id)? "selected": ""?> >
              <?=$parent->title?>
            </option>
          <?php } ?>
        </select>
      </div>

    </div>
    <div class="col-md-6">
      <h4>Language related details</h4>
      <hr>
      <div class="form-group">
        <label for="key">Enter key</label>
        <input type="text" id="key" name="key" class="form-control" required="" value="<?=isset($menu)?$menu->key:''?>" />
      </div>
      <div class="form-group">
        <label for="franch">Enter franch word</label>
        <input type="text" id="franch" name="value_l1" class="form-control" required="" value="<?=isset($lang)?$lang->value_l1:''?>" />
      </div>
      <div class="form-group">
        <label for="netherland">Enter netherland word</label>
        <input type="text" id="netherland" name="value_l2" class="form-control" required="" value="<?=isset($lang)?$lang->value_l2:''?>"/>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <input type="submit" value="Save Menu" class="btn btn-success">
      </div>
    </div>
  </div>
  
<?=form_close()?>