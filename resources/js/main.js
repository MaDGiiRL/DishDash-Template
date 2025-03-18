import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 500,
    easing: 'ease-in-out',
    once: true
});




//*Sciprt per modale login/register 
document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();
    let formData = new FormData(this);

    fetch("/register", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            }
        })
        .catch(error => console.log(error));
});


// Gestione della richiesta di reset password
$('#forgotPasswordModal form').submit(function (e) {
    e.preventDefault();

    let email = $('#forgot-password-email').val();

    $.ajax({
        url: '/password/email',
        method: 'POST',
        data: {
            email: email,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            alert(response.message);
            $('#forgotPasswordModal').modal('hide');
        },
        error: function (response) {
            alert(response.responseJSON.message);
        }
    });
});



