<?php

namespace App\Controllers;

use App\Models\CommentsModel;

class Home extends BaseController
{
    protected $model;

    public function __construct()
    {
      $this->model = new CommentsModel();
    }

    public function index()
    {
        $data = [
            'comments'  => $this->model->getComments(),
            'title' => 'All pages',
        ];

        return view('home', $data);
    }

    public function addcomment()
    {
        $email = trim(htmlspecialchars($_POST['email']));
        $text = htmlspecialchars($_POST['text']);

        if(empty($email) || empty($text)) $error = "Вы заполнили не все поля!";
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) $error = "E-mail введен неверно!";

        if(!empty($error))
        {
            $data = ['error'  => $error];
        }
        else
        {
            $date = date('d.m.Y');
            $insert = $this->model->addComment($email,$text,$date);
            $result = ($insert == true)?'Добавлено успешно!':'Произошда ошибка!';
            $data = ['result'  => $result,'email'  => $email,'text'  => $text,'date'  => $date];
        }

        return json_encode($data);
    }
}
