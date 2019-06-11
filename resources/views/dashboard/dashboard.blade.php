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
                        <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>SEDANG BERJALAN</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black; width: 25%">Nama Kegiatan</th>
                                    <th class="text-center" style="background-color: white; color: black;">Nilai Kontrak</th>
                                    <th class="text-center" style="background-color: white; color: black;">Profit</th>
                                    <th class="text-center" style="background-color: white; color: black;">Ready For Service</th>
                                    <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($proyek->where('status_pengajuan','=',NULL)->sortBy('id_proyek') as $listproyek)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$listproyek->judul}}</td>
                                    <td style="vertical-align: middle;">{{number_format($listproyek->nilai_kontrak)}}</td>
                                    <td style="vertical-align: middle;">{{$listproyek->margin_tg}} %</td>
                                    <td style="vertical-align: middle;">{{date('d F Y', strtotime($listproyek->ready_for_service))}}</td>
                                    <td style="vertical-align: middle;">

                                        <a href="{{ route('index_single', [ 'id' => $listproyek->id_proyek]) }}" class="btn btn-default"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="Sunting Data Pengajuan"></i> Detail</a>
                                        <div class="btn-group dropup m-r-10" style="font-size: 13.5px;">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button" data-placement="top" title="Unggah Dokumen Pengajuan"><i class="fa fa-upload"></i> Unggah Scan PDF <span class="caret"> </span></button>
                                            <ul role="menu" class="dropdown-menu" style="min-width: 0">
                                                @if(empty($listproyek->file_p0))
                                                <li><a href="#" class="disableditem" aria-disabled="true"> Dokumen P0</a></li>
                                                @else
                                                <li><a><span data-toggle="modal" data-target="#uploadP0-{{$listproyek->id_proyek}}"> Dokumen P0</span></a></li>
                                                @endif
                                                <li><a><span data-toggle="modal" data-target="#uploadP1-{{$listproyek->id_proyek}}"> Dokumen P1</span></a></li>
                                            </ul>
                                        </div>

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