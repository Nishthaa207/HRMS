@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Candidate Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

           
            <a href="{{url('candidate/create')}}">  Create new entry </a>
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Sequence</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $candidate as $key => $candidate )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $candidate->name }}</td>
                            <td scope="col">{{ $candidate->email }}</td>
                            <td scope="col">{{ $candidate->mobile }}</td>
                            <td scope="col">{{ $candidate->gender }}</td>
                            <td scope="col">{{ $candidate->address }}</td>
                            <td scope="col">{{ $candidate->status }}</td>
                            <td scope="col">{{ $candidate->sequence }}</td>
                            <td scope="col">

                            <a href="{{'candidate/'.$candidate->id.'/edit'}}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('candidate.destroy', $candidate->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
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