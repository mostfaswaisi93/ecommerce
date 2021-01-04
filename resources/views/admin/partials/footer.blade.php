<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left d-block d-md-inline-block">
            <b>{{ trans('admin.copyright') }} &copy; <span id="year"></span></b>
            <a href="https://github.com/mostfaswaisi93">mostfaswaisi93</a>
            <b> - {{ trans('admin.all_rights') }}.</b>
        </span>
        <span class="float-md-right d-none d-md-block"><b>v1.0.0</b></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button">
            <i class="feather icon-arrow-up"></i>
        </button>
    </p>
</footer>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ url('backend/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('backend/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('backend/app-assets/js/core/app.js') }}"></script>
<script src="{{ url('backend/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->

{{-- Custom js --}}
<script src="{{ asset('backend/js/image_preview.js') }}"></script>

{{-- CDNs --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

{{-- DataTables CDNs --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.foundation.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/vfs_fonts.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

{!! Toastr::message() !!}

<script>
    $(document).ready(function () {
        CKEDITOR.config.language    =  "{{ app()->getLocale() }}";
    });

    // Footer Year
    document.getElementById("year").innerHTML = new Date().getFullYear();

    function FileUpload() {
        event.preventDefault();
        document.getElementById("image").click();
    }

    function IconUpload() {
        event.preventDefault();
        document.getElementById("icon").click();
    }

    function getDataTableLanguage() {
        var lang = $('html').attr('lang');
        return '//cdn.datatables.net/plug-ins/1.10.22/i18n/' + lang + '.json';
    }
</script>

@stack('scripts')

</body>
<!-- END: Body-->

</html>