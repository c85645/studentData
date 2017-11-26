@if(count($errors))
  <div class="row">
    <div class="col-xs-offset-4 col-xs-4">
      @foreach($errors->all() as $error)
        <div class="alert bg-danger" role="alert">
          <em class="fa fa-lg fa-warning">&nbsp;</em>{{ $error }}<a href="#" class="pull-right"><em class="fa fa-lg fa-close" data-dismiss="alert" aria-label="Close"></em></a>
        </div>
      @endforeach
    </div>
  </div><!--/.row-->
@endif
