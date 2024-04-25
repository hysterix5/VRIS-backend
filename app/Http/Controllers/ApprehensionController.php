<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violators;
use App\Models\Establishment;
use App\Models\PublicConveyances;
use App\Models\Apprehension;

class ApprehensionController extends Controller
{
    public function violator_create(Request $request) {
        // $validatedData = $request->validate([
        //     'firstname' => 'required|string',
        //     'middlename' => 'required|string',
        //     'lastname' => 'required|string',
        //     'sex' => 'required|string',
        //     'address' => 'required|string',
        //     'birthdate' => 'required|date',
        //     'suffix' => 'nullable|string',
        //     'occupation' => 'required|string',
        //     'dqrcode' => 'nullable|string',
        //     'apprehension_type' => 'required|string',
        // ]);

        $violator = new Violators();
        $violator->firstname = $request->firstname;
        $violator->middlename = $request->middlename;
        $violator->lastname = $request->lastname;
        $violator->sex = $request->sex;
        $violator->address = $request->address;
        $violator->birthdate = $request->birthdate;
        $violator->suffix = $request->suffix;
        $violator->occupation = $request->occupation;
        $violator->dqrcode = $request->dqrcode;
        $violator->apprehension_type = $request->apprehension_type;
        $violator->save();

        $apprehension = new Apprehension();
        $apprehension->violator_id = $violator->id;
        $apprehension->save();
        return response()->json(['message' => 'Data saved successfully']);
    
    }

    public function establishment_create(Request $request) {
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'address' => 'required|string',
        //     'registered_owner' => 'required|string',
        //     'permit' => 'required|string',
        //     'establishment_type' => 'required|string',
        //     'remarks' => 'nullable|string',
        //     'apprehension_type' => 'required|string',
        // ]);
        $establishment = new Establishment();
        $establishment->name = $request->name;
        $establishment->address = $request->address;
        $establishment->registered_owner = $request->registered_owner;
        $establishment->permit = $request->permit;
        $establishment->establishment_type = $request->establishment_type;
        $establishment->remarks = $request->remarks;
        $establishment->apprehension_type = $request->apprehension_type;


        $establishment->save();

        $apprehension = new Apprehension();
        $apprehension->establishment_id = $establishment->id;
        $apprehension->save();

        return response()->json(['message' => 'Data saved successfully']);
    
    }

    public function pc_create(Request $request) {
        // $validatedData = $request->validate([
        //     'driver_name' => 'required|string',
        //     'apprehension_place' => 'required|string',
        //     'license_no' => 'required|string',
        //     'plate_no' => 'required|string',
        //     'registered_owner' => 'required|string',
        //     'owner_address' => 'required|string',
        //     'apprehension_type' => 'required|string',
        // ]);
        $public_conveyances = new PublicConveyances();
        $public_conveyances->driver_name = $request->driver_name;
        $public_conveyances->apprehension_place = $request->apprehension_place;
        $public_conveyances->license_no = $request->license_no;
        $public_conveyances->plate_no = $request->plate_no;
        $public_conveyances->registered_owner = $request->registered_owner;
        $public_conveyances->owner_address = $request->owner_address;
        $public_conveyances->apprehension_type = $request->apprehension_type;

        $public_conveyances->save();

        $apprehension = new Apprehension();
        $apprehension->public_conveyance_id = $public_conveyances->id;
        $apprehension->save();

        return response()->json(['message' => 'Data saved successfully']);
    
    }

    public function getViolators()
    {
        $violators = Violators::all();

        return response()->json($violators);
    }

    public function getEstablishments()
    {
        $establishments = Establishment::all();

        return response()->json($establishments);
    }

    public function getPublicConveyances()
    {
        $public_conveyances = PublicConveyances::all();

        return response()->json($public_conveyances);
    }

}
