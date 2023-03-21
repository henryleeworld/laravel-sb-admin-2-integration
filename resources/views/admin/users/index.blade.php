@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h1>
        @can('users_manage')
		<div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>
        </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-User" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.user.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.user.fields.name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.user.fields.email') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.user.fields.roles') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($user->roles()->pluck('name') as $role)
                                            <span class="badge bg-info">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                {{ trans('global.view') }}
                                            </a>

                                            <a class="btn btn-sm btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script type="module">
$(function() {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    @can('users_manage')
    let deleteButtonTrans = "{{ trans('global.datatables.delete') }}";
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.users.mass_destroy') }}",
        className: 'btn-danger',
        action: function(e, dt, node, config) {
            var ids = $.map(dt.rows({
                selected: true
            }).nodes(), function(entry) {
                return $(entry).data('entry-id')
            });

            if (ids.length === 0) {
                alert("{{ trans('global.datatables.zero_selected') }}")

                return
            }

            if (confirm("{{ trans('global.areYouSure') }}")) {
                $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: config.url,
                        data: {
                            ids: ids,
                            _method: 'DELETE'
                        }
                    })
                    .done(function() {
                        location.reload()
                    })
            }
        }
    }
    dtButtons.push(deleteButton)
    @endcan

    $.extend(true, $.fn.dataTable.defaults, {
        order: [
            [1, 'desc']
        ],
        pageLength: 100,
    });
    $('.datatable-User:not(.ajaxTable)').DataTable({
        buttons: dtButtons
    })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endsection