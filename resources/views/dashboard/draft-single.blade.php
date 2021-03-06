@extends('layouts.app')

@section('link')
<!-- bootsrap CSS -->
<link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
<!-- toast CSS -->
<link href="{{ asset('plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
<!-- morris CSS -->
<link href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
<!-- chartist CSS -->
<link href="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
<!-- CSS tambahan -->
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
<!-- Toggle CSS -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet">
<!--alerts CSS -->
<link href="{{ asset('plugins/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}"/>

@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <br>
        <br>
        <!-- .row -->
        <div class="row">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <a href="{{ route('index') }}" class="btn btn-danger btn-outline btn-rounded"><i class="fa fa-arrow-left" data-toggle="tooltip" data-placement="top" title="Kembali ke Dashboard"></i> Dashboard</a><br><br>
                        <table class="table color-table danger-table">
                            <thead>
                                <tr>
                                    <th colspan=6>DETAIL PROYEK</th>
                                </tr>
                                <!-- <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                </tr> -->
                            </thead>
                            <tbody>
                                <?php $x=1; ?>
                                @foreach($proyek->where('status_pengajuan','=',NULL)->sortBy('id_proyek') as $listproyek)
                                <tr class="fuckOffPadding">
                                    <td style="width: 60%;">
                                        <h4 style="font-weight: 500">{{$listproyek->judul}}</h4><br>
                                        &emsp;&emsp;<span class="text-muted" style="font-weight: 500">Pelanggan</span>
                                        &emsp;&nbsp;<span class="text-muted" style="font-weight: 500">:</span>
                                        {{$listproyek->nama_pelanggan}}<br>
                                        &emsp;&emsp;<span class="text-muted" style="font-weight: 500">Nilai Kontrak</span>
                                        &nbsp;<span class="text-muted" style="font-weight: 500">:</span>
                                        Rp. {{number_format($listproyek->nilai_kontrak)}}<br>
                                        &emsp;&emsp;<span class="text-muted" style="font-weight: 500">Margin %</span>
                                        &emsp;&emsp;<span class="text-muted" style="font-weight: 500">:</span>
                                        {{$listproyek->margin_tg}}<br>
                                        &emsp;&emsp;<span class="text-muted" style="font-weight: 500">Lihat Data</span>
                                        <span class="text-muted" style="font-weight: 500">:</span>
                                        &emsp;&ensp;<span data-toggle="modal" data-target="#view-{{$listproyek->id_proyek}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengajuan"><i class="fa fa-search"> Detail</i></button>
                                        </span><br><br>
                                        <div class="modal fade" id="view-{{$listproyek->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$listproyek->judul}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <ul class="nav nav-pills m-b-30 ">
                                                                    <li class="active"> <a href="#profilpelanggan-onprogress-{{$listproyek->id_proyek}}" data-toggle="tab" aria-expanded="false">Profil Pelanggan</a> </li>
                                                                    <li class=""> <a href="#proyekkegiatan-onprogress-{{$listproyek->id_proyek}}" data-toggle="tab" aria-expanded="false">Proyek/Kegiatan</a> </li>
                                                                    <li> <a href="#aspekbisnis-onprogress-{{$listproyek->id_proyek}}" data-toggle="tab" aria-expanded="true">Aspek Bisnis</a> </li>
                                                                </ul>
                                                                <div class="tab-content br-n pn">
                                                                            <div id="profilpelanggan-onprogress-{{$listproyek->id_proyek}}" class="tab-pane active">
                                                                                    <table class="table table-borderless">
                                                                                            <tbody class="detail-text text-left">
                                                                                                <tr>
                                                                                                    <td style="width: 17%"><span class="text-muted" style="font-weight: 500">Nama Pelanggan</span></td>
                                                                                                    <td style="width: 1%"><span class="text-muted" style="font-weight: 500">:</td>
                                                                                                    <td><span>{{$listproyek->nama_pelanggan}}</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Alamat Pelanggan</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td>{{$listproyek->alamat_pelanggan}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">No Telepon</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td>{{$listproyek->nomor_pelanggan}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Jenis Pelanggan</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td class="text-success">{{$listproyek->jenis_pelanggan}}</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                            </div>
                                                                            <div id="proyekkegiatan-onprogress-{{$listproyek->id_proyek}}" class="tab-pane">
                                                                                    <div class="row">
                                                                                            <div class="col-sm-12 col-lg-6">
                                                                                                <table class="table table-borderless" style="table-layout: fixed">
                                                                                                    <tbody class="detail-text text-left">
                                                                                                        <tr>
                                                                                                            <td style="width: 1%"><span class="text-muted" style="font-weight: 500;">Judul Kegiatan</span></td>
                                                                                                            <td style="width: 0%"><span class="text-muted" style="font-weight: 500;">:</span></td>
                                                                                                            <td style="width: 1%"><span>{{$listproyek->judul}}</span></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Latar Belakang 1</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Latar Belakang 2</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Alamat Delivery</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->alamat_delivery}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Mekanisme Pembayaran</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->mekanisme_pembayaran}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Rincian Pola Pembayaran</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->rincian_pembayaran}} pembayaran oleh pelanggan</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">File</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            {{-- DIPERUNTUKKAN UNTUK TABEL RUANG LINGKUP PEKERJAAN (P0) --}}
                                                                                                            @if(!empty($listproyek->file_p0))
                                                                                                            <td>
                                                                                                                <div class="hoverImage">
                                                                                                                    <img src="{{asset('plugins/images/file_p0/'. $listproyek->file_p0)}}" class="image">
                                                                                                                    <div class="overlay">
                                                                                                                        <div class="text">Tabel Ruang Lingkup Pekerjaan (P0)</div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td></td>
                                                                                                            @endif
                                                                                                            <td>
                                                                                                                <div class="hoverImage">
                                                                                                                    <img src="{{asset('plugins/images/file_p1/'. $listproyek->file_p1)}}" class="image">
                                                                                                                    <div class="overlay">
                                                                                                                        <div class="text">Tabel Rincian Pekerjaan (P1)</div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-lg-6">
                                                                                                <table class="table table-borderless">
                                                                                                    <tbody class="detail-text text-left">
                                                                                                        <tr>
                                                                                                            <td style="width: 39%"><span class="text-muted" style="font-weight: 500">Unit Kerja</span></td>
                                                                                                            <td style="width: 0%"><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td><span>{{$listproyek->nama_unit_kerja}}</span></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Nama Mitra</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->nama_mitra}}
                                                                                                            @if($listproyek->id_mitra_2) dan
                                                                                                                @foreach($mitra as $listmitra)
                                                                                                                    @if($listmitra->id_proyek==$listproyek->id_proyek)
                                                                                                                    {{$listmitra->nama_mitra}}
                                                                                                                    @endif
                                                                                                                @endforeach
                                                                                                            @endif</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Skema Bisnis</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->skema_bisnis}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Saat Penggunaan</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->saat_penggunaan}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Tanggal Pemasukan dokumen</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->pemasukan_dokumen}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Ready for Service</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->ready_for_service}}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">Masa Kontrak</span></td>
                                                                                                            <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                            <td>{{$listproyek->masa_kontrak}}</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                            </div>
                                                                            <div id="aspekbisnis-onprogress-{{$listproyek->id_proyek}}" class="tab-pane">
                                                                                @if($listproyek->id_mitra_2)
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-lg-6">
                                                                                        <table class="table table-borderless">
                                                                                            <tbody class="detail-text text-left">
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Layanan Revenue</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td><span>{{$listproyek->layanan_revenue}}</span></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Beban Mitra</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->beban_mitra)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Nilai Kontrak</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->nilai_kontrak)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Margin (Rp)</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->rp_margin)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Margin (%)</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{$listproyek->margin_tg}}</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-lg-6">
                                                                                        <table class="table table-borderless">
                                                                                            <tbody class="detail-text text-left">
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Revenue Connectivity</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                     <td>{{number_format($listproyek->revenue_connectivity)}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Harga Produk</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td><span>{{number_format($listproyek->colocation)}}</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Revenue CPE Proyek</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td>{{number_format($listproyek->revenue_cpe_proyek)}}</td>
                                                                                                    </tr>
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">Revenue CPE Mitra</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                    <td>{{number_format($listproyek->revenue_cpe_mitra)}}</td>
                                                                                                </tr>    
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-lg-12">
                                                                                        <table class="table table-borderless">
                                                                                            <tbody class="detail-text text-left">
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Layanan Revenue</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td><span>{{$listproyek->layanan_revenue}}</span></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Beban Mitra</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->beban_mitra)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Nilai Kontrak</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->nilai_kontrak)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Margin (Rp)</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->rp_margin)}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Margin (%)</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{$listproyek->margin_tg}}</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">Revenue Connectivity</span></td>
                                                                                                        <td><span class="text-muted" style="font-weight: 500">:</span></td>
                                                                                                        <td>{{number_format($listproyek->revenue_connectivity)}}</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(Auth::user()->jabatan->id_jabatan == 1 OR Auth::user()->jabatan->id_jabatan == 2)
                                        &emsp;&ensp;<a href="{{ route('p0_pelanggan_single', ['id_pelanggan' => $listproyek->id_pelanggan, 'id_proyek' => $listproyek->id_proyek, 'id_aspek' => $listproyek->id_aspek]) }}" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sunting Data Pengajuan"></i> Ubah P0</a>
                                        <a href="{{ route('p1_pelanggan_single', ['id_pelanggan' => $listproyek->id_pelanggan, 'id_proyek' => $listproyek->id_proyek, 'id_aspek' => $listproyek->id_aspek]) }}" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sunting Data Pengajuan"></i> Ubah P1</a>
                                        @endif
                                        <br>
                                        <br>
                                    </td>
                                    <td style="vertical-align: middle;" class="text-center">
                                        
                                        @if(Auth::user()->jabatan->id_jabatan == 1 OR Auth::user()->jabatan->id_jabatan == 2)
                                        <div class="btn-group dropup m-r-10">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button" title="Unduh Dokumen P0 & P1"><i class="fa fa-download"></i> Unduh Dokumen <span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu" style="min-width: 0">

                                                @if(empty($listproyek->file_p0))
                                                <li><a href="#" class="disableditem" aria-disabled="true">P0</a></li>
                                                @else
                                                <li><a href="{{ route('print_p0', ['id' => $listproyek->id_proyek]) }}">P0</a></li>
                                                @endif
                                                <li><a href="{{ route('print_p1', ['id' => $listproyek->id_proyek]) }}">P1</a></li>
                                            </ul>
                                        </div>

                                        <!-- <div class="btn-group dropup m-r-10" style="font-size: 13.5px;">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button" data-placement="top" title="Unggah Dokumen Pengajuan"><i class="fa fa-upload"></i> Unggah Scan PDF <span class="caret"> </span></button>
                                            <ul role="menu" class="dropdown-menu" style="min-width: 0">
                                                @if(empty($listproyek->file_p0))
                                                <li><a href="#" class="disableditem" aria-disabled="true"> Dokumen P0</a></li>
                                                @else
                                                <li><a><span data-toggle="modal" data-target="#uploadP0-{{$listproyek->id_proyek}}"> Dokumen P0</span></a></li>
                                                @endif
                                                <li><a><span data-toggle="modal" data-target="#uploadP1-{{$listproyek->id_proyek}}"> Dokumen P1</span></a></li>
                                            </ul>
                                        </div> -->

                                        <div class="modal fade" id="uploadP0-{{$listproyek->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$listproyek->judul}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                @if($listproyek->bukti_scan_p0 == NULL)
                                                                    <form enctype="multipart/form-data" action="{{ route('bukti_p0_insert', ['id_proyek' => $listproyek->id_proyek]) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <label class="control-label">Unggah Scan Dokumen P0</label>
                                                                        <div class="col-sm-12">
                                                                            <input type="file" accept="application/pdf" id="input-file-disable-remove" class="dropify" name="bukti_scan_p0" data-show-remove="false" /> </div>
                                                                        </div>
                                                                        <hr> 
                                                                        <button type="submit" style="float: right;margin-top: -1.5%;" class="btn btn-danger waves-effect waves-light">Simpan</button>
                                                                    </form>
                                                                @else
                                                                    <form action="{{ route('bukti_p0_update', ['id_proyek' => $listproyek->id_proyek]) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" style="float: center;" class="btn btn-danger waves-effect waves-light m-t-10"><i class="fa fa-trash"></i> Hapus</button>
                                                                    </form>
                                                                    <br>
                                                                    <div class="row" style="height: 1000px; width: 100%;">
                                                                        <embed src="plugins/pdf/bukti_scan_p0/{{$listproyek->bukti_scan_p0}}" type="application/pdf" width="100%" height="100%"></embed>
                                                                    </div>
                                                                    
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="uploadP1-{{$listproyek->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$listproyek->judul}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                @if($listproyek->bukti_scan_p1 == NULL)
                                                                    <form enctype="multipart/form-data" action="{{ route('bukti_p1_insert', ['id_proyek' => $listproyek->id_proyek]) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <label class="control-label">Unggah Scan Dokumen P1</label>
                                                                        <div class="col-sm-12">
                                                                            <input type="file" accept="application/pdf" id="input-file-disable-remove" class="dropify" name="bukti_scan_p1" data-show-remove="false" /> </div>
                                                                        </div>
                                                                        <hr>
                                                                        <button type="submit" style="float: right;margin-top: -1.5%;" class="btn btn-danger waves-effect waves-light">Simpan</button>
                                                                    </form>
                                                                @else
                                                                    <form action="{{ route('bukti_p1_update', ['id_proyek' => $listproyek->id_proyek]) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" style="float: center;" class="btn btn-danger waves-effect waves-light m-t-10"><i class="fa fa-trash"></i> Hapus</button>
                                                                    </form>
                                                                    <br>
                                                                    <div class="row" style="height: 1000px; width: 100%;">
                                                                        <embed src="plugins/pdf/bukti_scan_p1/{{$listproyek->bukti_scan_p1}}" type="application/pdf" width="100%" height="100%"></embed>
                                                                    </div>

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    
                                    </td>
                                    <!-- <td style="vertical-align: middle;" class="text-center">
                                        @if(Auth::user()->jabatan->id_jabatan == 2)
                                        <span data-toggle="modal" data-target="#delete-{{$listproyek->id_proyek}}">
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data Pengajuan Justifikasi"><i class="fa fa-trash"></i> Hapus Proyek</button>
                                        </span>
                                        <div class="modal fade" id="delete-{{$listproyek->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus "{{$listproyek->judul}}"</h4> 
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal form-material" action = "{{ route('proyek_delete', ['id_proyek' => $listproyek->id_proyek]) }}" method = "get">
                                                            <h5> Apakah Anda yakin untuk menghapus proyek "{{$listproyek->judul}}"? </h5>
                                                            <div class="form-group m-b-0">
                                                                <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right;">Keluar</a>
                                                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        @else
                                        @endif
                                    </td> -->
                                </tr>
                                @if(Auth::user()->jabatan->id_jabatan == 1 OR Auth::user()->jabatan->id_jabatan == 2)
                                <tr class="fuckOffPadding">
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody class="detail-text text-left">
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; width: 40%; font-size: 20px;" class="text-danger" colspan="3">Rekomendasi Proyek</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black; width: 30%;">Layanan Revenue</td>
                                                    <td>{{$listproyek->layanan_revenue}}</td>
                                                    <td style="width: 35%;"></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Revenue Connectivity</td>
                                                    <td>Rp {{number_format($listproyek->revenue_connectivity)}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Revenue CPE Proyek</td>
                                                    <td>Rp {{number_format($listproyek->revenue_cpe_proyek)}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Total Margin</td>
                                                    <td>Rp {{number_format($listproyek->rp_margin)}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Nilai Kontrak</td>
                                                    <td>Rp {{number_format($listproyek->nilai_kontrak)}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Minimum Total Margin</td>
                                                    @if($listproyek->layanan_revenue == 'Tahunan')
                                                        @foreach($rumus->where('id_nilai',1) as $listrumus)    
                                                            <td>Rp {{number_format($listproyek->nilai_kontrak*$listrumus->nilai_pc)}}</td>
                                                            @if($listproyek->rp_margin > ($listproyek->nilai_kontrak*$listrumus->nilai_pc))
                                                                <td  style="font-weight: 300; color: black;">Memenuhi &emsp;<i class="fa fa-check btn btn-success btn-rounded"></i></td>
                                                            @else
                                                                <td  style="font-weight: 300; color: black;">Tidak Memenuhi &emsp;<i class="fa fa-times btn btn-danger btn-rounded"></i></td>
                                                            @endif
                                                        @endforeach
                                                    @elseif($listproyek->layanan_revenue == 'Bulanan')
                                                        @foreach($rumus->where('id_nilai',2) as $listrumus)    
                                                            <td>Rp {{number_format($listproyek->rp_margin-($listproyek->nilai_kontrak*$listproyek->masa_kontrak*$listrumus->nilai_pc))}}</td>
                                                            @if($listproyek->rp_margin > ($listproyek->nilai_kontrak*$listproyek->masa_kontrak*$listrumus->nilai_pc))
                                                                <td  style="font-weight: 300; color: black;">Memenuhi &emsp;<i class="fa fa-check btn btn-success btn-rounded"></i></td>
                                                            @else
                                                                <td  style="font-weight: 300; color: black;">Tidak Memenuhi &emsp;<i class="fa fa-times btn btn-danger btn-rounded"></i></td>
                                                            @endif
                                                        @endforeach
                                                    @elseif($listproyek->layanan_revenue == 'OTC')
                                                        @foreach($rumus->where('id_nilai',3) as $listrumus)    
                                                            <td>Rp {{number_format($listproyek->rp_margin-($listproyek->nilai_kontrak*$listrumus->nilai_pc))}}</td>
                                                            @if($listproyek->rp_margin > ($listproyek->nilai_kontrak*$listrumus->nilai_pc))
                                                                <td  style="font-weight: 300; color: black;">Memenuhi &emsp;<i class="fa fa-check btn btn-success btn-rounded"></i></td>
                                                            @else
                                                                <td  style="font-weight: 300; color: black;">Tidak Memenuhi &emsp;<i class="fa fa-times btn btn-danger btn-rounded"></i></td>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <br>
                                                </tr>

                                                @if($listproyek->bukti_scan_p0==NULL)
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Izin Proyek P0</td>
                                                    <td></td>
                                                    <td  style="font-weight: 300; color: black;">Tidak &emsp;<i class="fa fa-times btn btn-danger btn-rounded"></i></td>
                                                    <br>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Hasil Rekomendasi</td>
                                                    <td colspan="2"> Maka dari itu proyek direkomendasikan untuk distujui.</td>
                                                    <td  style="font-weight: 300; color: black;">Rekomendasi:<br>Tidak Disetujui &emsp;<i class="fa fa-times btn btn-danger btn-rounded"></i><br>
                                                    </td>
                                                    <br>
                                                </tr>
                                                @else
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Izin Proyek P0</td>
                                                    <td></td>
                                                    <td  style="font-weight: 300; color: black;">Memenuhi &emsp;<i class="fa fa-check btn btn-success btn-rounded"></i></td>
                                                    <br>
                                                </tr>
                                                <tr id="footer-padding">
                                                    <td style="font-weight: 450; color: black;">Hasil Rekomendasi</td>
                                                    <td> Maka dari itu proyek direkomendasikan untuk distujui.</td>
                                                    <td  style="font-weight: 300; color: black;">Rekomendasi:<br>Setujui &emsp;<i class="fa fa-check btn btn-success btn-rounded"></i><br><br>
                                                    
                                                    <!-- @if($listproyek->layanan_revenue == 'Tahunan')
                                                        @foreach($rumus->where('id_nilai',1) as $listrumus)
                                                            @if($listproyek->rp_margin < (12*$listproyek->nilai_kontrak*$listrumus->nilai_pc))
                                                                Nilai kontrak min: {{number_format($listproyek->nilai_kontrak*$listrumus->nilai_pc)}}
                                                            @else
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    @elseif($listproyek->layanan_revenue == 'Bulanan')
                                                        @foreach($rumus->where('id_nilai',2) as $listrumus)
                                                            @if($listproyek->rp_margin < ($listproyek->nilai_kontrak*$listproyek->masa_kontrak*$listrumus->nilai_pc))
                                                                Nilai kontrak min: {{number_format($listproyek->nilai_kontrak*$listproyek->masa_kontrak*$listrumus->nilai_pc)}}
                                                            @else
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    @elseif($listproyek->layanan_revenue == 'OTC')
                                                        @foreach($rumus->where('id_nilai',3) as $listrumus)    
                                                            @if($listproyek->rp_margin < ($listproyek->nilai_kontrak*$listrumus->nilai_pc))
                                                                Nilai kontrak min: {{number_format($listproyek->nilai_kontrak*$listrumus->nilai_pc)}}
                                                            @else
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    @endif -->
                                                    </td>
                                                    <br>
                                                </tr>
                                                @endif
                                            </tbody>
                                            </table>   
                                    </td>
                                    <td colspan="2">
                                        <table class="table table-borderless">
                                                <form class="form-horizontal form-material" action="{{ route('status_update', ['id'=>$listproyek->id_proyek]) }}" method = "get">
                                                    <tbody class="detail-text text-left">
                                                        <tr id="footer-padding">
                                                            <td style="font-weight: 450; color: black">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <label style="font-weight: 450; color: black" class="control-label">Status Pengajuan</label>
                                                                @if($listproyek->status_pengajuan == NULL)
                                                                <br>
                                                                <br>
                                                                <div class="btn-group btn-group-toggle m-l-20" data-toggle="buttons">
                                                                    <label class="btn btn-success btn-outline approved">
                                                                        <input type="radio" name="status_pengajuan" value="1" id="option1" autocomplete="off" checked> SETUJUI
                                                                    </label>
                                                                    <label class="btn btn-danger active notApproved">
                                                                        <input type="radio" name="status_pengajuan" value="2" id="option2" autocomplete="off"> TIDAK DISETUJUI
                                                                    </label>
                                                                </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <br>
                                                        <br>
                                                        <tr id="footer-padding">
                                                            <td style="font-weight: 450; color: black">Keterangan</td>
                                                        </tr>
                                                        <tr id="footer-padding">
                                                            <td>
                                                                    <textarea class="form-control" rows="5" name="keterangan_proyek" placeholder="Tulis keterangan tentang proyek di sini....">{{$listproyek->keterangan_proyek}}</textarea>
                                                                    <button type="submit" style="float: left;" class="btn btn-danger waves-effect waves-light m-l-10">Simpan</button>
                                                            </td>
                                                        </tr>
                                                 </form>   
                                            </table>   
                                    </td>
                                </tr>

                                                    
                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2018 &copy; PT Telekomunikasi Indonesia Tbk </footer>
</div>
@endsection

@section ('script')
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--Counter js -->
<script src="{{ asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
<!-- chartist chart -->
<script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/cbpFWTabs.js') }}"></script>
<!-- PDF Object JavaScript -->
<script src="{{ asset('js/pdfobject.js') }}"></script>
<script src="{{ asset('js/pdfobject.min.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dashboard1.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

<script type="text/javascript">
(function() {
    [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
        new CBPFWTabs(el);
    });
});

$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
        $(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
        $(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
        $(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
        $(this).find('.btn').toggleClass('btn-info');
    }
    
    $(this).find('.btn').toggleClass('btn-default');
       
});
</script>

<script type="text/javascript">
$(document).ready(function()
{
    $('.example').DataTable(
    {
        "pagingType": "full_numbers"
    } );
} );
</script>

<script>
    $(document).ready(function(){
        $('.approved').click(function() {
            $(this).removeClass('btn-success btn-outline');
            $(this).addClass('btn-success');
            $('.notApproved').removeClass('btn-danger');
            $('.notApproved').addClass('btn-danger btn-outline');
        });
        $('.notApproved').click(function() {
            $('.approved').removeClass('btn-success');
            $('.approved').addClass('btn-success btn-outline');
            $(this).removeClass('btn-danger btn-outline');
            $(this).addClass('btn-danger');
        });
    })
</script>
@endsection