@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Riwayat Pemesanan
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
                                                    <!-- <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example2" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        No</th> -->
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Browser
                                                    </th> -->
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        No Pesanan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Tanggan Pesan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Produk yang dipesan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Jumlah Produk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Total Harga Pesanan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPesanan as $pesanan)
                                                <tr class="odd">
                                                    <!-- <td class="dtr-control sorting_1" tabindex="0">1</td> -->
                                                    <td>{{ $pesanan->id }}</td>
                                                    <!-- <td>{{ $pesanan->nama }}</td> -->
                                                    <td>{{ $pesanan->created_at }}</td>
                                                    <td>{{ $pesanan->status}}</td>
                                                    <td>{{ $pesanan->produk['nama']}}</td>
                                                    <td>{{ $pesanan->jumlah_produk}}</td>
                                                    <td class="text-right">@currency($pesanan->total_harga)</td>
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
</div>
@endsection