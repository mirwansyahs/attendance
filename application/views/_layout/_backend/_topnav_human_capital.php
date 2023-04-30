<div class="topnav">
    <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>hc/Home">
                                    <i class="bx bx-home me-2"></i><span key="t-beranda"><?=lang('home')?></span>
                                </a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-attendance" role="button"
                                >
                                    <i class="bx bx-time me-2"></i><span key="t-attendances"><?=lang('attendance')?></span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-attendance">
        
                                    <a href="<?=base_url()?>hc/holiday" class="dropdown-item" key="t-default"><?=lang('holiday')?></a>
                                    <a href="<?=base_url()?>hc/shift" class="dropdown-item" key="t-default"><?=lang('shift')?></a>
                                    <a href="<?=base_url()?>hc/timeprofile" class="dropdown-item" key="t-default"><?=lang('time_profile')?></a>
                                </div>
                            </li>

                        </ul>
                </div>
            </nav>
    </div>
</div>