@extends("layout.main")

@section("main")

<div class="wrapper">
  <div class="page-header clear-filter home-header" style="overflow: unset">
    <div class="page-header-image" data-parallax="true" style="background-image: url('https://drive.google.com/uc?export=view&id=1RoLc6VuXj7AepMTCtjY1UGqTRd0FwL7S'); filter : brightness(100%);"></div>
<!-- Menghilangkan filter color, merubah benner-->


    <div class="container d-flex align-items-center">
      <div class="row align-items-center">
        <div class="col" style="text-align: start!important;">
          <h3>Rumah Kompetisi</h3> 
          <p>Belajar Riset dan Menulis Karya Ilmiah dengan Mudah serta Menyenangkan Membangun Ekosistem Keilmiahan dan Penelitian Untuk Mencetak Inovator Muda Indonesia</p>
        </div>
            <!--menambah tulisan-->

        <div class="position-relative col-4 hilang" style="left: 2vh; top: 15vh;">
          <img style="max-width: 35vw;" class="img" src="https://drive.google.com/uc?export=view&id=1czQc83UhJ1LxJIbR2H_ewCDA5Vpi-x-T" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

<main class="container mt-5">
  <h1 style="margin-top: 135px!important; margin-bottom: 60px;!important" class="text-center"; >
    <strong>Rumah Kompetisi Class</strong>
  </h1>
  <div class="row g-4 justify-content-center">
    @foreach($kelas as $item)
    <div class="col-lg-4 d-flex justify-content-center">
      <div class="card overflow-hidden" style="max-width: 20rem; border-radius: 20px; box-shadow: black">
        <img class="card-img-top img-raised" src="@if($item->background == null) https://drive.google.com/uc?export=view&id=1_Qm6Rr_4dIipg8zsfKemqoIn6SH52Q_u @else {{$item->background}} @endif" alt="Card image cap" style="border-radius: 20px; filter: brightness(70%)">
        <div class="text-white card-img-overlay overflow-hidden row align-items-center" style="height: 48%">
          <div class="col-8">
            @if ($item->diskon != null)
            <i class="fa-solid fa-tags d-inline"></i>
            <p class="d-inline">Diskon {{$item->diskon}} %</p>
            @endif
            <h4 class="m-0"><strong>{{$item->nama}}</strong></h4>
            <p>{{$item->masa}} Bulan</p>
            @if ($item->harga_lama != null)
            <h5><s>Rp {{$item->harga_lama}} ,-</s></h5>
            @endif
          </div>
          <div class="col-4">
            <img src="@if($item->intansi == null) https://lppm.unnes.ac.id/storage/2015/08/Logo-Transparan-Warna-1.png @else {{$item->intansi}} @endif" alt="">
          </div>
        </div>
        <div class="card-body" style="max-height: 275px" >
          <h5 class="card-title text-center"><strong>Rp. {{$item->harga_baru}} ,-</strong></h5>
          <p class="card-text text-truncate">{{$item->deskripsi_singkat}}</p>
        </div>
        <div class="card-footer bg-transparent pl-3 pr-3">
          <div class="d-flex justify-content-between align-items-center">
            <a href="#">more</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#whatsapp{{$item->id}}">
              Beli
            </button>

            <!-- Modal -->
            <div class="modal fade" id="whatsapp{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Perhatian</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Silakan Kirim Chat "produk {{$item->id}}" untuk mulai memesan
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="https://wa.me/085900221521" class="btn btn-primary">Beli</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</main>


