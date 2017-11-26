{{-- @if(count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif --}}

@if(count($errors))
  <div class="row">
    <div class="col-xs-offset-4 col-xs-4">
      <div class="alert bg-danger" role="alert">
        @foreach($errors->all() as $error)
          <em class="fa fa-lg fa-warning">&nbsp;</em>{{ $error }}<a href="#" class="pull-right"><em class="fa fa-lg fa-close" data-dismiss="alert" aria-label="Close"></em></a>
        @endforeach
      </div>
    </div>
  </div><!--/.row-->
@endif
