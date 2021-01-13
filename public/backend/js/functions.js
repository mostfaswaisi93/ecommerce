// CKEDITOR Language
$(document).ready(function() {
    CKEDITOR.config.language = "{{ app()->getLocale() }}";
});

// Footer Year
document.getElementById("year").innerHTML = new Date().getFullYear();

// File Upload
function FileUpload() {
    event.preventDefault();
    document.getElementById("image").click();
}

// Icon Upload
function IconUpload() {
    event.preventDefault();
    document.getElementById("icon").click();
}

// DataTable Language
function getDataTableLanguage() {
    var lang = $('html').attr('lang');
    return '//cdn.datatables.net/plug-ins/1.10.22/i18n/' + lang + '.json';
}

// Check all
function check_all() {
    $('input[class="item_checkbox"]:checkbox').each(function() {
        if ($('input[class="check_all"]:checkbox:checked').length == 0) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
    });
}

// Delete all
function delete_all() {
    $(document).on('click', '.del_all', function() {
        $('#form_data').submit();
    });

    $(document).on('click', '.delBtn', function() {
        var item_checked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;
        if (item_checked > 0) {
            $('.record_count').text(item_checked);
            $('.not_empty_record').removeClass('hidden');
            $('.empty_record').addClass('hidden');
        } else {
            $('.record_count').text('');
            $('.not_empty_record').addClass('hidden');
            $('.empty_record').removeClass('hidden');
        }
        $('#mutlipleDelete').modal('show');
    });
}