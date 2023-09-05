<?php
include('../../helpers/FLUSH.php');
include('../../database/model/ContactsTable.php');

$contactsTable = new ContactsTable();
$contacts = $contactsTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Contacts</h2> 

    </div>
    
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">CreatedAt</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($contacts as $key => $contact) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $contact['first_name'] . ' ' . $contact['last_name'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['message'] ?></td>
                        <td><?= $contact['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(count($contacts) < 1): ?>
            <h3 class="text-center">No Data...</h3>
        <?php endif; ?>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>