<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

    <!-- Font-awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Stylesheet -->
    <link <?php
            if (end(explode("/", getcwd())) == 'public_html') {
                echo  'href="./css/style.css"';
            } else {
                echo  'href="../css/style.css"';
            }
            ?> rel="stylesheet" />

    <!-- Jquery -->
    <title>Rent-it</title>
</head>

<!-- ============== Navbar ================= -->
<nav class="navbar navbar-expand-md main-navbar" id="main-navbar">
    <a class="navbar-brand" <?php
                            if (end(explode("/", getcwd())) == 'public_html') {
                                echo  'href="./index.php"><img src="./logo.png"';
                            } else {
                                echo  'href="../index.php"><img src="../logo.png"';
                            }

                            ?> width="200" height="150" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="#" class="dropdown-item">lorem</a>
                    <a href="#" class="dropdown-item">lorem</a>
                    <a href="#" class="dropdown-item">lorem</a>
                </div>
            </li>
            <li class="nav-item">
                <?php
                if (end(explode("/", getcwd())) == 'public_html') {
                    echo  '<a href="./pages/best_seller.php" class="nav-link">Best Seller</a>';
                } else {
                    echo  '<a href="../pages/best_seller.php" class="nav-link">Best Seller</a>';
                }

                ?>
            </li>
            <li class="nav-item">
                <?php
                if (end(explode("/", getcwd())) == 'public_html') {
                    echo  '<a href="./pages/maintainance.php" class="nav-link">Maintainance</a>';
                } else {
                    echo  '<a href="../pages/maintainance.php" class="nav-link">Maintainance</a>';
                }

                ?>
            </li>
            <li class="nav-item">
                <?php
                if (end(explode("/", getcwd())) == 'public_html') {
                    echo  '<a href="./pages/queries.php" class="nav-link">Queries</a>';
                } else {
                    echo  '<a href="../pages/queries.php" class="nav-link">Queries</a>';
                }

                ?>
            </li>
            <li class="nav-item" id="search-input-box">
                <form action="javascript:;" class="form-inline" onsubmit="send(this)">
                    <input type="search" placeholder="Search" class="form-control auto-search"  aria-label="Search" id="search-input" name="name"/>
                </form>
            </li>

            <li class="nav-item">
                <a href=""><i class="fas fa-2x fa-cart-plus"></i></a>
            </li>
            <li class="nav-item">
                <a href=""><i class="fas fa-2x fa-user"></i></a>
            </li>
        </ul>
    </div>
</nav>
