<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor;
use App\patient;
use App\enroll;
use App\notification;
use App\consultation;
use App\sort;
use App\medicine;

class control extends Controller
{
    //

    public function dinsert(Request $request){
       
               $insert = new doctor;
               $insert->duid = $request->duid;
               $insert->fname = $request->fname;
               $insert->lname = $request->lname;
               $insert->sp = $request->sp;
               $insert->loc = $request->loc;
               $insert->lat = $request->lat;
               $insert->long = $request->long;
               $insert->save();
               return response(json_encode(['success'=>true]),200);
       
           
           }

           public function sort(Request $request){
       
            $insert = new sort;
            $insert->duid = $request->duid;
            $insert->fname = $request->fname;
            $insert->lname = $request->lname;
            $insert->sp = $request->sp;
            $insert->loc = $request->loc;

            $insert->save();
            return response(json_encode(['success'=>true]),200);
    
        
        }

        public function sget(){

            $sort = sort::orderBy('loc','asc')->get();
            //console.log($test);
            return $sort;
        }

        public function sdel(){

            $sort = sort::truncate();
            //console.log($test);
        }

    public function ddetails($duid){

            $ddetails = doctor::find($duid);
        // $blogs= $this->_getblogs();
        // $single = $blogs[$blogid];
        return $ddetails;
        
        
        
        }

        public function pinsert(Request $request){
       
            $insert = new patient;
            $insert->puid = $request->puid;
            $insert->fname = $request->fname;
            $insert->lname = $request->lname;
            $insert->chronic = $request->chronic;
            $insert->loc = $request->loc;
            $insert->save();
            return response(json_encode(['success'=>true]),200);
    
        
        }

        public function pdetails($puid){

            $pdetails = patient::find($puid);
        // $blogs= $this->_getblogs();
        // $single = $blogs[$blogid];
        return $pdetails;
        
        
        
        }

        public function dcompare(){

            $cdoctor = doctor::select('duid')->get();
            //console.log($test);
            return $cdoctor;
        }

        public function dlist(Request $request){

            /*$dlist = doctor::get();
            //console.log($test);
            return $dlist;*/

            //test

            $dlist = doctor::where('sp', $request->sp1)->orWhere('sp', $request->sp2)->orWhere('sp', $request->sp3)->orWhere('sp', $request->sp4)->get();
            return $dlist;
        }

        public function dlists($duid){

            /*$dlist = doctor::get();
            //console.log($test);
            return $dlist;*/

            //test

            $d = doctor::find($duid);
        // $blogs= $this->_getblogs();
        // $single = $blogs[$blogid];
        return $d;

        }

        public function plist(Request $request){

            $plist = enroll::where('eduid', $request->duid)->get();
            //console.log($test);
            
            $patient = new \Illuminate\Database\Eloquent\Collection;
            foreach ($plist as $key ) {
                $var = $key->epuid;
                $p = patient::where('puid', $var)->get();
                $patient->add($p);
            }
            return $patient;
        }

        public function enroll(Request $request){
       
            $enroll = new enroll;
           // $enroll->id = $request->id;
            $enroll->eduid = $request->duid;
            $enroll->epuid = $request->puid;
            $enroll->save();
            return response(json_encode(['success'=>true]),200);
    
        
        }

        public function dmembers(){

            $enroll = enroll::get();
            //console.log($test);
            return $enroll;
        }

        public function btmd(){

            //$btmd = patient::btmd();
            $btmd = new patient;
            $btmd->btmd();
            //console.log($test);
            return $btmd;
        }

        public function delete(Request $request){
          /*  $enroll = enroll::findOrfail($request->duid);
            $enroll->eduid = $request->duid;
            $enroll->epuid = $request->puid;
            $enroll->delete(); */

            $enroll = enroll::where('eduid', $request->duid)->where('epuid', $request->puid)->first();
            // works fine
            $enroll->delete();

           // $enroll->delete();
        
            return response(json_encode(['success'=>true]),200);
        
        }

        public function notification(Request $request){
       
            $notification = new notification;
           // $enroll->id = $request->id;
            $notification->nduid = $request->duid;
            $notification->npuid = $request->puid;
            $notification->save();
            return response(json_encode(['success'=>true]),200);
    
        
        }

        public function nget(){

            $notification = notification::get();
            //console.log($test);
            return $notification;
        }

        public function mget(){

            $enroll = enroll::get();
            //console.log($test);
            return $enroll;
        }

        public function ndelete(Request $request){
            /*  $enroll = enroll::findOrfail($request->duid);
              $enroll->eduid = $request->duid;
              $enroll->epuid = $request->puid;
              $enroll->delete(); */
  
              $notification = notification::where('nduid', $request->duid)->where('npuid', $request->puid)->first();
              // works fine
              $notification->delete();
  
             // $enroll->delete();
          
              return response(json_encode(['success'=>true]),200);
          
          }

          public function inconsultation(Request $request){
       
            $consultation = new consultation;
            $consultation->cduid = $request->duid;
            $consultation->cpuid = $request->puid;
            $consultation->cdfname = $request->dfname;
            $consultation->cdlname = $request->dlname;
            $consultation->cmessage = $request->message;
            $consultation->cdate = $request->cdate;
            $consultation->save();
            return response(json_encode(['success'=>true]),200);
    
        
        }

        public function cget(Request $request){

          /*  $consultation = consultation::get();
            //console.log($test);
            return $consultation; */

            $consultation = consultation::where('cpuid', $request->puid)->orderBy('id', 'desc')->get();
            //console.log($test);
            
      /*      $consultation = new \Illuminate\Database\Eloquent\Collection;
            foreach ($consultation as $key ) {
                $var = $key->epuid;
                $p = patient::where('puid', $var)->get();
                $patient->add($p);
            }*/
            return $consultation;

        }

        public function dget(Request $request){

          /*    $doctor = doctor::where('duid', $request->duid)->get();

              return $doctor; */

              $consultation = consultation::where('cduid', $request->duid)->get();
              //console.log($test);
              
              $doctor = new \Illuminate\Database\Eloquent\Collection;
              foreach ($consultation as $key ) {
                  $var = $key->cduid;
                  $p = doctor::where('duid', $var)->get();
                  $doctor->add($p);
              }
              return $doctor;
  
          }

          //--

          public function displaydata(){
            $medicine = medicine::get();
            //console.log($test);
            return $medicine;
        }
    
        public function insert(Request $request){
            $insert = new medicine;
            $insert->id = $request->id;
            $insert->gname = $request->gname;
            $insert->bname = $request->bname;
            $insert->dosage = $request->dosage;
            $insert->unit = $request->unit;
            $insert->advice = $request->advice;
            //return $request;
            $insert->save();
            return response(json_encode(['success'=>true]),200);
        }
    
        public function update($id){
           // $mode = 'edit';
            $medicine = medicine::where('id',$id)->get();
            return $medicine;
        }
        
        public function saveupdate(Request $request){
            $record = medicine::findorfail($request->id);
            $record->gname = $request->gname;
            $record->bname = $request->bname;
            $record->dosage = $request->dosage;
            $record->unit = $request->unit;
            $record->advice = $request->advice;
            $record->save();
            return response(json_encode(['success'=>true]),200);
        }
    
        public function meddelete($id){
            $medicine = medicine::where('id',$id);
            $medicine->delete();
           
        }


}
