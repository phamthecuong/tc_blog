@if (session()->has('sucess'))<div class="alert alert-block alert-success">    <a class="close" data-dismiss="alert" href="#">×</a>    <h4 class="alert-heading"><i class="fa fa-check-square-o"></i> {{session()->get('sucess')}}!</h4></div>@elseif(session()->has('error'))    <div class="alert alert-block alert-danger">        <a class="close" data-dismiss="alert" href="#">×</a>        <h4 class="alert-heading"><i class="fa fa-check-square-o"></i> {{session()->get('error')}}!</h4>    </div>@endif