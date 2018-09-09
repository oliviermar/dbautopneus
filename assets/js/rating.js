$(document).ready(function(e) {
    $('body').on('click', '[name="rating"]', function(e) {
        target = $(e.currentTarget);
        value = $(target).val();
        if ($(value).hasClass('half')) {
            value = value + 0.5;
        }

        $('.rate-value').val(value);
    });

    $('#rate-form').on('submit', function(e) {
        e.preventDefault();
        $form = $(this);
        $.ajax({
            method: 'POST',
            action: $form.attr('action'),
            data: $form.serialize()
        })
        .done(function (data) {
            if (data.success == 'false') {
                $('.rate-container').html(data.form);
            } else {
                openModal();
                cleanForm();
            }
        });
    });
});

function openModal() {
    $('.modal').show();
    $('.title-modal').html('Merci');
    $('.content-modal').html('Votre évaluation a bien été enregistrer!');
}

function cleanForm() {
    $('#rate-form').find('.reset-form').click();
    $('input[name="rating"]').each(function(key, item) {
        $(item).prop('checked', false);
    });
}
