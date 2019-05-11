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
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h1 class="text-center" style="color: #d51100; font-weight: 500">Rumus Margin</h1>
                            <br><br><br><br><br><br>
                            <form class="form-horizontal form-material" action="{{ route('margin_insert') }}" method = "get">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Layanan Revenue</label>
                                <div class="col-sm-9">
                                    <select data-style="form-control" name="id_revenue" > <!--Call run() function-->
                                    <option selected="true" disabled="disabled"> -- Pilih Layanan -- </option>
                                    <option id="tahunan" value="1">Tahunan</option>
                                    <option id="bulanan" value="2">Bulanan</option>
                                    <option id="otc" value="3">OTC</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rumus</label>
                                <div class="col-sm-9">
                                    <select data-style="form-control" name="id_rumus"> <!--Call run() function-->
                                    <option selected="true" disabled="disabled"> -- Pilih Rumus -- </option>
                                    @foreach($rumus as $listrumus)
                                    <option value="{{$listrumus->id_rumus}}">{{$listrumus->rumus_awal}}</option>
                                    @endforeach
                                </div>
                            </div>
                            
                            <br><br>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nilai</label>
                                    <div class="col-sm-3">
                                        <input type="decimals" class="form-control" name="nilai_pc"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nilai</label>
                                    <div class="col-sm-3">
                                        <input type="decimals" class="form-control" placeholder="Nilai Bobot" name="nilai_pc"> 
                                    </div>
                                    <div class="col-sm-1">
                                        <h4>x</h4>
                                    </div>
                                    <div class="col-sm-1">
                                        <h4>PPH</h4>
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
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
    <script type="text/javascript">
        var x = document.getElementById("rumus");

        function open_fun() { 
            document.getElementById('link').innerHTML = "<a id='link' href='javascript:clo_fun()'><i class='fa fa-minus'></i> Hapus Rumus</a>";
            x.style.display = "block";
        }
        
        function clo_fun() {
            document.getElementById('link').innerHTML = "<a id='link' onclick='open_fun()'><i class='fa fa-plus'></i> Tambah Rumus</a>";        
            x.style.display = "none";
        }
    </script>

<script>
    function run() {
        document.getElementById("srt").value = document.getElementById("Ultra").value;
    }
</script>

<script>
    function up() {
        var dop = document.getElementById("srt").value;
        pop(dop); // Calling function pop
    }

    function pop(val) {
        alert(val);
    }?
</script>

@endsection