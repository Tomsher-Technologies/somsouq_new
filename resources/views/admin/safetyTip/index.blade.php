@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Safety Tips</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('safety_tip.create') }}" class="btn btn-primary">
                    <i class="las la-plus aiz-side-nav-icon"></i><span>Add</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <form class="" id="sort_categories" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-2">
                        <h5 class="mb-0 h6 mr-4">Safety Tips</h5>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" data-live-search="true"
                                name="category_id" id="" data-selected={{ $category }}>
                            <option value="0">All</option>
                            @foreach (CommonFunction::getCategory() as $item)
                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('safety_tip.index') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Category</th>
                    <th >Safety Tip</th>
                    <th class="text-center">Status</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($safetyTips as $key => $safetyTip)
                    <tr>
                        <td>{{ $key + 1 + ($safetyTips->currentPage() - 1) * $safetyTips->perPage() }}</td>
                        <td>{{ $safetyTip->category_name ?? "" }}</td>
                        <td>{!! $safetyTip->getTranslation('tip', 'en') !!}</td>

                        <td class="text-center">
                            <b>{!! $safetyTip->is_active == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}</b>
                        </td>

                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('safety_tip.edit', ['safetyTip' => $safetyTip->id]) }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                               data-href="{{ route('safety_tip.destroy', ['safetyTip' => $safetyTip->id]) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $safetyTips->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
@endsection
