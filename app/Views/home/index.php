<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />">
    <link rel="stylesheet" href="<?= base_url(); ?>/home/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/home/style.css">
    <title>Cakra Sport Club</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container ">
            <a class="navbar-brand logo-text" href="#">Cakra Sport Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Tentang">Tentang Kami</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <section id="Home">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="text-white display-4">All progress takes place outside the comfort zone.</h1>

                    <a href="https://api.whatsapp.com/send/?phone=6285786214593&text&app_absent=0" class="btn btn-brand">Contact</a>
                </div>
            </div>
        </div>
    </section>
    <section id="Layanan">
        <div class="container-fluid layanan pt-5 pb-5 ">
            <div class="container text-center">
                <h2 class="display-3" id="Layanan">
                    Layanan
                </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque,</p>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <span class="lingkaran">
                            <img src="<?= base_url(); ?>/home/weightlifter.png" alt="">

                        </span>
                        <h5 class="mt-3">
                            Fitness
                        </h5>
                        <p>100k Sebulan Free 3x Personal Trainer</p>
                    </div>
                    <div class="col-md-4">
                        <span class="lingkaran">
                            <img src="<?= base_url(); ?>/home/taekwondo (1).png" alt="">
                        </span>
                        <h5 class="mt-3">
                            Taekwondo for Kids
                        </h5>
                        <p>Hubungi : 08123456789</p>
                    </div>
                    <div class="col-md-4">
                        <span class="lingkaran">
                            <img src="<?= base_url(); ?>/home/taekwondo.png" alt="">

                        </span>
                        <h5 class="mt-3">
                            Private Taekwondo
                        </h5>
                        <p>Hubungi : 08123456789</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Gallery" class="row g-0 py-0">
        <div class="col-lg-4 col-sm-6 ">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gallery1.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gallery2.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gal2.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gal1.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gal2.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="gallery-item">
                <img src="<?= base_url(); ?>/home/gal3.jpg" alt="">
                <div class="gallery-overlay">
                    <div>
                        <h3>Project Title</h3>
                        <h6>Project Subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Tentang">
        <div class="container-fluid layanan pt-5 pb-5 ">
            <div class="container text-center">
                <h2 class="display-3" id="Layanan">
                    Tentang Kami
                </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque,</p>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <span class="lingkaran">
                            <img src="<?= base_url(); ?>/home/weightlifter.png" alt="">

                        </span>
                        <h5 class="mt-3">
                            Fitness
                        </h5>
                        <p>100k Sebulan Free 3x Personal Trainer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h3>About us</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam ipsa aliquam illum aspernatur, itaque id corrupti fugiat nam exercitationem non suscipit. Quasi, harum! Veritatis vitae deleniti numquam quibusdam doloremque explicabo?</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h3>Contact &amp; Address</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-flex">
                            <span class="me-3">Address:</span><span class="text-white"> Jakal</span>
                        </li>
                        <li class="d-flex">
                            <span class="me-3">Telephone:</span><span class="text-white"> Jakal</span>
                        </li>
                        <li class="d-flex">
                            <span class="me-3">Email:</span><span class="text-white"> Jakal</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h3>Quick Link</h3>
                    <ul class="list-unstyled footer-link">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                    </ul>
                    
                </div>
                <div class="col-md-3">
                    <h3>Our Social Media</h3>
                    <ul class="list-unstyled footer-link d-flex footer-social">
                        <li><a href=""><span class="fa-brands fa-facebook"></span></a></li>
                        <li><a href=""><span class="fa-brands fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-md-center text-left">
                    <p>This Website is Made With <i class="fa-solid fa-heart"></i> By Muhammad Yusuf Septian</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url(); ?>/home/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>