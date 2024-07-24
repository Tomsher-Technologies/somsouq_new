@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Term and Condition</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('condition.create') }}" class="btn btn-primary">
                    <span><i class="las la-plus aiz-side-nav-icon"></i>Add</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <form class="" id="sort_categories" action="" method="GET" style="width: 100%">
                <div class="row gutters-5">
                    <div class="col-md-4">
                        <h5 class="mb-0 h6 mr-4">Term and Condition</h5>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th class="text-center">Status</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conditions as $key => $condition)
                    <tr>
                        <td>{{ $key + 1 + ($conditions->currentPage() - 1) * $conditions->perPage() }}</td>
                        <td>{{ $condition->getTranslation('title', 'en') }}</td>
                        <td>
                            {!! $condition->getTranslation('description', 'en') !!}
                        </td>
                        <td>
                            {{ $condition->priority ?? "" }}
                        </td>

                        <td class="text-center">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_status(this)" value="{{ $condition->id }}"
                                        <?php if ($condition->is_active == 1) {
                                    echo 'checked';
                                } ?>>
                                <span></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('condition.edit', ['condition' => $condition->id]) }}"
                               title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                               data-href="{{ route('condition.destroy', ['condition' => $condition->id]) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $conditions->appends(request()->input())->links('pagination::bootstrap-5') }}
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
            $.post('{{ route('condition.status') }}', {
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
