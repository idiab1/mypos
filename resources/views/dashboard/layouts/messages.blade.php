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

{{-- Success --}}
@if (session('success'))
    <div class="alert alert-success mb-3 mt-3">
        {{session('success')}}
    </div>
@endif

{{-- @if (session('success'))
{{-- <div class="d-flex justify-content-center align-items-center m-4" aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">

    <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">{{__('success')}}</strong>
            <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
            {{session('success')}}
        </div>
    </div>
</div>



@endif --}}
