
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Sebaran Wifi Kabupaten Karawang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--   <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

  <!-- datetimepicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <!-- notification -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />


  <script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>

  <!-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
  <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

  <script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
  <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
  <!-- hightchart -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <!-- <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
  <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script> -->
  <!-- notification -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>



  <script type="text/javascript" src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
  <!-- panggil adapter jquery ckeditor -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/ckeditor/adapters/jquery.js"></script>
  </head>

  <body class="hold-transition layout-top-nav">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
        <div class="container">
          <h1 class="text-white">Aplikasi Sebaran WIFI Kabupaten Karawang</h1>
        </div>
      </nav>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <!-- <h1 class="m-0 text-dark">Aplikasi Sebaran WIFI Kabupaten Karawang</h1> -->
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="container">
              <div class="card">
                <div class="card-body">
                  <!-- <div class="row"> -->
                      <!-- <div class="col-md-12"> -->
        <form method="POST" id="wifi_result" action="" class="form_create">
          <section class="content">
            <div class="container-fluid">
              <div class="card">
                <div class="card-body">
                  <div class="table table-responsive">
                      <table class="table table-bordered table-striped" id="show_table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Wifi</th>
                             <?php if ($this->session->userdata('level') == 'KLO') { ?>
                            <th>Action</th>
                              <?php } ?>
                          </tr>
                        </thead>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
          </div>
        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
          <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Detrie Noviami</a>.</strong> All rights reserved.
        </div>
        <!-- <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Detrie Noviami</a>.</strong> All rights reserved. -->
      </footer>
    </div>

    <script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">

    var table;
    var save_method; //for save method string
    // var base_url = '<?php echo base_url();?>';

    $(document).ready(function() {
    //datatables
    table = $('#show_table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // "pagination": true,
        "order": [], //Initial no order.
        "ajax": {
            "url": "<?php echo site_url('Admin_data/datatables')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
          {
              "targets": [0], //last column
              "orderable": false, //set not orderable
          },
        ],
    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
    });

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax

    }


    </script>
  </body>

</html>
