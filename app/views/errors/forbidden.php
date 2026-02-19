<h2>403 Forbidden</h2>
<p>You are logged in, but your role does not have access to this page.</p>
<p><strong>Your role:</strong> <?= htmlspecialchars($currentRole ?? 'user') ?></p>
<p><strong>Required role(s):</strong> <?= htmlspecialchars(implode(', ', $requiredRoles ?? [])) ?></p>
<p>
    <a href="<?= BASE_URL ?>/logout">Switch account</a>
    <a href="<?= BASE_URL ?>/login">Go to login</a>
</p>
