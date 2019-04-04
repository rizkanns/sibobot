@extends('layouts.app')

@section('link')
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- chartist CSS -->
<link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<!-- Calendar CSS -->
<link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
<link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
<!-- Custom CSS -->
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/default.css" id="theme" rel="stylesheet">
<!-- CSS tambahan -->
<link href="css/mystyle.css" rel="stylesheet">
<!-- Toggle CSS -->
<link href="css/toggle.css" rel="stylesheet">
<!--alerts CSS -->
<link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
{{-- Datatable --}}
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">

@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
        <br>
        <br>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h1 class="text-center" style="color: #d51100; font-weight: 500">UNIT KERJA</h1>
                            <button type="button" class="btn btn-danger btn-rounded" style="background-color: #d51100;" data-toggle="modal" data-target="#tambah-unit"><i class="fa fa-plus"></i>  Unit Kerja</button>
                            <div class="modal fade" id="tambah-unit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center; font-weight: 450;">Tambah Unit Kerja</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material" action="{{ route('unit_insert') }}" method = "post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Unit Kerja</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Unit Kerja" name="nama_unit_kerja">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi Unit Kerja</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" placeholder="Deskripsi Unit Kerja" name="deskripsi_unit_kerja"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-b-0">
                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                    <button id="divide" type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <table class="table table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Unit Kerja</th>
                                        <th style="text-align: center;">Deskripsi</th>
                                        <th style="text-align: center; width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $x=1; ?>
                                @foreach($unit_kerja as $listunit_kerja)
                                    <tr class="fuckOffPadding">
                                        <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                        <td align="center" style="width: 9%;">{{$listunit_kerja->nama_unit_kerja}}</td>
                                        <td style="text-align: justify;">{{$listunit_kerja->deskripsi_unit_kerja}}</td>
                                        <td align="center">                                           
                                            <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#edit-{{$listunit_kerja->id_unit_kerja}}" data-toggle="tHapusip" data-plaement="top" title="Ubah Unit Kerja"><i class="ti-pencil-alt"></i></button>
                                            <div class="modal fade" id="edit-{{$listunit_kerja->id_unit_kerja}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Sunting {{$listunit_kerja->nama_unit_kerja}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('unit_update', ['id' => $listunit_kerja->id_unit_kerja]) }}" method = "get">
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Unit Kerja</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="inputEmail3" value="{{$listunit_kerja->nama_unit_kerja}}" name="nama_unit_kerja">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi Unit Kerja</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" rows="5" name="deskripsi_unit_kerja">{{$listunit_kerja->deskripsi_unit_kerja}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-b-0">
                                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                                    <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listunit_kerja->id_unit_kerja}}"  data-toggle="tooltip" data-placement="top" title="Hapus Unit Kerja"><i class="ti-trash"></i></button>
                                            <div class="modal fade" id="delete-{{$listunit_kerja->id_unit_kerja}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus {{$listunit_kerja->nama_unit_kerja}}</h4> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('unit_delete', ['id' => $listunit_kerja->id_unit_kerja]) }}" method = "get">
                                                            <h5> Apakah Anda yakin untuk menghapus unit kerja "{{$listunit_kerja->nama_unit_kerja}}"? </h5>
                                                                <div class="form-group m-b-0">
                                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                                    <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Hapus</button>
                                                                </div>
                                                            </form>
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
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2018 &copy; PT Telekomunikasi Indonesia Tbk </footer>
</div>
@endsection

@section ('script')
<!-- Custom Theme JavaScript -->
<script src="js/cbpFWTabs.js"></script>
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
<!-- Datatable -->
<script src="plugins/datatables/jquery-3.3.1.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script> -->

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#example').DataTable();
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
    <script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
@endsection