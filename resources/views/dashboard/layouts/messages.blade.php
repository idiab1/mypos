{{-- Any Errors --}}
@if ($errors->any())
    <div class="alert alert-danger mb-3 mt-3">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

{{-- Errors --}}
@if (session('error'))
    <div class="alert alert-danger mb-3 mt-3">
        {{session('error')}}
    </div>
@endif

{{-- Status --}}
@if (session('status'))
    <div class="alert alert-success mb-3 mt-3">
        {{session('status')}}
    </div>
@endif
