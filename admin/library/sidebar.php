    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <div class="sia-profile">
                        <img class="sia-profile-image" src=<?php echo ($_SESSION['foto'])?> >
                        <h5 style="text-align:center;"><?php echo ($_SESSION['nama'])?></h5>
                        <p style="text-align:center; font-weight:bold;"><?php echo ($_SESSION['username'])?></p>    
                    </div>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-folder-open fa-fw"></i>Data Master<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="data_siswa.php"><i class="fa fa-user fa-fw"></i>Data Siswa</a>
                        </li>
                        <li>
                            <a href="data_guru.php"><i class="fa fa-user fa-fw"></i>Data Guru</a>
                        </li>
                        <li>
                            <a href="data_staff.php"><i class="fa fa-user fa-fw"></i>Data Staff</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="data_mapel.php"><i class="fa fa-book fa-fw"></i> Data Mata Pelajaran</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-tasks fa-fw"></i>Data Kelas<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="kelas_satu.php"><i class="fa fa-home fa-fw"></i>Kelas X<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="kelas_satu.php">Kelas X-A</a>
                                </li>
                                <li>
                                    <a href="#">Kelas X-B</a>
                                </li>
                                <li>
                                    <a href="#">Kelas X-C</a>
                                </li>
                                <li>
                                    <a href="#">Kelas X-D</a>
                                </li>
                                <li>
                                    <a href="#">Kelas I Takhasus A</a>
                                </li>
                                <li>
                                    <a href="#">Kelas I Takhasus B</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="kelas_dua.php"><i class="fa fa-home fa-fw"></i>Kelas XI<span class="fa arrow"></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Kelas XI-A IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XI-B IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XI-C IPS</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XI-D IPS</a>
                                </li>
                                <li>
                                    <a href="#">Kelas II Takhasus A IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas II Takhasus B IPS</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="kelas_tiga.php"><i class="fa fa-home fa-fw"></i>Kelas XII<span class="fa arrow"></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Kelas XII-A IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XII-B IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XII-C IPS</a>
                                </li>
                                <li>
                                    <a href="#">Kelas XII-D IPS</a>
                                </li>
                                <li>
                                    <a href="#">Kelas III Takhasus A IPA</a>
                                </li>
                                <li>
                                    <a href="#">Kelas III Takhasus B IPS</a>
                                </li>
                            </ul>
                        </li>    
                    </ul>
                </li>
                <li>
                    <a href="data_tahun.php"><i class="fa fa-book fa-fw"></i> Tahun Ajaran</a>
                </li> 
            </ul>          
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
