@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Candidate Management</h3>

        <div class="row">
            <!-- <div class="col-md-2">
            </div> -->
            <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('candidate.update', $candidate->id) }}">
                @csrf
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                            <div class="col-md-6">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $candidate->name }}">
                            </div>
                            <div class="col-md-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $candidate->email}}">

                            </div>
                            <div class="col-md-6">
                                <label>Phone Number:</label>
                                <input type="text" class="form-control" name="mobile" value="{{ $candidate->mobile }}">

                            </div>
                            <div class="col-md-6">
                                <label>Gender:</label>
                                Male<input type="radio" name="gender" value="{{ $candidate->gender }}">  Female<input type="radio" name="gender" value="{{ $candidate->gender }}">
                                Other<input type="radio" name="gender" value="{{ $candidate->gender }}">
                            </div>
                            <div class="col-md-12">
                                <label>Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ $candidate->address }}">
                            </div>
                            <div class="col-md-12">
                            <label for="status">Status </label>
                               <select name="Status" id="status">
                               <option value="1">active</option>
                                 <option value="0">inactive</option>
                              </select>
                            </div>
                            <div class="col-md-12">
                                <label>Sequence:</label>
                                <input type="number" class="form-control" name="sequence" value="{{ $candidate-> sequence}}">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush