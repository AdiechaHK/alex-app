<h1>
  <?=$page->title?>
  <?=anchor('admin/pages', "Back to list", ['class' => "btn btn-default pull-right"]);?>
</h1>

<hr>

<div class="row">
  <div class="col-md-6">
    <h3>French</h3>
    <hr>
    <?=$page->content_l1?>
  </div>
  <div class="col-md-6">
    <h3>Netherland</h3>
    <hr>
    <?=$page->content_l2?>
  </div>
</div>