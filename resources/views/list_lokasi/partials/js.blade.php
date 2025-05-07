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
      '.div-content-table');
    collapsibleContent.toggle();
    $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
