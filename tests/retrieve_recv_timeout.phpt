--TEST--
Should retrieve recv timeout
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('localhost:2181');
echo $client->getRecvTimeout();
--EXPECTF--
%d
