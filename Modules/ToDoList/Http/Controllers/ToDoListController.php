<?php

namespace Modules\ToDoList\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ToDoList\Entities\ToDoList;

class ToDoListController extends Controller
{
    /**
     * Get all items from the resource.
     * @return Response
     */
    public function index()
    {
        $allToDoLists = ToDoList::all();
        return response()->json($allToDoLists);
    }

    /**
     * Get all checked item statuses
     * @return Response
     */
    public function getCheckedItems()
    {
        $checkedItems = ToDoList::checked();
        return $checkedItems->get()->pluck('id')->toArray();
    }

    /**
     * Store the item in the database
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if ($request->input('input')) {
            ToDoList::create([
                'content' => $request->input('input')
            ]);
        }
    }

    /**
     * Delete the item from the database
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $toDoList = ToDoList::find($id);
        if ($toDoList) {
            $toDoList->delete();
            return response()->json(['Successfully deleted!']);
        } else {
            return response()->json(['This to-do list no longer exists.']);
        }
    }
}
