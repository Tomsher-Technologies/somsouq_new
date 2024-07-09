@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">All Contacts</h1>
            </div>
            <div class="col-md-6 text-md-right">

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">Contact</h5>
            <form class="" id="sort_user" action="" method="GET" style="width: 100%">

                <div class="row gutters-5">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" value="{{ $name ?? "" }}" placeholder="Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="email" value="{{ $email ?? "" }}" placeholder="Email">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="phone_number" value="{{ $phone_number ?? "" }}" placeholder="Phone Number">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('contact.list') }}" class="btn btn-warning">{{translate('Reset')}}</a>
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
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $key => $contact)
                    <tr>
                        <td>{{ $key + 1 + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                        <td>{{ $contact->name ?? "-" }}</td>
                        <td>
                            {{ $contact->email ?? '-' }}
                        </td>
                        <td>{{ $contact->phone_number ?? "-" }}</td>
                        <td>
                            {{ $contact->subject ?? '-' }}
                        </td>
                        <td>{{ $contact->description ?? "-" }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('contact.destroy', ['contact' => $contact->id])}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $contacts->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

@endsection
