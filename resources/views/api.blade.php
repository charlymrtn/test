@extends('layouts.app')

@section('title', 'Api Test')

@section('content')
   <h3>Repos Test</h3>

   <div class="repos">

   	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for repos..">
   	
	<table class="table" id="myTable">
	  <thead>
	    <tr>
	      <th scope="col">Name</th>
	      <th scope="col">Owner</th>
	      <th scope="col" onclick="sortTable(0)">Created at</th>
	      <th scope="col" onclick="sortTable(0)">Pushed at</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($repos as $repo)
	    <tr>
	      <td>{{$repo->name}}</td>
	      @if ($bd == 1)
	      	<td>{{$repo->owner}}</td>
	      	<td>{{$repo->fecha_creacion}}</td>
	      	<td>{{$repo->fecha_commit}}</td>
	      @else
		    <td>{{$repo->owner->login}}</td>
		    <td>{{$repo->created_at}}</td>
		    <td>{{$repo->pushed_at}}</td>
	      	{{-- false expr --}}
	      @endif
	      
	    </tr>
	    @endforeach
	  </tbody>
	</table>

   </div>
@endsection