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
                @foreach($pelanggan as $listpelanggan)
                @foreach($proyek as $listproyek)
                @foreach($aspek as $listaspek)
                {{-- {{ $listpelanggan->id_pelanggan }} {{ $listproyek->id_proyek }} {{ $listaspek->id_aspek }} --}}
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h1 class="text-center" style="color: #d51100; font-weight: 500">PROFIL PELANGGAN</h1>
                            <form class="form-horizontal form-material" action="{{ route('p0_pelanggan_update', ['id_pelanggan' => $listpelanggan->id_pelanggan, 'id_proyek' => $listproyek->id_proyek, 'id_aspek' => $listaspek->id_aspek]) }}" method = "get">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Pelanggan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Pelanggan" name="nama_pelanggan" value="{{$listpelanggan->nama_pelanggan}}"> </div>
                                </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Alamat Pelanggan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Alamat Pelanggan" name="alamat_pelanggan" value="{{$listpelanggan->alamat_pelanggan}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="No Telepon" name="nomor_pelanggan" value="{{$listpelanggan->nomor_pelanggan}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Pelanggan</label>
                                <div class="col-sm-9 radio-list">
                                    <label class="radio-inline p-0">
                                        <div class="radio radio">
                                            @if($listpelanggan->jenis_pelanggan == 'Government')
                                            <input active checked="checked" id="radio1" value="Government" type="radio" name="jenis_pelanggan">
                                            @else
                                            <input active id="radio1" value="Government" type="radio" name="jenis_pelanggan">
                                            @endif
                                            <label for="radio1">Government</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline p-0">
                                        <div class="radio radio">
                                            @if($listpelanggan->jenis_pelanggan == 'Enterprise')
                                            <input active checked="checked" id="radio2" value="Enterprise" type="radio" name="jenis_pelanggan">
                                            @else
                                            <input active id="radio2" value="Enterprise" type="radio" name="jenis_pelanggan">
                                            @endif
                                            <label for="radio2">Enterprise</label>
                                        </div>
                                    </label>
                                    <label class="radio-inline p-0">
                                        <div class="radio radio">
                                            @if($listpelanggan->jenis_pelanggan == 'Bisnis')
                                            <input active checked="checked" id="radio2" value="Enterprise" type="radio" name="jenis_pelanggan">
                                            @else
                                            <input active id="radio1" value="Bisnis" type="radio" name="jenis_pelanggan">
                                            @endif
                                            <label for="radio2">Bisnis</label>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputEmail3" class="col-sm-3 control-label">Witel</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker m-b-20" data-style="form-control" name="id_wilayah">
                                        @foreach ($witel as $listwitel)
                                            <option value="{{$listwitel->id_wilayah}}" @if($listproyek->id_wilayah == $listwitel->id_wilayah) selected @endif>{{$listwitel->nama_wilayah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Selanjutnya</button>
                            </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                @endforeach
                @endforeach
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