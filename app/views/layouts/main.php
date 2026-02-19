<?php
$successMsg = Session::flash('success');
$errorMsg = Session::flash('error');
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$requestPath = str_replace(BASE_URL, '', $requestPath);
if ($requestPath === '') {
    $requestPath = '/';
}
$isAuthPage = in_array($requestPath, ['/login', '/register'], true);
$isLoggedIn = Auth::check();
$currentUser = $isLoggedIn ? Auth::user() : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>

<body>
    <?php require __DIR__ . '/../partials/spinner.php'; ?>

    <?php if ($isAuthPage): ?>
        <main>
            <?= $content ?>
        </main>
    <?php elseif ($isLoggedIn): ?>
        <header>
            <h1>Todo MVC</h1>
        </header>
        <aside>
            <nav>
                <ul>
                    <li><a href="<?= BASE_URL ?>/todos">Todos</a></li>
                    <li><a href="<?= BASE_URL ?>/todos/create">Create Todo</a></li>
                    <?php if (($currentUser['role'] ?? 'user') === 'admin'): ?>
                        <li><a href="<?= BASE_URL ?>/admin/backup">Database Backup</a></li>
                    <?php endif; ?>
                    <li><a href="<?= BASE_URL ?>/logout">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main>
            <?= $content ?>
        </main>
    <?php else: ?>
        <header>
            <h1>Todo MVC</h1>
        </header>
        <main>
            <?= $content ?>
        </main>
    <?php endif; ?>

    <dialog id="confirm-dialog">
        <form method="dialog">
            <h3 id="confirm-title">Please confirm</h3>
            <p id="confirm-message">Are you sure?</p>
            <menu>
                <button value="cancel" id="confirm-cancel">Cancel</button>
                <button value="confirm" id="confirm-ok">Confirm</button>
            </menu>
        </form>
    </dialog>

    <?php require __DIR__ . '/../partials/toaster.php'; ?>

    <script>
        function bindConfirmForms() {
            const dialog = document.getElementById('confirm-dialog');
            const titleEl = document.getElementById('confirm-title');
            const messageEl = document.getElementById('confirm-message');
            const okBtn = document.getElementById('confirm-ok');
            let pendingForm = null;

            document.querySelectorAll('form[data-confirm="true"]').forEach((form) => {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    pendingForm = form;
                    titleEl.textContent = form.dataset.confirmTitle || 'Please confirm';
                    messageEl.textContent = form.dataset.confirmMessage || 'Are you sure?';
                    okBtn.textContent = form.dataset.confirmButton || 'Confirm';
                    dialog.showModal();
                });
            });

            dialog.addEventListener('close', () => {
                if (dialog.returnValue === 'confirm' && pendingForm) {
                    const formToSubmit = pendingForm;
                    pendingForm = null;
                    formToSubmit.submit();
                    return;
                }
                pendingForm = null;
            });
        }

        window.addEventListener('DOMContentLoaded', bindConfirmForms);
    </script>
</body>

</html>
