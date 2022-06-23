@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.edit')}} {{$category->name."'s" }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.edit')}} {{$category->name."'s" }}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('categories.index')}}">{{trans('site.categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.edit')}} {{$category->name."'s" }}</li>
@endsection

{{-- Content --}}
@section('content')
    <section class="categories-form-page section">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-form">

                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.edit')}} {{$category->name."'s" }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.update', ['id' => $category->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$category->name}}" placeholder="Type name of category">
                            </div>
                        </div> --}}

                        <div class="card-body">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    @if (count(config('translatable.locales')) > 1)
                                        <label for="name">{{ trans('site.' . $locale . '.name') }}</label>

                                    @else
                                        <label for="name">{{ trans('site.name') }}</label>
                                    @endif
                                    <input class="form-control" type="text" id="name" name="{{ $locale }}[name]" placeholder="{{trans('site.type')}} {{ trans('site.' . $locale . '.name') }}" value="{{$category->translate($locale)->name}}" required>
                                </div>

                            @endforeach

                        </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-crayons">
                            {{trans('site.edit')}}
                        </button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
