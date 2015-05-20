<?php namespace Media;
use Illuminate\Support\Facades\View;

class MediaUploadController extends \BaseController {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return View::make('media.media-upload', $this->data);
    }
}