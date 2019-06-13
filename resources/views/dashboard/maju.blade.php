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
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table success-table example">
                            <thead>
                                <tr>
                                    <th colspan=7>SUDAH DISETUJUI</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black; width: 25%;">Nama Kegiatan</th>
                                    <th class="text-center" style="background-color: white; color: black;">Nilai Kontrak</th>
                                    {{-- <th class="text-center" style="background-color: white; color: black;">Profit</th> --}}
                                    <th class="text-center" style="background-color: white; color: black;">Ready For Service</th>
                                    <th class="text-center" style="background-color: white; color: black;">Status</th>
                                    <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $y=1; ?>
                                @foreach($setuju as $listproyek)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $y; $y=$y+1; ?></td>
                                    <td style="vertical-align: middle;">{{$listproyek->judul}}</td>
                                    <td style="vertical-align: middle;">{{number_format($listproyek->nilai_kontrak)}}</td>
                                    {{-- <td style="vertical-align: middle;">{{$listproyek->margin_tg}} %</td> --}}
                                    <td style="vertical-align: middle;">{{date('d F Y', strtotime($listproyek->ready_for_service))}}</td>
                                    <td>
                                        <div class="white-box-2">
                                            @if($listproyek->status_pengajuan == 1)
                                            <p class="img-responsive model_img text-success" data-toggle="modal" data-target="#lanjut-{{$listproyek->id_proyek}}"> Lanjut </p>
                                            <div id="lanjut-{{$listproyek->id_proyek}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel"style="font-weight: 450;">Keterangan "{{$listproyek->judul}}"</h4></div>
                                                        <div class="modal-body">
                                                            {{$listproyek->keterangan_proyek}}                                                   
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @elseif($listproyek->status_pengajuan == 2)                                        
                                            <p class="img-responsive model_img text-danger" data-toggle="modal" data-target="#gagal-{{$listproyek->id_proyek}}"> Gagal Lanjut </p>
                                            <div id="gagal-{{$listproyek->id_proyek}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel"style="font-weight: 450;">Keterangan "{{$listproyek->judul}}"</h4></div>
                                                        <div class="modal-body">
                                                            {{$listproyek->keterangan_proyek}}                                                    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">

                                        <span data-toggle="modal" data-target="#view-{{$listproyek->id_proyek}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengajuan"><i class="fa fa-folder-open"></i></button>
                                        </span>
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
                                                                                                            <td><span class="text-muted" style="font-weight: 5 00">File</span></td>
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
                                                    @if(Auth::user()->jabatan->id_jabatan == 1 OR Auth::user()->jabatan->id_jabatan == 2)
                                                    <div class="modal-footer">
                                                        <div class="form-group m-b-0">
                                                            <table class="table table-borderless">
                                                                <form class="form-horizontal form-material" action="{{ route('status_update', ['id'=>$listproyek->id_proyek]) }}" method = "get">
                                                                    <tbody class="detail-text text-left">
                                                                        <tr id="footer-padding">
                                                                            <td style="font-weight: 450; color: black">Status Pengajuan
                                                                                {{-- <label style="font-weight: 450; color: black" class="control-label">Status Pengajuan</label> --}}
                                                                                @if($listproyek->status_pengajuan == NULL)
                                                                                {{-- <div class="btn-group btn-toggle" data-toggle="buttons">
                                                                                    <label class="btn btn-default approved">
                                                                                      <input type="radio" name="status_pengajuan" value="1">APPROVED
                                                                                    </label>
                                                                                    <label class="btn btn-default active notApproved">
                                                                                      <input type="radio" name="status_pengajuan" value="" checked="">NOT APPROVED
                                                                                    </label>
                                                                                  </div> --}}
                                                                                {{-- <div class="radio-list">
                                                                                    <label class="radio-inline p-0">
                                                                                        <div class="radio radio-info">
                                                                                            <input type="radio" name="status_pengajuan" id="radio1" value="1">
                                                                                            <label for="radio1">APPROVED</label>
                                                                                        </div>
                                                                                    </label>
                                                                                    <label class="radio-inline">
                                                                                        <div class="radio radio-info">
                                                                                            <input type="radio" name="status_pengajuan" id="radio2" value="">
                                                                                            <label for="radio2">NOT APPROVED</label>
                                                                                        </div>
                                                                                    </label>
                                                                                </div> --}}
                                                                                <div class="btn-group btn-group-toggle m-l-20" data-toggle="buttons">
                                                                                    <label class="btn btn-success btn-outline approved">
                                                                                        <input type="radio" name="status_pengajuan" value="1" id="option1" autocomplete="off" checked> SETUJUI
                                                                                    </label>
                                                                                    <label class="btn btn-danger active notApproved">
                                                                                        <input type="radio" name="status_pengajuan" value="" id="option2" autocomplete="off"> BELUM DISETUJUI
                                                                                    </label>
                                                                                </div>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="footer-padding">
                                                                            <td style="font-weight: 450; color: black">Keterangan</td>
                                                                        </tr>
                                                                        <tr id="footer-padding">
                                                                            <td>
                                                                                    <textarea class="form-control" rows="5" name="keterangan_proyek" placeholder="Tulis keterangan tentang proyek di sini....">{{$listproyek->keterangan_proyek}}</textarea>
                                                                                    <hr>
                                                                                    <button type="submit" style="float: left;" class="btn btn-danger waves-effect waves-light m-l-10">Simpan</button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                 </form>   
                                                            </table>                
                                                        </div>
                                                    </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if(Auth::user()->jabatan->id_jabatan == 1 OR Auth::user()->jabatan->id_jabatan == 2)
                                        <a href="{{ route('p0_pelanggan_single', ['id_pelanggan' => $listproyek->id_pelanggan, 'id_proyek' => $listproyek->id_proyek, 'id_aspek' => $listproyek->id_aspek]) }}" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sunting Data Pengajuan"></i></a>
                                        @else
                                        @endif

                                        <div class="btn-group dropup m-r-10">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button" title="Unduh Dokumen P0 & P1"><i class="fa fa-download"></i><span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu" style="min-width: 0">

                                                @if(empty($listproyek->file_p0))
                                                <li><a href="#" class="disableditem" aria-disabled="true">P0</a></li>
                                                @else
                                                <li><a href="{{ route('print_p0', ['id' => $listproyek->id_proyek]) }}">P0</a></li>
                                                @endif
                                                <li><a href="{{ route('print_p1', ['id' => $listproyek->id_proyek]) }}">P1</a></li>
                                            </ul>
                                        </div>

                                        @if(Auth::user()->jabatan->id_jabatan == 2)
                                        <span data-toggle="modal" data-target="#delete-{{$listproyek->id_proyek}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Hapus Data Pengajuan Justifikasi"><i class="fa fa-trash"></i></button>
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
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row -->

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
                                        