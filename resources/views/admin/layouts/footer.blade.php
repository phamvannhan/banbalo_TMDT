</div>

    <!-- jQuery -->
    <script src="{{url('bootstrap/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('bootstrap/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('bootstrap/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
   <!--  <script src="{{url('bootstrap/vendor/datatables/js/jquery.dataTables.min.js')}}"></script> -->
    <script src="{{url('bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('bootstrap/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('bootstrap/dist/js/sb-admin-2.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    @yield('scripts')

</body>

</html>