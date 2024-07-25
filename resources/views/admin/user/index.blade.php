@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Users</h1>
            </div>
            <div class="col-md-6 text-md-right">
{{--                <a href="{{ route('categories.create') }}" class="btn btn-primary">--}}
{{--                    <span>Add new category</span>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">Users</h5>
            <form class="" id="sort_user" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="phone_number" value="{{ $phone_number ?? "" }}" placeholder="Phone Number">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="email" value="{{ $email ?? "" }}" placeholder="Email">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="username" value="{{ $username ?? "" }}" placeholder="Username">
                    </div>
                    <div class="col-md-2">
                       <select class="form-control" name="state_id">
                           <option value="">Select</option>
                           @foreach(CommonFunction::getState() as $state)
                               <option value="{{$state->id}}" @selected($state->id == $state_id ?? "")>{{$state->getTranslation('name', getLocaleLang())}}</option>
                           @endforeach
                       </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('user.list') }}" class="btn btn-warning">{{translate('Reset')}}</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Location</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->name ?? "-" }}</td>
                        <td>{{ $user->phone_number ?? "-" }}</td>
                        <td>
                            {{ $user->email ?? '-' }}
                        </td>
                        <td>
                            {{ $user->username ?? '-' }}
                        </td>
                        <td>{{ CommonFunction::getStateName($user->state) }}, {{ CommonFunction::getCityName($user->city) }}</td>
                        <td></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $users->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

@endsection
