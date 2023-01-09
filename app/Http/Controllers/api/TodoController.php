<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required'
        ]);

        $data = Todolist::create([
            'user_id' => $request->user_id,
            'tittle' => $request->tittle,
            'subtitle' => 'Text some subtitle',
            'done' => false
        ]);

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $todo = Todolist::find($id);
        if ($todo) {
            $todo->delete();
            return response()->json([
                'status' => true,
                'message' => 'Successful delete'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Failed to delete data'
        ]);
    }
}
