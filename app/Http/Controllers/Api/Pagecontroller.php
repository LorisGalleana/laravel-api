<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;


class Pagecontroller extends Controller
{
    public function index(){

        $projects = Project::orderBy('id', 'desc')->with('type', 'technologies')->paginate(15);

        return response()->json($projects);

    }

    public function projectBySlug($slug){
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if($project){
            $success = true;
            if($project->path_image){
                $project->path_image = asset('storage/' . $project->path_image);
            }
            else{
                $project->path_image = '/img/no-image.jpg';
                $project->image_original_name = 'no image';
            }
        }
        else{
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }

    public function types(){
        $types = Type::all();

        return response()->json($types);
    }

    public function technologies(){
        $technologies = Technology::all();

        return response()->json($technologies);
    }

    public function projectsByType($slug){
        $type = Type::where('slug', $slug)->with('projects')->first();
        if($type){
            $success = true;
        }
        else{
            $success = false;
        }

        return response()->json(compact('success', 'type'));
    }

    public function projectsByTechnology($slug){
        $technology = Technology::where('slug', $slug)->with('projects')->first();
        if($technology){
            $success = true;
        }
        else{
            $success = false;
        }

        return response()->json(compact('success', 'technology'));
    }
}
