@extends('admin.layouts.app')

@section('content')
    <div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Edit About Us</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('about.update') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $about->id }}">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="col-form-label">Section<span class="required">*</span></label>
                            <select class="form-control" name="section" disabled>
                                @foreach($section as $key => $value )
                                    <option value="{{ $key }}" @selected($key == $about->section ?? "")>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="col-form-label">Title<span class="required">*</span></label>
                            <input type="text" placeholder="Title" id="title" name="title" class="form-control" value="{{ $about->title }}">
                        </div>
                    </div>

                    @if($about->description_type == 2)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th width="30%">Title</th>
                                    <th>Description</th>
                                    <th width="15%">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($descriptions))
                                    @foreach($descriptions as $key => $data)
                                        <input type="hidden" name="ids[]" value="{{ $data->id }}"/>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Title" name="multi_title[]" value="{!! $data->title ?? "" !!}"></td>
                                            <td>
                                                <textarea class="form-control" name="multi_description[]">
                                                    {{ $data->description ?? "" }}
                                                </textarea>
                                            </td>
                                            <td>
                                                <select class="form-control" name="multi_status[]">
                                                    <option value="1" {{ ($data->is_active == 1) ? 'selected': "" }}>Active</option>
                                                    <option value="0" {{ ($data->is_active == 0) ? 'selected': "" }}>Inactive</option>
                                                </select>
                                            </td>

                                        </tr>
                                    @endforeach

                                @endif
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Description<span class="required">*</span></label>
                                <textarea class="form-control" id="full-featured" name="description">
                                    {{ $about->description }}
                            </textarea>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label class="col-form-label">Image</label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" class="selected-files" value="{{ $about->image ?? "" }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ ($about->is_active == 1) ? 'selected': "" }}>Active</option>
                                <option value="0" {{ ($about->is_active == 0) ? 'selected': "" }}>Inactive</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <a href="{{ route('about.index') }}" class="btn btn-sm btn-warning">{{translate('Cancel')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')

    <script src="{{ static_asset('assets/js/tinymce/tinymce.min.js') }}" ></script>
    <script>
        tinymce.init({
            selector: 'textarea#full-featured',
            menu: {
                tc: {
                    title: 'Comments',
                    items: 'addcomment showcomments deleteallconversations'
                }
            },
            menubar: 'file edit view insert format tools table tc help',
            toolbar: "undo redo | revisionhistory | aidialog aishortcuts | blocks fontsizeinput | bold italic | align numlist bullist | link image | table math media pageembed | lineheight  outdent indent | strikethrough forecolor backcolor formatpainter removeformat | charmap emoticons checklist | code fullscreen preview | pagebreak anchor codesample footnotes mergetags | addtemplate inserttemplate | addcomment showcomments | ltr rtl casechange | spellcheckdialog a11ycheck", // Note: if a toolbar item requires a plugin, the item will not present in the toolbar if the plugin is not also loaded.
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            typography_ignore: [ 'code' ],
            importcss_append: true,
            height: 300,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            spellchecker_ignore_list: ['Ephox', 'Moxiecode', 'tinymce', 'TinyMCE'],
            tinycomments_mode: 'embedded',
            a11y_advanced_options: true,

        });
    </script>
@endsection
