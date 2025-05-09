<?php

function getAllData(PDO $conn, string $tableName) : array {
    $query = $conn->prepare("SELECT * FROM `$tableName`");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addData(PDO $conn, string $tableName, array $data){
    $query = $conn->query("SELECT * FROM `$tableName` LIMIT 1");
    $columnCount = $query->columnCount();

    $placeholders = implode(', ', array_fill(0, $columnCount - 1, '?'));
    $sql = "INSERT INTO `$tableName` VALUES (NULL, $placeholders)";

    $query2 = $conn->prepare($sql);
    $query2->execute($data);
}

function editData(PDO $conn, string $tableName, array $data, int $id): bool {
    $primaryKeys = [
        'BUKU' => 'id_buku',
        'PEMINJAMAN' => 'id_peminjaman',
        'MEMBER' => 'id_member',
    ];

    $idColumn = $primaryKeys[$tableName];

    $query = $conn->query("SELECT * FROM `$tableName` LIMIT 1");
    $meta = [];
    for ($i = 1; $i < $query->columnCount(); $i++) {
        $meta[] = $query->getColumnMeta($i)['name'];
    }

    $setPart = implode(', ', array_map(fn($col) => "`$col` = ?", $meta));
    $sql = "UPDATE `$tableName` SET $setPart WHERE `$idColumn` = ?";
    
    $stmt = $conn->prepare($sql);

    $data[] = $id;

    return $stmt->execute($data);
}

function deleteData(PDO $conn, string $tableName, int $id){
    $primaryKeys = [
        'BUKU' => 'id_buku',
        'PEMINJAMAN' => 'id_peminjaman',
        'MEMBER' => 'id_member',
    ];

    $idColumn = $primaryKeys[$tableName];

    $query = $conn->prepare("DELETE FROM `$tableName` WHERE `$idColumn` = ?");
    $query->execute([$id]);

    $query2 = $conn->query("SELECT COUNT(*) FROM `$tableName`");
    $rowCount = $query2->fetchColumn();
    if($rowCount == 0){
        $conn->query("ALTER TABLE `$tableName` AUTO_INCREMENT = 1");
    }
}