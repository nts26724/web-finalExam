<!--edit product-->

@extends('admin_layout')

@section('head')
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên Sản phẩm</label>
                <input type="text"  value="{{$product->name}}" name="name" class="form-control" id="menu" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select name="menu_id" class="form-control">
                    <option value="0">Chọn danh mục</option>
                        @foreach($menus as $menu)
                         <option value="{{$menu->id}}"
                         {{$product->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <input type="text" name="description" class="form-control" id="description" value="{{$product->description}}" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" class="form-control" id="content">{{$product->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Ảnh hiện tại</label>
                <div>
                    <img src="{{asset('uploads/'.$product->image)}}" alt="" style="width: 100px">
                </div>
                <input type="file" value="{{$product->image}}" name="image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input value="{{$product->quantity}}" type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity">
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <select name="active" class="form-control">
                    <option value="0" {{$product->active== 0 ? 'selected' : ''}}>Ẩn</option>
                    <option value="1" {{$product->active== 1 ? 'selected' : ''}}>Hiện</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

@endsection

@section('footer')
<script>
        CKEDITOR.replace('content');
    </script>
@endsection
