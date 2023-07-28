@extends('layout.app')

@section('title', 'Home')

@section('main-section')
    <div class="container-modal " id="delete_modal">
        <div class="modale">
            <div class="header">
                <h1 class="fw-semibold fs-4 m-0 text-white"> Are you sure to delete this shore? </h1>
            </div>
            <div class="button d-flex justify-content-center align-items-end h-100 gap-3 pb-4">
                    <button class="btn btn-danger" id="delete_cofirm">Yes</button>
                    <button class="btn btn-success" id="delete_undo">No</button>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @if(session('deleted'))
                <div class="alert alert-danger">
                    Hai Eliminato {{ session('deleted') }}
                </div>
                @elseif(session('restored'))
                <div class="alert alert-success">
                    Hai Ripristinato {{ session('restored') }}
                </div>
                @endif
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Umbrellas - Bed</th>
                            <th scope="col">Volley Field</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shores as $shore)
                        <tr>
                            <th scope="row">{{ $shore->id }}</th>
                            <td>{{ $shore->name }}</td>
                            <td>{{ $shore->location }}</td>
                            <td>{{ $shore->beach_umbrella }} - {{ $shore->beach_bed }}</td>
                            <td>{{ ($shore->has_volley_field == 1) ? 'Yes' : 'No' }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.show', $shore->id) }}">View</a>
                                <a href="{{ route('admin.edit', $shore->id) }}" class="btn btn-warning">Edit</a>
                                <form class="d-inline-block ivy_delete_form" action="{{ route('admin.destroy', $shore->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $shores->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('customScript')
<script>
    let controll;
    const buttonElement = document.getElementById('delete_modal');
    const button1 = document.getElementById('delete_cofirm');
    const button2 = document.getElementById('delete_undo');
    const formElements = document.querySelectorAll('form.ivy_delete_form');

    formElements.forEach(formElement => {
        formElement.addEventListener('submit', function(event) {
            event.preventDefault();
            buttonElement.classList.add('active')
            showConfirmationModal().then((result) => {
                if (result) {
                    this.submit();
                }
            });
        });
    });

    function showConfirmationModal() {
        return new Promise(function(resolve, reject) {
            button1.addEventListener("click", function() {
                buttonElement.classList.remove('active')
                resolve(true);
            });
            button2.addEventListener("click", function() {
                buttonElement.classList.remove('active')
                resolve(false);
            });
        });
    }
</script>
@endsection