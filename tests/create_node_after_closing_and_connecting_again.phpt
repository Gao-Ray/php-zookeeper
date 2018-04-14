--TEST--
Should create node after closing and connecting again
--SKIPIF--
<?php
if (!extension_loaded('zookeeper')) {
    echo 'ZooKeeper extension is not loaded'
};
--FILE--
<?php
$client = new Zookeeper('localhost:2181');

if ($client->exists('/test6')) {
    $client->delete('/test6');
}

$client->close();
$client->connect('localhost:2181');

echo $client->create('/test6', null, array(
    array(
        'perms' => Zookeeper::PERM_ALL,
        'scheme' => 'world',
        'id'    => 'anyone'
    )
), 2);
--EXPECTF--
/test6%d
