<?php
return Array(
	"^(/|)$" => "home/index",
    "^show\?type\=json\&(.*$)" => "home/show/$1",
    "^send$"=> "home/send",
    "^pay$" => "home/pay",
	"^404$" => "page404/index",
    "^admin$" => "administrator/index",
    "^admin/entry$" => "administrator/entry",
    "^admin/exit" => "administrator/exit",
    "^admin/category" => "administrator/category",
    "^admin/direction" => "administrator/direction",
    "^admin/edit\?.*$" => "administrator/edit",
);
?>