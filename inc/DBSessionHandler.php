<?php

class DBSessionHandler implements SessionHandlerInterface
{
    private $pdo;
    private $table = 'my_session';

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function open($savePath, $sessionName) {
        // Optionnel : On peut initialiser des connexions ici si nécessaire
        return true;
    }

    public function close() {
        // Optionnel : On peut fermer des connexions ici si nécessaire
        return true;
    }

    public function read($id) {
        $stmt = $this->pdo->prepare("SELECT data FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $session = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($session) {
            return $session['data'];
        }
        return '';  // Si aucune session n'est trouvée, retourner une chaîne vide
    }

    public function write($id, $data) {
        $timestamp = time();
        $timestampMysql = date('Y-m-d H:i:s', $timestamp);

        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (id, data, timestamp) 
                                            VALUES (:id, :data, :timestamp)
                                            ON DUPLICATE KEY UPDATE 
                                                data = VALUES(data), 
                                               timestamp = VALUES(timestamp);");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':timestamp', $timestampMysql);
        return $stmt->execute();
    }

    public function destroy($id) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function gc($maxLifetime) {
        $old = time() - $maxLifetime;
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE timestamp < :old");
        $stmt->bindParam(':old', $old);
        return $stmt->execute();
    }
}
?>
