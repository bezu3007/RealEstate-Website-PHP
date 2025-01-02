<link href="../CSS/output.css" rel="stylesheet">
<header>
    <div class="container mx-auto px-4">
        <!-- Brand Section -->
        <div class="brand flex items-center justify-between">
            <div class="logo flex items-center">
                <?php if (basename(dirname($_SERVER['PHP_SELF'])) === "ip1") { ?>
                    <a href="index.php" class="flex items-center">
                        <img src="img/icons/online_shopping.png" class="w-6 h-6 sm:w-5 sm:h-5" alt="Logo">
                        <div class="logo-text ml-2">
                            <p class="text-lg sm:text-md font-semibold">ARARAT</p>
                            <p class="text-sm sm:text-xs text-gray-500">REAL STATES</p>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="../index.php" class="flex items-center">
                        <img src="../img/icons/online_shopping.png" class="w-6 h-6 sm:w-5 sm:h-5" alt="Logo">
                        <div class="logo-text ml-2">
                            <p class="text-lg sm:text-md font-semibold">ARARAT</p>
                            <p class="text-sm sm:text-xs text-gray-500">REAL STATES</p>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <!-- Shop Icons -->
            <div class="shop-icon flex items-center space-x-4">
                <!-- Profile Picture Dropdown -->
                <div class="dropdown relative">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
                        <div class="profile-picture w-10 h-10 rounded-full overflow-hidden cursor-pointer hover:shadow-lg">
                            <?php
                            $profileSrc = !empty($_SESSION['user_details']['Profile_picture']) ? $_SESSION['user_details']['Profile_picture'] : 
                                (basename(dirname($_SERVER['PHP_SELF'])) === 'ip1' ? 'img/icons/account.png' : '../img/icons/account.png');
                            ?>
                            <img src="<?php echo basename(dirname($_SERVER['PHP_SELF'])) === "ip1" ? $profileSrc : "../$profileSrc"; ?>" 
                                class="w-full h-full object-cover" alt="Profile Picture">
                        </div>
                        <div class="dropdown-menu absolute mt-2 bg-white shadow-lg rounded-md p-4 hidden group-hover:block">
                            <h1 class="text-blue-500"><?php echo $_SESSION['user_details']['username']; ?></h1>
                            <h1 class="text-green-500"><?php echo $_SESSION['user_details']['Email']; ?></h1>
                            <ul class="space-y-2">
                                <?php if (basename(dirname($_SERVER['PHP_SELF'])) === "ip1") { ?>
                                    <li><a href="pages/account.php" class="text-blue-500 hover:underline">My Account</a></li>
                                    <li><a href="pages/orders.php" class="text-blue-500 hover:underline">My Orders</a></li>
                                    <li><a href="functions/userLogout.php" class="text-red-500 hover:underline">Log Out</a></li>
                                <?php } else { ?>
                                    <li><a href="../pages/account.php" class="text-blue-500 hover:underline">My Account</a></li>
                                    <li><a href="../pages/orders.php" class="text-blue-500 hover:underline">My Orders</a></li>
                                    <li><a href="../functions/userLogout.php" class="text-red-500 hover:underline">Log Out</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>

                <!-- Cart Icon -->
                <div class="dropdown relative">
                    <button >
                        <a href="<?php echo basename(dirname($_SERVER['PHP_SELF'])) === 'ip1' ? 'pages/cart.php' : '../pages/cart.php'; ?>">
                        <img src="<?php echo basename(dirname($_SERVER['PHP_SELF'])) === 'ip1' ? 'img/icons/shopping_cart.png' : '../img/icons/shopping_cart.png'; ?>" 
                        class="w-6 h-6 sm:w-5 sm:h-5 cursor-pointer hover:scale-110 transition-transform duration-200" alt="Cart">
                        </a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Bar -->
        <div class="menu-bar mt-4">
            <div class="menu">
                <ul class="flex space-x-4">
                    <?php if (basename(dirname($_SERVER['PHP_SELF'])) === "ip1") { ?>
                        <li><a href="index.php" class="text-blue-500 hover:underline">HOME</a></li>
                        <li><a href="pages/market.php" class="text-blue-500 hover:underline">Market</a></li>
                        <li><a href="pages/register.php" class="text-blue-500 hover:underline">Register</a></li>
                        <?php if (!isset($_SESSION['logged_in'])) { ?>
                            <li><a href="pages/login.php" class="text-blue-500 hover:underline">SIGN IN</a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <li><a href="../index.php" class="text-blue-500 hover:underline">HOME</a></li>
                        <li><a href="../pages/market.php" class="text-blue-500 hover:underline">Market</a></li>
                        <li><a href="../pages/register.php" class="text-blue-500 hover:underline">Register</a></li>
                        <?php if (!isset($_SESSION['logged_in'])) { ?>
                            <li><a href="../pages/login.php" class="text-blue-500 hover:underline">SIGN IN</a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

            <!-- Search Bar -->
            <div class="search-bar mt-4">
                <form action="<?php echo basename(dirname($_SERVER['PHP_SELF'])) === 'ip1' ? 'pages/market.php' : '../pages/market.php'; ?>" 
                    method="get" class="flex items-center space-x-2">
                    <input type="text" class="form-control border border-gray-300 rounded-md p-2 w-full" 
                        name="search" id="searchInput" placeholder="Search">
                    <button type="submit" name="submit" class="bg-blue-500 text-white p-2 rounded-md">
                        <img src="<?php echo basename(dirname($_SERVER['PHP_SELF'])) === 'ip1' ? 'img/icons/search.png' : '../img/icons/search.png'; ?>" 
                            class="w-4 h-4" alt="Search">
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
