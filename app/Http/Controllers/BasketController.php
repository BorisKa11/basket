<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\AddRequest;
use App\Http\Requests\Basket\IncRequest;
use App\Http\Requests\Basket\RemoveRequest;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Basket::with('product')->whereHas('user', function($q) {
            $q->where('id', Auth::id());
        })->orderBy('created_at', 'desc')->paginate();

        return view('basket.index', ['products' => $products]);
    }

    public function add(AddRequest $request)
    {
        try {
            $basket = Basket::whereHas('product', function($q) use ($request) {
                $q->where('id', $request->id);
            })->whereHas('user', function($q) use ($request) {
                $q->where('id', Auth::id());
            })->first();

            if ($basket) {
                $basket->increment('count');
                $message = 'Добавлен ещё 1 продукт';
            } else {
                $basket = new Basket;
                $basket->setColumn('count', 1);
                $basket->user()->associate(Auth::id());
                $basket->product()->associate($request->id);
                $message = 'Продукт добавлен в корзину';
            }
            $basket->save();

            return response()->json([
                'status'    => 1,
                'message'   => $message,
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }

    public function remove(RemoveRequest $request)
    {
        try {
            $basket = Basket::where('id', $request->get('id'))
                ->whereHas('user', function($q) use ($request) {
                    $q->where('id', Auth::id());
                })->first();

            if ($basket) {
                $basket->delete();
                $message = 'Запись удалена';
            } else {
                $message = 'Невозможно удалить запись';
            }

            return response()->json([
                'status'    => 1,
                'message'   => $message,
                'id'        => $request->get('id'),
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }

    public function increment(IncRequest $request)
    {
        try {
            $basket = Basket::where('id', $request->get('id'))
                ->whereHas('user', function($q) use ($request) {
                    $q->where('id', Auth::id());
                })->first();

            if ($basket) {
                $basket->increment('count');
                $basket->save();
                $message = 'Добавлена одна позиция';
            } else {
                $message = 'Невозможно изменить количество в записи';
            }

            return response()->json([
                'status'    => 1,
                'message'   => $message,
                'id'        => $request->get('id'),
                'count'     => $basket->getColumn('count'),
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }

    public function decrement(IncRequest $request)
    {
        try {
            $basket = Basket::where('id', $request->get('id'))
                ->whereHas('user', function($q) use ($request) {
                    $q->where('id', Auth::id());
                })->first();

            $status = 1;

            if ($basket && (int) $basket->getColumn('count') > 1) {
                $basket->decrement('count');
                $basket->save();
                $message = 'Убрана одна позиция';
            } else {
                $status = 0;
                $message = 'Невозможно изменить количество в записи';
            }

            return response()->json([
                'status'    => $status,
                'message'   => $message,
                'id'        => $request->get('id'),
                'count'     => $basket->getColumn('count'),
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }
}
