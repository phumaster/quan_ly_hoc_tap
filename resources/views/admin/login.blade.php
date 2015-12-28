@extends('layouts.master')

@section('head.title')

Login into admin

@stop

@section('body.content')
<div id="content">
	<div class="container-fuild">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading">Login</div>
						<div class="panel-body">
							<form action="{{ route('admin.login') }}" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								@if(count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control">
								</div>
								<div class="form-group">
									<button type="submit" name="btnLogin" class="btn btn-primary btn-block">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop