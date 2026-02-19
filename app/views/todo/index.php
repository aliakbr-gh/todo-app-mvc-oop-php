<h2>Your Todos</h2>

<p><a href="<?= BASE_URL ?>/todos/create">Add Todo</a></p>

<?php if (empty($todos)): ?>
    <p>No todos yet.</p>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?= htmlspecialchars($todo['title']) ?></td>
                <td><?= nl2br(htmlspecialchars($todo['description'])) ?></td>
                <td>
                    <?php if (!empty($todo['image_path'])): ?>
                        <img src="<?= BASE_URL . htmlspecialchars($todo['image_path']) ?>" alt="Todo image" width="90">
                    <?php else: ?>
                        <span>-</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= BASE_URL ?>/todos/edit?id=<?= $todo['id'] ?>">Edit</a>
                    <form
                        method="post"
                        action="<?= BASE_URL ?>/todos/delete"
                        data-confirm="true"
                        data-confirm-title="Delete Todo"
                        data-confirm-message="Delete this todo?"
                        data-confirm-button="Delete"
                    >
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
