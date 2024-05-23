<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violators;
use App\Models\Establishment;
use App\Models\PublicConveyances;
use App\Models\Apprehension;
use App\Models\Barangay;
use App\Http\Resources\ApprehensionResource;
use App\Http\Resources\ViolatorResource;
use App\Http\Resources\EstablishmentResource;
use App\Http\Resources\PublicConveyanceResource;

class ApprehensionController extends Controller
{
    public function violator_create(Request $request) {
        $request->validate([
            'firstname' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'middlename' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'lastname' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'sex' => 'required|string',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'suffix' => 'nullable|string',
            'occupation' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'referenceid' => 'nullable|string',
            'apprehension_type' => 'required|string',
            'apprehending_officer' =>  'nullable|string',
            'police_station' => 'nullable|string',
            'encoded_by' =>  'nullable|string',
            'date_apprehended' =>  'nullable|string',
            'payment_status' =>  'nullable|string',
        ]);

        // $validatedData->save();



        $violator = new Violators();
        $violator->firstname = $request->firstname;
        $violator->middlename = $request->middlename;
        $violator->lastname = $request->lastname;
        $violator->sex = $request->sex;
        $violator->address = $request->address;
        $violator->birthdate = $request->birthdate;
        $violator->suffix = $request->suffix;
        $violator->occupation = $request->occupation;
        $violator->referenceid = $request->referenceid;
        // $violator->apprehension_type = $request->apprehension_type;
        $violator->cigarette_type = $request->cigarette_type;
        $violator->apprehending_officer = $request->apprehending_officer;
        $violator->police_station = $request->police_station;
        $violator->encoded_by = $request->encoded_by;
        $violator->date_apprehended = $request->date_apprehended;
        $violator->remarks = $request->remarks;
        $violator->payment_status = $request->payment_status;
        $violator->save();

        $apprehension = new Apprehension();
        $apprehension->violator_id = $violator->id;
        $apprehension->violation = $request->apprehension_type;
        $apprehension->save();

        return response()->json(['message' => 'Data saved successfully']);

    }

