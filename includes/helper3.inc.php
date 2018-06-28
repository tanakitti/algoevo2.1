<?php 
session_start();
include_once 'dbh.inc.php';
include_once 'func.inc.php';

$user_id = $_POST['u_id'];
$cc_id = $_POST['cc_id'];
$sql = "INSERT INTO skip (user_id,cc_id) VALUES ($user_id,$cc_id);";
$result = mysqli_query($conn,$sql);


$u_id = $_SESSION['u_id'];
$sql = "SELECT * FROM citationContexts WHERE id NOT IN(
    SELECT id 
    FROM tagLog 
    WHERE user_id = $u_id
    UNION
    SELECT id 
    FROM tagLog 
    GROUP BY id 
    HAVING count(user_id) >= 3
    UNION
    SELECT cc_id
    FROM skip
    WHERE user_id = $u_id )
    ORDER BY id
    LIMIT 1";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$citation_id = $row['citation_id'];
$context = $row['context'];
$context = allHighlight($context);
echo json_encode( array(
                'id' => $id,
                'citation_id' => $citation_id,
                'context' => $context
            ));