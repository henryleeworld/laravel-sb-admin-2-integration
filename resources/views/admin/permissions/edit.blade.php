@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="form-label">{{ trans('cruds.permission.fields.title') }}*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.permission.fields.title_helper') }}
                                </p>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection