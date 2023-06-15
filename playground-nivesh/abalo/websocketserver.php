<?php
/** /websocketserver.php (Im Laravel-Wurzelverzeichnis)
 *  composer.json +Abhängigkeit: cboden/ratchet
 *  Quelle: https://github.com/ratchetphp/Ratchet (Letzter Zugriff 8.5.2023)
 */
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require __DIR__ . '/vendor/autoload.php';


class Message implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        echo "Adding new connection\n";
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Received: $msg\n";
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        echo "Closing connection\n";
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Closing connection with errors\n";
        $conn->close();
    }
}

$app = new Ratchet\App('localhost', 8085);
$app->route('/maintenance', new Message, array('*'));
$app->route('/echo', new Ratchet\Server\EchoServer, array('*'));

for($i = 1; $i < 8; $i++){
    $app->route('/sold/user=' . $i , new Message, array('*'));
}

$app->route('/deal', new Message, array('*'));

echo "Starting WebSocketServer\n";
$app->run();


