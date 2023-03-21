@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('global.show') }} {{ trans('cruds.user.title') }}</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped" style="width:100%">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.roles') }}
                                        </th>
                                        <td>
                                            @foreach($user->roles()->pluck('name') as $role)
                                            <span class="label label-info label-many">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection