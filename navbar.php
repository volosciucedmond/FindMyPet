<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            
            <!-- <li> <a href="changePassword.php"> parola </a> </li> -->
            <?php if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
                <li class="menu-text"> Find my pet</li>
                <li> <a href="dashboardu.php"> Acasă </a> </li>
            <li><a href="categories.php">Categorii</a></li>


            <?php } else if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) { ?>
                <li class="menu-text"> Find my pet</li>
                <li><a href="dashboard.php">Acasă</a></li>

            <?php } else { ?>
                <li class="menu-text"> Find my pet</li>
                <li><a href="index.php">Acasă</a></li>
            <li><a href="categories.php">Categorii</a></li>

            <?php }
            ?>

            </li>
            <?php
            ?>
            
            <!-- <?php if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
                <li><a href="adaugaAnimal.php">Adaugă un animal</a></li>

            <?php } ?> -->

            
            <!-- <li><a href="cautaAnimal.php">Caută</a></li> -->

            <?php
                if (!isset($_SESSION['auth']) || $_SESSION['role_as'] == 0) { ?>
                <li><a href="contactForm.php">Contact</a></li>
                <?php }
            ?>
            <?php
            if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) { ?>
                <li>
                    <?php
                    ?>
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li>
                            <a href="#"> Funcții admin
                            </a>
                            <ul class="menu">
                                <li><a href="adaugaCategorie.php">Adaugă categorie</a></li>
                                <li><a href="category.php">Gestiune categorii</a></li>
                                <li><a href="animale.php">Gestiune animalele</a></li>
                                <li><a href="citesteMesaje.php">Gestiune mesaje </a></li>
                                <li><a href="gestiune.php">Gestiune utilizatori</a></li>
                                <li><a href="gestiuneReview.php">Gestiune review-uri</a></li>
                                <!-- <li><a href="searchUser.php">Cauta users</a></li> -->
                                
                                <li><a href="logout1.php">Delogare</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
            <?php
            } else if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) {
            ?>
                <li>
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li>
                            <a href="#"> Funcții utilizator
                            </a>
                            <ul class="menu">
                                <li><a href="adaugaAnimal.php">Adaugă animal</a></li>
                                <li><a href="animale.php">Vizualizați animalele</a></li>
                                <!-- <li><a href="editProduct.php">Editează animal</a></li> -->
                                
                                
                                    
                                    <li><a href="addReview.php">Adaugă review</a></li>
                                    <li><a href="gestiuneReview.php">Review-urile mele</a></li>
                                
                                <li><a href="gestiune.php">Gestiune cont</a></li>
                                <li><a href="logout1.php">Delogare</a></li>
                            </ul>
                <li><a href="viewReviews.php">Review-uri</a></li>

                        </li>

                    </ul>
                </li>
            <?php } else { ?>
                </li>
                <li><a href="login1.php">Autentificare</a></li>
                <li><a href="viewReviews.php">Review-uri</a></li>

            <?php }
            ?>


        </ul>
    </div>

</div>