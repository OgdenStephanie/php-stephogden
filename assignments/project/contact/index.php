<?php
    require_once('../models/contact_db.php');

    $contacts = get_contacts();
?>

<?php include('../views/header.php'); ?>
    <div class="main">
        <div class="box">
            <h1>Add new contact</h1>
            <form action="index.php">
                <label for="name">Name</label>
                <input type="text" name="name">
                <br>
                <label for="phone">Phone</label>
                <input type="text" name="phone">
                <br>
                <label for="address">Address</label>
                <input type="text" name="address">
                <br>
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday">
                <br>
                <label for="anniversary">Anniversary</label>
                <input type="date" name="anniversary">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email">
                <br>

                <label>&nbsp;</label>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="margin-top-50"></div>
        <div class="box">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Anniversary</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['phone']; ?></td>
                            <td><?php echo $contact['address']; ?></td>
                            <td><?php echo $contact['birthday']; ?></td>
                            <td><?php echo $contact['anniversary']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('../views/footer.php'); ?>