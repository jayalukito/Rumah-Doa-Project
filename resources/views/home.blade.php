@extends('template/layout')
@section('navbar')
    @extends('template/navbar')
@endsection
@section('content')
<div class="container shadow-lg background-white">
    <div class="row pb-3">
        <div class="col-md-6 d-flex justify-content-center">
            <div>
                <img src="{{asset("images/logostmy.jpg")}}" width="400px" alt="">
            </div>

        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h1 class="merriweather-bold">Website E-Book <br> Rumah Doa Sasana Krida</h1>
                <a href={{ url('/reservasi') }}><button class="btn btn-danger rounded-pill"> <span class="merriweather-regular">Reservasi Sekarang</span></button></a>
            </div>

        </div>
    </div>

    <div class="row justify-content-around pt-5">
        <div class="col-lg-5 merriweather-regular">
            <h1 class="text-center ">Tentang Kami</h1>
            <p>Selamat datang di <strong>Rumah Doa Pegunungan Kasih</strong>, sebuah tempat yang penuh kedamaian dan ketenangan, terletak di kaki pegunungan yang memukau. Rumah doa ini didirikan pada tahun 2005 oleh sekelompok orang yang memiliki panggilan untuk menciptakan tempat di mana setiap individu dapat merasakan kedekatan dengan Tuhan melalui doa dan perenungan. Terinspirasi oleh keindahan alam yang mengelilingi, kami percaya bahwa kedamaian batin dapat ditemukan dengan kembali ke alam, jauh dari hiruk-pikuk kehidupan kota.</p>

            <h4>Sejarah Singkat</h4>
            <p>Sejarah Rumah Doa Pegunungan Kasih bermula ketika seorang pendeta bernama <strong>Pdt. Samuel Tanjung</strong> merasa tergerak untuk membuka sebuah tempat ibadah di daerah pegunungan yang indah ini. Beliau, yang telah melayani gereja selama lebih dari 20 tahun, merasa bahwa banyak orang yang membutuhkan tempat yang tenang untuk menyepi dan mendekatkan diri kepada Tuhan. Pada tahun 2005, dengan bantuan masyarakat setempat dan beberapa donatur yang peduli, rumah doa ini mulai dibangun.</p>

            <p>Sejak pertama kali dibuka, Rumah Doa Pegunungan Kasih telah menjadi tempat perlindungan spiritual bagi banyak orang, baik dari daerah sekitar maupun luar daerah. Setiap tahun, ribuan pengunjung datang untuk menikmati suasana tenang, di mana mereka dapat memperbaharui iman mereka, berdoa, dan merenung di tengah keindahan alam.</p>


        </div>

        <div class="col-lg-6 ">

            <div class="ratio ratio-16x9">
                <iframe
                    src="https://www.youtube.com/embed/vm_lA13fL3k?si=G0rKO-pNuDEAFPbM"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>

            </div>
        </div>
    </div>


    <div class="layanan background-blue py-3 text-white shadow"  >
        <div class="row mt-3 mx-2 merriweather-regular text-white">
            <div class="w-100 text-center"><h3>Layanan Kami</h3></div>
            <div class="col-md-3 my-3 ps-2" >
                <div class="card"  style="" data-aos="fade-down">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUi5ISxUxMYQtQxtCfcM6hwHZ31JuQ9mWkQw&s" class="card-img-top" style="height: 150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            Kapel
                        </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-3 ps-2 " data-aos="fade-down">
                <div class="card" style="">
                    <img src="https://www.suarasurabaya.net/wp-content/uploads/2024/10/Kolam-Renang-Jambangan-3-e1728206640678-840x493.jpeg" class="card-img-top" style="height: 150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            Kolam Renang
                        </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-3 my-3 ps-2" data-aos="fade-down">
                <div class="card" style="">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3XqnHF1VfGfgjIPAbibPhRqcfadYZzTKpAQ&s" class="card-img-top" style="height: 150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            Outbond Area
                        </h5>

                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-3 my-3 ps-2 " data-aos="fade-down">
                <div class="card" style="">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUi5ISxUxMYQtQxtCfcM6hwHZ31JuQ9mWkQw&s" class="card-img-top" style="height: 150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >
                            Kapel
                        </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row my-3 merriweather-regular">
        <div class="col text-center">
            <h3>Testimoni</h3>

            <div class="row justify-content-center align-items-center">
                <div class="col-auto">
                    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="card mb-3"  style="max-width: 40rem">
                                <div class="card-body">
                                  <h5 class="card-title text-start">Budi Satu Dua Tiga</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec nunc sed nulla fermentum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget nisi nec ligula luctus accumsan. Nulla facilisi. Sed id libero id nisi vehicula faucibus. Proin ac massa a risus consectetur imperdiet. Nam vulputate risus at dui malesuada, nec scelerisque metus viverra.

                                    Curabitur ac metus sed felis aliquet suscipit. Duis feugiat ligula nec mi tempus, ut varius sapien tempor. Integer euismod felis eget mi posuere tincidunt. Morbi condimentum, dolor id cursus varius, libero felis viverra purus, a fermentum magna velit ut lorem. Cras et justo at felis maximus varius vel ut lacus. Vestibulum rhoncus, eros id luctus dignissim, nisi magna consectetur turpis, ac dapibus augue nisl a elit. Sed suscipit odio eu orci fermentum, sed lobortis lorem faucibus.</p>
                                </div>
                            </div>
                          </div>

                          <div class="carousel-item">
                            <div class="card mb-3"  style="max-width: 40rem">
                                <div class="card-body">
                                  <h5 class="card-title text-start">Budi Satu Dua Tiga</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec nunc sed nulla fermentum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget nisi nec ligula luctus accumsan. Nulla facilisi. Sed id libero id nisi vehicula faucibus. Proin ac massa a risus consectetur imperdiet. Nam vulputate risus at dui malesuada, nec scelerisque metus viverra.

                                    Curabitur ac metus sed felis aliquet suscipit. Duis feugiat ligula nec mi tempus, ut varius sapien tempor. Integer euismod felis eget mi posuere tincidunt. Morbi condimentum, dolor id cursus varius, libero felis viverra purus, a fermentum magna velit ut lorem. Cras et justo at felis maximus varius vel ut lacus. Vestibulum rhoncus, eros id luctus dignissim, nisi magna consectetur turpis, ac dapibus augue nisl a elit. Sed suscipit odio eu orci fermentum, sed lobortis lorem faucibus.</p>
                                </div>
                            </div>
                          </div>

                          <div class="carousel-item">
                            <div class="card mb-3"  style="max-width: 40rem">
                                <div class="card-body">
                                  <h5 class="card-title text-start">Budi Satu Dua Tiga</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec nunc sed nulla fermentum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget nisi nec ligula luctus accumsan. Nulla facilisi. Sed id libero id nisi vehicula faucibus. Proin ac massa a risus consectetur imperdiet. Nam vulputate risus at dui malesuada, nec scelerisque metus viverra.

                                    Curabitur ac metus sed felis aliquet suscipit. Duis feugiat ligula nec mi tempus, ut varius sapien tempor. Integer euismod felis eget mi posuere tincidunt. Morbi condimentum, dolor id cursus varius, libero felis viverra purus, a fermentum magna velit ut lorem. Cras et justo at felis maximus varius vel ut lacus. Vestibulum rhoncus, eros id luctus dignissim, nisi magna consectetur turpis, ac dapibus augue nisl a elit. Sed suscipit odio eu orci fermentum, sed lobortis lorem faucibus.</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>


    </div>


    <div class="row my-3 merriweather-regular justify-content-center ">
        <h3 class="text-center">Temukan Kami</h3>



        <div class="col-auto">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.5115015152437!2d112.57250111143681!3d-7.628008175401619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7876584addc17f%3A0x80e09f8c4d5e95b1!2sSasana%20Krida%20-Jatijejer!5e0!3m2!1sen!2sid!4v1733663285339!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="background-blue ">
        <div class="row my-3 justify-content-center align-items-center " style="height: 25vh">
            <div class="col-auto">
                <h5 class="merriweather-regular text-white"> Telphone : 08123456789</h5>
                <h5 class="merriweather-regular text-white"> Email : SasanaKrida@gmail.com</h5>
                <h5 class="merriweather-regular text-white"> Instagram : RumahDoa_SasanaKrida</h5>
                <h5 class="merriweather-regular text-white"> Alamat : Jatijejer, Trawas, Mojokerto, Jawa Timur 61375</h5>
            </div>
        </div>
    </div>



</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      AOS.init({
        duration: 1000, // Animation duration in ms
        once: false     // Run animation only once
      });

      flatpickr("#time-picker", {});

    });
  </script>




@endsection

