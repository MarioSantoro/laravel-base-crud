@extends('layout.app')

@section('title', 'Home')

@section('main-section')

<div class=" m-0 p-0">
    <div class="row m-0 p-0">
        <div class="col-12 position-relative home-jumbo p-5 d-flex align-items-start justify-content-center flex-column">
            <h1 class="my_h1 ms-5 mb-3">
                Vuoi vivere un'esperienza magnifica?
            </h1>
            <a class="btn btn-primary ms-5" href="{{route('admin.index')}}">Visit our shores list</a>
        </div>
    </div>
</div>
@endsection
