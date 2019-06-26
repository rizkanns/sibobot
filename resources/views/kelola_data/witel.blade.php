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
                    <h1 class="text-center" style="color: #d51100; font-weight: 500;">WITEL</h1><br><br>
                        <div class="col-md-12">
                            @if(session('create'))
                            <div class="col-md-12 alert alert-success">  
                              {{session('create')}}
                            </div>
                            @elseif(session('update'))
                            <div class="col-md-12 alert alert-success">  
                              {{session('update')}}
                            </div>
                            @elseif(session('delete'))
                            <div class="col-md-12 alert alert-danger">  
                              {{session('delete')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger btn-rounded" style="background-color: #d51100;" data-toggle="modal" data-target="#tambah-witel"><i class="fa fa-plus"></i>  WITEL</button>
                        </div><br><br><br>
                            <div class="modal fade" id="tambah-witel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center; font-weight: 450;">Tambah WITEL</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material" action="{{ route('witel_insert') }}" method = "get">
                                                {{-- {{ csrf_field() }} --}}
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama WITEL</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama WITEL" name="nama_witel">
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Sales Engineering</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="se">
                                                        @foreach ($user->where('id_jabatan','=',2) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Bidding</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="bidding">
                                                        @foreach ($user->where('id_jabatan','=',3) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Manager</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="manager">
                                                        @foreach ($user->where('id_jabatan','=',4) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Deputy</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="deputy">
                                                        @foreach ($user->where('id_jabatan','=',5) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">General Manager</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="gm">
                                                        @foreach ($user->where('id_jabatan','=',6) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Approval</label>
                                                    <div class="col-sm-5">
                                                       <select class="selectpicker m-b-20" data-style="form-control" name="approval">
                                                        @foreach ($user->where('id_jabatan','=',7) as $listuser)
                                                            <option value="{{$listuser->id}}">{{$listuser->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-b-0">
                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                    <button id="divide" type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                    <!-- <div class="table-responsive"> -->
                        <!-- <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=9>DAFTAR WITEL</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Witel</th>
                                    <th class="text-center" style="background-color: white; color: black;">SE</th>
                                    <th class="text-center" style="background-color: white; color: black;">Bidding</th>
                                    <th class="text-center" style="background-color: white; color: black;">Manager</th>
                                    <th class="text-center" style="background-color: white; color: black;">Deputy</th>
                                    <th class="text-center" style="background-color: white; color: black;">GM</th>
                                    <th class="text-center" style="background-color: white; color: black;">Approval</th>
                                    <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $x=1; ?>
                                @foreach($witel as $listwitel)                             
                                    <tr class="fuckOffPadding">
                                        <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                        <td align="center" style="width: 9%;">{{$listwitel->nama_witel}}</td>
                                        <td style="text-align: justify;">
                                            @foreach($se->where('id_witel','=',$listwitel->id_witel) as $listse)
                                                {{$listse->name}}<br>
                                                {{$listse->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($bidding->where('id_witel','=',$listwitel->id_witel) as $listbidding)
                                                {{$listbidding->name}}<br>
                                                {{$listbidding->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($manager->where('id_witel','=',$listwitel->id_witel) as $listmanager)
                                                {{$listmanager->name}}<br>
                                                {{$listmanager->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($deputy->where('id_witel','=',$listwitel->id_witel) as $listdeputy)
                                                {{$listdeputy->name}}<br>
                                                {{$listdeputy->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($gm->where('id_witel','=',$listwitel->id_witel) as $listgm)
                                                {{$listgm->name}}<br>
                                                {{$listgm->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($approval->where('id_witel','=',$listwitel->id_witel) as $listapproval)
                                                {{$listapproval->name}}<br>
                                                {{$listapproval->nik}}
                                            @endforeach
                                        </td>

                                        <td align="center">
                                            <a class="btn btn-danger btn-rounded" href="{{ route('witel_single', ['id_witel' => $listwitel->id_witel]) }}"  style="float: left;"><i class="ti-pencil-alt"></i></a>

                                            <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i></button>
                                            <div class="modal fade" id="delete-{{$listwitel->id_witel}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus </h4> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('witel_delete', ['id' => $listwitel->id_witel]) }}" method = "get">
                                                            <h5> Apakah Anda yakin untuk menghapus "{{$listwitel->nama_witel}}" "? </h5>
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
                        </table> -->
                        <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=9>DAFTAR WITEL</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Witel</th>
                                    <th class="text-center" style="background-color: white; color: black;">SE</th>
                                    <th class="text-center" style="background-color: white; color: black;">Bidding</th>
                                    <th class="text-center" style="background-color: white; color: black;">Manager</th>
                                    <th class="text-center" style="background-color: white; color: black;">Deputy</th>
                                    <th class="text-center" style="background-color: white; color: black;">GM</th>
                                    <th class="text-center" style="background-color: white; color: black;">Approval</th>
                                    <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $x=1; ?>
                                @foreach($witel as $listwitel)                             
                                    <tr class="fuckOffPadding">
                                        <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                        <td align="center" style="width: 9%;">{{$listwitel->nama_witel}}</td>
                                        <td style="text-align: justify;">
                                            @foreach($se->where('id_witel','=',$listwitel->id_witel) as $listse)
                                                {{$listse->name}}<br>
                                                {{$listse->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($bidding->where('id_witel','=',$listwitel->id_witel) as $listbidding)
                                                {{$listbidding->name}}<br>
                                                {{$listbidding->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($manager->where('id_witel','=',$listwitel->id_witel) as $listmanager)
                                                {{$listmanager->name}}<br>
                                                {{$listmanager->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($deputy->where('id_witel','=',$listwitel->id_witel) as $listdeputy)
                                                {{$listdeputy->name}}<br>
                                                {{$listdeputy->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($gm->where('id_witel','=',$listwitel->id_witel) as $listgm)
                                                {{$listgm->name}}<br>
                                                {{$listgm->nik}}
                                            @endforeach
                                        </td>
                                        <td style="text-align: justify;">
                                            @foreach($approval->where('id_witel','=',$listwitel->id_witel) as $listapproval)
                                                {{$listapproval->name}}<br>
                                                {{$listapproval->nik}}
                                            @endforeach
                                        </td>

                                        <td align="center">
                                            <a class="btn btn-danger btn-rounded" href="{{ route('witel_single', ['id_witel' => $listwitel->id_witel]) }}"  style="float: left;"><i class="ti-pencil-alt"></i></a>

                                            <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i></button>
                                            <div class="modal fade" id="delete-{{$listwitel->id_witel}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus </h4> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('witel_delete', ['id' => $listwitel->id_witel]) }}" method = "get">
                                                            <h5> Apakah Anda yakin untuk menghapus "{{$listwitel->nama_witel}}" "? </h5>
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
                    <!-- </div> -->
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