<?php


namespace App\Http\Project\Transfromers;


class LessonTransformer extends Transformer
{
    /**
     * @param $lesson
     * @return array
     */
    public function transformElement($lesson)
    {
        return [
            'id' => $lesson['id'],
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean)$lesson['active']
        ];
    }
}
