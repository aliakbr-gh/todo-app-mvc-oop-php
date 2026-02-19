<?php
$successMsg = Session::flash('success');
$errorMsg   = Session::flash('error');
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$requestPath = str_replace(BASE_URL, '', $requestPath);
if ($requestPath === '') {
    $requestPath = '/';
}
$isAuthPage = in_array($requestPath, ['/login', '/register'], true);
$isLoggedIn = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }

        header {
            background: #016833;
            color: #fff;
            padding: 12px 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .app-shell {
            display: grid;
            grid-template-columns: 220px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: #0f5132;
            color: #fff;
            padding: 20px 14px;
        }

        .sidebar h3 {
            margin: 0 0 14px;
            font-size: 16px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 8px 10px;
            border-radius: 6px;
            margin-bottom: 6px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.14);
        }

        .app-content {
            min-width: 0;
        }

        main {
            max-width: 900px;
            margin: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .auth-main {
            max-width: 460px;
            margin: 40px auto;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #016833;
            color: #fff;
        }

        .btn-danger {
            background: #c0392b;
            color: #fff;
        }

        .btn-link {
            background: none;
            color: #016833;
            border: none;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        /* Toast */
        #toast-container {
            position: fixed;
            top: 18px;
            right: 18px;
            z-index: 9999;
            width: min(92vw, 360px);
        }

        .toast {
            display: grid;
            grid-template-columns: 26px 1fr auto;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
            padding: 12px 12px 12px 10px;
            border-radius: 10px;
            color: #fff;
            opacity: 0;
            transform: translateX(24px) scale(0.98);
            transition: all .25s ease;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(3px);
        }

        .toast.show {
            opacity: 1;
            transform: translateX(0);
        }

        .toast-icon {
            width: 26px;
            height: 26px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            font-size: 14px;
            font-weight: 700;
        }

        .toast-message {
            font-size: 14px;
            line-height: 1.35;
        }

        .toast-close {
            border: 0;
            background: transparent;
            color: #fff;
            font-size: 18px;
            line-height: 1;
            cursor: pointer;
            opacity: .75;
            padding: 0;
        }

        .toast-close:hover {
            opacity: 1;
        }

        .toast.success {
            background: linear-gradient(135deg, #1d8f4a, #27ae60);
        }

        .toast.error {
            background: linear-gradient(135deg, #cf3e31, #e74c3c);
        }

        /* Full page loader overlay */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            /* semi-transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 6px solid #eee;
            border-top-color: #25b09b;
            /* your brand color */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Spin animation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Optional fade-out */
        #loader.fade-out {
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }

        /* Confirm modal */
        #confirm-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            padding: 16px;
        }

        #confirm-modal.show {
            display: flex;
        }

        .confirm-card {
            width: min(92vw, 420px);
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
            padding: 18px;
        }

        .confirm-title {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .confirm-message {
            margin: 0 0 16px;
            color: #444;
        }

        .confirm-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <?php if ($isAuthPage): ?>
        <main class="auth-main">
            <?= $content ?>
        </main>
    <?php elseif ($isLoggedIn): ?>
        <div class="app-shell">
            <aside class="sidebar">
                <h3>Navigation</h3>
                <a href="<?= BASE_URL ?>/todos">Todos</a>
                <a href="<?= BASE_URL ?>/todos/create">Create Todo</a>
                <a href="<?= BASE_URL ?>/logout">Logout</a>
            </aside>
            <div class="app-content">
                <header>
                    <div><strong>Todo MVC</strong></div>
                </header>
                <main>
                    <?= $content ?>
                </main>
            </div>
        </div>
    <?php else: ?>
        <header>
            <div><strong>Todo MVC</strong></div>
        </header>
        <main>
            <?= $content ?>
        </main>
    <?php endif; ?>

    <div id="confirm-modal" aria-hidden="true">
        <div class="confirm-card" role="dialog" aria-modal="true" aria-labelledby="confirm-title">
            <h3 id="confirm-title" class="confirm-title">Please confirm</h3>
            <p id="confirm-message" class="confirm-message">Are you sure?</p>
            <div class="confirm-actions">
                <button id="confirm-cancel" type="button" class="btn btn-link">Cancel</button>
                <button id="confirm-ok" type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>

    <div id="toast-container"></div>

    <script>
        function showToast(message, type) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = 'toast ' + type;

            const icon = document.createElement('div');
            icon.className = 'toast-icon';
            icon.textContent = type === 'success' ? '✓' : '!';

            const msg = document.createElement('div');
            msg.className = 'toast-message';
            msg.textContent = message;

            const close = document.createElement('button');
            close.className = 'toast-close';
            close.type = 'button';
            close.setAttribute('aria-label', 'Dismiss notification');
            close.textContent = '×';

            close.addEventListener('click', () => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 250);
            });

            toast.appendChild(icon);
            toast.appendChild(msg);
            toast.appendChild(close);
            container.appendChild(toast);

            // animate in
            setTimeout(() => toast.classList.add('show'), 50);

            // auto hide
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 250);
            }, 3600);
        }

        // Hide loader after page fully loads
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            loader.classList.add('fade-out');
            setTimeout(() => loader.style.display = 'none', 500); // match CSS transition
        });

        function bindConfirmForms() {
            const modal = document.getElementById('confirm-modal');
            const titleEl = document.getElementById('confirm-title');
            const messageEl = document.getElementById('confirm-message');
            const confirmBtn = document.getElementById('confirm-ok');
            const cancelBtn = document.getElementById('confirm-cancel');
            let pendingForm = null;

            function closeModal() {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
                pendingForm = null;
            }

            document.querySelectorAll('form[data-confirm="true"]').forEach((form) => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    pendingForm = form;
                    titleEl.textContent = form.dataset.confirmTitle || 'Please confirm';
                    messageEl.textContent = form.dataset.confirmMessage || 'Are you sure?';
                    confirmBtn.textContent = form.dataset.confirmButton || 'Confirm';
                    modal.classList.add('show');
                    modal.setAttribute('aria-hidden', 'false');
                });
            });

            confirmBtn.addEventListener('click', () => {
                if (pendingForm) {
                    const formToSubmit = pendingForm;
                    closeModal();
                    formToSubmit.submit();
                }
            });

            cancelBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        window.addEventListener('DOMContentLoaded', bindConfirmForms);

        <?php if ($successMsg): ?>
            window.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($successMsg) ?>, 'success');
            });
        <?php endif; ?>

        <?php if ($errorMsg): ?>
            window.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($errorMsg) ?>, 'error');
            });
        <?php endif; ?>
    </script>

</body>

</html>
