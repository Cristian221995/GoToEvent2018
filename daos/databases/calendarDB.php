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
            return new Calendar ($p['calendar_name'], $p['id_event'], $p['id_event_place']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }

}

?>