@extends('layouts.master')

@section('head.title')
All user
@stop
@section('head.menu')
@include('admin.slide_menu')
@stop

@section('body.content')
<div id="content">
	<div class="container-fuild">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>UID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Birthday</th>
									<th>Address</th>
									<th>ClassID</th>
									<th>GradeID</th>
									<th>CMND</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->firstName.' '.$user->lastName }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->birthday }}</td>
										<td>{{ $user->address }}</td>
										<td>{{ $user->class_id }}</td>
										<td>{{ $user->grades_id }}</td>
										<td>{{ $user->cmnd }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					{!! $users->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer.js')
<script type="text/javascript" src="{{asset('js/admin/slidebar.js')}}"></script>
@stop