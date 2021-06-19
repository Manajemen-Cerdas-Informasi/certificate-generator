@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Certificates
                    <a href="{{ route('dashboard.certificate.create') }}" class="btn btn-sm btn-primary float-right">Add New Certificate</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Certificate</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data['certificates'] as $key => $certificate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $certificate->name }}</td>
                                    <td></td>
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
