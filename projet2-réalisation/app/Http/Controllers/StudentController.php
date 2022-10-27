<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('gestion.insert',["id" => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['First_name'=>'Required'
        ]);
        $request->validate(['Last_name'=>'Required'
        ]);
        $student=new Student();
        $student->first_name=$request->input('First_name');
        $student->Last_name=$request->input('Last_name');
        $student->email=$request->input('Email');
        $student->PromotionID=$request->input('PromotionID');
        $student->save();
        return redirect()->route('gestion.edit', $student->PromotionID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $index=Student::findOrFail($id);

        return view('gestion.editstudent',[
            'student'=>$index
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forupdate =Student::findOrFail($id);
        $forupdate->first_name=$request->input('First_name');
        $forupdate->Last_name=$request->input('Last_name');
        $forupdate->email=$request->input('Email');
        $forupdate->PromotionID=$request->input('PromotionID');
        $forupdate->save();
        return redirect()->route('gestion.edit', $forupdate->PromotionID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todelete=Student::findOrFail($id);
        $todelete->delete();
        return redirect()->route('gestion.edit', $todelete->PromotionID);
    }

    public function search1(Request $request){
        $output="";
        $id = $request->PromotionID;
        $student=Student::where('First_name','Like','%'.$request->search.'%')->where('PromotionID', $id)->get();

        foreach($student as $stud)
        {
            $output.=
            '<tr>
            <td> '.$stud->First_name.' </td>
            <td> '.$stud->Last_name.' </td>
            <td> '.$stud->Email.' </td>
            <td>'.'<a href="/gestion/editstudent/'.$stud['id'].'">'.'<button>update</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('gestionstud.destroy',$stud->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" >Delete</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
