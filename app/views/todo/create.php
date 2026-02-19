<h2>Create Todo</h2>

<form method="post" action="<?= BASE_URL ?>/todos" enctype="multipart/form-data">
    <p>
        <label for="title">Title</label>
        <input id="title" type="text" name="title" required>
    </p>
    <p>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4"></textarea>
    </p>
    <p>
        <label for="image">Image</label>
        <input id="image" type="file" name="image" accept="image/*">
    </p>
    <p>
        <button type="submit">Save</button>
        <a href="<?= BASE_URL ?>/todos">Cancel</a>
    </p>
</form>
