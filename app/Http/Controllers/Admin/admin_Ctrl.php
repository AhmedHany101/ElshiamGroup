<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\contact;
use App\Models\categories;
use App\Models\order;
use App\Models\order_item;
use App\Models\product_images;
use App\Models\products;
use App\Models\shipping_information;
use App\Models\subcategories;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class admin_Ctrl extends Controller
{
    //admin page
    public function admin()
    {
        // Get all orders and order items for today
        $today = Carbon::today();
        $orders = Order::whereDate('created_at', $today)->get();
        $order_items = order_item::whereIn('order_id', $orders->pluck('id'))->get();


        // Create arrays to store the data
        $orderss = order::all();
        $salesData = array();
        $salesData2 = array();

        // Loop through the data and populate the arrays
        foreach ($orderss as $order) {
            array_push($salesData, $order->total);
            array_push($salesData2, $order->id);
        }
        $products = products::all();

        // Count the number of orders for each product
        $product_counts = [];
        foreach ($order_items as $order_item) {
            $product_id = $order_item->product_id;
            if (isset($product_counts[$product_id])) {
                $product_counts[$product_id]++;
            } else {
                $product_counts[$product_id] = 1;
            }
        }

        // Filter the products by the number of orders
        $best_products = $products->filter(function ($product) use ($product_counts) {
            $product_id = $product->id;
            if (isset($product_counts[$product_id])) {
                return $product_counts[$product_id] >= 2;
            }
            return false;
        });
        // Retrieve the number of orders from the orders table
        $numOrders = Order::whereDate('created_at', today())->count();
        $order_customer_count = order::count();
        $total = Order::sum('total');
        $visits = Visit::whereYear('visited_at', now()->year)
            ->whereMonth('visited_at', now()->month)
            ->get();

        // Calculate the sum of the visits

        $sumVisits = $visits->sum('id');
        return view('admin_pages/admin_index', [
            'orderss' => $orderss,
            'salesData' => json_encode($salesData),
            'salesData2' => json_encode($salesData2),
            'best_products' => $best_products,
            'product_counts' => $product_counts,
            'numOrders' => $numOrders,
            'order_customer_count' => $order_customer_count,
            'total' => $total,
            'sumVisits' => $sumVisits,

        ]);
    }
    //categories view
    public function categories()
    {
        $category = categories::all();

        return view('admin_pages/categories', compact('category'));
    }
    //add new categories function 
    public function categories_fun(Request $request)
    {
        $data = new categories();
        $data->title = $request->title;
        $data->title_ar = $request->title_ar;
        $data->description = $request->description;
        //  $data->$image = $request->file('image')->getClientOriginalName();
        $imagefile = $request->file('image');
        $ext = $imagefile->getClientOriginalExtension();
        $uploadpath = 'category_image';
        $filename = time() . '.' . $ext;
        $imagefile->move($uploadpath, $filename);
        $data->image = $filename;
        $data->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
    //edtie categories function 
    public function edit_categories_fun(Request $req)
    {
        $category = categories::find($req->id);
        $req->validate(
            [
                'title' => 'required',
                'title_ar' => 'required',
                'newimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'title.required' => 'ادخل الصنف',
                'title.required' => 'ادخل الصنف',
                'newimage.image' => 'الملف يجب ان يكون صورة',
                'newimage.mimes' => 'يجب ان يكون النوع من الصورة: jpeg,png,jpg,gif,svg',
                'newimage.max' => 'يجب ان يكون حجم الصورة اقل من 2 ميجابايت',
            ]
        );
        $related_products = products::where('category', $category->title)->get();
        foreach ($related_products as  $pro) {
            $pro->category = $req->title;
            $pro->category_ar = $req->title_ar;
            $pro->update();
        }
        $related_subcategory = subcategories::where('category', $category->title)->get();
        foreach ($related_subcategory as  $pro) {
            $pro->category = $req->title;
            $pro->update();
        }
        if ($req->hasFile('newimage')) {
            $oldImage = $category->image;
            if ($oldImage && File::exists(public_path('category_image/' . $oldImage))) {
                File::delete(public_path('category_image/' . $oldImage));
            }
            $imagefile = $req->file('newimage');
            $ext = $imagefile->getClientOriginalExtension();
            $uploadpath = 'category_image';
            $filename = time() . '.' . $ext;
            $imagefile->move($uploadpath, $filename);
            $category->image = $filename;
            $category->save();
        }
        $category->title_ar = $req->title_ar;
        $category->title = $req->title;
        $category->description = $req->description;
        $category->save();

        return redirect()->back();
    }
    //delete categories function 
    public function delete_categories_fun(Request $req)
    {
        $category = categories::find($req->id);
        $category->delete();
        $image1 = 'category_image/' . $category->image;
        if (File::exists($image1)) {
            File::delete($image1);
        }
        return redirect()->back()->with('message', 'تم الحذف');
    }
    //subcategories page
    public function subcategories()
    {
        $category = categories::all();

        $subcategories = subcategories::all();

        return view('admin_pages/subcategories', compact('subcategories', 'category'));
    }
    //add new subcategories function
    public function subcategories_fun(Request $request)
    {
        $data = new subcategories();
        $data->title = $request->title;
        $data->title_ar = $request->title_ar;
        $data->category = $request->category;
        $data->description = $request->description;
        $category_ar = categories::where('title', $request->input('category'))->first();
        if ($category_ar) {
            $data->category_ar = $category_ar->title_ar;
        } else {
            $data->category_ar = $category_ar->title;
        }
        $imagefile = $request->file('image');
        $ext = $imagefile->getClientOriginalExtension();
        $uploadpath = 'category_image';
        $filename = time() . '.' . $ext;
        $imagefile->move($uploadpath, $filename);
        $data->image = $filename;
        $data->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
    //edite subcategories function
    public function edit_subcategories_fun(Request $req)
    {
        $category = subcategories::find($req->id);
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'title_ar' => 'required',
            'newimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'title.required' => 'ادخل الصنف',
            'title_ar.required' => 'ادخل الصنف',
            'newimage.image' => 'الملف يجب ان يكون صورة',
            'newimage.mimes' => 'يجب ان يكون النوع من الصورة: jpeg,png,jpg,gif,svg',
            'newimage.max' => 'يجب ان يكون حجم الصورة اقل من 2 ميجابايت',
        ]);
    
        if ($validator->fails())
         {

            return redirect()->back()->with('error', 'Please Check Your Inputs');

            
        }
            if ($req->hasFile('newimage')) {
                $oldImage = $category->image;
                if ($oldImage && File::exists(public_path('category_image/' . $oldImage))) {
                    File::delete(public_path('category_image/' . $oldImage));
                }

                $imagefile = $req->file('newimage');
                $ext = $imagefile->getClientOriginalExtension();
                $uploadpath = 'category_image';
                $filename = time() . '.' . $ext;
                $imagefile->move($uploadpath, $filename);
                $category->image = $filename;
                $category->save();
            } 

            $related_products = products::where('subcategories', $category->title)->get();
            foreach ($related_products as  $pro) {
                $pro->subcategories = $req->title;
                $pro->update();
            }

            if ($req->category == 'Not Selected') {
                $category->category = $req->up_category;
            } else {
                $category->category = $req->category;
                $category_ar = categories::where('title', $req->input('category'))->first();
                if ($category_ar) {
                    $category->category_ar = $category_ar->title_ar;
                } else {
                    $category->category_ar = $category_ar->title;
                }
            }
          
            $category->title = $req->title;
            $category->title_ar = $req->title_ar;
            $category->description = $req->description;
            $category->save();

            return redirect()->back()->with('message', 'Product Updated');
        
        
    }
    //delete subcategories function
    public function delete_subcategories_fun(Request $req)
    {
        $category = subcategories::find($req->id);
        $category->delete();
        $image1 = 'category_image/' . $category->image;
        if (File::exists($image1)) {
            File::delete($image1);
        }
        return redirect()->back()->with('message', 'تم الحذف');
    }

    //Products page
    public function products()
    {
        $products = products::where('elshama',0)->get();
        return view('admin_pages/products', compact('products'));
    }
    //elshaima product
    public function elshaima_products()
    {
        $products = products::where('elshama',1)->get();
        return view('admin_pages/elshaima_product', compact('products'));
    }
    //add new product page
    public function addnewproductform()
    {
        $category = categories::all();
        $subcategories = subcategories::all();
        return view('admin_pages/add_new_product', compact('category', 'subcategories'));
    }
    //add new product function
    public function add_new_product_fun(Request $request)
    {
        $produc_images = new product_images();

        $product = new products();
        $product->name = $request->input('name');
        $product->name_ar = $request->input('name_ar');

        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->production_date = $request->input('production_date');
        $product->expiry_date = $request->input('expiry_date');
        $product->long_details = $request->input('long_details');
        $product->short_details = $request->input('short_details');
        $product->long_details_ar = $request->input('long_details_ar');
        $product->short_details_ar = $request->input('short_details_ar');

        $product->status = $request->has('status');
        $product->featured_product = $request->has('featured_product');
        $product->elshama = $request->has('elshama');

        $product->category = $request->input('category');

        $category_ar = categories::where('title', $request->input('category'))->first();
        if ($category_ar) {
            $product->category_ar = $category_ar->title_ar;
        } else {
            $product->category_ar = $category_ar->title;
        }
        if($request->subcategories !="")
        {
            $subcategory_ar = subcategories::where('title', $request->input('subcategories'))->first();
            if ($subcategory_ar) {
                $product->subcategories_ar = $subcategory_ar->title_ar;
            } else {
                $product->subcategories_ar = $subcategory_ar->title;
            }
    
        }
       
        // $product->category_ar = $request->input('category_ar');
        $product->subcategories = $request->input('subcategories');
        $product->country_of_origin = $request->input('country_of_origin');
        $product->effective_material = $request->input('effective_material');
        $product->country_of_origin_ar = $request->input('country_of_origin_ar');
        $product->effective_material_ar = $request->input('effective_material_ar');
        $product->usage_details = $request->input('content');
        //store products_images
        $imagefile = $request->file('image');
        $ext = $imagefile->getClientOriginalExtension();
        $uploadpath = 'products_images';
        $filename = time() . '.' . $ext;
        $imagefile->move($uploadpath, $filename);
        $product->image = $filename;
        $product->save();
        if($request->file('images') !="")
        {
        $i = 1;
        foreach ($request->file('images') as $item) {
            $ext = $item->getClientOriginalExtension();
            $filename = time() . $i++ . '.' . $ext;
            $item->move($uploadpath, $filename);
            $data = $produc_images->create([
                'product_id' => $product->id,
                'image' => $filename,
            ]);
        }
    }
        return response()->json([
            'success' => true,
            'product' => $product,
        ]);
    }
    public function get_sub_category(Request $request)
    {
        $category = $request->category;
    
        $sub_categories = subcategories::where('category', $category)->get();
    
        $sub_cata = $sub_categories->pluck('title');
    
        return response()->json(['sub_categories' => $sub_cata]);
    }
    //edite product form

    public function edite_product_form($id)
    {
        $product = products::find($id);
        $produc_images=product_images::where('product_id',$id)->get();
        $category = categories::all();
        $subcategories = subcategories::all();
        return view('admin_pages/edite_product_form', compact('produc_images','product', 'category', 'subcategories'));
    }
    //edote product function
    public function delet_image($id)
    {
        $produc_image = product_images::findOrFail($id);
        $image = 'products_images/' . $produc_image->image;
        if (File::exists($image)) {
            File::delete($image);
        }
        $produc_image->delete();
        return redirect()->back()->with('message', 'تم حذف الصورة ');
    }
    public function edite_product_fun(Request $request)
    {
        $produc_images = new product_images();

        $product = products::find($request->id);
        $product->name = $request->input('name');
        $product->name_ar = $request->input('name_ar');

        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->production_date = $request->input('production_date');
        $product->expiry_date = $request->input('expiry_date');
        $product->long_details = $request->input('long_details');
        $product->short_details = $request->input('short_details');

        $product->long_details_ar = $request->input('long_details_ar');
        $product->short_details_ar = $request->input('short_details_ar');

        $product->status = $request->has('status');
        $product->featured_product = $request->has('featured_product');

        $product->category = $request->input('category');
        $category_ar = categories::where('title', $request->input('category'))->first();
        if ($category_ar) {
            $product->category_ar = $category_ar->title_ar;
        } else {
            $product->category_ar = $category_ar->title;
        }
        if($request->subcategories !="")
        {
            $subcategory_ar = subcategories::where('title', $request->input('subcategories'))->first();
            if ($subcategory_ar) {
                $product->subcategories_ar = $subcategory_ar->title_ar;
            } else {
                $product->subcategories_ar = $subcategory_ar->title;
            }
        }
        $product->subcategories = $request->input('subcategories');

        $product->country_of_origin = $request->input('country_of_origin');
        $product->effective_material = $request->input('effective_material');

        $product->country_of_origin_ar = $request->input('country_of_origin_ar');
        $product->effective_material_ar = $request->input('effective_material_ar');

        $product->usage_details = $request->input('content');
        if ($request->hasFile('image')) {
            $oldImage = $product->image;
            if ($oldImage && File::exists(public_path('products_images/' . $oldImage))) {
                File::delete(public_path('products_images/' . $oldImage));
            }
            $imagefile = $request->file('image');
            $ext = $imagefile->getClientOriginalExtension();
            $uploadpath = 'products_images';
            $filename = time() . '.' . $ext;
            $imagefile->move($uploadpath, $filename);
            $product->image = $filename;
        }
        $product->save();
        if ($request->hasFile('images')) 
        {
            $i = 1;
            $uploadpath = 'products_images';
            foreach ($request->file('images') as $item) {
                $ext = $item->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $item->move($uploadpath, $filename);
                $data = $produc_images->create([
                    'product_id' => $product->id,
                    'image' => $filename,
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'product' => $product,
        ]);
        //delete subcategories function
    }
     public function delete_product_fun(Request $req)
    {
        $product = products::find($req->id);
      
        $image1 = 'products_images/' . $product->image;
        if (File::exists($image1)) {
            File::delete($image1);
        }
        $images = product_images::where('product_id', $product->id)->get();
        foreach ($images as $image) {
            $image_path = 'products_images/' . $image->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $image->delete();
        }
        $product->delete();
        return redirect()->back()->with('message', 'تم الحذف');
    }
    //orders
    public function order_page()
    {
        $orders = order::all();
        return view('admin_pages/order_page', compact('orders'));
    }
    //order details
    public function order_details($id)
    {
        $order = order::find($id);
        $order_item = order_item::where('order_id', $id)->get();
        return view('admin_pages/order_details', compact('order', 'order_item'));
    }
    //confirm order 
    public function confirm_order($id)
    {
        $order = order::find($id);
        $order->statues = 1;
        $order->update();
        return redirect()->back();
    }
    public function reject_order($id)
    {
        $order = order::find($id);
        $order->statues = 2;
        $order->update();
        return redirect()->back();
    }
    public function rejcted_order_page()
    {
        $orders = order::all();
        return view('admin_pages/rejcted_orders', compact('orders'));
    }
    //contact method
    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'mesg' => 'required|string',
        ]);

        $details = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'mesg' => $validatedData['mesg'],
        ];

       Mail::to('smscience21@gmail.com')->send(new contact($details));

        return back()->with('message_sent', 'Message sent');
    }
    //shipping page 
    public function shipping()
    {
        $shipping = shipping_information::all();
        return view('admin_pages/shipping_info', compact('shipping'));
    }

    public function Add_Shipping_info_data(Request $request)
    {
        $data = new shipping_information();
        $data->city = $request->city;
        $data->cost = $request->cost;
    
        // Check if the city exists in the table
        $cityExists = shipping_information::where('city', $data->city)->exists();
    
        if ($cityExists) {
            return response()->json([
                'status' => 'error',
            ], 400);
        }
    
        $data->save();
    
        return response()->json([
            'status' => 'success',
        ]);
    }
    public function shipping_info(Request $request)
    {
        $data = shipping_information::find($request->id);
        $data->city = $request->city;
        $data->cost = $request->cost;
    
        // Check if the city exists in the table
        $cityExists = shipping_information::where('city', $data->city)
            ->where('id', '!=', $data->id)
            ->exists();
    
        if ($cityExists) {
            return redirect()->back()->with('message_error', 'هذه المعلومات موجودة بالفعل');
        } else {
            $data->save();
            return redirect()->back()->with('message', 'تم التعديل بنجاح');
        }
    }
    public function delete_shipping_item_fun(Request $req)
    {
        $product = shipping_information::find($req->id);
        $product->delete();
        return redirect()->back()->with('message', 'تم الحذف');
    }

}
