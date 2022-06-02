@extends('layouts.starlight')

@section('product')
active
@endsection

@section('title')
Product
@endsection

@section('content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="{{url('/subcategory')}}">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Product List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Discount %</th>
                                <th>Discount Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($products as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->discount}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>{{substr($product->description, 0, 20).'....'}}</td>
                                <td>
                                    <img width="50" src="{{asset('uploads/products/preview')}}/{{$product->product_image}}" alt="">
                                </td>

                                <td>
                                    <a href="{{route('inventory', $product->id)}}" class="btn btn-info">Inventory</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/product/insert')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <div class="mt-2">
                                <select name="category_id" class="form-control select_category">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="subcategory_id" class="form-control subcategory">
                                    <option value="">-- Select Subcategory --</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Price</label>
                                <input type="text" name="product_price" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Discount %</label>
                                <input type="text" name="discount" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Description</label>
                                <textarea id="summernote" class="form-control" name="description" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="product_image">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Product Thumbnails</label>
                                <input multiple type="file" class="form-control" name="product_thumb[]">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>

    </div>
</div>

@endsection

@section('footer_script')
<script>
    $('.select_category').change(function(){
        var category_id = $(this).val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getSubcategory',
            data:{category_id:category_id},
            success:function(data){
                $('.subcategory').html(data);
            }
        })
    });

    // Select2
    $(document).ready(function() {
        $('.select_category').select2();
    });

    // Summernot
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection