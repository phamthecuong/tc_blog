@extends('backend.layouts.app')@section('partial')    @include('backend.element.partials', ['path_source' => 'Danh mục', 'path_target' => 'Chi tiết'])@endsection@section('content')    <div id="widget-grid" class="">        <div class="row">            <article class="col-sm-12 sortable-grid ui-sortable">                @include('backend.element.notifi')                <div role="content">                    <div class="padding-5"><a href="{{route('backend.category.index')}}" class="btn btn-info add-new">Quay lại</a></div>                    <div class="widget-body padding-5">                        <div class="table-responsive">                            @if ($posts->count() > 0)                                <table class="table table-bordered">                                    <thead>                                    <tr>                                        <th>{{__("Stt")}}</th>                                        <th>{{__("Title")}}</th>                                        <th>{{__("Thumbnail")}}</th>                                        <th>{{__("View")}}</th>                                        <th>{{__("Category")}}</th>                                        <th>{{__("Created by")}}</th>                                        <th width="127px">{{__("Action")}}</th>                                    </tr>                                    </thead>                                    <tbody>                                    @foreach($posts as $k =>$p)                                        <tr>                                            <td>{{$k}}</td>                                            <td>{{$p->title}}</td>                                            <td><img style="width: 70px;height:60px;" src="{{asset('upload/'.$p->thumbnail)}}" alt=""></td>                                            <td>0</td>                                            <td>{{$p->category->name}}</td>                                            <td>{{$p->user->email}}</td>                                            <td>                                                <a href="#"><i class="fas fa-eye fa-lg"></i></a>                                                <a href="{{url('admin/post/edit/'.$p->id)}}" class=""><i class="fas fa-edit fa-lg"></i></a>                                                <a class="" href="{{url('admin/post/delete/'.$p->id)}}"><i class="fas fa-trash-alt fa-lg"></i></a>                                            </td>                                        </tr>                                    @endforeach                                    </tbody>                                </table>                                {{--<div class="pagination pull-right">{{$posts->links()}}</div>--}}                            @else                                <div class="text-center text-muted"><h3>Không có bài viết nào !</h3></div>                            @endif                        </div>                    </div>                </div>            </article>        </div>    </div>@endsection