@extends('admin.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                {{--                <h1 class="h3">About us</h1>--}}
            </div>
            <div class="col-md-6 text-md-right">

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6 mr-4">About us</h5>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <th >#</th>
                    <th>Section</th>
                    <th>Title</th>
                    <th width="10%" class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($abouts as $about)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $about->section ? $section[$about->section] : "" }}</td>
                        <td>{{ $about->getTranslation('title', env('DEFAULT_LANGUAGE', 'en'))}}</td>
                        <td>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                               href="{{ route('about.edit', ['about' => $about->id, 'lang' => env('DEFAULT_LANGUAGE')]) }}"
                               title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')

@endsection
