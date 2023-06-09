<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <!-- <li>
          <a href="javascript: void(0);" class="waves-effect">
            <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end">04</span>
            <span key="t-dashboards">Dashboards</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="index.html" key="t-default">Default</a></li>
            <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
            <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
            <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-layout"></i>
            <span key="t-layouts">Layouts</span>
          </a>
          <ul class="sub-menu" aria-expanded="true">
            <li>
              <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a target="_blank" href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a></li>
                <li><a target="_blank" href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact Sidebar</a>
                </li>
                <li><a target="_blank" href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a></li>
                <li><a target="_blank" href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                <li><a target="_blank" href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                <li><a target="_blank" href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored Sidebar</a>
                </li>
                <li><a target="_blank" href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a target="_blank" href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                <li><a target="_blank" href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar light</a></li>
                <li><a target="_blank" href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a></li>
                <li><a target="_blank" href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                <li><a target="_blank" href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored Header</a>
                </li>
                <li><a target="_blank" href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a></li>
              </ul>
            </li>
          </ul>
        </li> -->

        <li class="menu-title" key="t-apps">Apps</li>

        <li class="">
          <a href="<?=base_url()?>admin/home" class="waves-effect">
            <i class="fa fa-home"></i>
            <span key="t-chat"><?=lang('home')?></span>
          </a>
        </li>

        <?php if ($this->userdata->TenantCore == 1){ ?>
        <li class="<?=($this->uri->segment(1) == "core")?'mm-active':''?>">
          <a href="<?=base_url()?>core/home" class="waves-effect">
            <i class="bx bx-shield"></i>
            <span key="t-chat"><?=lang('core_management')?></span>
          </a>
        </li>
        <?php } ?>

        <?php foreach ($this->modul as $key) { 
            $cekRole = $this->api->CallAPI('GET', core_api('/api/v1/EmployeeRole/getRow'), ['EmployeeID' => $this->userdata->EmployeeID, 'ModulName' => $key->ModulName]);
            
            if (json_decode($cekRole)->result->RoleName == "Admin"){ 
        ?>
        <li class="<?=($this->uri->segment(1) == explode("/", $key->ModulUrl)[0])?'mm-active':''?>">
          <a href="<?=base_url()?><?=$key->ModulUrl?>" class="waves-effect">
            <i class="<?=$key->ModulIcon?>"></i>
            <span key="t-chat"><?=lang($key->ModulName)?></span>
          </a>
        </li>
        <?php } }?>
      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->