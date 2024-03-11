<?php
class StudentGateway
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllStudents(): array
    {
        $sql = "SELECT * FROM students";

        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
