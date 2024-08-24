<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\categories;
use App\Models\order;
use App\Models\order_item;
use App\Models\products;
use App\Models\product_images;

use App\Models\shipping_information;
use App\Models\subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user_ctrl extends Controller
{
    //index page
    public function index()
    {
        //return category date
        $category = categories::all();
        //return subcategory data
        $subcategory = subcategories::all();
        //retrun products data
        // $user = auth()->user();
        // $cart = cart::where('user_id', $user->id)->get();
        // $products = products::take(3)->get();
        // $featured_product = products::where('featured_product', 1)->take(3)->get();
        // $bestseller = Products::where('featured_product', 0)->take(3)->get();

        $products = Products::where('status', 0)->where('elshama',0)->take(3)->get();
        $featured_product = Products::where('featured_product', 1)->where('status', 0)->where('elshama',0)->take(3)->get();
        $bestseller = Products::where('featured_product', 0)->where('status', 0)->take(3)->where('elshama',0)->get();
        return view('users_pages/index', compact('category', 'subcategory', 'products', 'featured_product', 'bestseller'));
    }
    //end index
    //shop page
    public function shop()
    {
        $products = products::where('status', 0)->where('elshama',0)->paginate(30);

        return view('users_pages/shop', compact('products'));
    }
    //end shop
    //filter,sort and search in shop page
    //sort function
    //sort by newest
    public function sort_by_newest()
    {
        $products = products::latest()->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();

            return view('users_pages/shop', compact('products', 'cart',));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //sort by oldest
    public function sortby_oldest()
    {
        $products = products::orderBy('created_at', 'asc')->where('status', 0)->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();

            return view('users_pages/shop', compact('products', 'cart',));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //sort by low price
    public function sortby_price_low()
    {
        $products = products::orderBy('price', 'asc')->where('status', 0)->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();
            return view('users_pages/shop', compact('products', 'cart',));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //sort by high price
    public function sortby_price_high()
    {
        $products = products::orderBy('price', 'desc')->where('status', 0)->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();
            return view('users_pages/shop', compact('products', 'cart',));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //end sort function
    //filter function
    //subcategory filter
    public function sub_catygory_filter($id)
    {
        $sub_catygory = subcategories::find($id);
        $sub_catygorys = subcategories::where('title', $sub_catygory->title)->get();
        $products = products::where('subcategories', $sub_catygory->title)->where('status', 0)->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();
            return view('users_pages/shop', compact('products'));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //cartegory filter
    public function  catygory_filter($id)
    {
        $catygory = categories::find($id);
        $catygorys = categories::where('title', $catygory->title)->get();
        $products = products::where('category', $catygory->title)->where('status', 0)->paginate(30);
        if (Auth::id()) {
            $user = auth()->user();
            $cart = cart::where('user_email', $user->email)->get();
            return view('users_pages/shop', compact('products'));
        } else {
            return view('users_pages/shop', compact('products'));
        }
    }
    //end filter
    //search function
    public function search(Request $req)
    {
        $qaury = $req->search;

        $products = products::where('name', 'LIKE', '%' . $qaury . '%')->orwhere('category', 'LIKE', '%' . $qaury . '%')->orwhere('subcategories', 'LIKE', '%' . $qaury . '%')->orwhere('category_ar', 'LIKE', '%' . $qaury . '%')->orwhere('name_ar', 'LIKE', '%' . $qaury . '%')->orwhere('subcategories_ar', 'LIKE', '%' . $qaury . '%')->where('status', 0)->paginate(30);
        return view('users_pages/shop', compact('products'));
    }
    //end search function
    //end  
    //cart
    //add product to cart
    public function addcart(Request $requst, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $product = products::find($id);
            $cart = new cart;
            $cart->user_email = $user->email;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->product_name = $product->name;
            $cart->product_name_ar = $product->name_ar;
            $cart->product_image = $product->image;
            $cart->quantity = $requst->quantity;
            $cart->product_price = $product->price;
            $cart->total = $product->price * $requst->quantity;
            $productexit = cart::where('product_id', $cart->product_id)->where('user_id', $user->id)->count();
            if ($productexit > 0) {
                return response()->json(['status' => 'error', 'message2' => __('public.key_01')]);            }
            $cart->save();
            return response()->json(['status' => 'success', 'message' => __('public.key_02')]);
        } else {
            return response()->json(['status' => 'error', 'message2' => __('public.key_03')]);
        }
    }
    //prodcut details
    public function product_details($id)
    {
        $product = Products::find($id);
        $product_images=product_images::where('product_id',$id)->get();
        $related_products = products::where('category', $product->category)->where('status', 0)->paginate(12);
        return view('users_pages/product_details', compact('product', 'related_products','product_images'));
    }


    //cart page
    public function cart_page()
    {
        if (Auth::id()) {
            return view('users_pages/cart_page');
        } else {
            return redirect()->back();
        }
    }
    //update cart quantity
    public function increment(Request $request)
    {
        $cartItemId = $request->input('cartItemId');

        $cartItem = Cart::find($cartItemId);
        $cartItem->quantity += 1;
        $cartItem->total = $cartItem->product_price * $cartItem->quantity;
        $cartItem->save();

        $itemTotal = $cartItem->product_price * $cartItem->quantity;

        return $itemTotal;
    }

    public function decrement(Request $request)
    {
        $cartItemId = $request->input('cartItemId');

        $cartItem = Cart::find($cartItemId);
        $cartItem->total = $cartItem->product_price * $cartItem->quantity;
        $cartItem->quantity -= 1;
        $cartItem->save();

        $itemTotal = $cartItem->product_price * $cartItem->quantity;

        return $itemTotal;
    }

    public function updateQuantity(Request $request)
    {
        $cartItemId = $request->input('cartItemId');
        $quantity = $request->input('quantity');

        $cartItem = Cart::find($cartItemId);
        $cartItem->quantity = $quantity;

        $cartItem->save();

        $itemTotal = $cartItem->product_price * $cartItem->quantity;

        $cartTotal = 0;
        foreach ($cartItem as $item) {
            $cartTotal += $item->product_price * $item->cartItem->quantity;
        }

        return response()->json([
            'itemTotal' => $itemTotal,
            'cartTotal' => $cartTotal
        ]);
    }
    public function delet_product_cart($id)
    {
        $user = auth()->user();
        $cart = Cart::find($id);
        $cart->delete();

        $cartTotal = Cart::all()->sum(function ($cartItem) {
            return $cartItem->product_price * $cartItem->quantity;
        });

        return response()->json([
            'cartTotal' => $cartTotal
        ]);
    }
    public function checkout_page()
    {
        if (Auth::id()) {
            $shipping_info = shipping_information::all();
            $user = auth()->user();
            $cart = cart::where('user_id', $user->id)->get();
            // $cart->getContent();
            if ($cart->count() > 0) {
                return view('users_pages/checkout_page', compact('shipping_info'));
            } else {
                return redirect('/');
            }
        }
    }
    public function checkout_function(Request $requst)
    {

        $user = auth()->user();
        $total_cart = 0;
        $cart_total = cart::where('user_id', $user->id)->get();
        foreach ($cart_total as $item) {
            $total_cart += $item->quantity * $item->product_price;
        }
        $order = new order();
        $order->name = $requst->input('name');
        $order->user_email = $requst->input('user_email');
        $order->user_id = $user->id;

        $order->phone = $requst->input('phone');
        $order->phone2 = $requst->input('phone2');
        $order->address = $requst->input('address');
        $order->address2 = $requst->input('address2');
        $order->city = $requst->input('city');
        // $order->tracking_no = rand(100, 9999);
        $order->total = $requst->input('total');
        $shippingInfo = shipping_information::where('city', $requst->city)->first();
        $order->shipping_cost = $shippingInfo->cost;

        $order->total = $total_cart;
        $order->save();
        $cart = cart::where('user_id', $user->id)->get();
        foreach ($cart as $item) {
            $orr = order_item::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'product_price' => $item->product_price,
                'product_name' => $item->product_name,
                'product_image' => $item->product_image,
                'total' => $item->total,
            ]);
            // $product=product::where('id',$item->prod_id)->first();
            // $product->amount=$product->amount - $item->quantaty;
            // $product->update();
        }
        cart::destroy($cart);
        return redirect()->back();
    }

    public function getShippingCost(Request $request)
    {
        $selectedCity = $request->input('city');

        // Retrieve the cost of the selected city from the shipping table
        $shippingInfo = shipping_information::where('city', $selectedCity)->first();

        if ($shippingInfo) {
            $cost = $shippingInfo->cost;

            return response()->json([
                'cost' => $cost,
            ]);
        } else {
            return response()->json([
                'error' => 'Shipping information not found for the selected city.',
            ], 404);
        }
    }
    //about page

    public function about_page()
    {
        return view('users_pages/about_page');
    }
    //about page

    public function contact_page()
    {
        return view('users_pages/contact');
    }




    ///eL shiam functions
    //index page
    public function index_elshima()
    {
        $products = products::where('elshama',1)->paginate(30);
        return view('users_pages/Elshima_pages/shop', compact('products'));
    }
    //end index
    //shop page 
    public function shop_elshima()
    {
        $products = products::paginate(30);

        return view('users_pages/Elshima_pages/shop', compact('products'));
    }
    //end shop
}
