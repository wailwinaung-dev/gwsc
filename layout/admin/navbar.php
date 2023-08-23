<!-- Navbar -->
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
    <!-- <span class="material-icons-outlined">search</span> -->
  </div>
  <div class="header-right">
    <!-- <span class="material-icons-outlined">notifications</span>
    <span class="material-icons-outlined">email</span> -->
    <span class="profile-name">
      <?= $auth['first_name'] . ' ' . $auth['sur_name'] ?> <span class="material-icons-outlined">account_circle</span>
    </span>
  </div>
</header>
<!-- End Navbar -->