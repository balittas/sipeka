<?php include 'header.php'; ?>
<?php include '../../koneksi.php'; ?>

<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="../../dist/css/morris.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_pk WHERE id_user=" . $_SESSION['id']);
                        $jumlah = mysqli_num_rows($data);
                        ?>
                        <h3><?php echo $jumlah; ?></h3>
                        <p>Total <?= $_SESSION['hak_akses']; ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="pk.php" class="small-box-footer">Menuju Data <?= $_SESSION['hak_akses']; ?><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- solid sales graph -->
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Grafik Perjanjian Kinerja Tahun 2021</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div id="bar-chart"></div>
                    </div>
                    <!-- /.box-body -->
                    <!-- ./col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.box-footer -->
    </section>
</div>

<!-- /.content -->
<script src="../../dist/js/morris.js"></script>
<script src="../../dist/js/raphael.js"></script>
<script>
    Morris.Bar({
        element: 'bar-chart',
        barGap: 4,
        barSizeRatio: 0.4,
        data: [
            <?php
            $data = mysqli_query($koneksi, "SELECT id_pk, sasaran, target, capaian FROM tb_capaian JOIN tb_pk WHERE (id_pk, capaian) IN (SELECT id_pk, MAX(capaian) AS capaian FROM tb_capaian GROUP BY id_pk) AND tb_capaian.id_pk=tb_pk.id AND id_user=" . $_SESSION['id']);
            while ($d = mysqli_fetch_array($data)) {
            ?> {
                    y: '<?php echo $d["sasaran"]; ?>',
                    a: <?php echo $d["target"]; ?>,
                    b: <?php echo $d["capaian"]; ?>
                },
            <?php
            }
            ?>
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        ymax: 100,
        labels: ['target', 'capaian'],
    });
</script>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>