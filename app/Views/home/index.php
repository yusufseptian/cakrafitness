<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/home/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="<?= base_url(); ?>/home/assets/css/bootstrap.min.css" rel="stylesheet">

    <title>HOME</title>
</head>

<body id="home">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: rgb(68, 139, 219);">
        <div class="container">
            <a class="navbar-brand" href="#">Cakra Sport Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#article">Article</a>
                    <a class="nav-link" href="#pricing">Pricing</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <img src="<?= base_url(); ?>/home/assets/img/user.png" width="200" alt="">
        <h1 class="display-4">Cakra Sport Club</h1>
        <p class="lead">Fitness | Taekwondo Anak | Private Taekwondo</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,64L48,90.7C96,117,192,171,288,170.7C384,171,480,117,576,128C672,139,768,213,864,208C960,203,1056,117,1152,74.7C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- end jumbotron -->

    <!-- about -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-2">
                <div class="col">
                    <h2>About Me</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-5 text-center">
                <div class="col-4">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt enim, quibusdam excepturi in fugit amet commodi nulla vitae laborum cumque magni voluptate officia assumenda quam recusandae unde, quis deleniti ullam?</p>
                </div>
                <div class="col-4">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt enim, quibusdam excepturi in fugit amet commodi nulla vitae laborum cumque magni voluptate officia assumenda quam recusandae unde, quis deleniti ullam?</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,138.7C384,128,480,64,576,48C672,32,768,64,864,96C960,128,1056,160,1152,144C1248,128,1344,64,1392,32L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- end about -->

    <!-- article -->
    <section id="article">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>My Article</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg">
                        <img src="<?= base_url(); ?>/home/assets/img/3568984.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg">
                        <img src="<?= base_url(); ?>/home/assets/img/3568984.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg">
                        <img src="<?= base_url(); ?>/home/assets/img/3568984.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L48,202.7C96,181,192,139,288,117.3C384,96,480,96,576,117.3C672,139,768,181,864,186.7C960,192,1056,160,1152,149.3C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- end article -->
    <!-- Pricing -->
    <section id="pricing">
        <div class="conainer">
            <div class="row text-center mb-2">
                <div class="col">
                    <h2>Pricing</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="<?= base_url(); ?>/home/assets/img/money.png" alt="" class="card-img-top mx-auto">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="<?= base_url(); ?>/home/assets/img/money.png" alt="" class="card-img-top mx-auto">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#273036" fill-opacity="1" d="M0,160L48,165.3C96,171,192,181,288,154.7C384,128,480,64,576,74.7C672,85,768,171,864,197.3C960,224,1056,192,1152,165.3C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- end pricing -->
    <!-- footer -->
    <footer class="text-center text-white pb-5" style="background-color: #273036;">
        <p>Created with <i class="bi bi-heart-fill text-danger"></i> By <a href="#">Muhammad Yusuf Septian</a></p>
    </footer>
    <!-- end footer -->
    <script src="<?= base_url(); ?>/home/assets/js/bootstrap.min.js"></script>
</body>

</html>