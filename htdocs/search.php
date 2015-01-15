<?php

if (isset($_POST['searchTerm']) && strlen($_POST['searchTerm'])>2) {

    $searchTerm = trim($_POST['searchTerm']);

    $query = "SELECT * FROM articles WHERE name Like '%$searchTerm%'";
    $mysqli = new mysqli('localhost', 'root', '', 'hockey-store_ch');
    $result = $mysqli->query($query);
    ?><ul><?php

    while ($row = $result->fetch_object()) {
        ?>
        <li>
            <a href="http://localhost/home?articleID=<?php echo $row->articleID; ?>">
                <?php echo $row->name; ?>
            </a>
        </li>
        <?php
    }
    ?></ul><?php
}
?>