@extends('layouts.app')

@section('link')
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
                <div class="col-sm-12">
                    <div class="white-box">
                        @foreach($witel as $listwitel)
                        <h1 class="text-center" style="color: #d51100; font-weight: 500">{{$listwitel->nama_witel}}</h1><br><br>
                        @endforeach
                        <form class="form-horizontal form-material" action="{{ route('witel') }}" method = "get">
                            <div class="form-group">
                                @foreach ($se->where('id_witel','=',$listwitel->id_witel) as $listse)
                                <label for="inputEmail3" class="col-sm-3 control-label">Sales Engineer</label>
                                <div class="col-sm-6">
                                    <!-- <select class="selectpicker m-b-20" data-style="form-control" name="id_witel">
                                        @foreach ($se as $listse)
                                            <option value="{{$listwitel->id_witel}}">{{$listse->name}}</option>
                                        @endforeach
                                    </select> -->
                                    <!-- @foreach ($se->where('id_witel','=',$listwitel->id_witel) as $listse) -->
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama Sales Engineer" name="id_witel" value="{{$listse->name}}">
                                    <!-- @endforeach -->
                                </div>
                                <div class="col-sm-1">
                                    <a class="btn btn-danger btn-rounded" href="{{ route('witel_detil_delete', ['id_witel' => $listwitel->id_witel,'id_jabatan' => $listse->id_jabatan]) }}"><i class="ti-trash"></i> Reset</a>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Bidding</label>
                                <div class="col-sm-6">
                                    @foreach($bidding->where('id_witel','=',$listwitel->id_witel) as $listbidding)
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama Bidding" name="id_witel" value="{{$listbidding->name}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i> Reset</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Manager</label>
                                <div class="col-sm-6">
                                    @foreach($manager->where('id_witel','=',$listwitel->id_witel) as $listmanager)
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama Manager" name="id_witel" value="{{$listmanager->name}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i> Reset</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Deputy</label>
                                <div class="col-sm-6">
                                    @foreach($deputy->where('id_witel','=',$listwitel->id_witel) as $listdeputy)
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama Deputy" name="id_witel" value="{{$listdeputy->name}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i> Reset</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">General Manager</label>
                                <div class="col-sm-6">
                                    @foreach($gm->where('id_witel','=',$listwitel->id_witel) as $listgm)
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama General Manager" name="id_witel" value="{{$listgm->name}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i> Reset</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approval</label>
                                <div class="col-sm-6">
                                    @foreach($approval->where('id_witel','=',$listwitel->id_witel) as $listapproval)
                                        <input disabled type="text" class="form-control" id="inputEmail3" placeholder="Nama Approval" name="id_witel" value="{{$listapproval->name}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete-{{$listwitel->id_witel}}" data-plaement="top" title="Hapus WITEL"><i class="ti-trash"></i> Reset</button>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                               <!--  <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                {{-- <a href="form-justifikasi-proyek.html"><i class="fa fa-arrow-circle-right m-t-30" style="color: #d51100; float: right; font-size: 250%"></i></a> --}} -->
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2018 &copy; PT Telekomunikasi Indonesia Tbk </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
@endsection

@section('script')
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>    
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!-- chartist chart -->
    <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script> 
    <script type="text/javascript" src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script> 
    <script src="{{ asset('js/dashboard1.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
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
@endsection