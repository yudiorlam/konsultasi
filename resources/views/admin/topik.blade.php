{{-- Extends layout --}}
@extends('admin.layout.appAdmin')

{{-- Content --}}
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
            <div class="alert-text">The foundation for DataTables is progressive enhancement, so it is very adept at reading table information directly from the DOM. This example shows how easy it is to add searching, ordering and paging to your HTML table by simply running DataTables on it. See official documentation
            <a class="font-weight-bold" href="https://datatables.net/examples/data_sources/dom.html" target="_blank">here</a>.</div>
        </div>
        <!--end::Notice-->
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-favourite text-primary"></i>
                    </span>
                    <h3 class="card-label">HTML(DOM) Sourced Data</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-print"></i>
                                        <span class="nav-text">Print</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-copy"></i>
                                        <span class="nav-text">Copy</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-excel-o"></i>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-text-o"></i>
                                        <span class="nav-text">CSV</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="{{ url('/topic') }}" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#CreateModal">
                        <i class="la la-plus"></i>New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/addTopik') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Topik</label>
                                            <input type="text" name="topic_name" class="form-control"  required>   
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Topik</th>h>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($topik as $topik)
                        <tr>
                            <td>{{ $no ++ }}</td>
                            <td>{{ $topik->topic_name }}</td>
                            <td>
                                @if($topik->status == 0)
                                    <span class="label label-primary label-inline font-weight-lighter mr-2">Aktif</span>
                                @else 
                                    <span class="label label-danger label-pill label-inline mr-2">Tidak Aktif</span>
                                @endif
                            </td>
                            <td> 
                                <a href="{{ route('editStatus', $topik->id)}}" data-toggle="modal" data-target="#editModal-{{ $topik->id }}"><i class="fas fa-edit" style="color: blue"></i></a>|<a href=""><i class="fas fa-trash-alt" style="color: red"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="editModal-{{ $topik->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateStatusTopik') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="{{$topik->id}}">
                                                    <select   name="status" class="form-control"> 
                                                        <option @if($topik->status == 0) selected @endif value="0">Aktif</option>
                                                        <option @if($topik->status == 1) selected @endif value="1">Tidak Aktif</option>       
                                                    </select>
                                                    {{-- <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ $topik->name }}" required>    --}}
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>                                     
        </div>
    </div>



    


            {{-- <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Topik</th>
                            <th>Admin Topik</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($topik as $topik)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $topik->topic_name }}</td>
                                <td>{{ $topik->name }}</td>
                                <td nowrap="nowrap">fddfd</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}


@endsection
@section('js')
        <script src="{{ asset('/') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('/') }}/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{ asset('/') }}/js/scripts.bundle.js"></script>
		
		<script src="{{ asset('/') }}/js/pages/crud/datatables/basic/scrollable.js"></script>

        <script src="{{ asset('/') }}plugins/custom/datatables/datatables.bundle.js"></script>
		
		<script src="{{ asset('/') }}js/pages/crud/datatables/data-sources/html.js"></script>

        <script>

            $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $('body').on('click', '#submit', function (event) {
                event.preventDefault()
                var id = $("#id").val();
                var name = $("#name").val();
            
                $.ajax({
                url: 'edit/' + id,
                type: "POST",
                data: {
                    id: id,
                    name: name,
                },
                dataType: 'json',
                success: function (data) {
                    
                    $('#companydata').trigger("reset");
                    $('#practice_modal').modal('hide');
                    window.location.reload(true);
                }
            });
            });

            $('body').on('click', '#editCompany', function (event) {

                event.preventDefault();
                var id = $(this).data('id');
                console.log(id)
                $.get('edit/' + id ', function (data) {
                    $('#userCrudModal').html("Edit category");
                    $('#submit').val("Edit category");
                    $('#practice_modal').modal('show');
                    $('#id').val(data.data.id);
                    $('#name').val(data.data.name);
                })
            });

            }); 
    </script>

@endsection
