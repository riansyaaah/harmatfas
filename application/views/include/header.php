<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Aplikasi Harwat 2020
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">APLIKASI HARWAT 2020</span>
        </div>
        
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
				<?php if($Level == 'ADMINISTRATOR'){?>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-config"></i>
                    </a>
                    <ul class="dropdown-menu hdropdown notification animated flipInX">
                        
                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/user">
                               <span class="pe-7s-users"></span> DATA USER
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>pengaturan/uo">
                                <span class="pe-7s-network"></span> DATA UNIT ORGANISASI
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
				<li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-user"></i>
                    </a>
                    <ul class="dropdown-menu hdropdown notification animated flipInX">
                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan">
                               <span class="pe-7s-unlock "></span> GANTI PASSWORD
                            </a>
                        </li>
						
                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/ttd">
                               <span class="pe-7s-note"></span> PEJABAT PENANDATANGAN
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo base_url(); ?>login/logout">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>