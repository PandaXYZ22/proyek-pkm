@extends("layout.main")

@section ("main")
<div class="wrapper">
    <div class="page-header clear-filter home-header" style="overflow: unset">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://drive.google.com/uc?export=view&id=1RoLc6VuXj7AepMTCtjY1UGqTRd0FwL7S'); filter : brightness(100%);"></div>
    <!-- Menghilangkan filter color, merubah benner-->


        <div class="container d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col" style="text-align: start!important;">
            <h3><strong>Rumah Kompetisi</strong></h3> 
            <p>Media pembelajaran atau platform pusat pelatihan skill untuk berbagai kompetisi mahasiswa yang bertujuan membantu mewujudkan prestasi yang ingin dicapai serta solusi terbaik meningkatkan motivasi belajar untuk mecapai kesuksesan.</p>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-lg-4">
            <img src="https://drive.google.com/uc?export=view&id=1mwJVmVAvB77AJq03oA-AuwXTjWWHSpVQ" alt="">
            <h4 class="text-center"><strong>Achmad Nauval Waliuddin</strong></h4>
            <p class="text-center">Co-Founder Rumah Kompetisi</p>
        </div>
        <div class="col-lg-1 d-flex justify-content-center">
            <div style="width: 1px; background-color : black; height:100%;"></div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
            <div>
                <h1><strong>Rumah Kompetisi</strong></h1>
                <p class="text-justify">
                    Rumah Kompetisi merupakan platform pelatihan dan pengembangan skill mahasiswa
                    yang menawarkan berbagai layanan mengenai pelatihan dalam kepenulisan seperti  
                    riset, entrepreneur, dan persiapan berbagai bentuk perlombaan baik nasional
                    maupun Internasional. Kami siap membantu dan membimbing para mahasiswa
                    dalam berkompetisi dan mewujudkan prestasi yang ingin dicapai.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div>
                <h4><strong>Visi</strong></h4>
                <p class="text-justify">Untuk memberikan layanan belajar bermutu dengan harga terjangkau,</p>
                <p class="text-justify">memaksimalkan mutu dan mewujudkan lapangan kerja bagi tenaga pendidik,</p>
                <p class="text-justify">serta memudahkan mahasiswa, tenaga pendidik, dalam kegiatannya melalui teknologi pendidikan Rumah Kompetisi.</p>
            </div>
            <div>
                <h4><strong>Misi</strong></h4>
                <p class="text-justify">Untuk memudahkan mahasiswa mendapatkan mentoring yang bermutu dengan memanfaatkan teknologi dimana pun dan kapan pun.</p>
            </div>
            <div>
                <h4 class="text-center"><strong>Kontak</strong></h4>
                <div class="d-flex justify-content-around">
                    <a href="https://api.whatsapp.com/send?text=http://www.google.com/"><button class="btn btn-primary btn-icon btn-round">
                        <i class="fa-brands fa-whatsapp"></i>
                    </button></a>
                    <a href="http://www.twitter.com/share?url=http://www.google.com/"><button class="btn btn-primary btn-icon btn-round">
                        <i class="fa-brands fa-twitter"></i>
                    </button></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.google.com"><button class="btn btn-primary btn-icon btn-round">
                        <i class="fa-brands fa-facebook-f"></i>
                    </button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h4 class="text-center"><strong>FAQ</strong></h4>

            <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse overflow-auto scroll-hilang" style="max-height: 500px">
            @foreach($pertanyaan as $item)
            <div class="card p-3 card-plain border border-gray-500">
                <a class="collapsed text-decoration-none text-center" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                <div class="card-header" role="tab" id="heading{{$item->id}}">
                    {{$item->pertanyaan}}
            
                </div>
                </a>
                <div id="collapse{{$item->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$item->id}}">
                <div class="card-body">
                    {{$item->jawaban}}
                </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
