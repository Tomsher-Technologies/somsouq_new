@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Posts</h1>
            </div>
            <div class="col-md-6 text-md-right">

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">Posts</h5>
            <form class="" id="sort_post" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter reference no" value="{{ $title ?? "" }}">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" data-live-search="true"
                                name="status" id="" data-selected={{ $status ?? "" }}>
                            <option value="">Status</option>
                            <option value="pending" {{ ($status ?? "" == "pending") ? "selected" : "" }}>Pending</option>
                            <option value="approved" {{ ($status ?? "" == "approved") ? "selected" : "" }}>Approved</option>
                            <option value="cancelled" {{ ($status ?? "" == "rejected") ? "selected" : "" }}>Rejected</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" data-live-search="true" name="is_popular" id="" data-selected={{ $is_popular ?? "" }}>>
                            <option value="">Is Popular</option>
                            <option value="yes" {{ ($is_popular ?? "" == "yes") ? "selected" : "" }}>Yes</option>
                            <option value="no" {{ ($is_popular ?? "" == "no") ? "selected" : "" }}>No</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('post.list') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
{{--                    <th>Title</th>--}}
                    <th>Reference no.</th>
                    <th >Category</th>
                    <th >Sub Category</th>
                    <th class="text-center">Is Popular</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
{{--                        <td>{{ $post->getTranslation('title', 'en') }}</td>--}}
                        <td>{{ $post->tracking_number }}</td>
                        <td>{{ $post->category_name }}</td>
                        <td>{{ $post->sub_category_name }}</td>
                        <td class="text-center">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateIsPopularOption(this)" value="{{ $post->id }}" {{ ($post->is_popular == "yes") ? 'checked' : "" }}>
                                <span></span>
                            </label>
                        </td>

                        <td class="text-center">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <select class="form-control" name="status" value="{{ $post->id }}" onchange="getStatus(this, '{{ $post->id }}')">
                                    <option value="pending" {{ ($post->status == 'pending') ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ ($post->status == 'approved') ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ ($post->status == 'rejected') ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </label>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('post.preview', ['post_id' => $post->id]) }}" title="View">
                                <i class="las la-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $posts->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <form action="{{ route('post.reject-status') }}" method="post" id="commentForm">
                @csrf
                <input type="hidden" name="post_id" id="post_id" value="">
                <input type="hidden" name="status" id="status" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reason of rejection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
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


{{--@section('modal')--}}
{{--    @include('modals.delete_modal')--}}
{{--@endsection--}}


@section('script')
    <script type="text/javascript">
        let modal = $('#commentModal');
        function updateIsPopularOption(checkbox) {
            let isPopular;
            if($(checkbox).is(":checked")) {
                 isPopular = "yes";
            } else {
                isPopular = "no";
            }

            $.ajax({
                url: "{{ route('post.is-popular') }}",
                type: 'get',
                data: {
                    post_id: checkbox.value,
                    is_popular: isPopular
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.status) {
                        AIZ.plugins.notify('success', response.message);
                    }

                    if(!response.status) {
                        AIZ.plugins.notify('danger', response.error);
                        $(checkbox).prop('checked', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        }

        function getStatus(selected, postId)
        {
            let status = selected.value;
            if(status === 'rejected') {
                modal.modal('show', {status: status, id:postId});

            } else {
                updatePostStatus(status, postId);
            }
        }

        modal.on('show.bs.modal', function (e) {
            $('#post_id').val(e.relatedTarget.id);
            $('#status').val(e.relatedTarget.status);
        });

        function updatePostStatus(status, postId)
        {
            $.ajax({
                url: "{{ route('post.update-status') }}",
                type: 'get',
                data: {
                    post_id: postId,
                    status: status
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.status) {
                        AIZ.plugins.notify('success', response.message);
                    }

                    if(!response.status) {
                        AIZ.plugins.notify('danger', response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        }

        modal.on('hidden.bs.modal', function () {
            location.reload();
        })

    </script>
@endsection
