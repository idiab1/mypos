@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Create New Category')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{__('Create New Category')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('categories.index')}}">@lang('site.categories')</a></li>
    <li class="breadcrumb-item active">Create New Category</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="categories-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Create New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    @if (count(config('translatable.locales')) > 1)
                                        <label for="name">@lang('site.' . $locale . '.name')</label>

                                    @else
                                        <label for="name">@lang('site.name')</label>
                                    @endif
                                    <input class="form-control" type="text" id="name" name="{{ $locale }}[name]" placeholder="Type name of category" required>
                                </div>

                            @endforeach

                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> @lang('site.add')</button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
