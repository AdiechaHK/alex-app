<h2>
  Menus
  <?=anchor('admin/menu_form', "New", ['class' => "btn btn-success pull-right"]); ?>
</h2>
<hr>

<?php function renderMenuItem($menu) { ?>
        <li>
          <div data-menu-id="<?=$menu->id?>">
            <?=$menu->title?>
            <?=anchor('admin/menu_show/' . $menu->id, "Show")?>
            <?=anchor('admin/menu_form/' . $menu->id, "Edit")?>
            <?=anchor('admin/menu_del/' . $menu->id, "Delete", [
              'onClick' => "return confirm('are you sure');"
              ])?>
          </div>

          <?php if(isset($menu->sublist)) { ?>

            <ol>
              <?php foreach ($menu->sublist as $k => $item) { ?>

                <?php renderMenuItem($item); ?>

              <?php } ?>
            </ol>

          <?php } ?>

        </li>
<?php } ?>


<?php if (sizeof($menus) > 0) { ?>

    <ol class="sortable no-num menu-list">


      <?php foreach ($menus as $k => $menu) { ?>

        <?php renderMenuItem($menu); ?>

      <?php } ?>

    </ol>

    <button class="btn btn-default" id="menu-update">Menu Update !</button>

<?php } else { ?>
<h3>No menus to show.</h3>
<?php } ?>
