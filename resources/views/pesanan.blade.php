@extends('layouts.admin-lte')

@section('content-admin')
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Pesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Pesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center flex-grow-1">
                                <h3 class="card-title">Tabel Pesanan</h3>
                            </div>
                            <form class="d-flex" id="report" action="{{ url('/manajemen/report/pesanan/downloadReport') }}" method="GET">
                                <input name="startDate" type="hidden"/>
                                <input name="endDate" type="hidden"/>
                                <div class="form-group mr-2">
                                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="daterangereport">
                                    </div>
                                    
                                </div>
                                <div ><button id="downloadSubmit" class="btn btn-success" type="submit" disabled>Print Report</a></div>
                            </form>
                            
                        </div>

                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                            class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Browser
                                                    </th> -->
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        ID Pesanan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Nama Pelanggan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Tanggal Pesan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Status Pesanan</th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($listPesanan) < 1)
                                                    <tr >
                                                        <td class="text-center" colspan="6"> Tidak ada data </td>
                                                    </tr>
                                                @endif
                                                @foreach($listPesanan as $pesanan)
                                                <tr class="odd">
                                                    <td style="vertical-align: middle">{{ $pesanan->id }}</td>
                                                    <td style="vertical-align: middle">{{ $pesanan->pelanggan->nama}}</td>
                                                    <td style="vertical-align: middle">{{ $pesanan->created_at }}</td>
                                                    <!-- <td>{{ $pesanan->status}}</td> -->
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" 
                                                                style="color: black;background-color: transparent;border: 0px;"
                                                                type="button" 
                                                                id="dropdownMenuButton" 
                                                                data-toggle="dropdown" 
                                                                aria-haspopup="true" 
                                                                aria-expanded="false">
                                                                {{ $pesanan->status}}
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <button class="dropdown-item @if($pesanan->status == 'ON_PROCESS') active @endif" 
                                                                    data-msg="Update status pesanan {{ $pesanan->id}} menjadi ON_PROCESS, lanjutkan ?"
                                                                    data-link="{{url('/manajemen/pesanan/').'/'.$pesanan->id.'/ON_PROCESS'}}"
                                                                    data-toggle="modal"
                                                                    data-target="#confirmationModal">
                                                                    ON_PROCESS
                                                                </button>
                                                                <button class="dropdown-item @if($pesanan->status == 'ON_DELIVERY') active @endif" 
                                                                    data-msg="Update status pesanan {{ $pesanan->id}} menjadi ON_DELIVERY, lanjutkan ?"
                                                                    data-link="{{url('/manajemen/pesanan/').'/'.$pesanan->id.'/ON_DELIVERY'}}"
                                                                    data-toggle="modal"
                                                                    data-target="#confirmationModal">
                                                                    ON_DELIVERY
                                                                </button>
                                                                <button class="dropdown-item @if($pesanan->status == 'CANCELLED') active @endif" 
                                                                    data-msg="Update status pesanan {{ $pesanan->id}} menjadi CANCELLED, lanjutkan ?"
                                                                    data-link="{{url('/manajemen/pesanan/').'/'.$pesanan->id.'/CANCELLED'}}"
                                                                    data-toggle="modal"
                                                                    data-target="#confirmationModal">
                                                                    CANCELLED
                                                                </button>
                                                                <button class="dropdown-item @if($pesanan->status == 'DONE') active @endif" 
                                                                    data-link="{{url('/manajemen/pesanan/').'/'.$pesanan->id.'/DONE'}}"
                                                                    data-toggle="modal"
                                                                    data-msg="Update status pesanan {{ $pesanan->id}} menjadi DONE, lanjutkan ?"
                                                                    data-target="#confirmationModal">
                                                                    DONE
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                      <a href="{{ url('/manajemen/pesanan/'.$pesanan->id)}}" class="btn btn-primary">View Detail</button>
                                                    </td>
                                                    <!-- <td>A</td> -->
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Rendering engine</th>
                                                    <th rowspan="1" colspan="1">Browser</th>
                                                    <th rowspan="1" colspan="1">Platform(s)</th>
                                                    <th rowspan="1" colspan="1">Engine version</th>
                                                    <th rowspan="1" colspan="1">CSS grade</th>
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                                <!-- table footer --> 
                                <!-- <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example2_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example2_previous"><a href="#" aria-controls="example2"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="example2" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="example2" data-dt-idx="6" tabindex="0"
                                                        class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="example2_next"><a
                                                        href="#" aria-controls="example2" data-dt-idx="7" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
