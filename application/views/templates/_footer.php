    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © MTs Bilingual 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by <a href="https://www.instagram.com/ach.m4d22/" target="_blank">Romo Sakti</a></span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->



    <!-- plugins:js -->
    <script src="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="<?= base_url() ?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url() ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>assets/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url() ?>assets/js/dashboard.js"></script>
    <script src="<?= base_url() ?>assets/js/data-table.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.js"></script>
    <!-- End custom js for this page-->
    <script src="<?= base_url() ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- run datatable -->
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <!-- end run -->
    </body>

    </html>