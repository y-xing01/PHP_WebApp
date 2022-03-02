<!-- the head section -->

<head>
  <title>My PHP CRUD App</title>
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<!-- the body section -->

<body>
  <header>
    <h1 style="text-align:center">Badminton Equipment Online Store</h1>
  </header>



  <!-- <nav class="navbar navbar-dark bg-primary navbar-expand-lg justify-content-center"> -->
  <nav class="navbar navbar-light bg-primary justify-content-center" style="height: 60px;">
    <div class="container-fluid">
      <button class="navbar-toggler mb-5 position-absolute" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title h1" id="offcanvasNavbarLabel">Badminton</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <?php foreach ($categories as $category) : ?>
              <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                  <?php echo $category['categoryName']; ?>
                </a>
              </li>
            <?php endforeach; ?>
        </div>
      </div>
      <div class="col align-self-center d-lg-flex justify-content-center position-static mb-5">
        <a class="nav-link active text-light" style="font-size:20px" aria-current="page" href="index.php">Home</a>
        <a class="nav-link class= nav-link text-light" style="font-size:20px" href="add_record_form.php">Add Stock</a>
        <a class="nav-link class= nav-link text-light" style="font-size:20px" href="category_list.php">Manage Stock</a>

      </div>

    </div>
  </nav>
  <!-- 
  <div id="navbarNavAltMarkup">
        <div class="navbar-nav nav-item">
          <a class="nav-link active ml-5 mr-5" style="font-size:22px" aria-current="page" href="index.php">Home</a>
          <a class="nav-link class= nav-link mr-5" style="font-size:22px" href="add_record_form.php">Add Stock</a>
          <a class="nav-link class= nav-link mr-5" style="font-size:22px" href="category_list.php">Manage Stock</a>
        </div>
      </div> -->

  <!-- <form class="d-flex mb-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark bg-primary" type="submit">Search</button>
      </form> -->