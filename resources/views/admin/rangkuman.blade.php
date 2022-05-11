
@extends('admin.layout.appAdmin')

@section('content')
<div class="container">
    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-primary svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                        <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <div class="alert-text">Select2 is a jQuery based replacement for select boxes. It supports searching, remote data sets, and infinite scrolling of results. Select2 gives you a customizable select box with support for searching, tagging, remote data sets, infinite scrolling, and many other highly used options.
        <br />For more info please visit the plugin's
        <a class="font-weight-bold" href="https://select2.org/getting-started/basic-usage" target="_blank">Demo Page</a>or
        <a class="font-weight-bold" href="https://github.com/select2/select2" target="_blank">Github Repo</a>.</div>
    </div>
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
            Select2 Examples
            </h3>
        </div>
        <!--begin::Form-->
        <div class="card-body">

            <form action="{{ url('rangkumanUpdate/'.$rangkuman->id) }}" method="post" class="form" id="kt_form">
                @csrf
                @method('put')
                <div class="form-group">
                    <div class="alert alert-light-primary d-none mb-15" role="alert" id="kt_form_msg">
                        <div class="alert-icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="alert-text font-weight-bold">
                            Oh snap! Change a few things up and try submitting again.
                        </div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span><i class="ki ki-close "></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Markdown *</label>
                    <div class="col-lg-7 col-md-9 col-sm-12">
                        <textarea name="rangkuman" class="form-control" data-provide="markdown" rows="10"></textarea>
                        <span class="form-text text-muted">Enter some markdown content</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i>Validate</button>
                        <button type="reset" class="btn btn-light-primary">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
</div>
</div>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection

@section('js')
    <script>
        // Class definition
    var KTSelect2 = function() {
    // Private functions
    var demos = function() {
    // basic
    $('#kt_select2_1').select2({
    placeholder: "Pilih"
    });

    // nested
    $('#kt_select2_2').select2({
    placeholder: "Pilih"
    });

    // multi select
    $('#kt_select2_3').select2({
    placeholder: "Pilih",
    });

    // basic
    $('#kt_select2_4').select2({
    placeholder: "Pilih",
    allowClear: true
    });

    // loading data from array
    var data = [{
    id: 0,
    text: 'Enhancement'
    }, {
    id: 1,
    text: 'Bug'
    }, {
    id: 2,
    text: 'Duplicate'
    }, {
    id: 3,
    text: 'Invalid'
    }, {
    id: 4,
    text: 'Wontfix'
    }];

    $('#kt_select2_5').select2({
    placeholder: "Select a value",
    data: data
    });

    // loading remote data

    function formatRepo(repo) {
    if (repo.loading) return repo.text;
    var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
    if (repo.description) {
        markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
    }
    markup += "<div class='select2-result-repository__statistics'>" +
        "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
        "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
        "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
        "</div>" +
        "</div></div>";
    return markup;
    }

    function formatRepoSelection(repo) {
    return repo.full_name || repo.text;
    }

    $("#kt_select2_6").select2({
    placeholder: "Search for git repositories",
    allowClear: true,
    ajax: {
        url: "https://api.github.com/search/repositories",
        dataType: 'json',
        delay: 250,
        data: function(params) {
        return {
        q: params.term, // search term
        page: params.page
        };
        },
        processResults: function(data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
        results: data.items,
        pagination: {
        more: (params.page * 30) < data.total_count
        }
        };
        },
        cache: true
    },
    escapeMarkup: function(markup) {
        return markup;
    }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    // custom styles

    // tagging support
    $('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
    placeholder: "Select an option",
    });

    // disabled mode
    $('#kt_select2_7').select2({
    placeholder: "Select an option"
    });

    // disabled results
    $('#kt_select2_8').select2({
    placeholder: "Select an option"
    });

    // limiting the number of selections
    $('#kt_select2_9').select2({
    placeholder: "Select an option",
    maximumSelectionLength: 2
    });

    // hiding the search box
    $('#kt_select2_10').select2({
    placeholder: "Select an option",
    minimumResultsForSearch: Infinity
    });

    // tagging support
    $('#kt_select2_11').select2({
    placeholder: "Add a tag",
    tags: true
    });

    // disabled results
    $('.kt-select2-general').select2({
    placeholder: "Select an option"
    });
    }

    var modalDemos = function() {
    $('#kt_select2_modal').on('shown.bs.modal', function () {
    // basic
    $('#kt_select2_1_modal').select2({
        placeholder: "Select a state"
    });

    // nested
    $('#kt_select2_2_modal').select2({
        placeholder: "Select a state"
    });

    // multi select
    $('#kt_select2_3_modal').select2({
        placeholder: "Select a state",
    });

    // basic
    $('#kt_select2_4_modal').select2({
        placeholder: "Select a state",
        allowClear: true
    });
    });
    }

    // Public functions
    return {
    init: function() {
    demos();
    modalDemos();
    }
    };
    }();

    // Initialization
    jQuery(document).ready(function() {
    KTSelect2.init();
    });
</script>
@endsection
    @section('js')
        <script src="{{ asset('/') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('/') }}/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{ asset('/') }}/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('/') }}/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('/') }}/js/pages/crud/datatables/basic/scrollable.js"></script>
		<!--end::Page Scripts-->
@endsection