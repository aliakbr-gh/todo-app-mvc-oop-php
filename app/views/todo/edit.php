<h2>Edit Todo</h2>

<form method="post" action="<?= BASE_URL ?>/todos/update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
    <p>
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required>
    </p>
    <p>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4"><?= htmlspecialchars($todo['description']) ?></textarea>
    </p>
    <p>
        <label for="image">Image</label>
        <input id="image" type="file" name="image" accept="image/*">
    </p>
    <?php if (!empty($todo['image_path'])): ?>
        <p>
            <img src="<?= BASE_URL . htmlspecialchars($todo['image_path']) ?>" alt="Todo image" width="200">
        </p>
        <p>
            <label>
                <input type="checkbox" name="remove_image" value="1"> Remove current image
            </label>
        </p>
    <?php endif; ?>
    <p>
        <button type="submit">Update</button>
        <a href="<?= BASE_URL ?>/todos">Cancel</a>
    </p>
</form>
