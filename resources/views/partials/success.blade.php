@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Успешно!</h4>

        <p>{{ Session::get('success') }}</p>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif