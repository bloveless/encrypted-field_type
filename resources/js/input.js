$(function () {

    // Initialize the encrypted inputs.
    $('.encrypted-field-type').each(function () {

        var wrapper = $(this);

        // Toggle text
        wrapper.on('click', '[data-toggle="text"]', function () {
            if (wrapper.find('input').attr('type') == 'password') {
                wrapper.find('input').attr('type', 'text');
            } else {
                wrapper.find('input').attr('type', 'password');
            }
        });
    });
});
