<?php
namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Calendar as Calendar;
use models\Category as Category;
use models\Event as Event;
use models\EventPlace as EventPlace;
use models\Artist as Artist;

class CalendarDB extends SingletonDao implements IDao{

    public function __construct()
    {

    }

    public function insert($calendar){

        $query = 'INSERT INTO calendars (calendar_name, id_event, id_event_place) VALUES (:calendar_name, :id_event, :id_event_place)';
        $parameters['calendar_name'] = $calendar->getEventDate();
        $parameters['id_event'] = $this->getIdByName("events", "event", $calendar->getEvent());
        $parameters['id_event_place'] = $this->getIdByName("event_places", "event_place", $calendar->getEventPlace());
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }

        //AHORA PARA ARTISTAS X CALENDARIO

        $artistList = $calendar->getArtistList();
        foreach ($artistList as $key => $value) {
            $query = 'INSERT INTO artists_x_calendar (id_artist, id_calendar) VALUES (:id_artist, :id_calendar)';
            $parametersAux['id_artist'] = $this->getIdByName("artists", "artist", $value);
            $parametersAux['id_calendar'] = $this->getIdByName("calendars", "calendar", $parameters['calendar_name']);
            try{
                $pdo = Connection::getInstance();
                $pdo->connect();
                $pdo->executeNonQuery($query, $parametersAux);
            }
            catch(\PDOException $ex){
                throw $ex;
            }


            
        }
    }

    public function delete($event){
        
    }

    public function update($dato, $datoNuevo){

    }
    
    public function retride(){

    }

    public function retrideCalendar($eventID){

        $query = "SELECT
            a.artist_name,
            c.id_calendar,
            c.calendar_name,
            e.event_name,
            e.img_path,
            ca.category_name,
            ep.event_place_name,
            ep.capacity
        FROM
            artists_x_calendar axc inner join artists a on axc.id_artist = a.id_artist
            inner join calendars c on axc.id_calendar = c.id_calendar
            inner join events e on c.id_event = e.id_event
            inner join categories ca on e.id_category = ca.id_category
            inner join event_places ep on c.id_event_place = ep.id_event_place
        WHERE
            e.id_event = '$eventID'";

        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function getIdByName($dbName, $rowName, $name){

        $query = 'SELECT id_'. $rowName . ' FROM '. $dbName .' WHERE '. $rowName .'_name = (:name)';
        $parameters['name'] = $name;
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query, $parameters);
            if($result){
                return $result[0]['id_'.$rowName];
            }
            else{
                return false;
            }
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function getIdById($dbName, $rowName, $id){

        $query = 'SELECT * FROM '. $dbName .' WHERE id_' . $rowName . '= (:id)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':id',$id);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_'.$rowName];
        }
        else{
            return null;
        }
    }

    protected function mapear($value) {
        $value = is_array($value) ? $value : [];
        $resp = array_map(function ($p) {
            $category = new Category('', $p['category_name']);
            $event = new Event('', $p['event_name'], $category, $p['id_calendar'], $p['img_path']);
            $eventPlace = new EventPlace('', $p['event_place_name'], $p['capacity']);
            $artists = $this->mapearAxC($p['id_calendar']);
            return new Calendar ($p['id_calendar'], $p['calendar_name'], $event, $artists, $eventPlace);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public function mapearAxC($idCalendar) {
        $query = 
        "SELECT * FROM artists_x_calendar axc inner join artists a on axc.id_artist = a.id_artist where axc.id_calendar = '$idCalendar'";
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $value = $this->connection->execute($query);
        }
        catch(Exception $ex) {
            throw $ex;
        }
        if (!empty($value)) {
            $value = is_array($value) ? $value : [];
            $resp = array_map(function ($p) {
                return new Artist('',$p['artist_name']);
            }, $value);
            return count($resp) > 1 ? $resp : $resp['0'];
        }
    }

}

?>