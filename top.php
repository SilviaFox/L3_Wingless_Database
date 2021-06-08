<!-- logo / small image goes here -->
<div class="box logo">
                <h1><a href="index.php">The Game</a></h1> 
            </div> <!-- / logo -->
            
            <?php 
                
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                }
                else {
                    $page = 'main';
                }
            ?>

            <!-- Boostrap banner -->
            <header class="banner p-3 text-white">
                
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                </a>
                <!-- Darken the button on the banner if you're already on the page -->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 <?php if($page == 'main') echo 'selectedban';
                                                                        else{echo 'unselectedban';}?>">Home</a></li>
                    <li><a href="index.php?page=database" class="nav-link px-2 <?php if($page == 'database') echo 'selectedban';
                                                                        else{echo 'unselectedban';}?>">Database</a></li>
                    <li><a href="index.php?page=contact" class="nav-link px-2 <?php if($page == 'contact') echo 'selectedban';
                                                                        else{echo 'unselectedban';}?>">About</a></li>
                </ul>

                <form class="search col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="post" action="index.php?page=search_name" enctype="multipart/form-data">
                    <input type="search" type="text" name="item_name" class="form-control" placeholder="Search...">
                </form>

                <div class="text-end">
                    
                        <?php

                        if (isset($_SESSION['admin'])) { ?>

                        <a href="index.php?page=../admin/new_entry" type="button" class="btn btn-outline-light">Add Entry</a>
                        &nbsp; &nbsp;
                        <a href="index.php?page=../admin/logout" type="button" class="btn btn-outline-light me-2">Log Out</a>

                        <?php
                            
                            } // end user logged in if

                            else {
                                ?>
                                    <a href="index.php?page=../admin/login" type="button" class="btn btn-outline-light me-2">Login</a>
                                    <a href="#" type="button" class="btn btn-light">Sign-up</a>
                                <?php
                            }
                        ?>
                    
                    
                </div>
                </div>
            </div>
            </header>

                