
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Patient DB</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown" id="appoint" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-calendar fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <!-- /.dropdown-messages -->
            </li>

            <!-- /.dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a  data-a="../Admin/profile.php?type=Patient&username=<?php echo $patient->getUsername();?>" href='#editarUsuario' class='modalEditarUsuario'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'    ><i class="fa fa-user fa-fw"></i> <?php echo $patient->getFirstName();?> </a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="../Patient/patientdashboard.php?"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user fa-fw"></i> Profile<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">UpdateProfile</a>
                            </li>
                            <li>
                                <a href="">ChangePassword</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href=""><i class="fa fa-user fa-fw"></i> Appointments<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Book_Appointment.php">Get Appointment</a>
                            </li>
                            <li>
                                <a href="Appointments.php">View Appointments</a>
                            </li>
                        </ul>
                    <li>
                        <a href="Admin_Patient.php"><i class="fa  fa-wheelchair fa-fw"></i>Doctors</a>
                    </li>
                    <li>
                        <a href="Admin_Patient.php"><i class="fa  fa-wheelchair fa-fw"></i>Reports</a>
                    </li>
                    <li>
                        <a href="../logout.php"><i class="fa fa-edit fa-fw"></i>logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>