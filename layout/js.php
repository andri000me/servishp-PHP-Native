    <!-- Jquery Core Js -->
    <script type="text/javascript" src="../plugins/jquery-datatable/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#listdata').DataTable();
        } );
    </script>
    <script src="../plugins/jquery/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    
    <!-- Jquery DataTable Plugin Js -->
    <script type="text/javascript" src="../plugins/jquery-datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-datatable/dataTables.bootstrap4.min.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>
    
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function () {
                $('#notif-penjualan').load('notifikasi_penjualan.php').fadeIn("slow");
                $('#notif-penjualan-baru').load('notifikasi_penjualan.php').fadeIn("slow");
                $('#notif-servis').load('notifikasi_servis.php?tipe=all').fadeIn("slow");
                $('#notif-servis-baru').load('notifikasi_servis.php?tipe=servis').fadeIn("slow");
                $('#notif-konsul-baru').load('notifikasi_servis.php?tipe=konsul').fadeIn("slow");
            }, 1000);
        </script>

        <script type="text/javascript">
            $(function () {
                new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
                $('.count-to').countTo();

                $('.sales-count-to').countTo({
                    formatter: function (value, options) {
                        return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
                    }
                });
            });

            function getChartJs(type) {
                var config = null;

                if (type === 'line') {
                    config = {
                        type: 'line',
                        data: {
                            labels: [<?php echo '"January", "February", "March", "April", "May", "June", "July"'?>],
                            datasets: [{
                                label: "Penjualan",
                                data: [65, 59, 80, 81, 56, 55, 40],
                                borderColor: 'rgba(0, 188, 212, 0.75)',
                                pointBorderColor: 'rgba(0, 188, 212, 0)',
                                pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                pointBorderWidth: 1
                            }, {
                                label: "Konsultasi",
                                data: [48, 78, 63, 59, 66, 37, 40],
                                borderColor: 'rgba(233, 30, 99, 0.75)',
                                pointBorderColor: 'rgba(233, 30, 99, 0)',
                                pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                pointBorderWidth: 1
                            }, {
                                label: "Servis",
                                data: [28, 48, 40, 19, 86, 27, 90],
                                borderColor: 'rgba(50, 40, 100, 0.75)',
                                pointBorderColor: 'rgba(50, 40, 100, 0.75)',
                                pointBackgroundColor: 'rgba(50, 40, 100, 0.9)',
                                pointBorderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: false
                        }
                    }
                }
                return config;
            }
        </script>