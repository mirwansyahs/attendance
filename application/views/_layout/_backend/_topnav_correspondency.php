<div class="topnav">
    <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>cp/Home">
                                    <i class="bx bx-home me-2"></i><span key="t-beranda"><?=lang('home')?></span>
                                </a>
                            </li>
                            
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-request" role="button"
                                >
                                    <i class="bx bx-envelope me-2"></i><span key="t-requests"><?=lang('letter')?></span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-request">
        
                                    <a href="<?=base_url()?>cp/letter/in" class="dropdown-item" key="t-default"><?=lang('letter_in')?></a>
                                    <a href="<?=base_url()?>cp/letter/out" class="dropdown-item" key="t-default"><?=lang('letter_out')?></a>
                                    <a href="<?=base_url()?>cp/letter/disposisi" class="dropdown-item" key="t-default"><?=lang('letter_disposisi')?></a>
                                </div>
                            </li>
                        </ul>
                </div>
            </nav>
    </div>
</div>