<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/tailwind.css') ?>" rel="stylesheet">
    <title><?php echo isset($user) ? 'Edit' : 'Create'; ?> User</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <div class="flex  items-center w-full justify-between">
            <h1 class="text-2xl font-bold mb-6"><?php echo isset($user) ? 'Edit' : 'Create'; ?> User</h1>
            <a href="<?php echo site_url('/'); ?>"
                class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mb-6">
                Back to list
            </a>
        </div>

        <?php if (isset($validation)): ?>
            <div class="mb-4 text-red-500">
                <?php echo $validation->listErrors(); ?>
            </div>

        <?php endif; ?>

        <form action="<?php echo isset($user) ? site_url('user/update/' . $user['id']) : site_url('user/store'); ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" value="<?php echo isset($user) ? $user['name'] : ''; ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>


                <input type="email" name="email" value="<?php echo isset($user) ? $user['email'] : ''; ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                <?php echo isset($user) ? 'Update' : 'Create'; ?>
            </button>
        </form>
    </div>
</body>

</html>