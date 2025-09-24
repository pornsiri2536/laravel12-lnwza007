// Basic TypeScript/React entry point for the application
import '../css/app.css';

console.log('Laravel application loaded');

// Bootstrap tooltips and popovers
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap components if they exist
    if (typeof (window as any).bootstrap !== 'undefined') {
        const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(tooltipTriggerEl => {
            new (window as any).bootstrap.Tooltip(tooltipTriggerEl);
        });

        const popoverTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.forEach(popoverTriggerEl => {
            new (window as any).bootstrap.Popover(popoverTriggerEl);
        });
    }
});

// Simple form validation
function validateForm(form: HTMLFormElement): boolean {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        const input = field as HTMLInputElement;
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}

// Auto-hide alerts
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        if (alert.classList.contains('alert-dismissible')) {
            const closeBtn = alert.querySelector('.btn-close');
            if (closeBtn) {
                (closeBtn as HTMLButtonElement).click();
            }
        }
    });
}, 5000);

// Export for global use
(window as any).validateForm = validateForm;