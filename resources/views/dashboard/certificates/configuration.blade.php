@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Configuration Certificates</div>

                <div class="card-body">
                    <form action="{{ route('dashboard.certificate.preview', $data['certificate']->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Margin Name</label>
                            <input type="text" name="margin_name" class="form-control" value="{{ $data['certificate']->margin_name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Margin Desc</label>
                            <input type="text" name="margin_desc" class="form-control" value="{{ $data['certificate']->margin_desc }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Preview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
