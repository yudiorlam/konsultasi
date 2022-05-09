{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Basic Example</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control kt-select2 select2" id="kt_select2_1" name="">
                    <option value="">--Pilih Konsultasi--</option>
                    @foreach ($tiket as $tiket )
                    <option value="{{ $tiket->id }}">{{ $tiket->topic_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" col-lg-2 col-md-9 col-sm-12">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
