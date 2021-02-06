<?php
require_once __DIR__ . '/../vendor/autoload.php';

use xtype\Eos\Ecc;
use xtype\Eos\Utils;
use Elliptic\EC;

$privKey = '5KQvfsPJ9YvGuVbLRLXVWPNubed6FWvV8yax6cNSJEzB4co3zFu';
$public = Ecc::privateToPublic($privKey, 'FIO');
$string = 'I like turtles';
$sha256 = Ecc::sha256($string);

$gensig = Ecc::signHash($sha256, $privKey);
var_dump("gensig is valid?", $gensig, Ecc::verifyHash($sha256, $gensig, $public, "FIO"));

$goodsig = "SIG_K1_KYzSWVRXhNJtNZa5pwuFqoMi1J12n2hVsQv4bKxxFSSUa2MiGNCFuBP1wARST7wWDTCSJx19ey9cvpGKwX3MxKzhcfVNb2";
var_dump("goodsig is valid?", $goodsig, Ecc::verifyHash($sha256, $goodsig, $public, "FIO"));

$badsig = "SIG_K1_KjmDiKnkgyQBt5r1oC9ANffNuN8UtpWsRca4X899nzDPoyNZnFk1yp5R8m4pT3zUpcvgCpeVnzAiZTsTFSvZaAErgfQc4n";
var_dump("badsig is valid?", $badsig, Ecc::verifyHash($sha256, $badsig, $public, "FIO"));
