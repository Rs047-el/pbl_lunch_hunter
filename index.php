<?php
session_start();
//require_once 'src/model.php';

$no_header_ouput =[
    'usr_logout', 'usr_check', 'usr_save', 'rst_save', 'rev_save',
];

$do = $_GET['do'] ?? 'rst_list';
if(in_array($do, $no_header_ouput)){
    include "src/{$do}.php";
} else {
    include "src/pg_header.php";
    include "src/{$do}.php";
    include "src/pg_foter.php";
}