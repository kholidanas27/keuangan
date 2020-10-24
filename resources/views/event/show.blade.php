@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="card o-hidden">
            <div class="weather-card-1">
                <div class="ul-weather-card__img-overlay">
                    <div class="ul-weather-card__weather-time">
                        <div class="text-white"><span class="display-5">{{ $event->title }}</span>
                            <p>Created by {{ $event->author->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 text-center"">
                            <i class="i-Calendar-4 mr-2"></i> {{ $event->tgl_mulai->format("d F Y") }} - {{ $event->tgl_selesai->format("d F Y") }} 
                        </div>
                        <div class="col-lg-6 col-xl-6 text-center"">
                            <i class="i-Clock mr-2"></i> {{ $event->waktu_mulai->format("H:i") }} - {{ $event->waktu_selesai->format("H:i") }} WIB
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Detail Event
            </div>
            <div class="card-body">
                <p>{!! $event->event !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        .ul-weather-card__img-overlay {
    background: url("{{ asset("storage/" . $event->foto) }}");
    background-size: cover;
    height: 400px;
    background-position-y: center;
    background-repeat: no-repeat;
}

    .ul-weather-card__weather-time{
        position: top; /* Position the background text */
        bottom: 0; /* At the bottom. Use top:0 to append it to the top */
        background: rgb(0, 0, 0); /* Fallback color */
        background: rgba(0, 0, 0, 0.178); /* Black background with 0.5 opacity */
        color: #f1f1f1; /* Grey text */
        width: 100%; /* Full width */
        padding: 20px; /* Some padding */
    }
    </style>

@endsection
