<?

class TransportUpload
{
    static public function get() {
        global $mysqli;

        $transports = $mysqli->query("SELECT * FROM `transport_upload` ORDER BY `transport_upload`.`name` ASC");
        
        $result = [];

        foreach ($transports as $transport) {
            $result[] = $transport;
        }

        return $result;
    }
}

?>