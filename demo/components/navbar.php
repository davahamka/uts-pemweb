<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Do.any</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0 mr-4" style="margin-right: 24px;">
      <li class="nav-item">
      <div class="nav-link">
        <!-- <div id="toggleDarkMode" class="border" onclick="localStorage.setItem('theme','light')">DARK</div> -->
      </div>
        </li>
        <li class="nav-item dropdown float-right">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['username']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./edit-profile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="#">FAQ</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./actions/logout_action.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  let darkMode =localStorage.getItem('theme');
  if(darkMode==='dark'){
    document.getElementById('toggleDarkMode').textContent = 'Light Mode';
    document.getElementById('toggleDarkMode').onclick = localStorage.setItem('theme','light');
  } else {
    document.getElementById('toggleDarkMode').textContent = 'Dark Mode';
    document.getElementById('toggleDarkMode').onclick = localStorage.setItem('theme','dark');
  }
</script>