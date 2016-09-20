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
            <li class="divider"><a href="index.html">Home</a></li>
            <li class="divider"><a href="faq.html">FAQ</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul><!--//menu-top-->
          <br />
          <div class="contact pull-right">
            <p class="phone"><i class="fa fa-phone"></i>Call us today 0800 123 4567</p> 
            <p class="email"><i class="fa fa-envelope"></i><a href="#">enquires@website.com</a></p>
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
                      <?=$item->title?> <i class="fa <?=$iconClass?>"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <?php foreach ($item->sublist as $k => $subMenuItem) { ?>
                      <?php renderMenuItem($subMenuItem, false) ?>
                    <?php } ?>
                  </ul>
                </li>
            <?php } else { ?>
            <li class="nav-item">
              <a href="<?=getHref($item)?>"><?=$item->title?></a>
            </li>
            <?php } ?>
        <?php }?>


        <?php if (sizeof($menus) > 0) { ?>

          <ul class="nav navbar-nav">


            <?php foreach ($menus as $k => $menu) { ?>

              <?php renderMenuItem($menu); ?>

            <?php } ?>

          </ul>

        <?php } ?>

        </div><!--//navabr-collapse-->


      </div><!--//container-->
    </nav><!--//main-nav-->
