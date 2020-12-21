<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">
            <b>&copy; {{ trans('admin.all_rights') }}</b>
        </span>
        <span class="float-md-right d-none d-md-block">
            <a href="https://github.com/mostfaswaisi93">mostfaswaisi93</a>
            <i class="feather icon-heart pink"></i>
        </span>
        <button class="btn btn-primary btn-icon scroll-top" type="button">
            <i class="feather icon-arrow-up"></i>
        </button>
    </p>
</footer>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ url('admin_files/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ url('admin_files/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('admin_files/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('admin_files/app-assets/js/core/app.js') }}"></script>
<script src="{{ url('admin_files/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->

{{-- Custom js --}}
<script src="{{ asset('admin_files/js/image_preview.js') }}"></script>

{{-- CDN --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

{!! Toastr::message() !!}

<script>
    $(document).ready(function () {
        CKEDITOR.config.language    =  "{{ app()->getLocale() }}";
    });

    function FileUpload() {
        event.preventDefault();
        document.getElementById("image").click();
    };

    function IconUpload() {
        event.preventDefault();
        document.getElementById("icon").click();
    };

    function getDataTableLanguage() {
        var lang = $('html').attr('lang');
        return '//cdn.datatables.net/plug-ins/1.10.21/i18n/' + lang + '.json'
    }
</script>

@stack('scripts')

</body>
<!-- END: Body-->

</html>