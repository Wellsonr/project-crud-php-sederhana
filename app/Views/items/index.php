<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Items</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .msg { color: green; }
    </style>
</head>
<body>
    <h1>Items</h1>

    <?php if (session('message')): ?>
        <p class="msg"><?= esc(session('message')) ?></p>
    <?php endif ?>

    <p><a href="/items/create">+ Add item</a></p>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= esc($item['name']) ?></td>
                <td><?= esc($item['description']) ?></td>
                <td><?= esc($item['price']) ?></td>
                <td>
                    <a href="/items/<?= $item['id'] ?>/edit">Edit</a>
                    <form action="/items/<?= $item['id'] ?>/delete" method="post" style="display:inline"
                          onsubmit="return confirm('Delete this item?')">
                        <?= csrf_field() ?>
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
