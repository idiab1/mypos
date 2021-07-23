@extends('dashboard.layouts.app')

{{-- Styles --}}
@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>
@endsection

{{-- Title --}}
@section('title')
    {{trans('site.create_new_product')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.create_new_product')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('products.index')}}">{{trans('site.products')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.create_new_product')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="products-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.create_new_product')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="categories">{{ trans('site.categories') }}</label>
                                <select class="form-control select2 searchable" name="category_id" id="categories">
                                    <option value="" >{{trans('site.all_categories')}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    @if (count(config('translatable.locales')) > 1)
                                        <label for="name">{{ trans('site.' . $locale . '.name') }}</label>

                                    @else
                                        <label for="name">{{ trans('site.name') }}</label>
                                    @endif
                                    <input class="form-control" type="text" id="name" name="{{ $locale }}[name]" placeholder="{{trans('site.type')}} {{ trans('site.' . $locale . '.name') }} {{trans('site.for_product')}}" required>
                                </div>
                                <div class="form-group">
                                    @if (count(config('translatable.locales')) > 1)
                                        <label for="description">{{ trans('site.' . $locale . '.description') }}</label>

                                    @else
                                        <label for="description">{{ trans('site.description') }}</label>
                                    @endif
                                    <textarea class="form-control ckeditor" id="description" name="{{ $locale }}[description]" placeholder="{{trans('site.type')}} {{ trans('site.' . $locale . '.description') }} {{trans('site.for_product')}}" required></textarea>
                                </div>

                            @endforeach


                            <div class="form-group">
                                <label for="image">{{ trans('site.image') }}</label>
                                <input class="form-control image" type="file" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <img class="img-thumbnail image-preview" src="{{asset('uploads/products/default.png')}}" style="width: 100px" alt="">
                            </div>
                            <div class="form-group">
                                <label for="purchase_price">{{ trans('site.purchase_price') }}</label>
                                <input class="form-control" type="number" id="purchase_price" name="purchase_price" placeholder="{{trans('site.type_purchase_price')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="sale_price">{{ trans('site.sale_price') }}</label>
                                <input class="form-control" type="number" id="sale_price" name="sale_price" placeholder="{{trans('site.type_sale_price')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="stock">{{ trans('site.stock') }}</label>
                                <input class="form-control" type="number" id="stock" name="stock" placeholder="{{trans('site.type_stock')}}" required>
                            </div>

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

{{-- Scripts --}}
@section('scripts')
    <!--ckeditor standard-->
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();
            CKEDITOR.config.language = "{{app()->getLocale()}}";

            // Image Preview
            $('.image').change(function(){
                if(this.files && this.files[0]){

                    let reader = new FileReader();

                    reader.onload = function(e){

                        $('.image-preview').attr('src', e.target.result);

                    }
                    reader.readAsDataURL(this.files[0]);

                }
            })

        });
    </script>
@endsection
