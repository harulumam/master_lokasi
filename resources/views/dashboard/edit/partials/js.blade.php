<script>
  $(document).ready(function() {
    $('.collapsible-content').show();
    $('.toggle-icon').removeClass('fa-angle-right').addClass('fa-angle-down');

    $('.collapsible-header').on('click', function(e) {
      if ($(e.target).closest('.form-check').length) {
        return;
      }

      var collapsibleContent = $(this).closest('.row').next('.collapsible-content');
      collapsibleContent.toggle();
      $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
    });

    $('.header-table').on('click', function(e) {
      if ($(e.target).closest('.form-check').length) {
        return;
      }

      var collapsibleContent = $(this).next('.content-table');
      collapsibleContent.toggle();
      $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
    });

    $('.div-header-table').on('click', function(e) {
      if ($(e.target).closest('.form-check').length) {
        return;
      }

      var collapsibleContent = $(this).closest('.card').find('.div-content-table');
      collapsibleContent.toggle();
      $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.js"></script>
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
