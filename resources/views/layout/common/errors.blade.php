@if (session('status'))
  <div class="row">
    <div class="col-xs-offset-2 col-xs-6">
      <div class="alert bg-success" role="alert">
        <em class="fa fa-lg fa-success">&nbsp;</em>{{ session('status') }}<a href="#" class="pull-right"><em class="fa fa-lg fa-close" data-dismiss="alert" aria-label="Close"></em></a>
      </div>
    </div>
  </div>
@endif
@if(count($errors))
  <div class="row">
    <div class="col-xs-offset-2 col-xs-6">
      @foreach($errors->all() as $error)
      <div class="alert bg-danger" role="alert">
        <em class="fa fa-lg fa-warning">&nbsp;</em>{{ $error }}<a href="#" class="pull-right"><em class="fa fa-lg fa-close" data-dismiss="alert" aria-label="Close"></em></a>
      </div>
      @endforeach
    </div>
  </div>
@endif
