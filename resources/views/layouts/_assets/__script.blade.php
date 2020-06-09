  <!-- Vendor js -->
        <script src="{{asset('assets/admin/js/vendor.min.js')}}"></script>

        <!-- optional plugins -->
        <script src="{{asset('assets/admin/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/admin/libs/flatpickr/flatpickr.min.js')}}"></script>

        <!-- page js -->

        <script src="{{asset('assets/admin/js/pages/dashboard.init.js')}}"></script>

    <script src="{{asset('assets/admin/select2/select2.min.js')}}"></script>
         <!-- toaster -->
        <script src="{{asset('assets/admin/toastr/toastr.min.js')}}"></script>
  <script>
     @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
      @endif
  </script>
