@extends('layouts.master')

@section('head.title')
Add class
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
					<div class="panel-heading">Add class</div>
					<div class="panel-body">
						<form action="{{ route('add.class') }}" method="post">
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
								<label for="class_name">Name</label>
								<input type="text" name="class_name" value="{{ old('class_name') }}" id="class_name" class="form-control">
							</div>
							<div class="form-group">
								<label for="class_info">Info</label>
								<textarea id="class_info" name="class_info" class="form-control" rows="10"></textarea>
							</div>
							<div class="form-group">
								<label for="grades_id">Grade</label>
								<select name="grades_id" id="grades_id" class="form-control">
									@foreach($grades as $grade)
										<option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
									@endforeach
								</select>
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