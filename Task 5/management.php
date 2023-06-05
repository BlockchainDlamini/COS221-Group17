<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/management.css">
</head>

<body>
    <?php
    include_once "navigation.php";
    // include_once "tabNavigation.php";///////////remove this
    include_once "header.php";
    ?>

    <nav class="d-flex justify-content-center">
        <!-- Tabs navs -->
        <ul class="nav nav-pills mb-3 tabNav" id="ex-with-icons" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $winesTable; ?>" href="winesTable.php" role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="<?= $winesTableSelected; ?>"><i class="fa-solid fa-wine-bottle fa-lg me-2"></i>Wines</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $wineriesTable; ?>" href="wineriesTable.php" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="<?= $wineriesTableSelected; ?>"><i class="fa-solid fa-industry fa-lg me-2"></i>Wineries</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $wineyardsTable; ?>" href="wineyardsTable.php" role="tab" aria-selected="<?= $wineyardsTableSelected; ?>"><i class="fa-solid fa-tree fa-lg me-2"></i>Wineyards</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $brandsTable; ?>" href="brandsTable.php" role="tab" aria-selected="<?= $brandsTableSelected; ?>"><i class="fa-regular fa-copyright fa-lg me-2"></i>Brands</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $usersTable; ?>" href="usersTable.php" role="tab" aria-selected="<?= $usersTableSelected; ?>"><i class="fa-solid fa-users-rectangle fa-lg me-2"></i>Users</a>
            </li>
        </ul>
        <!-- Tabs navs -->
    </nav>

    <ul id="contextMenu" class="dropdown-menu" role="menu" style="display: none">
        <li><button disabled class="dropdown-item" tabindex="-1" href="#">Edit</button></li>
        <li><button disabled class="dropdown-item" tabindex="-1" href="#">Add</button></li>
        <li class="dropdown-divider"></li>
        <li><button disabled class="dropdown-item" tabindex="-1" href="#">Delete</button></li>
    </ul>


</body>

</html>