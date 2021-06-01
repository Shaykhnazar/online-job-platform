@extends('layouts.admin')
@section('content')

		<div class="container-fluid p-5 ">
			<h4 class="pb-2 pl-2 mb-2" style="text-align: center;">All Categories List</h4>

            <a class='m-2' href='{{ route('categories.create') }}'> <b style="color: white"><button class='btn btn-success btn-sm m-2'>+ New Category</button></b></a>

			<table class="table text-center">
				<thead>
					<tr>
						<th>ID</th>
						<th class="text-left" width="150px">Logo</th>
						<th class="text-left">Category Name</th>
						<th>No. of Current Jobs</th>
						<th>Featured</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{$category->category_id}}</td>
							<td class="text-left"><img class="img-thumbnail" src="{{ asset('storage/'.$category->logo) }}" alt=""></td>
							<td class="text-left">{{$category->category_name}}</td>
							<td>{{$category->no_jobs}}</td>
							<td>{{ ($category->featured) ? 'Yes' : 'No'}}</td>
							<td>
								<a href='{{ route('categories.edit',$category->category_id) }}' style="color: blue; text-decoration: underline;">Edit</a> |
                                <form method="post" action="{{ route('categories.destroy', $category->category_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn btn-danger">Delete</button>
                                </form>
{{--                                <button data-url='{{ route('categories.destroy', $category->category_id) }}' class="delete-btn" style="color: blue; text-decoration: underline;">Delete</button>--}}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
@include('admin.delete_confirm_modal')
@endsection
