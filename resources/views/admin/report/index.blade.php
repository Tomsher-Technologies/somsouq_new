@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Reports</h1>
            </div>
            <div class="col-md-6 text-md-right">
{{--                <a href="{{ route('color.create') }}" class="btn btn-primary">--}}
{{--                    <span>Add new color</span>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">Reports</h5>
            <form class="" id="sort_categories" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search" name="search" value="{{ $search }}" placeholder="Enter reference no.">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('report.index') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Ad Reference no.</th>
                    <th>Report Type</th>
                    <th>Reporter Name</th>
                    <th>Message</th>
                    <th>Submit date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reports as $key => $report)
                    <tr>
                        <td>{{ $key + 1 + ($reports->currentPage() - 1) * $reports->perPage() }}</td>
                        <td>{{ $report->tracking_number ?? "" }}</td>
                        <td>{{ App\Enums\Front\ReportType::getReportType()[$report->report_type_id] ?? "" }}</td>
                        <td>{{ $report->name ?? "" }}</td>
                        <td>{{ $report->message ?? "" }}</td>
                        <td>{{ date('d-m-Y', strtotime($report->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $reports->appends(request()->input())->links('pagination::bootstrap-5') }}
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
            $.post('{{ route('color.status') }}', {
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
