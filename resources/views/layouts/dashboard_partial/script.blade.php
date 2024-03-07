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
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('asset_dashboard/js/SwetAlert/index.js') }}"></script>

 @stack('javascript')
