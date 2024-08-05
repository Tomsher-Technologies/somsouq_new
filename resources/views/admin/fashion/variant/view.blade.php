@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="h3">{{ $variant->name ?? "" }} variants</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Size</th>
                            <th>Priority</th>
                            <th class="text-right">{{translate('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $key => $value)
                            <tr>
                                <td>{{ ($key+1) + ($values->currentPage() - 1) * $values->perPage() }}</td>
                                <td>{{ $value->name ?? "" }}</td>
                                <td>{{ $value->priority ?? "" }}</td>
                                <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" data-toggle="modal" data-target="#valueModal" data-url="{{ route('value.edit', ['variantValue' => $value->id]) }}" title="{{ translate('Edit') }}">
                                        <i class="las la-edit"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $values->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Add {{ $variant->name ?? "" }} size</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('value.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Name')}}</label>
                            <input type="text" placeholder="Enter size" name="name" class="form-control" required>

                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Priority</label>
                            <input type="number" placeholder="Enter priority" name="priority" class="form-control">
                        </div>

                        <div class="form-group mb-3 text-right">
                            <a href="{{ route('variant.index') }}" class="btn btn-warning">{{translate('Cancel')}}</a>
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="valueModal" tabindex="-1" aria-labelledby="valueModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <form action="{{ route('value.update') }}" method="post" id="valueForm">
                @csrf
                <input type="text" name="value_id" id="value_id" value="">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update {{ $variant->name ?? "" }} value</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name" id="value_name_id" value="" placeholder="Enter size" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="priority" id="priority_id" value="" placeholder="Enter priority">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('script')
    <script type="text/javascript">
        let modal = $('#valueModal');

        modal.on('show.bs.modal', function (e) {
            $('#valueForm')[0].reset();
            var action = $(e.relatedTarget).data("url");
            $.ajax({
                url: action,
                type: 'get',
                data: {},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.status) {
                        $('#value_id').val(response.data.id);
                        $('#value_name_id').val(response.data.name);
                        $('#priority_id').val(response.data.priority);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        });

    </script>
@endsection
