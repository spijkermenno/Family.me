<?php
return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => "67e7b91f972534",
    "password" => "3c01329be58f4c",
    "sendmail" => "/usr/sbin/sendmail -bs"
];