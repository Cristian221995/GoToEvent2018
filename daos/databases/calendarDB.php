<?php
namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Calendar as Calendar;

class CalendarDB extends SingletonDao implements IDao{

    public function __construct()
    {

    }

    public function insert($calendar){

        $query = 'INSERT INTO calendars (calendar_name, id_event, id_event_place) VALUES (:eventDate, :id_event, :id_event_place)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventDate = $calendar->getEventDate();
        $eventName = $calendar->getEvent();
        $eventPlace = $calendar->getEventPlace();
        $idEvent = $this->getIdByName("events", "event", $eventName);
        $idEventPlace = $this->getIdByName("event_places", "event_place", $eventPlace);
        
        $command->bindParam(':eventDate',$eventDate);
        $command->bindParam(':id_event',$idEvent);
        $command->bindParam(':id_event_place',$idEventPlace);
        $command->execute();

        //AHORA PARA ARTISTAS X CALENDARIO

        $artistList = $calendar->getArtistList();
        foreach ($artistList as $key => $value) {
            $query = 'INSERT INTO artists_x_calendar (id_artist, id_calendar) VALUES (:id_artist, :id_calendar)';
            $command = $connection->prepare($query);
            $artistName = $value;

            $idArtist = $this->getIdByName("artists", "artist", $artistName);
            $idCalendar = $this->getIdByName("calendars", "calendar", $eventDate);
            
            $command->bindParam(':id_artist',$idArtist);
            $command->bindParam(':id_calendar',$idCalendar);
            $command->execute();

            //return $pdo->lastInsertId();/**/
        }
    }

    public function delete($event){
        
        $query = 'DELETE FROM events WHERE event_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventList = $event->getName();
        $command->bindParam(':name',$eventList);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE events SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $eventList = array();

        $query = 'SELECT * FROM events order by id_event';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            array_push($eventList,$result['event_name']);
            //var_dump($eventList);
        }
        return $eventList;
    }

    public function getIdByName($dbName, $rowName, $name){

        $query = 'SELECT * FROM '. $dbName .' WHERE '. $rowName .'_name = (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_'.$rowName];
        }
        else{
            return null;
        }
    }

    public function getNameById($dbName, $rowName, $id){

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

}

?>