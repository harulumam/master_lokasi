<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          {{ $breadcrumb_title ?? '' }}
          {{ $breadcrumb_sub_title ?? '' }}
          <ol class="breadcrumb">
              {{ $slot ?? ''}}
          </ol>
        </div>
      </div>
    </div>
</div>