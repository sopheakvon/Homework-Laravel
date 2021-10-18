<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rule::with(['user'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = new Rule();
        $rule->user_id = $request->user_id;
        $rule->rule = $request->rule;
        $rule->status = $request->status;
        $rule->save();
        return response()->json("Rule Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rule::findOrFail($id);

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
        $rule = Rule::findOrFail($id);
        $rule->user_id = $request->user_id;
        $rule->rule = $request->rule;
        $rule->status = $request->status;
        $rule->save();
        return response()->json("Rule Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Rule::destroy($id);
        if($isDeleted == 1)
        return response()->json(["message" => "Rule deleted successfully"],200);
        return response()->json(["message" => "Rule deleted successfully"],404);
    }
}
