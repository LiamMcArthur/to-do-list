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
