const form = document.getElementById('reset-form');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const email = document.getElementById('email_adm_blog').value;

    console.log(`Link de redefinição de senha enviado para ${email}`);

    window.location.href = '3.aviso_envio_do_link.html';
});