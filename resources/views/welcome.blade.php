@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CSV') }}</div>

                <div class="card-body">

                   <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Upload CSV</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </form>

                   <hr>

                   {{-- @foreach ($file_data as $key => $value)

                   {{$value}};
                       
                   @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
