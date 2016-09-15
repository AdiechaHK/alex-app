<div class="container">
  <h1>
    Admin Panel
    <a href="<?=site_url('admin/logout')?>" class="btn btn-default pull-right">Logout</a>
  </h1>
  <hr>
  
  <div class="row">
    <div class="col-lg-2">
      <?php $this->view('template/admin/sidebar') ?>
    </div>
    <div class="col-lg-10">