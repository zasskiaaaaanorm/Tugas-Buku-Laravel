@extends('layouts.global')

@section('title') Category list @endsection

@section('content')

      <form action="{{route('categories.index')}}">
          <div class="input-group ml-3 " >
              <input 
                type="text" 
                class="form-control" 
                placeholder="Filter by name"
                value="{{Request::get('name')}}"
                name="name">
          </div>
      </form>
<div class="input-group-append " >
    <input 
      type="submit" 
      value="Filter" 
      class="btn btn-primary">
  </div>
      <div class="col-md-6">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('categories.index')}}">Published</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('categories.trash')}}">Trash</a>
              </li>
          </ul>
      </div>
    </div>
      <hr class="my-3">
          <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-warning">
                        {{session('status')}}
                      </div>
                    </div>
                  </div>
                @endif 
                <div class="col-md-12 text-left">
                    <a 
                      href="{{route('categories.create')}}" 
                      class="btn btn-primary">Create Category</a>
                  </div>
              <table class="table table-bordered table-stripped mt-3">
                <thead>
                  <tr>
                    <th><b>Name</b></th>
                    <th><b>Slug</b></th>
                    <th><b>Image</b></th>
                    <th><b>Actions</b></th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                      <td>
                        @if($category->image)
                            <img 
                            src="{{asset('storage/' . $category->image)}}" 
                            width="48px"/>
                        @else 
                            No image
                        @endif
                      </td>
                    <td>
                        <a 
                        href="{{route('categories.edit', [$category->id])}}"
                        class="btn btn-info btn-sm"> Edit </a>
                        <a 
                        href="{{route('categories.show', [$category->id])}}"
                        class="btn btn-primary"> Show </a>
                        <form 
                            class="d-inline"
                            action="{{route('categories.destroy', [$category->id])}}"
                            method="POST"
                            onsubmit="return confirm('Move category to trash?')">
                            @csrf 
                            <input 
                                type="hidden" 
                                value="DELETE" 
                                name="_method">

                            <input 
                                type="submit" 
                                class="btn btn-danger btn-sm" 
                                value="Trash">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colSpan="10">
                  {{$categories->appends(Request::all())->links()}}
                </td>
              </tr>
            </tfoot>
            </table>
        </div>
    </div>
@endsection