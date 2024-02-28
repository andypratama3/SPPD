  <!-- plugins:js -->
  <script src="{{ asset('asset_dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('asset_dashboard/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('asset_dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/template.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('asset_dashboard/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
  <script src="https://kit.fontawesome.com/2feee0b69e.js" crossorigin="anonymous"></script>

 @stack('javascript')
