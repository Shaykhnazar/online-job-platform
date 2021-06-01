@extends('layouts.admin')
@section('content')
		<div class="container-fluid p-5 " >
			<h4 class="pb-2 pl-2 mb-2" style="text-align: center;">All Skills List</h4>
			<button class='btn btn-success btn-sm m-2'>
				<a class='m-2' href='{{ route('skills.create') }}'> <b style="color: white">+ New Skill</b></a>
			</button>
			<table class="table text-center">
				<thead>
					<tr>
						<th>ID</th>
						<th class="text-left">Name</th>
						<th class="text-left">Featured</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					@foreach($items as $item)
						<tr>
							<td>{{$item->id}}</td>
							<td class="text-left">{{$item->name}}</td>
							<td class="text-left">{{($item->featured) ? "Yes" : "No"}}</td>
							<td>
								<a href='{{ route("skills.edit", $item->id )}}' style="color: blue; text-decoration: underline;">Edit</a> |
								<form method="post" action="{{ route('skills.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn btn-danger">Delete</button>
                                </form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

@endsection
