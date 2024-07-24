@extends('admin.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">All FAQ</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('help.create') }}" class="btn btn-primary">
                <span>Add new FAQ</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6 mr-4">FAQ</h5>
        <form class="" id="sort_categories" action="" method="GET" style="width: 100%">

            <div class="row gutters-5">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="search" value="{{ $search_text }}" placeholder="Type question name">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                    <a href="{{ route('help.index') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                </div>
            </div>

        </form>
    </div>

    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
            <tr>
                <th >#</th>
                <th>Question</th>
                <th>Answer</th>
                <th class="text-center">Status</th>
                <th width="10%" class="text-center">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($helps as $key => $help)
            <tr>
                <td>{{ $key + 1 + ($helps->currentPage() - 1) * $helps->perPage() }}</td>
                <td>{{ $help->getTranslation('question', 'en') }}</td>
                <td>
                    {{ $help->getTranslation('answer', 'en') }}
                </td>

                <td class="text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="update_status(this)" value="{{ $help->id }}"
                            <?php if ($help->is_active == 1) {
                                echo 'checked';
                            } ?>>
                        <span></span>
                    </label>
                </td>
                <td class="text-center">
                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                       href="{{ route('help.edit', ['help' => $help->id]) }}"
                       title="Edit">
                        <i class="las la-edit"></i>
                    </a>
                     <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                            data-href="{{ route('help.destroy', ['help' => $help->id]) }}" title="Delete">
                        <i class="las la-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $helps->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection


@section('modal')
@include('modals.delete_modal')
@endsection


@section('script')
<script type="text/javascript">

    function update_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('help.status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function(data) {
            if (data.success) {
                AIZ.plugins.notify('success', data.message);
            }

            if (!data.success) {
                AIZ.plugins.notify('danger', data.message);
            }
        });
    }
</script>
@endsection
