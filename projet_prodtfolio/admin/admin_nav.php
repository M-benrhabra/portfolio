<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Portfolio Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown text-white"> <?php echo "<a class=' text-white pt-15'>".$_SESSION['username']."</a>";?> </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#infos"><i class="fa fa-fw fa-user"></i> Infos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="infos" class="collapse">
                            <li>
                                <a href="view_infos.php">View My Infos</a>
                            </li>
                            <li>
                                <a href="add_infos.php">Add Infos</a>
                            </li>
                            <li>
                                <a href="archive_infos.php">Archive Infos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#technical_skills"><i class="fa fa-fw fa-tag"></i> Technical Skills <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="technical_skills" class="collapse">
                            <li>
                                <a href="view_technical_skills.php">View Technical Skills</a>
                            </li>
                            <li>
                                <a href="add_technical_skills.php">Add Technical Skills</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#professional_skills"><i class="fa fa-fw fa-gear"></i> Professional Skills <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="professional_skills" class="collapse">
                            <li>
                                <a href="view_pro_skills.php">View Professional Skills</a>
                            </li>
                            <li>
                                <a href="add_pro_skills.php">Add Professional Skills</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#education"><i class="fa fa-fw fa-book"></i> Education <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="education" class="collapse">
                            <li>
                                <a href="view_education.php">View List Education</a>
                            </li>
                            <li>
                                <a href="add_education.php">Add Education</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#experience"><i class="fa fa-fw fa-money"></i> Work Experience <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="experience" class="collapse">
                            <li>
                                <a href="view_experience.php">View List Experience</a>
                            </li>
                            <li>
                                <a href="add_experience.php">Add Experience</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#portfolio"><i class="fa fa-fw fa-table"></i> My Portfolio <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="portfolio" class="collapse">
                            <li>
                                <a href="view_project.php">View List Project</a>
                            </li>
                            <li>
                                <a href="add_project.php">Add Project</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#categories"><i class="fa fa-fw fa-dropbox"></i> Project Categories <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="categories" class="collapse">
                            <li>
                                <a href="view_cat.php">View Categories</a>
                            </li>
                            <li>
                                <a href="add_cat.php">Add Categories</a>
                            </li>
                        </ul>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>