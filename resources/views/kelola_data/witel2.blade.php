@extends('layouts.app')

@section('link')
    <!-- Datatable -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}"> -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <br>
                <br>
                <!--/.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h1 class="text-center" style="color: #d51100; font-weight: 500">WITEL</h1>
                            <button type="button" class="btn btn-danger btn-rounded" style="background-color: #d51100;" data-toggle="modal" data-target="#tambah-witel"><i class="fa fa-plus"></i>  WITEL</button>
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
                                                <div class="form-group m-b-0">
                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                    <button id="divide" type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <!-- <table class="table table-hover example"> -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">WITEL</th>
                                        <th style="text-align: center;">SE</th>
                                        <th style="text-align: center;">Bidding</th>
                                        <th style="text-align: center;">Manager</th>
                                        <th style="text-align: center;">Deputy</th>
                                        <th style="text-align: center;">GM</th>
                                        <th style="text-align: center;">Approval</th>
                                        <th style="text-align: center; width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $x=1; ?>
                                @foreach($witel as $listwitel)                             
                                    <tr>
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
                                            <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#edit-{{$listwitel->id_witel}}" data-plaement="top" title="Ubah WITEL"><i class="ti-pencil-alt"></i></button>
                                            <div class="modal fade" id="edit-{{$listwitel->id_witel}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Sunting </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('witel_update', ['id_witel' => $listwitel->id_witel]) }}" method = "get">
                                                                {{-- {{ csrf_field() }} --}}
                                                                <div class="row">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama WITEL</label>
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama WITEL" name="nama_witel" value="{{$listwitel->nama_witel}}">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; PT Telekomunikasi Indonesia Tbk </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
@endsection

@section ('script')
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script> 
    <!-- Bootstrap Core JavaScript --> 
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script> 
    <!-- Menu Plugin JavaScript --> 
    <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script> 
    <!--slimscroll JavaScript --> 
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script> 
    <!--Wave Effects --> 
    <script src="{{ asset('js/waves.js') }}"></script> 
    <!--Counter js --> 
    <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script> 
    <!-- chartist chart --> 
    <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script> 
    <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script> 
    <!-- Sparkline chart JavaScript --> 
    <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script> 
    <!-- Custom Theme JavaScript --> 
    <script src="{{ asset('js/custom.min.js') }}"></script> 
    <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script> 
    <script type="text/javascript" src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script> 
    <script src="{{ asset('js/dashboard1.js') }}"></script> 
    <script> 
    jQuery(document).ready(function() { 
        // For select 2 
        $(".select2").select2(); 
        $('.selectpicker').selectpicker(); 
        //Bootstrap-TouchSpin 
        $(".vertical-spin").TouchSpin({ 
            verticalbuttons: true, 
            verticalupclass: 'ti-plus', 
            verticaldownclass: 'ti-minus' 
        }); 
        var vspinTrue = $(".vertical-spin").TouchSpin({ 
            verticalbuttons: true 
        }); 
        if (vspinTrue) { 
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove(); 
        } 
        $("input[name='tch1']").TouchSpin({ 
            min: 0, 
            max: 100, 
            step: 0.1, 
            decimals: 2, 
            boostat: 5, 
            maxboostedstep: 10, 
            postfix: '%' 
        }); 
        $("input[name='tch2']").TouchSpin({ 
            min: -1000000000, 
            max: 1000000000, 
            stepinterval: 50, 
            maxboostedstep: 10000000, 
            prefix: '$' 
        }); 
        $("input[name='tch3']").TouchSpin(); 
        $("input[name='tch3_22']").TouchSpin({ 
            initval: 40 
        }); 
        $("input[name='tch5']").TouchSpin({ 
            prefix: "pre", 
            postfix: "post" 
        }); 
        // For multiselect 
        $('#pre-selected-options').multiSelect(); 
        $('#optgroup').multiSelect({ 
            selectableOptgroup: true 
        }); 
        $('#public-methods').multiSelect(); 
        $('#select-all').click(function() { 
            $('#public-methods').multiSelect('select_all'); 
            return false; 
        }); 
        $('#deselect-all').click(function() { 
            $('#public-methods').multiSelect('deselect_all'); 
            return false; 
        }); 
        $('#refresh').on('click', function() { 
            $('#public-methods').multiSelect('refresh'); 
            return false; 
        }); 
        $('#add-option').on('click', function() { 
            $('#public-methods').multiSelect('addOption', { 
                value: 42, 
                text: 'test 42', 
                index: 0 
            }); 
            return false; 
        }); 
    }); 
    </script> 
    <!-- Datatable -->
    <!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script> -->
    <!-- <script type="text/javascript">
    $(document).ready(function()
    {
        $('.example').DataTable(
        {
            "pagingType": "full_numbers"
        } );
    } );
    </script> -->
@endsection