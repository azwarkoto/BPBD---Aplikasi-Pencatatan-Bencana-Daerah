<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $domain ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= $domain ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?= $domain ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= $domain ?>assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- Import Select2 CSS-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <?php include('tampilan/_include/sidebar.php');?>
    <div class="main-panel" id="main-panel">
      <?php include('tampilan/_include/navbar.php');?>
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <form method="POST">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="title">Tambah Desa</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 px-1">
                      <div class="form-group">
                        <label>Nama Kota</label>
                        <select name="kota" class="form-control kota" required>
                          <option value="">- pilih Kabupaten/Kota -</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 px-1">
                      <div class="form-group">
                        <label>Nama Kecamatan</label>
                        <select name="kecamatan" class="form-control kecamatan" required>
                          <option value="">- pilih Kecamatan -</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 px-1">
                      <div class="form-group">
                        <label>Nama Desa</label>
                        <input type="text" class="form-control" placeholder="Nama Kecamatan" name="desa" id="desa" value="<?= $detail['nama_desa'];?>" required>
                        <input type="hidden" name="id" id="id" required value="<?= $detail['id_desa'];?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="padding: 20px">
              <button type="submit" class="btn btn-primary btn-block">Tambah Kota</button>
              <a class="btn btn-danger btn-block" href="<?=$domain?>kota.php">Batal</a>
              </div>
            </div>
          </div>
        </form>
      </div>
      <?php include('tampilan/_include/footer.php');?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= $domain ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= $domain ?>assets/js/core/popper.min.js"></script>
  <script src="<?= $domain ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= $domain ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Import Select2 JS-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= $domain ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= $domain ?>assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= $domain ?>assets/js/bpbd.js"></script>
  <script type="text/javascript">
    $(function(){
       $('.kota').select2({
           minimumInputLength: 1,
           allowClear: true,
           placeholder: 'masukkan nama propinsi',
           ajax: {
              dataType: 'json',
              url: '<?= $domain;?>desa.php?halaman=daftar-kota-list',
              delay: 800,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      }).on('select2:select', function (evt) {
         var data = $(".kota option:selected").text();
         //alert("Data yang dipilih adalah "+data);
      });
      $('.kota').on('change', function() {
            var id = this.value;
            console.log(id);
            $('.kecamatan').select2({
           minimumInputLength: 1,
           allowClear: true,
           placeholder: 'masukkan nama propinsi',
           ajax: {
              dataType: 'json',
              url: '<?= $domain;?>desa.php?halaman=daftar-kecamatan-list&kota='+id,
              delay: 800,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      }).on('select2:select', function (evt) {
         var data = $(".kecamatan option:selected").text();
         //alert("Data yang dipilih adalah "+data);
      });
        });
 });
</script>
</body>

</html>