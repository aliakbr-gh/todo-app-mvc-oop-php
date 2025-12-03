<h2>Edit Todo</h2>

<form method="post" action="<?= BASE_URL ?>/todos/update">
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
        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn btn-link" href="<?= BASE_URL ?>/todos">Cancel</a>
    </div>
</form>