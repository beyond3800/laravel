<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
   public function index()
   {
      $category = request('category');
      if($category=='all')
      {
         $displayMenu = Menu::latest()->get();
      }
      else
      {
         $displayMenu = Menu::latest()->filter($category)->get();
      }
      return view('menu.menus',['menus'=>$displayMenu]);
   }
   public function show(Menu $menu)
   {
      return view('show/index',['viewed'=>$menu]);
   }
   public function create()
   {
      return view('menu.createMenu');
   }
   public function store(Request $request)
   {
      $createdProduct = $request->validate([
         'product_name'=>['required'],
         'category'=>['required'],
         'price'=>['required'],
         'description'=>['required'],
         'short_desc'=>['required'],]);
      $createdProduct['product_name'] = strip_tags($createdProduct['product_name']);
      $createdProduct['category'] = strip_tags($createdProduct['category']);
      $createdProduct['price'] = strip_tags($createdProduct['price']);
      $createdProduct['description'] = strip_tags($createdProduct['description']);
      $createdProduct['short_desc'] = strip_tags($createdProduct['short_desc']);
      if($request->hasFile('image'))
      {
         $createdProduct['image'] = $request->file('image')->store('products','public');
      }
      Menu::create($createdProduct);
      return back()->with('message','Menu created');
   }
   function deleteMenu(Menu $menu)
   {
      return back()->with('error','menu deleted');
   }
}
