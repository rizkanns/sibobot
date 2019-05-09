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
<link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap4.min.css"/>

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
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row -->
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
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Counter js -->
<script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- chartist chart -->
<script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
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
<script src="js/custom.min.js"></script>
<script src="js/dashboard1.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.js"></script>
<script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>

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