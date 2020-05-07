@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><div class="card">
                <div class="card-header">So, What's for today?</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<form action="{{route('home.create')}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row col-12"><input type="text" name="post_name" class="form-control" placeholder="Enter To Do Task" required></div>
						
						<p><div class="row col-12">
						<div class="col-3">Priority:</div>
						<div class="col-3"><input type="radio" name="urgency" value="1" required> High Priority </div>
						<div class="col-3"><input type="radio" name="urgency" value="2" required> Medium Priority </div>
						<div class="col-3"><input type="radio" name="urgency" value="3" required> Low Priority</div> </div>
						</p>
						<p><button type="submit" class="btn btn-success">Submit</button>
						</form>
                </div>

				</div></p>
				<p><div class="card">
                <div class="card-header">Tasks</div>
                <div class="card-body">
									<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task Name</th>
      <th scope="col">Urgency</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
				@foreach($projects as $project)

    <tr>
      <th scope="row">1</th>
				<td>{{$project->post_name}}</td>
				<td>
				@if($project->urgency == 1)
					<button class="btn btn-danger">High Priority</button>
				@elseif($project->urgency == 2)
					<button class="btn btn-warning">Medium Priority</button>
				@else
					<button class="btn btn-secondary">Low Priority</button>
				@endif	

				</td>
				<td>
<a href="{{route('home.destroy',$project->id)}}" class="text-danger"><i class="fa fa-trash-o"></i></a>
				</td>
    </tr>
   
				@endforeach
				
  </tbody>
</table>
				</div>
				</div></p>
            </div>
        </div>
    </div>
</div>
@endsection