<main class="mt-5 text-white p-5" style="background-image: url('https://drive.google.com/uc?export=view&id=1knuU2Rr45Z76vjAM31WN7wxs2UpV4VZk'); height: 500px; background-position: center">
<!-- Ubah benner bawah-->


  <div class="container d-flex align-items-center" style="height: 100%">
    <div class="row align-items-center">
      <div class="col">
        <h2><strong class="text-primary">Rumah Kompetisi</strong> Platinum Class</h2>
        <p>Pelayanan dan Fasilitas Bagi Para Konsumen yang Ingin Berkonsultasi secara Privat dengan para tentor mengenai persiapan lomba</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><strong>Spesial Promo</strong></button>
  
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content p-4 text-black">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <h1 class="text-center"><strong>Promo Platinum</strong></h1>
              <div class="row g-4 justify-content-center">
                @foreach($platinum as $item)
                  <div class="col-lg-4 d-flex justify-content-center">
                    <div class="card overflow-hidden" style="max-width: 20rem; border-radius: 20px; box-shadow: black">
                      <img class="card-img-top img-raised" src="@if($item->background == null) https://drive.google.com/uc?export=view&id=1_Qm6Rr_4dIipg8zsfKemqoIn6SH52Q_u @else {{$item->background}} @endif" alt="Card image cap" style="border-radius: 20px; filter: brightness(70%)">
                      <div class="text-white card-img-overlay overflow-hidden row align-items-center" style="height: 48%">
                        <div class="col-8">
                          @if ($item->diskon != null)
                          <i class="fa-solid fa-tags d-inline"></i>
                          <p class="d-inline">Diskon {{$item->diskon}} %</p>
                          @endif
                          <h3 class="m-0"><strong>{{$item->nama}}</strong></h3>
                          <p>{{$item->masa}} Bulan</p>
                          @if ($item->harga_lama != null)
                          <h4><s>Rp {{$item->harga_lama}} ,-</s></h4>
                          @endif
                        </div>
                        <div class="col-4">
                          <img src="@if($item->intansi == null) https://lppm.unnes.ac.id/storage/2015/08/Logo-Transparan-Warna-1.png @else {{$item->intansi}} @endif" alt="">
                        </div>
                      </div>
                      <div class="card-body" style="max-height: 275px" >
                        <h5 class="card-title text-center"><strong>Rp. {{$item->harga_baru}} ,-</strong></h5>
                        <p class="card-text text-truncate">{{$item->deskripsi_singkat}}</p>
                      </div>
                      <div class="card-footer bg-transparent pl-3 pr-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <a href="#">more</a>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#whatsapp{{$item->id}}">
                            Beli
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="whatsapp{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><strong>Perhatian</strong></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Silakan Kirim Chat "produk {{$item->id}}" untuk mulai memesan
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="https://wa.me/085900221521" class="btn btn-primary">Beli</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="position-relative col-4 hilang" style="left: 8vh; bottom: 17vh;">
        <img style="width: 20vw; border-radius: 20px;" class="img-raised" src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
      </div>
    </div>
  </div>
</main>
<main class="container mt-5">
  <div class="row">
    <div class="col-lg-7">
      <h3 class="text-primary">Rumah Kompetisi</h3>
      <h1><strong>Mengapa Kami ?</strong></h1>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit sint, quo magni sit inventore et necessitatibus delectus similique laudantium molestias modi voluptate tempore mollitia dolore, obcaecati voluptas, assumenda accusantium esse.</p>
    </div>
    <div class="col-lg-5">
      <div class="row mb-2">
        <div class="col-2">
          <div class="d-flex bg-primary rounded-circle text-white" style="width: 40px; height:40px;">
            <i class="fa-solid fa-book-bookmark m-auto"></i>
          </div>
        </div>
        <div class="col">
          <h6>Terpercaya</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, voluptatum.</p>
        </div>
      </div>
      <div class="row  mb-2">
        <div class="col-2">
          <div class="d-flex bg-primary rounded-circle text-white" style="width: 40px; height:40px;">
            <i class="fa-solid fa-clock m-auto"></i>
          </div>
        </div>
        <div class="col">
          <h6>Terpercaya</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, voluptatum.</p>
        </div>
      </div>
      <div class="row  mb-2">
        <div class="col-2">
          <div class="d-flex bg-primary rounded-circle text-white" style="width: 40px; height:40px;">
            <i class="fa-solid fa-user-tie m-auto"></i>
          </div>
        </div>
        <div class="col">
          <h6>Terpercaya</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, voluptatum.</p>
        </div>
      </div>
    </div>
  </div>
</main>
<main class="container mt-5">
  <div class="container">
    <div class="row">
      <div class="MultiCarousel" data-items="1,2,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
              <div class="MultiCarousel-inner">
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="position-relative d-flex text-white">
                      <div class="filter filter-dark">
                        <img src="https://drive.google.com/uc?export=view&id=1l1qCGKEVl6QyrueHDiIxzP54gpKxPmWQ" alt="">
                      </div>
                      <div class="position-absolute text-center" style="left: 50%; bottom: 0; transform: translate(-50%, 0);">
                        <h4><strong>Nama Saya</strong></h4>
                        <p>adalah mentor ternama</p>
                      </div>
                    </div>
                  </div>
              </div>
              <button class="btn btn-primary leftLst btn-icon"><i class="fa-solid fa-arrow-left"></i></button>
              <button class="btn btn-primary rightLst btn-icon"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
    </div>
  </div>

  <h1 class="mt-5 mb-5 text-center"><strong>Q n A</strong></h1>
</main>
<main class="mt-5 p-5" style="background-color:rgba(128, 128, 128, 0.3);">
  <div class="container overflow-hidden pt-4" style="background-color: white; border-radius : 20px;">
    <div>
      <p>
        <a style="width: 100%" class="btn btn-primary btn-round" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
          tanya 1
        </a>
      </p>
      <div class="collapse" id="collapseExample1">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
    <div>
      <p>
        <a style="width: 100%" class="btn btn-primary btn-round" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
          tanya 2
        </a>
      </p>
      <div class="collapse" id="collapseExample2">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
  </div>
</main>
@endsection