@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>
        There are some problems with your input.<br/><br/>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
@endif

@if (session('success'))
    <div class="alert alert-success mt-2" role="alert"><strong class="text-capitalize">Success!</strong> {{ session('success') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert"><strong class="text-capitalize">Danger!</strong> {{ session('error') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif




