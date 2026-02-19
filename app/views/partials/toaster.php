<div id="toast-container"></div>
<style>
    #toast-container {
        position: fixed;
        top: 16px;
        right: 16px;
        z-index: 10000;
        width: min(92vw, 360px);
    }

    .toast {
        display: grid;
        grid-template-columns: 24px 1fr auto;
        gap: 10px;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        color: #fff;
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.2s ease;
    }

    .toast.show {
        opacity: 1;
        transform: translateX(0);
    }

    .toast-icon {
        font-weight: 700;
    }

    .toast-close {
        border: 0;
        background: transparent;
        color: #fff;
        cursor: pointer;
        font-size: 18px;
        line-height: 1;
        padding: 0;
    }

    .toast.success {
        background: #166534;
    }

    .toast.error {
        background: #b91c1c;
    }
</style>
<script>
    function showToast(message, type) {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = 'toast ' + type;

        const icon = document.createElement('span');
        icon.className = 'toast-icon';
        icon.textContent = type === 'success' ? '✓' : '!';

        const text = document.createElement('span');
        text.textContent = message;

        const close = document.createElement('button');
        close.className = 'toast-close';
        close.type = 'button';
        close.setAttribute('aria-label', 'Dismiss');
        close.textContent = '×';
        close.addEventListener('click', () => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 200);
        });

        toast.appendChild(icon);
        toast.appendChild(text);
        toast.appendChild(close);
        container.appendChild(toast);

        setTimeout(() => toast.classList.add('show'), 30);
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 200);
        }, 3200);
    }

    <?php if (!empty($successMsg)): ?>
    window.addEventListener('DOMContentLoaded', () => {
        showToast(<?= json_encode($successMsg) ?>, 'success');
    });
    <?php endif; ?>

    <?php if (!empty($errorMsg)): ?>
    window.addEventListener('DOMContentLoaded', () => {
        showToast(<?= json_encode($errorMsg) ?>, 'error');
    });
    <?php endif; ?>
</script>
