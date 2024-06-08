document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('resend-form');
    const alertPopup = document.getElementById('alert-popup');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const email = document.getElementById('email_adm_blog').value;

        console.log(`Link de redefinição de senha reenviado para ${email}`);
        
        alertPopup.style.display = 'block';
        
        // Esconde o alerta após 5 segundos
        setTimeout(() => {
            alertPopup.style.display = 'none';
        }, 5000);
    });
});
