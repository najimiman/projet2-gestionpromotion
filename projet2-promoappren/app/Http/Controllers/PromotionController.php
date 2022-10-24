<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestion/index',['promotions'=>Promotion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'Required'
        ]);

        $promotion = new Promotion();
        $promotion->name=strip_tags($request->input('name'));
        $promotion->save();
        return redirect()->route('gestion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $index=Promotion::findOrFail($id);

        return view('gestion.show',[
            'promotion'=>$index
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $index=Promotion::findOrFail($id);

        return view('gestion.edit',[
            'promotion'=>$index
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
        $request->validate(['name'=>'Required'
        ]);

        $forupdate =Promotion::findOrFail($id);
        $forupdate->name=strip_tags($request->input('name'));
        $forupdate->save();
        return redirect()->route('gestion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todelete=Promotion::findOrFail($id);
        $todelete->delete();
        return redirect()->route('gestion.index');
    }
    public function search(Request $request){
        $output="";
        $promotion=Promotion::where('name','Like','%'.$request->search.'%')->get();

        foreach($promotion as $promo)
        {
            $output.=
            '<tr>
            <td> '.$promo->name.' </td>
           
            <td>'.'<a href="/gestion/'.$promo['id'].'/edit">'.'<button>update</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('gestion.destroy',$promo->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" >Delete</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
