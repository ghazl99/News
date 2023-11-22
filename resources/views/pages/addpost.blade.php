@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="pagetitle">
      <h1>Add Post</h1>
    </div>

    <section class="section">
        <form action="{{Route('Store.Post')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-left: 70px" >
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">General Form To Add Post</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select category</label>
                                <div class="col-sm-10">
                                    <select class="form-select {{$errors->get('name_category') ? 'is-invalid' : ''}} " aria-label="Default select example" name="name_category">
                                        <option selected disabled>Open this select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('name_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select tags</label>
                                <div class="col-sm-10">
                                    <select class="form-select {{$errors->get('types') ? 'is-invalid' : ''}} " required   name="types[]" multiple>
                                        <option selected disabled>Open this select tags</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">
                                                {{$tag->type}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('types')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{$errors->get('title') ? 'is-invalid' : ''}} " name="title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">paragraph</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control {{$errors->get('text') ? 'is-invalid' : ''}} "  name="text" rows="3"></textarea>
                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
