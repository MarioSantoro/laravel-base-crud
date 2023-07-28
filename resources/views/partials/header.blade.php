<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <img src="https://freepngimg.com/thumb/beach/28398-7-beach-transparent.png" alt="SHores Database Control Panel" class="ivy_logo">
                Shores Database
            </a>
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.create') }}" class="btn btn-primary">Add a new shore</a>
                <a href="{{ route('admin.trashed') }}" class="btn btn-danger ms-2">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        </div>
    </nav>
</header>