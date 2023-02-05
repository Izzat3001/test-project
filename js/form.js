const form = document.getElementById('contactForm');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = $(this).serialize();

    jQuery
        .ajax({
            method: 'POST',
            url: 'mail.php',
            data: formData,
        })
        .done(function (msg) {
            msg = JSON.parse(msg);
            if (msg.status) {
            alert("Message sent successfully!")
            form.reset();
            } else {
                alert("Something went wrong. The message was not sent.\n Try again.")
            }
        });
})