    public function establishment_create(Request $request) {
        $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'address' => 'required|string',
            'registered_owner' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'permit' => 'required|string',
            'establishment_type' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'remarks' => 'nullable|string',
            'apprehension_type' => 'required|string',
            'apprehending_officer' =>  'nullable|string',
            'police_station' => 'nullable|string',
            'encoded_by' =>  'nullable|string',
            'date_apprehended' =>  'nullable|string',
            'payment_status' =>  'nullable|string',
        ]);

        $establishment = new Establishment();
        $establishment->name = $request->name;
        $establishment->address = $request->address;
        $establishment->registered_owner = $request->registered_owner;
        $establishment->permit = $request->permit;
        $establishment->establishment_type = $request->establishment_type;
        $establishment->remarks = $request->remarks;
        $establishment->apprehending_officer = $request->apprehending_officer;
        $establishment->police_station = $request->police_station;
        $establishment->encoded_by = $request->encoded_by;
        $establishment->date_apprehended = $request->date_apprehended;
        $establishment->cigarette_type = $request->cigarette_type;
        $establishment->payment_status = $request->payment_status;



        $establishment->save();

        $apprehension = new Apprehension();
        $apprehension->establishment_id = $establishment->id;
        $apprehension->violation = $request->apprehension_type;
        $apprehension->save();

        return response()->json(['message' => 'Data saved successfully']);

    }

    public function pc_create(Request $request) {
       $request->validate([
            'driver_name' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'apprehension_place' => 'required|string',
            'license_no' => 'required|string',
            'plate_no' => 'required|string',
            'registered_owner' => 'required|string|regex:/^[A-Za-z\s\-]+$/',
            'owner_address' => 'required|string',
            'apprehension_type' => 'required|string',
            'apprehending_officer' =>  'nullable|string',
            'police_station' => 'nullable|string',
            'encoded_by' =>  'nullable|string',
            'date_apprehended' =>  'nullable|string',
            'payment_status' =>  'nullable|string',
        ]);
        $public_conveyances = new PublicConveyances();
        $public_conveyances->driver_name = $request->driver_name;
        $public_conveyances->apprehension_place = $request->apprehension_place;
        $public_conveyances->license_no = $request->license_no;
        $public_conveyances->plate_no = $request->plate_no;
        $public_conveyances->registered_owner = $request->registered_owner;
        $public_conveyances->owner_address = $request->owner_address;
        // $public_conveyances->apprehension_type = $request->apprehension_type;
        $public_conveyances->apprehending_officer = $request->apprehending_officer;
        $public_conveyances->police_station = $request->police_station;
        $public_conveyances->encoded_by = $request->encoded_by;
        $public_conveyances->date_apprehended = $request->date_apprehended;
        $public_conveyances->remarks = $request->remarks;
        $public_conveyances->cigarette_type = $request->cigarette_type;
        $public_conveyances->payment_status = $request->payment_status;


        $public_conveyances->save();

        $apprehension = new Apprehension();
        $apprehension->public_conveyance_id = $public_conveyances->id;
        $apprehension->violation = $request->apprehension_type;
        $apprehension->save();

        return response()->json(['message' => 'Data saved successfully']);

    }


    public function getViolators(Request $request)
    {
        if ($request->apprehension == 'Individuals') {
            $violators = Violators::with('apprehension')->get();
            return ViolatorResource::collection($violators);
        } else if ($request->apprehension == 'Establishments') {
            $establishments = Establishment::with('apprehension')->get();
            return EstablishmentResource::collection($establishments);
        } else if ($request->apprehension == 'Public Conveyances'){
            $public_conveyances = PublicConveyances::with('apprehension')->get();
            return PublicConveyanceResource::collection($public_conveyances);
        }
    }


    public function fetchBarangay()
    {
        $barangay = Barangay::all();

        return response()->json($barangay);
    }

    public function generateReport(Request $request)
    {
        // Retrieve query parameters from the request
        $violation = $request->input('violation');
        $apprehensionType = $request->input('apprehensionType');
        $startDateQuery = $request->input('startDateQuery');
        $endDateQuery = $request->input('endDateQuery');

        // Initialize an empty collection to hold the results
        $reportData = collect();

        // Define the query for each apprehension type and merge the results
        if ($apprehensionType === 'All' || $apprehensionType === 'Individuals') {
            $individualsQuery = Violators::query()->with('apprehension')->whereHas('apprehension', function ($query) use ($violation) {
                if ($violation !== 'All') {
                    $query->where('violation', $violation);
                }
            });

            if ($startDateQuery && $endDateQuery) {
                $individualsQuery->whereBetween('created_at', [$startDateQuery . ' 00:00:00', $endDateQuery . ' 23:59:59']);
            }

            $individuals = $individualsQuery->get()->map(function ($item) {
                $item->type = 'Individuals';
                return $item;
            });

            $reportData = $reportData->merge($individuals);
        }

        if ($apprehensionType === 'All' || $apprehensionType === 'Establishments') {
            $establishmentsQuery = Establishment::query()->with('apprehension')->whereHas('apprehension', function ($query) use ($violation) {
                if ($violation !== 'All') {
                    $query->where('violation', $violation);
                }
            });

            if ($startDateQuery && $endDateQuery) {
                $establishmentsQuery->whereBetween('created_at', [$startDateQuery . ' 00:00:00', $endDateQuery . ' 23:59:59']);
            }

            $establishments = $establishmentsQuery->get()->map(function ($item) {
                $item->type = 'Establishments';
                return $item;
            });

            $reportData = $reportData->merge($establishments);
        }

        if ($apprehensionType === 'All' || $apprehensionType === 'Public Conveyances') {
            $publicConveyancesQuery = PublicConveyances::query()->with('apprehension')->whereHas('apprehension', function ($query) use ($violation) {
                if ($violation !== 'All') {
                    $query->where('violation', $violation);
                }
            });

            if ($startDateQuery && $endDateQuery) {
                $publicConveyancesQuery->whereBetween('created_at', [$startDateQuery . ' 00:00:00', $endDateQuery . ' 23:59:59']);
            }

            $publicConveyances = $publicConveyancesQuery->get()->map(function ($item) {
                $item->type = 'Public Conveyances';
                return $item;
            });

            $reportData = $reportData->merge($publicConveyances);
        }

        // Return the report data as JSON response
        return response()->json($reportData);
    }


}

