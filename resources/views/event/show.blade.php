@extends("layout.main")

@section("main")
<div class="wrapper">
    <div class="page-header clear-filter home-header" style="overflow: unset">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://drive.google.com/uc?export=view&id=1RoLc6VuXj7AepMTCtjY1UGqTRd0FwL7S'); filter : brightness(100%);"></div>
    <!-- Menghilangkan filter color, merubah benner-->
    
    
        <div class="container d-flex align-items-center">
            <div class="row align-items-center">
            <div class="col" style="text-align: start!important;">
                <h3><strong>Rumah Kompetisi</strong></h3> 
                <p>Belajar Riset dan Menulis Karya Ilmiah dengan Mudah serta Menyenangkan Membangun Ekosistem Keilmiahan dan Penelitian Untuk Mencetak Inovator Muda Indonesia</p>
            </div>
                <!--menambah tulisan-->
    
            <div class="position-relative col-4 hilang" style="left: 2vh; top: 15vh;">
                <img style="max-width: 30vw;" class="img" src="https://drive.google.com/uc?export=view&id=1czQc83UhJ1LxJIbR2H_ewCDA5Vpi-x-T" alt="">
            </div>
            </div>
        </div>
        </div>
    </div>
<div class="container mt-5 mb-5">
    <div class="mt-5 mb-5 d-flex align-items-end justify-content-center" style="min-height: 250px;">
        <h1 class="text-center"><strong>{{$event->title}}</strong></h1>
    </div>
    <img class="img-fluid img-raised mx-auto d-block rounded" style="max-height:30vh; cursor:pointer" src="/storage/{{$event->poster}}" data-toggle="modal" data-target="#exampleModal">
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$event->title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid mx-auto d-block rounded" src="/storage/{{$event->poster}}">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</div>
<main class="container">
    {!!$event->deskripsi!!}

    <div class="mt-3">
        <h6><strong>Waktu Mulai</strong></h6>
        <p>{{\Carbon\Carbon::parse($event->start)->format('l jS \of F Y h:i:s A')}}</p>
        <h6><strong>Waktu Selesai</strong></h6>
        <p>{{\Carbon\Carbon::parse($event->end)->format('l jS \of F Y h:i:s A')}}</p>
    </div>
</main>
@endsection