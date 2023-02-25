<!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; WLK-TECH 2023</span>
                </div>
            </div>
        </footer>
<!-- End of Footer -->
    </div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript-->
    <script src="./admin/vendor/jquery/jquery.min.js"></script>
    <!-- summernote -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="./admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="./admin/vendor/bootstrap/js/popper.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    
    
    <!-- Core plugin JavaScript-->
    <script src="./admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./admin/vendor/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="./admin/js/demo/chart-area-demo.js"></script>
    <script src="./admin/js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="./admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./admin/js/demo/datatables-demo.js"></script>
    <script>
            $(document).ready(function () {
                $(".delete_id").click(function(){
                    $id = $(this).data('id');
                    $("#delete_id").val($id);
                })
                // $('#myTable').DataTable();

            });
    </script>
    
    <script>
        $('#jobDesc').summernote({
            placeholder: 'Job Description',
            tabsize: 2,
            height: 120,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    
</body>

</html>

