<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/tailwind.css') ?>" rel="stylesheet">
    <title>User List</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">User List</h1>
        <a href="<?php echo site_url('user/create'); ?>"
            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mb-6">
            Create New User
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 border-b border-gray-300">
                        <th class="px-6 py-3 text-left text-gray-600">ID</th>
                        <th class="px-6 py-3 text-left text-gray-600">Name</th>
                        <th class="px-6 py-3 text-left text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users) && !empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr class="border-b border-gray-300">
                                <td class="px-6 py-4"><?php echo $user['id']; ?></td>
                                <td class="px-6 py-4"><?php echo $user['name']; ?></td>
                                <td class="px-6 py-4"><?php echo $user['email']; ?></td>
                                <td class="px-6 py-4">
                                    <a href="<?php echo site_url('user/edit/'.$user['id']); ?>"
                                        class="text-blue-500 hover:text-blue-600">Edit</a>
                                    <a href="<?php echo site_url('user/delete/'.$user['id']); ?>"
                                        class="text-red-500 hover:text-red-600 ml-4"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-600">No users found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
