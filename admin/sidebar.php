<div class="sidebar">
    <div class="logo-details">
        <a href="./dashboard.php" class="logo"><img src="../assets/images/ParadiseLogo.png" alt="Paradise" height="70"></a>
        <span class="logo_name">Paradise</span>
    </div>
    <ul class="nav-links">
        <li><a href="dashboard.php" class="sidebar-link is-active"><i class="fas fa-th-large"></i>Dashboard</a></li>
        <li><a href="products.php" class="sidebar-link"><i class="fas fa-hamburger"></i>Products</a></li>
        <li><a href="orders.php" class="sidebar-link"><i class="fas fa-list"></i>Orders</a></li>
        <li><a href="users.php" class="sidebar-link"><i class="fas fa-address-book"></i>Users</a></li>
        <li><a href="queries.php" class="sidebar-link"><i class="fas fa-comment-alt"></i>Queries</a></li>
        <li class="log_out" class="sidebar-link"><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Log out</span></a></li>
    </ul>
</div>

<script>
    const currentLocation = location.href;
    const navLinks = document.querySelectorAll('.nav-links .sidebar-link');
    console.log(navLinks);
    navLinks.forEach(navLink => {
        if (navLink.href === currentLocation) {
            navLinks[0].classList.remove('is-active');
            navLink.classList.add('is-active');
        }
        navLink.addEventListener('click', function() {
            navLinks.forEach(link => link.classList.remove('is-active'));
            this.classList.add('is-active');
        });
    });
</script>