<?php

namespace App\Http\Controllers;

use App\Http\Project\Transfromers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller
{
    /**
     * @var LessonTransformer
     */

    protected $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $lessons = Lesson::all()->toArray();
        return Response::json([
            'data' => $this->lessonTransformer->transformCollection($lessons)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return Response::json([
                'error' => [
                    'message' => 'Lesson does not exist'
                ]
            ], 404);
        }

        return Response::json([
            'data' => $this->lessonTransformer->transformElement($lesson)
        ], 200);
    }

}
