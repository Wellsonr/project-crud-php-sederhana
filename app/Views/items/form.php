<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $item ? 'Edit' : 'Add' ?> Item</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 6px; box-sizing: border-box; }
        .err { color: red; }
    </style>
</head>
<body>
    <h1><?= $item ? 'Edit' : 'Add' ?> Item</h1>

    <?php if (session('errors')): ?>
        <ul class="err">
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form action="<?= $item ? '/items/' . $item['id'] . '/update' : '/items' ?>" method="post">
        <?= csrf_field() ?>

        <label>Name
            <input type="text" name="name" value="<?= esc(old('name', $item['name'] ?? '')) ?>" required>
        </label>

        <label>Description
            <textarea name="description"><?= esc(old('description', $item['description'] ?? '')) ?></textarea>
        </label>

        <label>Price
            <input type="number" step="0.01" name="price" value="<?= esc(old('price', $item['price'] ?? '')) ?>">
        </label>

        <p>
            <button type="submit">Save</button>
            <a href="/items">Cancel</a>
        </p>
    </form>
</body>
</html>
