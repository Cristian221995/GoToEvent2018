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
        
    }

    public function update($dato, $datoNuevo){

    }
    
    public function retride(){
        
    }

    public function retrideCalendar(){

        $calendarList = array();

        $query = 'SELECT * FROM calendars order by id_calendar';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            $calendarData = array();
            array_push($calendarData,$result['id_calendar']);
            array_push($calendarData,$result['calendar_name']);
            array_push($calendarData,$result['id_event']);
            array_push($calendarData,$result['id_event_place']);
            array_push($calendarList,$calendarData);
        }
        return $calendarList;
    }

    public function retrideArtistxCalendar(){
        $ArtistxCalendarList = array();

        $query = 'SELECT * FROM artists_x_calendar order by id_artists_x_calendar';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            $ArtistxCalendarData = array();
            array_push($ArtistxCalendarData,$result['id_artists_x_calendar']);
            array_push($ArtistxCalendarData,$result['id_artist']);
            array_push($ArtistxCalendarData,$result['id_calendar']);
            array_push($ArtistxCalendarList,$ArtistxCalendarData);
        }
        return $ArtistxCalendarList;
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

}

?>