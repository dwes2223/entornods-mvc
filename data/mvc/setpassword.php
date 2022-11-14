<?php
use App\Models\User;
require "app/models/User.php";

$users = User::all();

foreach ($users as $user) {
    //echo $user->name . "\n";
    echo $user->name . ': ' . $user->setPassword('secret') . "\n";

}