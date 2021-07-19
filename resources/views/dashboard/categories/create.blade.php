@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.create_new_category')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.create_new_category')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('categories.index')}}">{{trans('site.categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.create_new_category')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="categories-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.create_new_category')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    @if (count(config('translatable.locales')) > 1)
                                        <label for="name">{{ trans('site.' . $locale . '.name') }}</label>

                                    @else
                                        <label for="name">{{ trans('site.name') }}</label>
                                    @endif
                                    <input class="form-control" type="text" id="name" name="{{ $locale }}[name]" placeholder="{{trans('site.type')}} {{ trans('site.' . $locale . '.name') }}" required>
                                </div>

                            @endforeach

                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> {{ trans('site.add') }}</button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
