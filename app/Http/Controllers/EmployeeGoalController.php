<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Goal;
use App\Models\EmployeeGoal;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class EmployeeGoalController extends Controller
{
    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'employee_id' => 'required|integer|exists:employees,id',
                'goal_id' => 'required|integer|exists:goals,id',
                'progress' => 'required|integer|min:0|max:100',
            ]);

            $employee_goal = EmployeeGoal::where('employee_id', $validatedData['employee_id'])
                                                ->where('goal_id', $validatedData['goal_id'])
                                                ->first();
            if(!is_null($employee_goal)) 
            {
                $employee_goal->update([
                    'progress' => $validatedData['progress']
                ]);
            } else {
                $employee_goal = EmployeeGoal::create($validatedData);
            }

            return response()->json(['message' => 'Employee Progress saved successfully', 'data' => $employee_goal], 201);
        }
        catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Model not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
