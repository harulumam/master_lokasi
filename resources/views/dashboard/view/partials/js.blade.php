<script>
  // Membuka semua konten collapsible
  $(document).ready(function() {
    $('.collapsible-content').show();
    $('.toggle-icon').removeClass('fa-angle-right').addClass('fa-angle-down');
  });

  // dropdown
  $('.collapsible-header').on('click', function() {
    var collapsibleContent = $(this).closest('.row').next('.collapsible-content');
    collapsibleContent.toggle();
    $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
  });

  // dropdown table
  $('.header-table').on('click', function() {
    var collapsibleContent = $(this).next('.content-table');
    collapsibleContent.toggle();
    $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
  });

  // dropdown div table
  $('.div-header-table').on('click', function() {
    var collapsibleContent = $(this).closest('.card').find(
    '.div-content-table'); // Cari .content-table dalam card yang sama
    collapsibleContent.toggle();
    $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
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
