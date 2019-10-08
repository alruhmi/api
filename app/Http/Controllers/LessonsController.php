<?php

namespace App\Http\Controllers;

use App\Http\Project\Transfromers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends ApiController
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
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons)
        ]);
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
            return $this->setStatusCode(404)->respondNotFound('Lesson does not found');
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transformElement($lesson)
        ]);
    }

}
