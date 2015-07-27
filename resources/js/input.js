$(function () {

    // Initialize the encrypted inputs.
    $('.encrypted-field-type').each(function () {

        var wrapper = $(this);

        wrapper.find('[data-toggle="text"]').click(function () {

            if (wrapper.find('input').attr('type') == 'password') {
                wrapper.find('input').attr('type', 'text').focus();
            } else {
                wrapper.find('input').attr('type', 'password').focus();
            }

            return false;
        });
    });
});
