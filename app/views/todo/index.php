<h2>Your Todos</h2>

<a class="btn btn-primary" href="<?= BASE_URL ?>/todos/create">+ Add Todo</a>

<?php if (empty($todos)): ?>
    <p style="margin-top:15px;">No todos yet.</p>
<?php else: ?>
    <table style="margin-top:15px;">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th style="width:150px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?= htmlspecialchars($todo['title']) ?></td>
                <td><?= nl2br(htmlspecialchars($todo['description'])) ?></td>
                <td>
                    <?php if (!empty($todo['image_path'])): ?>
                        <img src="<?= BASE_URL . htmlspecialchars($todo['image_path']) ?>" alt="Todo image" style="max-width:90px;height:auto;border-radius:6px;border:1px solid #ddd;">
                    <?php else: ?>
                        <span>-</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-link" href="<?= BASE_URL ?>/todos/edit?id=<?= $todo['id'] ?>">Edit</a>
                    <form
                        method="post"
                        action="<?= BASE_URL ?>/todos/delete"
                        style="display:inline;"
                        data-confirm="true"
                        data-confirm-title="Delete Todo"
                        data-confirm-message="Delete this todo?"
                        data-confirm-button="Delete"
                    >
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
