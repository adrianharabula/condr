@extends('layouts.app')

@section('page-colors', 'bg-black white')

@section('content')

@section('title', 'Edit Password')

  <div class="row page black">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading"><b>Edit password </b></div>
        <div class="panel-body">
          <form role="form" action="editpassword.php" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Type the current password" name="oldpass" type="password" >
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Type the new password" name="newpass" type="password">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Retype the new password" name="newpass2" type="password" >
              </div>
              <input name="submitPassword" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown btn-block" type="submit" value="Change">
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

</div>


@endsection