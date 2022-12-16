<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function getAll(Request $request)
    {
        //return DB::table('students')->get();
        //$students = 
        return Student::all();
    }


    public function getById(Request $request, $id)
    {
        //return DB::table('students')->where('id',$id)->get();
        if (Student::find($id)) {
            return Student::findOrFail($id);
        } else {
            return response('Id no encontrada', 404);
        }
    }


    public function delete(Request $request, $id)
    {

        if (Student::find($id)) {
            
             Student::findOrFail($id)->delete();
             return response('Ha sido eliminado', 200);
            //return $student->delete();
        } else {
            return response('Id no encontrada', 404);
        }
    }

    public function post(Request $request)
    {
        Student::create($request->validate([
            'name' => 'required|string',
            'telefono' => 'required |string',
            'age' => 'nullable|integer',
            'password' => 'required|string',
            'email' => 'required|string|unique:students',
            'sexo' => 'nullable|string'
        ]));
        //return Student::upsetOrCreate();
    }

    public function update(Request $request, $id)
    {
        if (Student::find($id)) {

            Student::findOrFail($id)->update($request->validate([
                'name' => 'nullable||string',
                'telefono' => 'nullable||string',
                'age' => 'nullable|integer',
                'password' => 'nullable||string',
                'email' => 'nullable|string|unique:students',
                'sexo' => 'nullable|string'
            ]));
        } else {
            return response('Id no encontrada', 404);
        }
    }
}
