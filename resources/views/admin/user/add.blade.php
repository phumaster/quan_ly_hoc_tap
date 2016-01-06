@extends('layouts.master')

@section('head.title')
Add user
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
					<div class="panel panel-default">
						<div class="panel-heading">Add user</div>
						<div class="panel-body">
							<form action="{{route('add.user')}}" method="post" enctype="multipart/form-data" id="form-add">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								@if(count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{$error}}</li>
											@endforeach
										</ul>
									</div>
								@endif

								@if(Session::has('msg'))
									<div class="alert alert-success">
										{{ Session::get('msg') }}
									</div>
								@endif
								<div class="display-response"></div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
								</div>
								<div class="form-group">
									<label for="firstName">First name</label>
									<input type="text" name="firstName" id="firstName" class="form-control" value="{{old('firstName')}}">
								</div>
								<div class="form-group">
									<label for="lastName">Last name</label>
									<input type="text" name="lastName" id="lastName" class="form-control" value="{{old('lastName')}}">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control">
								</div>
								<div class="form-group">
									<label for="confPassword"> Confirm password</label>
									<input type="password" name="confPassword" id="confPassword" class="form-control">
								</div>
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
								</div>
								<div class="form-group">
									<label for="birthday">Birthday</label>
									<input type="text" name="birthday" id="birthday" class="form-control" value="{{old('birthday')}}">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label for="profile_picture">Profile picture</label>
											<input type="file" name="profile_picture" id="profile_picture">
										</div>
										<div class="col-md-6">
											<img src="{{asset('upload/images/common/no-preview-available.png')}}" alt="preview" class="thumbnail" style="max-width: 350px" id="preview_thumbnail">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="cmnd">CMND number</label>
									<input type="text" name="cmnd" id="cmnd" class="form-control" value="{{old('cmnd')}}">
								</div>
								<div class="form-group">
									<label for="roles">Roles</label>
									<select name="roles" id="roles" class="form-control">
										@foreach($roles as $role)
											<option value="{{ $role->role_title }}"> {{ $role->role_title }} </option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
									<button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</button>
								</div>
							</form>
						</div><!-- end panel body-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#profile_picture').change(function(){
			 var reader = new FileReader();
			 var file = $(this)[0].files[0];
			 var img = $('#preview_thumbnail');
			 reader.onloadend = function(){
			 	img.attr('src',reader.result);
			 };
			 if(file){
			 	reader.readAsDataURL(file);
			 }else{
			 	img.attr('src',"{{asset('upload/images/common/no-preview-available.png')}}");
			 }
		});
		//

		$('#form-add').submit(function(event){
			event.preventDefault();
			$('html').animate({
				scrollTop:0
			},300);
			$.ajax({
				method: 'POST',
				processData: false,
				contentType: false,
				url: "{{route('add.user')}}?r="+Math.random(),
				data: new FormData(this),
				success: function(data){
					$('.display-response').html("").show().removeClass('alert').removeClass('alert-danger').addClass('alert').addClass('alert-success')
					.html("<b><i class=\"fa fa-check\"></i> Awesome!</b><br/>"+data);
				},
				error: function(data){
					var result = data.responseJSON;
					$('.display-response').html("").show().removeClass('alert').removeClass('alert-success').addClass('alert').addClass('alert-danger').html("<b><i class=\"fa fa-frown-o\"></i> Opps!</b><br/>");
					$.each(result,function(i,val){
						$.each(val,function(j,value){
							$('.display-response').append(value+"<br/>");
						});
					});
				}
			});
		});
	});
</script>
@stop
@section('footer.js')
<script type="text/javascript" src="{{asset('js/admin/slidebar.js')}}"></script>
@stop