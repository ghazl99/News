@extends('layouts.master')
@section('content')
    <section  class="section">
        @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
        @endif
        <div class="container" data-aos="fade-up">

                <div class="pagetitle">
                    <h1>Add Category</h1>

                </div>
                <br><br>
                <div class="col-lg-8 ">
                    <form action="{{Route('Store.Category')}}" method="POST" role="form" style="margin-left: 70px" >
                        @csrf
                        @method('POST')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">General Form To Add Category</h5>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Name New Category</span>
                                    </div>
                                    <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Category">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div><!-- End Reservation Form -->



        </div>
    </section><!-- End Book A Table Section -->
@stop
