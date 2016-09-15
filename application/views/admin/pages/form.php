<h2>
  <?=$title?>
  <?=anchor('admin/pages', "Back to list", ['class' => "btn btn-default pull-right"]);?>
</h2>
<hr>
<?=form_open('admin/page_save'. (isset($page)?'/'.$page->id:''))?>

  <div class="form-group">
    <label for="title">Enter title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?=isset($page)?$page->title:''?>">
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="l1">Enter in French</label>
      <textarea name="content_l1" id="l1" class="form-control ckEditor">
        <?=isset($page)?$page->content_l1:''?>
      </textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="l2">Enter in Netherland</label>
      <textarea name="content_l2" id="l2" class="form-control ckEditor">
        <?=isset($page)?$page->content_l2:''?>
      </textarea>
    </div>
  </div>

  <div class="form-group">
    <input type="submit" value="Save Page" class="btn btn-success">
  </div>
  
<?=form_close()?>