  <div class="wrapper">
    <!-- ******HEADER****** --> 
    <header class="header">  
      <div class="top-bar hide">
        <div class="container">              
          <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
            <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
            <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>         
            <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>             
          </ul><!--//social-icons-->
          <form class="pull-right search-form" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search the site...">
            </div>
            <button type="submit" class="btn btn-theme">Go</button>
          </form>         
        </div>      
      </div><!--//to-bar-->
      <div class="header-main container">
        <h1 class="logo col-md-4 col-sm-4">
          <a href="index.html"><img id="logo" src="<?=base_url('assets/images/logo.png')?>" alt="Logo"></a>
        </h1><!--//logo-->           
        <div class="info col-md-8 col-sm-8">
          <ul class="menu-top navbar-right hidden-xs">
            <li class="divider"><a href="index.html">{{'HEADER_HOM'|translate}}</a></li>
            <li class="divider"><a href="faq.html">{{'HEADER_FAQ'|translate}}</a></li>
            <li><a href="contact.html">{{'HEADER_CNT'|translate}}</a></li>
          </ul><!--//menu-top-->
          <br />
          <div class="contact pull-right">
            <p class="phone"><i class="fa fa-phone"></i>{{'HEADER_CONTACT'|translate}}</p> 
            <p class="email"><i class="fa fa-envelope"></i><a href="#">{{'HEADER_EMAIL'|translate}}</a></p>
          </div><!--//contact-->
        </div><!--//info-->
      </div><!--//header-main-->
    </header><!--//header-->

    <!-- ******NAV****** -->
    <nav class="main-nav" role="navigation" data-ng-controller="NavigationCtrl">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><!--//nav-toggle-->
        </div><!--//navbar-header-->            
        <div class="navbar-collapse collapse" id="navbar-collapse">

        <?php
        function getHref($menu) { 
          if ($menu->type == 'LINK') {
            if(strrpos($menu->link, 'http') === 0) return $menu->link;
            else return base_url($menu->link);
          }
          else return '#/show/' . $menu->page;
        }
        ?>


        <?php function renderMenuItem($item, $isBase = true) { ?>
            <?php
            $dropDownClass = $isBase? 'dropdown': 'dropdown-submenu';
            $iconClass = $isBase? 'fa-angle-down': 'fa-angle-right';
            ?>
            <?php if($item->type == 'PARENT' && isset($item->sublist)) { ?>
              <li class="nav-item <?=$dropDownClass?>" <?= $isBase?'id="menu-' . $item->id . '"':''?> >
                  <a 
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    data-hover="dropdown"
                    data-delay="0"
                    data-close-others="false"
                    href="#">
                      {{'<?=$item->key?>'|translate}} <i class="fa <?=$iconClass?>"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <?php foreach ($item->sublist as $k => $subMenuItem) { ?>
                      <?php renderMenuItem($subMenuItem, false) ?>
                    <?php } ?>
                  </ul>
                </li>
            <?php } else { ?>
            <li class="nav-item" data-ng-class='setClass(<?=json_encode($item)?>)'>
              <!-- <a href="<?=getHref($item)?>" >{{'<?=$item->key?>'|translate}}</a> -->
              <a 
                data-ng-click='linkTo(<?=json_encode($item)?>)'
                class="c-p"
                >{{'<?=$item->key?>'|translate}}</a>
            </li>
            <?php } ?>
        <?php }?>


        <?php if (sizeof($menus) > 0) { ?>

          <ul class="nav navbar-nav">


            <?php foreach ($menus as $k => $menu) { ?>

              <?php renderMenuItem($menu); ?>

            <?php } ?>

            <li class="nav-item hide">
              <a href="#/something">{{'SAMPLE' | translate}}</a>
            </li>


          </ul>

        <?php } ?>

        <ul class="nav navbar-nav pull-right">
          <li>
            <select
              id="lang"
              class="form-control lang-dropdown"
              data-ng-change="changeLang()"
              data-ng-model="lang">
              <option value="fr">{{'LANG_FR'|translate}}</option>
              <option value="nl">{{'LANG_NL'|translate}}</option>
            </select>
          </li>
        </ul>

        </div><!--//navabr-collapse-->


      </div><!--//container-->
    </nav><!--//main-nav-->
