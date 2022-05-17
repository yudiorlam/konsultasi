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
                    <form action="{{url('/change_password')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf         
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="main-card mb-3  card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <h4>Change Password</h4>
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="current_password">Old password</label>
                                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                                        placeholder="Enter current password">
                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="new_password ">new password</label>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                                        placeholder="Enter the new password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="confirm_password">confirm password</label>
                                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                                    @error('confirm_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-first mt-4 ml-2">
                                                <button type="submit" class="btn btn-primary"
                                                    id="formSubmit">change password</button>
                                            </div>
                                        </div>
                                    </div>
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
