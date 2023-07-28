@extends('layout.app')

@section('title', 'Home')

@section('main-section')
    <div class="container py-5">
        <div class="row">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="col-8 m-auto ivy_form" action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="shoreName">Company Name</label>
                    <input type="text" class="form-control" id="shoreName" placeholder="Enter the name of your company" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shoreLocation">Location</label>
                    <input type="text" class="form-control" id="shoreLocation" name="location" placeholder="Enter the location of your company" value="{{ old('location') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shoreUmbrella">Number of Beach Umbrellas</label>
                    <input type="number" class="form-control" id="shoreUmbrella" name="beach_umbrella" placeholder="Enter the numbre of your beach umbrellas" value="{{ old('beach_umbrella') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shoreBeds">Number of Beach Beds</label>
                    <input type="number" class="form-control" id="shoreBeds" name="beach_bed" placeholder="Enter the numbre of your beach beds" value="{{ old('beach_bed') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shorePrice">Daily Price</label>
                    <input type="text" class="form-control" id="shorePrice" name="daily_price" placeholder="Enter the daily price" value="{{ old('daily_price') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shoreOpening">Opening Date</label>
                    <input type="text" class="form-control" id="shoreOpening" name="opening_date" placeholder="Enter the opening date" value="{{ old('opening_date') }}">
                </div>
                <div class="form-group m-2">
                    <label for="shoreClosing">Closing Date</label>
                    <input type="text" class="form-control" id="shoreClosing" name="closing_date" placeholder="Enter the closing date" value="{{ old('closing_date') }}">
                </div>
                <div class="form-group m-2">
                    <label class="me-2" for="shoreVolley">Do you have a volleyball field?</label>
                    <input type="checkbox" id="shoreVolley" name="has_volley_field">
                </div>
                <div class="form-group m-2">
                    <label class="me-2" for="shoreSoccer">Do you have a soccer field?</label>
                    <input type="checkbox" id="shoreSoccer" name="has_soccer_field">
                </div>
                <button type="submit" class="btn btn-primary ms-2 ">Add</button>
                <button type="reset" class="btn btn-warning ms-2">Reset</button>
            </form>
        </div>
    </div>
@endsection