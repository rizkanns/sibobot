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
                            <h1 class="text-center" style="color: #d51100; font-weight: 500">Rumus Rekomendasi</h1>
                        <form class="form-horizontal form-material" action="{{ route('pelanggan_insert') }}" method = "post">
                            {{ csrf_field() }}
                            <br><br>
                            <div class="row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Parameter</label>
                                <div class="col-sm-4">
                                    <select class="selectpicker m-b-20" data-style="form-control" name="id_witel">
                                        @foreach($parameter as $listparameter)
                                        <option>{{$listparameter->nama_parameter}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Nilai</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nilai" name="nama_pelanggan">
                                </div>
                            </div>
                            <a id='link' onclick='open_fun()' class="pull-right"><i class='fa fa-plus'></i> Tambah</a>
        
                            <div class="row" id="rumus">
                                <label for="inputEmail3" class="col-sm-2 control-label">Parameter</label>
                                <div class="col-sm-4">
                                    <select class="selectpicker m-b-20" data-style="form-control" name="id_witel">
                                        @foreach($parameter as $listparameter)
                                        <option>{{$listparameter->nama_parameter}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Nilai</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nilai" name="nama_pelanggan">
                                </div>
                            </div>

                            <br><br><br><br>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rumus Akhir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Rumus Akhir" name="nama_pelanggan">
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                {{-- <a href="form-justifikasi-proyek.html"><i class="fa fa-arrow-circle-right m-t-30" style="color: #d51100; float: right; font-size: 250%"></i></a> --}}
                            </div>  
                        </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <button type="button" class="btn btn-danger btn-rounded pull-right" style="background-color: #d51100;" data-toggle="modal" data-target="#tambah-parameter"><i class="fa fa-plus"></i>  Parameter</button>
                            <div class="modal fade" id="tambah-parameter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center; font-weight: 450;">Tambah Parameter</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material" action="{{ route('parameter_insert') }}" method = "post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Parameter</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama parameter" name="nama_parameter">
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
                            <h3 class="box-title">Tabel Parameter</h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>Parameter yang Digunakan</h2>
                                    <!-- <p>SALES REPORT</p> -->
                                </div><!-- 
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-info m-t-20">$3,690</h1> </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x=1; ?>
                                    @foreach($parameter as $listparameter)
                                        <tr>
                                            <td><?php echo $x; $x=$x+1; ?></td>
                                            <td class="txt-oflo">{{$listparameter->nama_parameter}}</td>
                                            @if($listparameter->id_parameter % 1)
                                            <td><span class="label label-success label-rouded">DIPAKAI</span> </td>
                                            @else
                                            <td></td>
                                            @endif
                                            <td><a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i> Edit</a><a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Petunjuk Penggunaan</h3>
                            <div class="comment-center p-t-10">
                                <!-- <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5><span class="time">10:20 AM   20  may 2016</span> <span class="label label-rouded label-info">PENDING</span>
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a> </div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5><span class="time">10:20 AM   20  may 2016</span> <span class="label label-rouded label-success">APPROVED</span>
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit singh</h5><span class="time">10:20 AM   20  may 2016</span> <span class="label label-rouded label-danger">REJECTED</span>
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                </div> -->
                            </div>
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
@endsection