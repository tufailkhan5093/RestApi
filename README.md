public static function getOnlineDrivers(Request $request){
        $online_drivers = file_get_contents('https://care-provider-97352-default-rtdb.firebaseio.com/online_driver/.json');
        $online_drivers = json_decode($online_drivers);
        
        $arr=array();
        // remove object node to array
        foreach($online_drivers as $online_driver){
           
             $response = Http::get('https://maps.googleapis.com/maps/api/directions/json?mode=driving&transit_routing_preference=less_driving&origin='.$request->origin_lat.','.$request->origin_long.'&destination='.$online_driver->lat.','.$online_driver->long.'&key=AIzaSyDoVmHrVkO68EObrVfhWrzgbAHHPQ9McMM');
            $json_response = json_decode($response);
           
              if($json_response->status == "OK"){
            $routes = $json_response->routes;
            
            foreach($routes as $route){
                $legs = $route->legs;
                foreach($legs as $leg){
                    $distance = $leg->distance->value/1000;
                    $duration = $leg->duration->value/60;
                    $esttime = $leg->duration->text;
                }
            }
            
            $data = [
                'distance'=>$distance,
                'duration'=>$duration,
                'esttime'=>$esttime,
                'status'=>$json_response->status,
                'driver_id'=>$online_driver->driver_id
                ];
           array_push($arr,$data);
                
                
        }
        else{
            $data = [
                'distance'=> "0",
                'duration'=> "0",
                'esttime'=> "0",
                'status'=>$online_driver->driver_id
                ];
        }
            // array_push($arr,$json_response)
            
            // $data[] = $online_driver;
        }
        return $arr;
        return $data;
    }
