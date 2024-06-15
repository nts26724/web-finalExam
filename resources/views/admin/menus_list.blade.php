@extends('admin_layout')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <table class="table">
        <thread>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên Danh Mục</th>
                <th>Trạng thái</th>
                <th>Ngày cập nhật</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
            <tbody>
                {!! \App\Helpers\Helper::menu($menus) !!}
            </tbody>
        </thread>
    </table>
@endsection

