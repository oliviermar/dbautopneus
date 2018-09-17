$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        $form = $(e.currentTarget);
        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            data: $form.serialize(),
        })
        .done(function (data) {
            if (data.success == 'false') {
                $('.contact-container').html(data.form);
            } else {
                openModal();
                cleanForm();
            }
        });
    });

    $('body').on('click', '.close-modal', function() {
        $('.modal').hide();
    });
});

function openModal() {
    $('.modal').show();
    $('.title-modal').html('Confirmation');
    $('.content-modal').html('Votre message a bien été envoyer!');
}

function cleanForm() {
    $('#contact-form').find('.reset-form').click();
}
