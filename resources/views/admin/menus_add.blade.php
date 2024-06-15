@extends('admin_layout')

@section('head')
    <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" id="menu" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Danh Mục Cha</label>
                <select name="parent_id" class="form-control">
                    <option value="0">Danh Mục Cha</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" class="form-control" id="content"></textarea>
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <select name="active" class="form-control">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
