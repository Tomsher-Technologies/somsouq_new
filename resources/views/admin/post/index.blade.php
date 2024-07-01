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
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $title ?? "" }}">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" data-live-search="true"
                                name="status" id="">
                            <option value="">Status</option>
                            <option value="pending" {{ ($status ?? "" == "pending") ? "selected" : "" }}>Pending</option>
                            <option value="approved" {{ ($status ?? "" == "approved") ? "selected" : "" }}>Approved</option>
                            <option value="cancelled" {{ ($status ?? "" == "rejected") ? "selected" : "" }}>Rejected</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" data-live-search="true" name="is_popular" id="">
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
                    <th>Title</th>
                    <th >Category</th>
                    <th >Sub Category</th>
                    <th class="text-center">Is Popular</th>
                    <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
                        <td>{{ $post->title }}</td>
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
                                <select class="form-control" name="status" value="{{ $post->id }}" onchange="updatePostStatus(this, '{{ $post->id }}')">
                                    <option value="pending" {{ ($post->status == 'pending') ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ ($post->status == 'approved') ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ ($post->status == 'rejected') ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </label>
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
@endsection


{{--@section('modal')--}}
{{--    @include('modals.delete_modal')--}}
{{--@endsection--}}


@section('script')
    <script type="text/javascript">
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

        function updatePostStatus(selected, postId)
        {
            $.ajax({
                url: "{{ route('post.update-status') }}",
                type: 'get',
                data: {
                    post_id: postId,
                    status: selected.value
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
    </script>
@endsection
