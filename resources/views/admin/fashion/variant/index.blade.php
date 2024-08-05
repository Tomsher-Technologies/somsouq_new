@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="h3">All size Variants</h1>
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
                            <th>{{translate('Name')}}</th>
                            <th>{{translate('Status')}}</th>
                            <th class="text-right">{{translate('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($variants as $key => $variant)
                            <tr>
                                <td>{{ ($key+1) + ($variants->currentPage() - 1) * $variants->perPage() }}</td>
                                <td>{{ $variant->name ?? "" }}</td>

                                <td class="text-center">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" onchange="update_status(this)" value="{{ $variant->id }}"
                                                <?php if ($variant->is_active == 1) {
                                            echo 'checked';
                                        } ?>>
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" data-toggle="modal" data-target="#commentModal" data-url="{{ route('variant.edit', ['variant'=>$variant->id]) }}" title="{{ translate('Edit') }}">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('variant.view', ['variant'=>$variant->id]) }}" title="{{ translate('View') }}">
                                        <i class="las la-eye"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $variants->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Add new variant</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('variant.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Name')}}</label>
                            <input type="text" placeholder="{{translate('Name')}}" name="name" class="form-control" required>

                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <form action="{{ route('variant.update') }}" method="post" id="variantForm">
                @csrf
                <input type="hidden" name="variant_id" id="variant_id" value="">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update variant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="name" id="variant_name_id" value="" placeholder="Variant name" required>
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
        let modal = $('#commentModal');

        modal.on('show.bs.modal', function (e) {
            $('#variantForm')[0].reset();
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
                        $('#variant_id').val(response.data.id);
                        $('#variant_name_id').val(response.data.name);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        });

        function update_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('variant.status') }}', {
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
