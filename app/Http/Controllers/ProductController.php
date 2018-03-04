<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use App\Product;
use Session;

class ProductController extends Controller
{
  	/**
  	*	Wyświetlanie wszystkich dostępnych produktów
  	*/

    public function index()
    {
      	$products = Product::all();
		    return view('products.index')->withProducts($products);
  	}

    /**
     * Dodawanie produktów do koszyka
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request)
    {
        $this->validate($request, array(
          'quantity' => 'required|integer|min:1',
          'title' => 'exists:products,title'
        ));
        
        $title = $request->title;
        $quantity = $request->quantity;

        $product = Product::where('products.title', $request->title)->first();     
         
        if  (!$product) {
        	  Session::flash('error','Nie ma takiego produktu');
            return redirect()->route('home');
         }

        $cart =  $request->session()->get('cart');
       
        if ($cart == null) {    
            $cart = new Collection();
        }

        $count = 0;
        for($count; $count<$quantity; $count++) {
            $cart->add($product);
        }
        
        $request->session()->put('cart', $cart);

        Session::flash('success','Pomyślnie dodano produkt do koszyka!');

        return redirect()->route('home');
    }

   	/**
  	*	Wyświetlanie wszystkich dodanych produktów do koszyka
  	*/

  	public function showcart(Request $request)
    {
        $cart = $request->session()->get('cart');

        if(!empty($cart)) 
        {
	        $total = $cart->groupBy('id');
          $price = 0;
          foreach($total as $tl) {
          $tp = $tl->first()->price * $tl->count();
          $price = $price + $tp;
          }
          
	        return view ('products.showcart', [
            'total' => $total,
            'price' => $price
          ]);
        }
        else 
        {
          Session::flash('emptyCart','Pusty koszyk!');
          return redirect()->route('home');
        }
    }

    /**
     * Usuwanie wybranego produktu z koszyka.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        
        foreach ($cart as $key => $produkt) {
            
            if ($produkt->id == $id) {

                $cart->pull($key);
                
            }

        }
        session()->put('cart', $cart);

        Session::flash('success','Pomyślnie usunięto produkt!');

        return redirect()->route('products.showcart');
    }	
}
