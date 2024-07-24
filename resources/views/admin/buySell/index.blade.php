@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Buy Sell</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('buy.create') }}" class="btn btn-primary">
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
                        <h5 class="mb-0 h6 mr-4">Buy Sell</h5>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Content Type</th>
                    <th>Title</th>
                    <th>Priority</th>
                    <th class="text-center">Status</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sells as $key => $sell)
                    <tr>
                        <td>{{ $key + 1 + ($sells->currentPage() - 1) * $sells->perPage() }}</td>
                        <td>{{ App\Enums\Front\ContentType::getContentType()[$sell->content_type_id] }}</td>
                        <td>{{ $sell->getTranslation('title', 'en') }}</td>
                        <td>
                            {{ $sell->priority ?? "" }}
                        </td>

                        <td class="text-center">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_status(this)" value="{{ $sell->id }}"
                                        <?php if ($sell->is_active == 1) {
                                    echo 'checked';
                                } ?>>
                                <span></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('buy.edit', ['buySell' => $sell->id]) }}"
                               title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                               data-href="{{ route('buy.destroy', ['buySell' => $sell->id]) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $sells->appends(request()->input())->links('pagination::bootstrap-5') }}
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
            $.post('{{ route('buy.status') }}', {
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
