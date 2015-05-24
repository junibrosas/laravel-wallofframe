<?php

class Attachment extends \Eloquent {
	protected $table = 'attachments';
	protected $fillable = ['user_id','url','name', 'filename', 'mime_type'];
}