<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Request;

class Utils
{
    public static function getCurrentURL()
    {
        return Request::getSchemeAndHttpHost();
    }

    public static function formatArray($array)
    {
        $count = count($array);
        $formatted = "";
        foreach($array as $key => $value) {
            if ($key !== 0) {
                if ($key === $count - 1) {
                    $formatted .= ', and '.$value;
                } else {
                    $formatted .= ', '.$value;
                }
            } else {
                $formatted .= $value;
            }
        }
        
        return $formatted;
    }

    public static function parseImagesFromHtml($html)
    {
        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $imageTags = $doc->getElementsByTagName('img');
        $images = [];
        foreach($imageTags as $tag) {
            $images[] = $tag->getAttribute('src');
        }

        return $images;
    }

    public function truncate($string = '', $number = 10) 
    {
        return (strlen($string) > 13) ? substr($string,0,$number).'...' : $string;
    }

    public static function generateRandomNumbersByRange(int $start = 0, int $end = 20)
    {
        $numbers = range($start, $end);
        shuffle($numbers);
        return array_slice($numbers, 0, 1)[0];
    }

    public static function arrayExclude($array, array $excludeKeys)
    {
        foreach($excludeKeys as $key){
            unset($array[$key]);
        }
        return $array;
    }

    public static function ordinal($number)
    {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number. 'th';
        else
            return $number. $ends[$number % 10];
    }
}