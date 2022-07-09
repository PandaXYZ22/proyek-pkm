@extends("layout.main")
@section("main")
<div class="wrapper">
    <div class="page-header clear-filter home-header" style="overflow: unset">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://drive.google.com/uc?export=view&id=1RoLc6VuXj7AepMTCtjY1UGqTRd0FwL7S'); filter : brightness(100%);"></div>
    <!-- Menghilangkan filter color, merubah benner-->
    
    
        <div class="container d-flex align-items-center">
            <div class="row align-items-center">
            <div class="col" style="text-align: start!important;">
                <h3><strong>Temukan Seminar Lomba Dan Lain Sebagainya</strong></h3> 
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
    <div class="mt-5 mb-5 d-flex" style="height: 325px">
        <h1 class="m-auto"><strong>Kalender Event Rumah Kompetisi</strong></h1>
    </div>
    <form action="/even" class="form-group mb-5 mt-5">
        <input type="text" class="form-control col" name="title" placeholder="Cari Event" aria-label="Cari Event" aria-describedby="button-addon2">
    </form>
    <div id='calendar' style="height: 65vh"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        height: 'parent',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'listMonth,dayGridMonth,timeGridDay',
        },
        defaultView: 'dayGridMonth',
        navLinks: true,
        eventLimit: true,
        events: {!!$event!!},
        eventColor : "orange",
        eventClick: function(info) {
            window.location.href = "/even/" + info.event.id;
        }
        });

        calendar.render();
    });
</script>
@endsection