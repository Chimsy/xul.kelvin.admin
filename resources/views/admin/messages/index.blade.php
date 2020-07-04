@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">New OCSS Private Messages</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>Reg#</th>
                        <th>Message Title</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $key => $message)
                        <tr data-entry-id="{{ $message->id }}">
                            <td></td>
                            <td>{{ $message->reg_num ?? '' }}</td>
                            <td>{{ $message->msg_title ?? '' }}</td>
                            <td>
                                @can('product_edit')
                                    <a class="btn btn-xs btn-info"
                                       href="{{ url('/admin/messages/edit?msg_id='.$message->id ) }}"> Reply

                                    </a>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.products.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}');

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            @can('product_delete')
            dtButtons.push(deleteButton);
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({buttons: dtButtons})
        })

    </script>
@endsection
