document.addEventListener("DOMContentLoaded", () => {
    function showErrorToast(message) {
        const toast = document.getElementById('custom-error-toast');
        const toastMsg = document.getElementById('custom-error-message');
        if(!toast || !toastMsg) return;
        
        toastMsg.innerText = message;
        
        toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
        toast.classList.add('opacity-100', 'translate-y-0');
        
        setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
        }, 4000);
    }

    function showSuccessToast() {
        const toast = document.getElementById('custom-success-toast');
        if(!toast) return;
        
        toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
        toast.classList.add('opacity-100', 'translate-y-0');
        
        setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
        }, 5000);
    }

    const form = document.getElementById('cotizacion-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Verificar si el captcha fue completado antes de enviar
            if (typeof grecaptcha !== 'undefined') {
                const recaptchaResponse = grecaptcha.getResponse();
                if (recaptchaResponse.length === 0) {
                    showErrorToast('Por favor, marque la casilla de "No soy un robot" antes de enviar la cotización.');
                    return;
                }
            }
            
            const btn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            const btnIcon = document.getElementById('btn-icon');
            const btnSpinner = document.getElementById('btn-spinner');
            
            // Estado de carga (Loading)
            if (btn) btn.disabled = true;
            if (btnText) btnText.innerText = 'Enviando Seguro...';
            if (btnIcon) btnIcon.classList.add('hidden');
            if (btnSpinner) btnSpinner.classList.remove('hidden');
            
            // Enviar datos
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessToast();
                    this.reset();
                    if (typeof grecaptcha !== 'undefined') grecaptcha.reset();
                    
                    // Restaurar botón
                    if (btn) btn.disabled = false;
                    if (btnText) btnText.innerText = 'Solicitar Cotización';
                    if (btnSpinner) btnSpinner.classList.add('hidden');
                    if (btnIcon) btnIcon.classList.remove('hidden');
                    
                    // Restaurar color del select
                    const selectEl = document.getElementById('servicio-select');
                    if (selectEl) {
                        selectEl.classList.remove('text-white');
                        selectEl.classList.add('text-gray-500');
                    }
                } else {
                    showErrorToast(data.message || 'Error de seguridad. Por favor intente nuevamente.');
                    if (typeof grecaptcha !== 'undefined') grecaptcha.reset();
                    
                    if (btn) btn.disabled = false;
                    if (btnText) btnText.innerText = 'Solicitar Cotización';
                    if (btnSpinner) btnSpinner.classList.add('hidden');
                    if (btnIcon) btnIcon.classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast('Ha ocurrido un problema al enviar la cotización. Verifique su conexión o intente más tarde.');
                
                if (btnText) btnText.innerText = 'Error al enviar';
                if (btnSpinner) btnSpinner.classList.add('hidden');
                
                setTimeout(() => {
                    if (btn) btn.disabled = false;
                    if (btnText) btnText.innerText = 'Solicitar Cotización';
                    if (btnIcon) btnIcon.classList.remove('hidden');
                }, 3000);
            });
        });
    }
});
