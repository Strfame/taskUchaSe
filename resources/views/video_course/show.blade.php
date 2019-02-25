@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
				
@endsection

@section('content')

	@if(Session::has('success'))
			<div class="alert alert-success alert-dismissible fade show">
					{{ Session::get('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>

					@php
							Session::forget('success');
					@endphp
				</div>
	@endif

	@if ($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" id="error_alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
					<ul>
							@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
							@endforeach
					</ul>

			</div>
	@endif

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Add new picture
			</button>
		</div>

		<form method="GET" action="{{ route('pictures.index') }}" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Search by picture title..." value="{{$searchTitle}}" name="searchTitle" aria-label="Search">

			<button class="btn btn-outline-dark btn-sm" type="submit">Apply Filter</button>
		</form>
	</nav>


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Title</th>
				<th scope="col">Subject</th>								
				<th scope="col">File name</th>
				<th scope="col">Description</th>
				<th scope="col">@sortablelink('created_at')</th>
			</tr>
		</thead>
		<tbody>
			<!--@foreach ($pictures as $picture)-->
				<tr>
					<th>Заглавие на урок</th>
					<th>Математика</th>
					<td>mat_01.mp4</td>
					<td>Задачи по математика 1ви клас</td>
					<td>2019-01-09</td>
				</tr>
			<!--@endforeach-->		

			<!--@if($pictures->isEmpty())-->
				<tr>
					<td></td>
					<td>Not find any pictures..</td>												
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			<!--@endif-->
		</tbody>
	</table>

	<!--{{ $pictures->links("pagination::bootstrap-4") }}-->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="{{action('PictureController@store')}}" enctype="multipart/form-data" id="form">
							{{ csrf_field() }}
						<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Picture Title" required>
						</div>

						<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
						</div>
						<div class="form-group">
								<label for="exampleFormControlFile1">Select a image</label>
								<input type="file" id="file" name="img_source" class="form-control-file" id="img_source" required>
						</div>														

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" id="savePicture">Submit</button>
					</form>
				</div>

			</div>
		</div>
	</div>
		
@endsection