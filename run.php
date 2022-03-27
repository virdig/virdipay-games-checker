<?php
require 'VirdipayGamesChecker.php';

$VirdipayGamesChecker = new VirdipayGamesChecker("apikey", "secret");
$CekVGC_byID = $VirdipayGamesChecker->VGC_byID(12, "as");
$CekVGC_byIDS = $VirdipayGamesChecker->VGC_byIDS();

print_r($CekVGC_byID);
echo "<br/><br/>";
print_r($CekVGC_byIDS);
