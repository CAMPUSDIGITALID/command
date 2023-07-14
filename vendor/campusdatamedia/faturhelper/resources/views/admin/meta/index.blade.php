@extends('faturhelper::layouts/admin/main')

@section('title', 'Kelola Meta')

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Kelola Meta</h1>
</div>
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-message">{{ Session::get('message') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form method="post" action="{{ route('admin.meta.update') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($metas as $meta)
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label">
                                {{ ucfirst($meta) }}<span class="text-danger">*</span>
                                <br>
                                <code>meta('{{ $meta }}')</code>
                            </label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" name="meta[{{ $meta }}]" class="form-control form-control-sm {{ $errors->has('meta.'.$meta) ? 'border-danger' : '' }}" value="{{ meta($meta) }}">
                                @if($errors->has('meta.'.$meta))
                                <div class="small text-danger">{{ $errors->first('meta.'.$meta) }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-md-3"></div>
                        <div class="col-lg-10 col-md-9">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi-save me-1"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

@endsection