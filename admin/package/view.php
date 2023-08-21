<?php
include('../../helpers/FLUSH.php');
include('../../database/model/PackagesTable.php');

$packagesTable = new PackagesTable();
$package_id = $_GET['id'];
$package = $packagesTable->findById($package_id);
$features = json_decode($package['features']);
$attractions = json_decode($package['attractions']);
// echo "<pre>";
// var_dump($package);
// echo "</pre>";

?>

<?php
include("../../layout/admin/header.php");
include("../../layout/admin/navbar.php");
include("../../layout/admin/sidebar.php")
?>
<style>
.iframe-container {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
  margin: 15px;
}

/* Then style the iframe to fit in the container div with full height and width */
iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
</style>

<?php if (FLUSH::check('success')) : ?>
    <div class="alert alert-success">
        <?= FLUSH::message('success') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-6">
        <img width="100%" src="../../actions/photos/packages/<?= $package['image'] ?>" alt="<?= $package['name'] ?>" class="img-fluid img-thumbnail">
    </div>
    <div class="col-md-6">
        <div class="h3"><?= $package['name'] ?></div>
        <p class="lead">
            <?= $package['description'] ?>
        </p>
        <p>
            Price: <b>$ <?= $package['price'] ?></b>
        </p>
        <p>
            Pitch Type: <b><?= $package['pitch_type_name'] ?></b>
        </p>
        <p>
            Campsite: <b><?= $package['campsite_name'] ?></b>
        </p>

        <p>
            Status: <b class="<?= $package['status'] ? 'text-success' : 'text-danger' ?>"><?= $package['status'] ? 'Enabled' : 'Disabled' ?></b>
        </p>

        <p>
            Features: <b class="text-primary"> |
                <?php foreach ($features as $key => $feature) : ?>
                    <?= $feature->name ?> |
                <?php endforeach; ?>
            </b>
        </p>

        <p>
            Local Attractions: <b class="text-primary"> |
                <?php foreach ($attractions as $key => $attraction) : ?>
                    <?= $attraction->name ?> |
                <?php endforeach; ?>
            </b>
        </p>

        <div>
            <a 
                href="/gwsc/actions/admin/package/toggle_status.php?id=<?= $package['id'] ?>" 
                class="btn btn-secondary" 
                onclick="return confirm('Are you sure to enable <?= $package['name'] ?>?');"
            >
                <?= $package['status'] ? 'Disabled' : 'Enabled' ?>
            </a>
            <a href="edit.php?id=<?= $package['id'] ?>" class="btn btn-warning">Edit</a>
            <a 
                href="/gwsc/actions/admin/package/delete.php?id=<?= $package['id'] ?>" 
                class="btn btn-danger" 
                onclick="return confirm('Are you sure to delete #<?= $package['name'] ?>')"
            >
                Delete
            </a>
        </div>
    </div>
    <div class="iframe-container">
        <?= $package['location'] ?>
    </div>
</div>

<?php
include("../../layout/admin/footer.php");
?>