@extends('layouts.app')

@section('styles')
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Mapa</a>
        </div>
        <h1>Mapa</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Mapa de desplazamientos</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        {{--<p>--}}
                            {{--<a href="/drivers/create" class="btn btn-success">--}}
                                {{--<i class="icon-plus"></i> Nuevo conductor--}}
                            {{--</a>--}}
                        {{--</p>--}}

                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap">
    </script>
    <script>
        function initMap() {
            var centerLocation = { lat: -8.11187773, lng: -79.02561056 };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: centerLocation
            });

            $.getJSON('/api/trucks', function (data) {
                for (var i=0; i<data.length; ++i) {
                    new google.maps.Marker({
                        position: data[i],
                        map: map
                    });
                }
            });
        }
    </script>
@endsection