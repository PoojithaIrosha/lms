<?php

require "../connection.php";

Database::iud("UPDATE student SET `status_id`=1");
echo "success";
