@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-circle-fill mr-1"></i> {{$message }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger"><i class="bi bi-exclamation-triangle-fill mr-1"></i> {{$message }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning"><i class="bi bi-exclamation-triangle-fill mr-1"></i> {{$message }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info"><i class="bi bi-info-circle-fill mr-1"></i> {{$message }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
    @endforeach
</div>
@endif

@if (Session::has('validationErrors'))
    <div class="alert alert-danger">
        @foreach (Session::get('validationErrors') as $item)
            @foreach ($item as $err)
                <ul>
                    <li>{{ $err }}</li>
                </ul>
            @endforeach
        @endforeach
    </div>
@endif
