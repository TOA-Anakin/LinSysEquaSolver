<?php

namespace App\Http\Controllers;

use App\Services\SleSolverService   ;
use App\Services\SleValidationService;
use Illuminate\Http\Request;

class SleSolverController extends Controller
{
    protected $solver;
    protected $validator;

    public function __construct(SleSolverService $solver, SleValidationService $validator)
    {
        $this->solver = $solver;
        $this->validator = $validator;
    }

    public function solve(Request $request)
    {
        $matrixA = $request->matrixA;
        $vectorB = $request->vectorB;

        $validation = $this->validator->validate($matrixA, $vectorB);
        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors()
            ], 400);
        }

        $result = $this->solver->solve($matrixA, $vectorB);

        return response()->json([
            'result' => $result
        ]);
    }

    public function solveFile(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|mimes:json,csv,xlsx',
        // ]);

        // $file = $request->file('file');
        // $extension = $file->getClientOriginalExtension();
        // $path = $file->storeAs('uploads', time() . '.' . $extension);

        // $data = [];

        // switch ($extension) {
        //     case 'json':
        //         $data = json_decode(Storage::get($path), true);
        //         break;
        //     case 'csv':
        //         // Parse CSV file to get your matrixA and vectorB
        //         break;
        //     case 'xlsx':
        //         // Parse XLSX file to get your matrixA and vectorB
        //         break;
        //     default:
        //         return response()->json(['error' => 'Unsupported file type'], 400);
        // }

        // $matrixA = $data['matrixA'];
        // $vectorB = $data['vectorB'];

        // $validation = $this->validator->validate($matrixA, $vectorB);
        // if ($validation->fails()) {
        //     return response()->json([
        //         'errors' => $validation->errors()
        //     ], 400);
        // }

        // $result = $this->solver->solve($matrixA, $vectorB);

        // return response()->json([
        //     'result' => $result
        // ]);
    }
}
