@extends('backend.layouts.app')@section('partial')    @include('backend.element.partials', ['path_source' => 'Bài viết', 'path_target' => 'Thêm mới'])@endsection@section('content')    <div id="widget-grid" class="">        <div class="row">            <article class="col-sm-9 sortable-grid ui-sortable">                <div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">                    <header role="heading" class="ui-sortable-handle"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>                        <h2>{{__("Add")}}</h2>                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>                    <!-- widget div-->                    <div role="content">                        <!-- widget content -->                        <div class="widget-body no-padding">                            <form action="{{url('/admin/post/store')}}" method="post" class="smart-form" enctype="multipart/form-data">                                @csrf                                <fieldset>                                    <section>                                        <label class="label">{{__("Title")}}</label>                                        <label class="input">                                            <input type="text" name="title">                                        </label>                                    </section>                                    <section>                                        <label class="label">{{__("Content")}}</label>                                        <label class="input">                                            <textarea name="post_content"></textarea>                                        </label>                                    </section>                                    <section>                                        <label class="label">{{__("Thumbnail")}}</label>                                        <label class="input">                                            <input type="file" name="thumbnail"></input>                                        </label>                                    </section>                                    <section>                                        <label class="label">{{__("Tag")}}</label>                                        <label class="input">                                            <input type="text" name="tag">                                        </label>                                    </section>                                    <section>                                        <label class="label">{{__("Category")}}</label>                                        <label class="input">                                            <select name="category_id">                                                @foreach(App\Models\Category::getCategory() as $c)                                                    <option  value="{{$c['id']}}">{{$c['name']}}</option>                                                @endforeach                                            </select>                                        </label>                                    </section>                                </fieldset>                                <footer>                                    <button type="submit" class="btn btn-primary">                                        Thêm mới                                    </button>                                    <button type="button" class="btn btn-default" onclick="window.history.back();">                                        {{__("Back")}}                                    </button>                                </footer>                            </form>                        </div>                        <!-- end widget content -->                    </div>                    <!-- end widget div -->                </div>            </article>        </div>    </div>@endsection@section('script')    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>    <script>        var editor = CKEDITOR.replace( 'post_content' );        CKFinder.setupCKEditor( editor );    </script>@endsection