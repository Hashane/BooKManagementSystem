<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\Staff;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffMembers = Staff::all();
        $readers = Reader::all();

        return view('user-management.index', compact(['staffMembers', 'readers']));
    }

    public function activateUsers(Request $request)
    {

        $userId = $request->input('id');
        $isChecked = $request->input('isChecked');
        $model =  $request->input('model');

        if ($model === 'staff') {
            $staff = Staff::find($userId);

            if ($staff) {
                $staff->active = $isChecked;
                if ($staff->save()) {
                    $message = $isChecked ? 'activated' : 'deactivated';
                    return response()->json(['message' => "Staff member $message successfully"]);
                }
            } else {
                return response()->json(['error' => 'Staff member not found'], 404);
            }
        } elseif ($model === 'reader') {
            $reader = Reader::find($userId);

            if ($reader) {
                $reader->active = $isChecked ? 1 : 0;
                if ($reader->save()) {
                    $message = $isChecked ? 'activated' : 'deactivated';
                    return response()->json(['message' => "Reader $message successfully"]);
                }
            } else {
                return response()->json(['error' => 'Reader not found'], 404);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
