@extends('layouts.master')

@section('head.title')
Add grade
@stop

@section('head.menu')
@include('admin.slide_menu')
@stop

@section('body.content')
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Add grade</div>
					<div class="panel-body">
						<form action="{{ route('add.grade') }}" method="post">
							@if(count($errors) > 0)
								<div class="alert alert-danger"> 
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							@if(Session::has('msg'))
								<div class="alert alert-success">
									{{ Session::get('msg') }}
								</div>
							@endif
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<label for="grade_name">Name</label>
								<input type="text" name="grade_name" value="{{ old('grade_name') }}" id="grade_name" class="form-control">
							</div>
							<div class="form-group">
								<label for="grade_info">Info</label>
								<textarea id="grade_info" name="grade_info" class="form-control" rows="10"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
								<button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
							</div>
						</form>
					</div> <!-- end panel-body -->
				</div> <!-- end panel -->
			</div> <!-- end col-md -->
		</div> <!-- end row -->
	</div>
</div>
@stop
@section('footer.js')
<script type="text/javascript" src="{{ asset('js/admin/slidebar.js') }}"></script>
@stop