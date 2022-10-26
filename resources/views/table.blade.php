@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CSV') }}</div>

                <div class="card-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Initials</th>
                        <th scope="col">Last Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($res as $r)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{$r->title}}</td>
                            <td>{{$r->first_name == null ? 'null' : $r->first_name}}</td>
                            <td>{{$r->initials == null ? 'null' : $r->initials}}</td>
                            <td>{{$r->last_name}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
