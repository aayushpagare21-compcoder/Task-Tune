<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" style="color:green;" href="#">Task-Tune</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/php/Task-Tune/welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="https://docs.google.com/presentation/d/1-VExDnWpojVQWlY8BWEhJ_XNVuc119nKfDqrbVb40xM/edit?usp=sharing">Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact-Us</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Options
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/php/Task-Tune/create.php">Create new routine</a></li>
              <li><a class="dropdown-item" href="/php/Task-Tune/alter.php">Generate new routine</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2 mx-3" type="search" placeholder="Search" aria-label="Search"> 
          <button class="btn btn-success" type="submit">Search</button>
          <button class="btn btn-outline-success mx-2" type="submit"> <a href="/php/Task-Tune/login.php" onmouseover="this.style.color='white'" onmouseout="this.style.color='green'" style="text-decoration:none; color:green;">Login</a></button>
          <button class="btn btn-outline-success" type="submit"> <a href="/php/Task-Tune/logout.php" onmouseover="this.style.color='white'" onmouseout="this.style.color='green'" style="text-decoration:none; color:green;">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>