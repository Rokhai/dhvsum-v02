
$(document).ready(function () {
    $(document).on('shown.bs.modal', '.modal', function () {
        $('.modal-backdrop').before($(this));
    });
});

