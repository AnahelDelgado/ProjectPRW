<?php $viewData = session()->get('viewData'); ?>

@extends('layout.layout')

@section('imagen')
<img class="avatar" src="<?php echo $viewData['avatar'] ?>" alt="" srcset="">
@endsection

@section('nombre')
<?php echo $viewData['nombre'] ?>
@endsection


@section('content')
<!-- Contenido específico de esta página -->
<div class="content">

</div>
@endsection
@extends('layout.layout')

@section('content')
    <!-- Contenido específico de esta página -->
    <div>
     <div id='calendar'></div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:"es",
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },           
        });
        calendar.render();
    });

</script>
@endpush
