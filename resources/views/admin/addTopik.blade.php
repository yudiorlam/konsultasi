{{-- Extends layout --}}
@extends('admin.layout.appAdmin')

{{-- Content --}}
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
            <div class="alert-icon align-self-start mt-1">
                <i class="flaticon-warning text-primary"></i>
            </div>
            <div class="alert-text">This example shows a vertically scrolling DataTable that makes use of the CSS3 vh unit in order to dynamically resize the viewport based on the browser window height.</div>
        </div>
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                    Textual HTML5 Inputs
                    </h3>
                </div>
                    <form action="{{ url('/addTopik') }}" method="Post">
                        @csrf
                        <div class="card-body">

                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                        <div class="alert-text">
                                            Here are examples of <code>.form-control</code> applied to each textual HTML5 input type:
                                        </div>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label  class="col-2 col-form-label">Topik</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="topic_name" id="example-text-input"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
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
