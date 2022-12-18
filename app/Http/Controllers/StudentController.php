<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class StudentController extends Controller
{
    //

    public function getAll(Request $request)
    {
        //return DB::table('students')->get();
        //$students = 
        try {
            return Student::all();
        } catch (PDOException $ex) {
            return response($ex->errorInfo, 500);
        }
    }


    public function getById(Request $request, $id)
    {
        //return DB::table('students')->where('id',$id)->get();

        try {
            if (Student::find($id)) {
                return Student::findOrFail($id);
            } else {
                return response('Id no encontrada', 404);
            }
        } catch (PDOException $ex) {
            return response($ex->errorInfo, 500);
        }
    }


    public function delete(Request $request, $id)
    {

        try {
            if (Student::find($id)) {

                Student::findOrFail($id)->delete();
                return response('Ha sido eliminado', 200);
                //return $student->delete();
            } else {
                return response('Id no encontrada', 404);
            }
        } catch (PDOException $ex) {
            return response($ex->errorInfo, 500);
        }
    }

    public function post(Request $request)
    {
        try {
            Student::create($request->validate([
                'name' => 'required|string',
                'telefono' => 'nullable |string',
                'age' => 'nullable|integer',
                'password' => 'required|string',
                'email' => 'required|string|unique:students',
                'sexo' => 'required|string'
            ]));
        } catch (PDOException $ex) {
            return response($ex->errorInfo, 500);
        }
        //return Student::upsetOrCreate();
    }

    public function update(Request $request, $id)
    {

        try {
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
        } catch (PDOException $ex) {
            return response($ex->errorInfo, 500);
        }
    }
}
