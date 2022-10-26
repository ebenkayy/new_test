<?php

namespace App\Http\Controllers;

use App\Models\HomeOwners;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function uploadContent(Request $request)
    {
        $csv = array_map('str_getcsv', file($request->file)); //loops through the file
        
        foreach ($csv as $ids => $data)
        {
            // This will skip the first row on the csv file
            if ($ids != 0 && $data)
            {
                $word = $data[0];

                if(strpos($word, 'and')){
                    $value = explode('and', $word);
                    $first_item_title = $value[0];
                    $break_value = explode(" ", $value[1]);
                }
                
                $title = explode(" ", $data[0])[0];  //Title
                $first_name = explode(" ", $data[0])[1]; //First name
                //get last names
                $parts = explode(" ", $word);
                count($parts) > 1 ?  $lastname = array_pop($parts) :  $lastname = " ";

                //get initials
                if($first_name == 'and' || $first_name == '&'){
                    $initials = null;
                    $first_name = null;
                }elseif(strlen($first_name) == 1){
                    $initials = $first_name;
                    $first_name = null;
                }elseif(strpos($first_name, '.')){
                    $initials = $first_name;
                    $first_name = null;
                }else{
                    $initials = null;
                }
                $res = [
                    'title' => $title,
                    'first_name' => $first_name,
                    'initials' => $initials,
                    'last_name' => $lastname
                ];
                HomeOwners::updateOrCreate($res); ///insert into the database
            }
        }

        return redirect('homeowners');
       
    }

    public function homeOwnersList()
    {
        $getHomeOwners = HomeOwners::all();
        return view('table', ['res' => $getHomeOwners]); 
    }
}
