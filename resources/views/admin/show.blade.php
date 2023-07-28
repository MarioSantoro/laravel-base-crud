@extends('layout.app')

@section('title', 'Home')

@section('main-section')
    <div class="container py-5">
        <div class="row">
            <div class="col-8 m-auto">
                @if(session('created'))
                <div class="alert alert-success">
                    Hai Creato {{ session('created') }}
                </div>
                @endif
                <div class="card bg-dark text-white">
                    <img class="card-img-top card-show" src="{{ $shore->thumb }}" alt="{{ $shore->name }}">
                    <h5 class="card-header border-white py-2 px-4 fs-3">{{ $shore->name }}</h5>
                    <div class="card-body px-4 fs-4">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $shore->location }}</h5>
                            <p class="card-text">From {{ $shore->opening_date }} To {{ $shore->closing_date }}</p>
                        </div>
                        <div class="d-flex justify-content-between pt-4">
                            <div class="d-flex flex-column ">
                                <p class="card-text">
                                    {{ $shore->daily_price }}
                                    <i class="fa-solid fa-euro-sign text-warning"></i>
                                </p>
                                <p class="card-text">
                                    @if($shore->has_soccer_field == 1)
                                    <p class="text-success">
                                        Soccer Field avaible
                                        <i class="fa-solid fa-futbol "></i>
                                    </p>

                                    @else
                                    <p class="text-danger">
                                        Soccer Field not avaible
                                        <i class="fa-solid fa-futbol "></i>
                                    </p>
                                    @endif                                    
                                    @if($shore->has_volley_field == 1)
                                    <p class="text-success">
                                        Volleyball Field avaible
                                        <i class="fa-solid fa-futbol "></i>
                                    </p>

                                    @else
                                    <p class="text-danger">
                                        Volleyball Field not avaible
                                        <i class="fa-solid fa-futbol "></i>
                                    </p>
                                    @endif  
                                </p>
                            </div>
                            <div class="d-flex flex-column">
                                <p class="card-text">
                                    {{ $shore->beach_umbrella }}
                                    <i class="fa-solid fa-umbrella-beach"></i>
                                </p>
                                <p class="card-text">
                                    {{ $shore->beach_bed }}
                                    <i class="fa-solid fa-chair"></i>
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Return To Shores List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection