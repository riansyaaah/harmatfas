<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase"><?php echo $NamaLengkap; ?></span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#">
                        <small class="text-muted"><?php echo "UO ".$UO; ?></small>
                    </a>
                </div>

            </div>
        </div>
        <?php if($Level == 'ADMINISTRATOR'){?>
       <ul class="nav" id="side-menu">
            <li class="active">
                <a href="<?php echo base_url(); ?>dashboard"> <span class="nav-label">Beranda</span></a>
            </li>
            
           <li>
                <a href="#"><span class="nav-label">Kekuatan Har</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li>
                <a href="#"><span class="nav-label">Kekuatan Real</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li><a href="<?php echo base_url(); ?>kekuatannonnordek">Data Kekuatan Baru</a></li>
           <li><a href="<?php echo base_url(); ?>paguanggaran">Pagu Anggaran</a></li>
           <li>
                <a href="#"><span class="nav-label">Referensi Data</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li><a href="<?php echo base_url(); ?>laporan">LAPORAN</a></li>
			
            <li>
                <a href="#"><span class="nav-label">Pengaturan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>pengaturan/aplikasi"> Aplikasi</a></li>
                    <li><a href="<?php echo base_url(); ?>pengaturan/tandatangan"> Pejabat Penandatangan</a></li> 
                    <li><a href="<?php echo base_url(); ?>pengaturan/registrasi"> Registrasi User</a></li> 
                </ul>
            </li>
           <li><a href="<?php echo base_url(); ?>monitoringinput">Monitoring Input Data</a></li>
           <li><a href="<?php echo base_url(); ?>login/logout">LOGOUT</a></li>
        </ul>
        <?php }else{?>
        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="<?php echo base_url(); ?>dashboard"> <span class="nav-label">Beranda</span></a>
            </li>
            
           <li>
                <a href="#"><span class="nav-label">Kekuatan Har</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanhar/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li>
                <a href="#"><span class="nav-label">Kekuatan Real</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>kekuatanreal/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li><a href="<?php echo base_url(); ?>kekuatannonnordek">Data Kekuatan Baru</a></li>
           <li><a href="<?php echo base_url(); ?>paguanggaran">Pagu Anggaran</a></li>
           <li>
                <a href="#"><span class="nav-label">Referensi Data</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="#"><span class="nav-label">Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.1">- Kendaraan Tempur</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.2">- Kapal dan Alpung</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.3">- Pesawat Terbang</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.4">- Senjata dan Munisi</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.5">- Radar</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.6">- Alpernika</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/1.7">- Avionik</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Non Alat Utama TNI</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.10">- Mesin Stationer</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.11">- Alat Besar/Zeni</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.12">- Komputer</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.13">- Peralatan Surta</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.14">- Perangkat Uji Pemeliharaan dan Alat Ukur Presisi</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.15">- Simulator</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.16">- Peralatan Khusus</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.17">- Material Khusus/Alkomsus Intelijen</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.18">- Pemeliharaan Alat Kesehatan</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.8">- Kendaraan Bermotor</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/2.9">- Alat Komunikasi dan Elektronika (Alhub dan Alkomlek)</a></li>
                </ul>
                    </li>
                    <li>
                    <a href="#"><span class="nav-label">Fasilitas dan Bangunan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url(); ?>referensi/data/3.1">- Bangunan Konstruksi Umum</a></li>
                    <li><a href="<?php echo base_url(); ?>referensi/data/3.2">- Bangunan Konstruksi Khusus Militer</a></li>
                </ul>
                    </li>
                </ul>
            </li>
           <li><a href="<?php echo base_url(); ?>laporan">LAPORAN</a></li>
			
           <li><a href="<?php echo base_url(); ?>login/logout">LOGOUT</a></li>
        </ul>
        <?php } ?>
    </div>
</aside>