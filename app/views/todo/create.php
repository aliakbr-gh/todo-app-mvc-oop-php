<h2>Create Todo</h2>

<form method="post" action="<?= BASE_URL ?>/todos" enctype="multipart/form-data">
    <div>
        <label>Title</label><br>
        <input type="text" name="title" required>
    </div>
    <div style="margin-top:10px;">
        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea>
    </div>
    <div style="margin-top:10px;">
        <label>Image</label><br>
        <input type="file" name="image" accept="image/*">
    </div>
    <div style="margin-top:10px;">
        <button class="btn btn-primary" type="submit">Save</button>
        <a class="btn btn-link" href="<?= BASE_URL ?>/todos">Cancel</a>
    </div>
</form>
