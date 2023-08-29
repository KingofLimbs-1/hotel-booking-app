<?php require_once __DIR__ . "/../../models/staff.php"; ?>
<?php $newStaffInstance = new Staff($conn); ?>
<?php $userItem = $newStaffInstance->displayUsers(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/staff/viewTab.css">
    <title></title>
</head>

<body>
    <div class="heading">
        <h3>Users</h3>
    </div>

    <div class="addContainer">
        <form class="addForm" action="../../include/addUsers.php" method="post">
            <div class="formItemContainer">
                <div class="item">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="item">
                    <label>Fullname</label>
                    <input type="text" name="fullname" required>
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Email</label>
                    <input type="text" name="email" required>
                </div>
                <div class="item">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Role</label>
                    <input type="text" name="role" required>
                </div>
                <div class="submitContainer">
                    <input type="submit" value="Add">
                </div>
        </form>
    </div>
    </div>

    <div class="tableContainer">
        <table>
            <tr class="headers">
                <th>User ID</th>
                <th>Username</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($userItem as $user) : ?>
                <tr>
                    <td><?php echo $user["user_id"] ?></td>
                    <td><?php echo $user["username"] ?></td>
                    <td><?php echo $user["fullname"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["password"] ?></td>
                    <td><?php echo $user["role"] ?></td>
                    <td>
                        <div class="actions">
                            <div class="updateContainer">
                                <form action="../../views/staff/editUser.php" method="post">
                                    <input type="hidden" name="userID" value="<?php echo $user["user_id"]; ?>">
                                    <button type="submit"><img src="../../assets/images/icons/editButton.png" alt="edit icon">
                                    </button>
                                </form>
                            </div>
                            <div class="deleteContainer">
                                <form action="../../include/deleteUser.php" method="post">
                                    <input type="hidden" name="userID" value="<?php echo $user["user_id"]; ?>">
                                    <button type="submit"><img src="../../assets/images/icons/deleteButton.png" alt="delete icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>