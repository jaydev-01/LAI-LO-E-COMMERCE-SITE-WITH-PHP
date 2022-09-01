<div class="navbar-container" id="admin-navbar">
    <div class="menu-icon" id="menu-btn">
    <i class="fa-solid fa-bars"></i>
    <div>
    <span>Good Morning, <?php echo $_SESSION['user']['name']; ?></span>
    </div>
    </div>
    <div class="user-name" id="account-of-admin">
        <a href="#"><span><i class="fa-solid fa-user-gear"></i></span>   <i class="fa-solid fa-caret-down"></i></a>
        <div class="drop-down" id="dropDown">
            <li><a href=""><i class="fa-solid fa-user"></i> Profile</a></li>
            <li><a href="" onclick="logOut()"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </div>
    </div>
</div>