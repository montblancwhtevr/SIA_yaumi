
<div id="wrapper">

         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="icon.png" width="40" height="40" style="float:left;" />
                <a class="navbar-brand" href="#" >Sistem Informasi Akademik MA WI Kebarongan</a>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <a class="navbar-brand" >
                    <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                    thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    </script>
                    |
                    <span id="clock">  </span> <!-- Tampilkan Clock -->

                    <!--Javascript CLOCK-->
                    <script type="text/javascript">
                    function startTime() 
                    {
                        var today=new Date(),
                        curr_hour=today.getHours(),
                        curr_min=today.getMinutes(),
                        curr_sec=today.getSeconds();
                        curr_hour=checkTime(curr_hour);
                        curr_min=checkTime(curr_min);
                        curr_sec=checkTime(curr_sec);
                        document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
                    }
                    function checkTime(i) 
                    {
                        if (i<10) 
                        {
                            i="0" + i;
                        }
                        return i;
                    }
                    setInterval(startTime, 500);
                    </script>
                </a> <!-- END Javascript CLOCK -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo ($_SESSION['nama'])?></a>
                        <li><a href="change_pass.php"><i class="fa fa-cog fa-fw"></i>Setting</a>    
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>
    </div>