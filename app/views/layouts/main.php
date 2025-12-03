<?php
$successMsg = Session::flash('success');
$errorMsg   = Session::flash('error');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f5f5f5; }
        header { background:#016833; color:#fff; padding:10px 20px; display:flex; justify-content:space-between; align-items:center;}
        header a { color:#fff; margin-left:10px; text-decoration:none; }
        main { max-width:800px; margin:20px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);}
        .btn { padding:6px 12px; border-radius:4px; border:none; cursor:pointer; text-decoration:none; display:inline-block; }
        .btn-primary { background:#016833; color:#fff; }
        .btn-danger { background:#c0392b; color:#fff; }
        .btn-link { background:none; color:#016833; border:none; padding:0; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:8px; border-bottom:1px solid #eee; text-align:left; }
        /* Toast */
        #toast-container {
            position:fixed;
            top:15px;
            right:15px;
            z-index:9999;
        }
        .toast {
            min-width:220px;
            margin-bottom:10px;
            padding:10px 15px;
            border-radius:4px;
            color:#fff;
            opacity:0;
            transform:translateX(100%);
            transition:all .3s ease;
            box-shadow:0 2px 6px rgba(0,0,0,0.2);
        }
        .toast.show {
            opacity:1;
            transform:translateX(0);
        }
        .toast.success { background:#27ae60; }
        .toast.error { background:#e74c3c; }
    </style>
</head>
<body>

<header>
    <div><strong>Todo MVC</strong></div>
    <nav>
        <?php if (Session::get('user_id')): ?>
            <a href="<?= BASE_URL ?>/todos">Todos</a>
            <a href="<?= BASE_URL ?>/logout">Logout</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/login">Login</a>
            <a href="<?= BASE_URL ?>/register">Register</a>
        <?php endif; ?>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<div id="toast-container"></div>

<script>
function showToast(message, type) {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = 'toast ' + type;
    toast.textContent = message;
    container.appendChild(toast);

    // animate in
    setTimeout(() => toast.classList.add('show'), 50);

    // auto hide
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

<?php if ($successMsg): ?>
    window.addEventListener('DOMContentLoaded', function () {
        showToast('<?= addslashes($successMsg) ?>', 'success');
    });
<?php endif; ?>

<?php if ($errorMsg): ?>
    window.addEventListener('DOMContentLoaded', function () {
        showToast('<?= addslashes($errorMsg) ?>', 'error');
    });
<?php endif; ?>
</script>

</body>
</html>