<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Education;
use App\Models\Civilservice;
use App\Models\Family;
use App\Models\Workexperience;
use App\Models\Child;
use App\Models\Learning;
use App\Models\Voluntarywork;
use App\Models\Otherinformations;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EntityController extends Controller
{
   public function __construct(){
      $this->middleware('auth');
    }
    //
    public function Entitylist(){
     $entities = Entity::orderBy('l_name', 'asc')->paginate(10);
     $markings = 1 ;
     return view('admin.entity.index',compact('entities','markings'));
    }
    public function Register(){
    	 return view('admin.entity.register');
    }
    public function SearchEntity(Request $request){
      $markings =0;
      if($request->search == NULL){
         $entities = Entity::latest()->paginate(10);
        return Redirect()->route('entity.list');


      }else{
       
       $entities = Entity::where('f_name', $request->search)
    ->orWhere('l_name', 'like', '%' . $request->search . '%')->orderBy('l_name', 'asc')->get();
  }
    return view('admin.entity.index',compact('entities','markings'));
    }
    public function EntityEdit($id){
    	$entities = Entity::find($id);
    	 return view('admin.entity.edit',compact('entities'));

    }
    public function EntityUpdate(Request $request ,$id){
        // $update = Entity::find($id)->update([
        //     'entity_type' => $request->firstname,
        //     'f_name' => Str::ucfirst($request->firstname),
        //     'm_name' => Str::ucfirst($request->middlename),
        //     'l_name' => Str::ucfirst($request->lastname),     
        //    'birthdate' =>$request->lastname,
        //    'sex' => $request->lastname,
        //    'civil_status'=> $request->lastname,
        //    'height' => $request->lastname,
        //    'weight' => $request->lastname,
        //    'blood_type' => $request->lastname,
        //    'gsis_id' => $request->lastname,
        //    'philhealth_no' => $request->lastname,
        //    'sss_no' => $request->lastname,
        //    'tin_no'=> $request->lastname,
        //    'agency_employee_no' => $request->lastname,
        //    'citizenship'=> $request->lastname,
        //    'res_house' => $request->lastname,
        //     'res_street' => $request->lastname,
        //     'res_subdivision'=> $request->lastname,
        //     'res_brgy' => $request->lastname,
        //     'res_city' => $request->lastname,
        //     'res_province' => $request->lastname,
        //     'res_zipcode'=> $request->lastname,
        //     'per_house' => $request->lastname,
        //     'per_street' => $request->lastname,
        //     'per_subdivision' => $request->lastname,
        //     'per_brgy' => $request->lastname,
        //     'per_city' => $request->lastname,
        //     'per_province' => $request->lastname,
        //     'per_zipcode' => $request->lastname,
        //     'telephone' => $request->lastname,
        //     'mobile' => $request->lastname,
        //     'email' => $request->lastname,
        //     'profile_pic' => $request->lastname,


        // ]);

       
         
      return response()->json(["status" => "success", "message" => "Success! post deleted"]);
    }
    public function Displayonly(){

    $entities = Entity::find(19);
      return view(response()->json($entities));


    }
    public function RegisterEntity(Request $request){
    	 
      $entities =  Entity::create([
            'entity_type' => $request->entity_type,
            'f_name' => Str::ucfirst($request->firstname),
            'm_name' => Str::ucfirst($request->middlename),
            'l_name' => Str::ucfirst($request->lastname),     
           'birthdate' =>$request->birthdate,
           'sex' => $request->sex,
           'civil_status'=> $request->civil_status,
           'height' => $request->height,
           'weight' => $request->weight,
           'blood_type' => $request->blood_type,
           'gsis_id' => $request->gsis_id,
           'philhealth_no' => $request->philhealth_no,
           'sss_no' => $request->sss_no,
           'tin_no'=> $request->tin_no,
           'agency_employee_no' => $request->agency_employee_no,
           'citizenship'=> $request->citizenship,
           'res_house' => $request->res_house,
            'res_street' => $request->res_street,
            'res_subdivision'=> $request->res_subdivision,
            'res_brgy' => $request->res_brgy,
            'res_city' => $request->res_city,
            'res_province' => $request->res_province,
            'res_zipcode'=> $request->res_zipcode,
            'per_house' => $request->per_house,
            'per_street' => $request->per_street,
            'per_subdivision' => $request->per_subdivision,
            'per_brgy' => $request->per_brgy,
            'per_city' => $request->per_city,
            'per_province' => $request->per_province,
            'per_zipcode' => $request->per_zipcode,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'profile_pic' => $request->email,    
          

            'created_at' => Carbon::now(),
        ]);

       Family::insert([
            'personal_id' => $entities->id,
            'spouse_name' =>$request->s_name,
            'spouse_lname'  =>$request->s_lname,
            'spouse_middlename' =>$request->s_mname,
            'spouse_nameextension' =>$request->s_extension,
            'spouse_occupation' =>$request->s_occupation,
            'spouse_businessname' =>$request->s_business,
            'spouse_telephone' =>$request->s_telephone,
            'father_surname' =>$request->father_name,
            'father_firstname' =>$request->father_lastname,
            'father_middlename' =>$request->father_middle,
            'father_nameextension' =>$request->father_nameextension,
            'mother_lastname' =>$request->mother_lastname,
            'mother_firstname' =>$request->mother_firstname,
            'mother_middlename' =>$request->mother_middlename, 
            'created_at' => Carbon::now(),
        ]);

       // CHILDREN
          $full_name = $request->full_name;
          $birthday = $request->birthday;
            for($count = 0; $count < count($full_name); $count++)
          {
           $data = array(
            'personal_id' => $entities->id,
            'full_name' => $full_name[$count],
            'birthday'  => $birthday[$count]
           );
           $insert_data[] = $data; 
          }
          $childs = Child::insert($insert_data);

          // EDUCATIONAL BACKGROUND

           $level = $request->level;
           $nameofschool = $request->nameofschool;
           $basiceducation = $request->basiceducation;
           $attendancefrom = $request->attendancefrom;
           $attendanceto = $request->attendanceto;
           $highestlevel = $request->highestlevel;
           $yeargraduated = $request->yeargraduated;
           $scholarship = $request->scholarship;

            for($counts = 0; $counts < count($level); $counts++)
          {
           $dataeducation = array(
            'personal_id' => 5,
            'level' => $level[$counts],
            'nameofschool'  => $nameofschool[$counts],
            'basiceducation'  => $basiceducation[$counts],
            'attendancefrom'  => $attendancefrom[$counts],
            'attendanceto'  => $attendanceto[$counts],
            'highestlevel'  => $highestlevel[$counts],
            'yeargraduated'  => $yeargraduated[$counts],
            'scholarship'  => $scholarship[$counts]
           

           );
           $insert_education[] = $dataeducation; 
          }
          $educationals = Education::insert($insert_education);

          // CIVIL SERVICE
         
              $career_service = $request->career_service;
              $rating = $request->rating;
              $date_of_exam = $request->date_of_exam;
              $place_of_exam = $request->place_of_exam;
              $number = $request->number;
              $validity = $request->validity;

            for($civil_service = 0; $civil_service < count($career_service); $civil_service++)
          {
           $datacivilservice = array(
            'personal_id' => $entities->id,
            'career_service' => $career_service[$civil_service],
            'rating'  => $rating[$civil_service],
            'date_of_exam'  => $date_of_exam[$civil_service],
            'place_of_exam'  => $place_of_exam[$civil_service],
            'number'  => $number[$civil_service],
            'validity'  => $validity[$civil_service]


           );
           $insert_datacivilservice[] = $datacivilservice; 
          }
          $civilservices = Civilservice::insert($insert_datacivilservice);

             // WORK EXPERIENCE
          $inclusive_from = $request->inclusive_from;
          $inclusive_to = $request->inclusive_to;
          $position = $request->position;
          $department = $request->department;
          $monthly_salary = $request->monthly_salary;
          $salary_increment = $request->salary_increment;
          $status = $request->status;
          $govservice = $request->govservice;

            for($workexperience = 0; $workexperience < count($inclusive_from); $workexperience++)
          {
           $dataworkexperience = array(
            'personal_id' => $entities->id,
            'inclusive_from' => $inclusive_from[$workexperience],
            'inclusive_to'  => $inclusive_to[$workexperience],
            'position'  => $position[$workexperience],
            'department'  => $department[$workexperience],
            'monthly_salary'  => $monthly_salary[$workexperience],
            'salary_increment'  => $salary_increment[$workexperience],
            'status'  => $status[$workexperience],
            'govservice'  => $govservice[$workexperience]
            

           );
           $insert_workexperience[] = $dataworkexperience; 
          }
          $workexperiences = Workexperience::insert($insert_workexperience);

            // VOLUNTARYWORK
          $nameandaddress = $request->nameandaddress;
          $inclusivefrom = $request->inclusivefrom;
          $inclusivefrom = $request->inclusivefrom;
          $inclusiveto = $request->inclusiveto;
          $numberofhour = $request->numberofhour;
          $position = $request->position;
          
            for($voluntarywork = 0; $voluntarywork < count($nameandaddress); $voluntarywork++)
          {
           $datavoluntarywork = array(
            'personal_id' => $entities->id,
            'nameandaddress' => $nameandaddress[$voluntarywork],
            'inclusivefrom' => $inclusivefrom[$voluntarywork],
            'inclusiveto' => $inclusiveto[$voluntarywork],
            'numberofhour' => $numberofhour[$voluntarywork],
            'position' => $position[$voluntarywork]
            
           );
           $insert_voluntarywork[] = $datavoluntarywork; 
          }
          $voluntaryworks = Voluntarywork::insert($insert_voluntarywork);


          // LEARNING
          $titleoflearning = $request->titleoflearning;
          $inclusivefrom = $request->inclusivefrom;
          $inclusiveto = $request->inclusiveto;
          $numberofhour = $request->numberofhour;
          $typeofld = $request->typeofld;
          $conducteby = $request->conducteby;

            for($learning = 0; $learning < count($titleoflearning); $learning++)
          {
           $datalearning = array(
            'personal_id' => $entities->id,
            'titleoflearning' => $titleoflearning[$learning],
            'inclusivefrom'  => $inclusivefrom[$learning],
            'inclusiveto'  => $inclusiveto[$learning],
            'numberofhour'  => $numberofhour[$learning],
            'typeofld'  => $typeofld[$learning],
            'conducteby'  => $conducteby[$learning]

           );
           $insert_learning[] = $datalearning; 
          }
          $learnings = Learning::insert($insert_learning);


            // OTHER INFORMATION
          $specialskill = $request->specialskill;
          $nonacademic = $request->nonacademic;
          $membership = $request->membership;
        
            for($otherinformation = 0; $otherinformation < count($specialskill); $otherinformation++)
          {
           $dataotherinfo = array(
            'personal_id' => $entities->id,
            'specialskill' => $specialskill[$otherinformation],
            'nonacademic'  => $nonacademic[$otherinformation],
            'membership'  => $membership[$otherinformation]
        
           );
           $insert_otherinfomation[] = $dataotherinfo; 
          }
          $otherinformations = Otherinformations::insert($insert_otherinfomation);

      return response()->json([
       'success'  => 'Data Added successfully.',
       'id' => $entities->id
      ]);

     return Redirect()->route('profile',$entities->id)->with('success','Brand Update Succesfully');
    }
     public function EntityDelete($id){
        $delete = Entity::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted Successfull');

    }
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }
}
