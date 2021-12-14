
<?php 
ini_set('memory_limit', '1024M');
session_start();
class Functions{
    public function getConection(){
        $conn = mysqli_connect("localhost", "root", "root", "virtualQ");
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function select($conn,$sql){
        $value = mysqli_query($conn, $sql);

        return $value;

    }

    public function serverreq(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            return 1;
        }
    }

    public function noofRows($data){

        
        return $data->num_rows;
        }
    

    public function fetchData($result){
      $value=$result->fetch_assoc();
      return $value;
       }


        
    
    public function postof($value){
        if(isset($value)){
            return 1;
        }
    }

    public function redirect($rows,$page){
        if ($rows==1){
        header('Location: '.$page);
        
        }
        else{
           return "Please enter valid phone number or password";
            
       }

    }
   



    public function DistAB($lat_a,$lon_b)

      {
          $shoplat=11.0812;
          $shoplon=76.9921;
         
          $delta_lat = $lat_a - $shoplat ;
          $delta_lon = $lon_b - $shoplon ;

          $earth_radius = 6372.795477598;

          $alpha    = $delta_lat/2;
          $beta     = $delta_lon/2;
          $a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat_a)) * cos(deg2rad($lon_b)) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
          $c        = asin(min(1, sqrt($a)));
          $distance = 2*$earth_radius * $c;
          $distance = round($distance, 4);

          $measure = $distance;
          return $measure;

      }

      public function Sort ($distanceresult){
          $count=0;
        sort($distanceresult);
        foreach($distanceresult as $item){
            if($item <= 100){
                $final[$count++]=$item;
            }
        }
        return $final;
      }
    
    
} 
