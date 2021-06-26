@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Certificates</div>

                <div class="card-body">
                    <form action="{{ route('dashboard.certificate.update', $data['certificate']->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data['certificate']->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" cols="30" rows="3" class="form-control">{{ $data['certificate']->desc }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <img width="30%" src="{{ asset('certificate_image') }}/{{ $data['certificate']->file }}" alt="">
                        </div>

                        <div class="form-group">
                            <label for="">update file</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
