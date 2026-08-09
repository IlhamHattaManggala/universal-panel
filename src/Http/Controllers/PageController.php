<?php

namespace Manggala\UniversalPanel\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function analytics()
    {
        return view('universal-panel::pages.analytics');
    }

    public function posts()
    {
        return view('universal-panel::pages.posts');
    }

    public function createPost()
    {
        return view('universal-panel::pages.create-post');
    }

    public function categories()
    {
        return view('universal-panel::pages.categories');
    }

    public function tags()
    {
        return view('universal-panel::pages.tags');
    }

    public function pages()
    {
        return view('universal-panel::pages.pages-list');
    }

    public function media()
    {
        return view('universal-panel::pages.media');
    }

    public function comments()
    {
        return view('universal-panel::pages.comments');
    }

    public function users()
    {
        return view('universal-panel::pages.users');
    }

    public function createUser()
    {
        return view('universal-panel::pages.create-user');
    }

    public function roles()
    {
        return view('universal-panel::pages.roles');
    }

    public function profile()
    {
        return view('universal-panel::pages.profile');
    }

    public function appearance()
    {
        return view('universal-panel::pages.appearance');
    }

    public function plugins()
    {
        return view('universal-panel::pages.plugins');
    }

    public function security()
    {
        return view('universal-panel::pages.security');
    }

    public function tools()
    {
        return view('universal-panel::pages.tools');
    }

    public function settings()
    {
        return view('universal-panel::pages.settings');
    }
}
