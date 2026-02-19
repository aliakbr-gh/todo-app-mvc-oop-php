<h2>Edit Todo</h2>

<form method="post" action="<?= BASE_URL ?>/todos/update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
    <div>
        <label>Title</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required>
    </div>
    <div style="margin-top:10px;">
        <label>Description</label><br>
        <textarea name="description" rows="4"><?= htmlspecialchars($todo['description']) ?></textarea>
    </div>
    <div style="margin-top:10px;">
        <label>Image</label><br>
        <input type="file" name="image" accept="image/*">
    </div>
    <?php if (!empty($todo['image_path'])): ?>
        <div style="margin-top:10px;">
            <img src="<?= BASE_URL . htmlspecialchars($todo['image_path']) ?>" alt="Todo image" style="max-width:200px;height:auto;border-radius:6px;border:1px solid #ddd;">
        </div>
        <div style="margin-top:8px;">
            <label>
                <input type="checkbox" name="remove_image" value="1"> Remove current image
            </label>
        </div>
    <?php endif; ?>
    <div style="margin-top:10px;">
        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn btn-link" href="<?= BASE_URL ?>/todos">Cancel</a>
    </div>
</form>
