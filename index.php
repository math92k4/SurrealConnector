<?php
require_once __DIR__.'/SurrealConnector.php';
$db_config = [
    'user'=>'admin',
    'password'=>'password',
    'host'=>'http://localhost',
    'port'=>8000,
    'database'=>'company',
    'name_spacing'=>'company',
    // If true: returns ['result'] directly. Default=False
    'no_bullshit'=>True,
];
$db = New SurrealConn($db_config);

// CREATE user example
$user = $db->execute('CREATE user:xxxx SET name = "Per"');
echo json_encode($user);

// // Placeholder example
$id = 'user:xxxx';
$name = 'Per';
$per = $db->execute('SELECT * FROM user WHERE id=? AND name=?', [$id, $name]);
echo json_encode($per);

// DELETE user example
// $res = $db->execute('DELETE ?', ['user:xxxx']);
// echo json_encode($res);
// or
// $res = $db->execute('DELETE user WHERE id = ?', ['user:xxxx']);
// $res = $db->execute('DELETE user WHERE name = ?', ['Thomas']);

// Injection test
// $injection = '1; DELETE user WHERE name=Thomas';
// $db->execute('SELECT * FROM user WHERE id=?', [$injection]);
// $users = $db->execute('SELECT * FROM user');
// echo json_encode($users);