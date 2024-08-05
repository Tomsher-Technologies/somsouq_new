@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Parts Type</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('parts.create') }}" class="btn btn-primary">
                    <i class="las la-plus aiz-side-nav-icon"></i> <span>Add</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">Parts</h5>
            <form class="" id="sort_categories" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search" name="search" value="{{ $searchText }}" placeholder="Enter parts type">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('parts.index') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Parts type</th>
                    <th class="text-center">Status</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($parts as $key => $part)
                    <tr>
                        <td>{{ $key + 1 + ($parts->currentPage() - 1) * $parts->perPage() }}</td>
                        <td>
                            {{ $part->getTranslation('name', 'en') }}
                        </td>

                        <td class="text-center">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_status(this)" value="{{ $part->id }}"
                                        <?php if ($part->is_active == 1) {
                                    echo 'checked';
                                } ?>>
                                <span></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('parts.edit', ['autoPartType' => $part->id]) }}"
                               title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                               data-href="{{ route('parts.destroy', ['autoPartType' => $part->id]) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $parts->appends(request()->input())->links('pagination::bootstrap-5') }}
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
            $.post('{{ route('parts.status') }}', {
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
