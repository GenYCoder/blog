<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FooRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FooController extends Controller
{
	// public function __construct(FooRepository $repository)
	// {
	// 	$this->repository = $repository;
	// }

   	public function foo(FooRepository $repository)
   	{
   		return $repository->get();
   	}
}
