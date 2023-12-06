<?php
namespace App\Repositories;
use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository implements ProductInterface{
    public function index(){
        return Product::all();
    }
    public function create(){
        return Category::all();
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|max:255',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  

    
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        
        // Save the image to the public/images directory
        $request->image->move(public_path('images'), $imageName);
    
        // Save only the image file name (not the full path) in the database
        $product->image = $imageName;
    
        $product->price = $request->price;
        $product->save();    
    }
    public function edit($id){
        return  Product::findOrFail($id);
    }
  // ProductRepository.php
public function update($id,$request)
{
    $request->validate([
        'name' => "required|unique:products,name,$id",
        'category_id' => "required|exists:categories,id",
        'description' => "string",
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => "string"
    ]);

    $product = $this->FindId($id);

    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->description = $request->description;

    $imageName = time().'.'.$request->image->extension();  

        // Save the image to the public/images directory
    $request->image->move(public_path('images'), $imageName);
    
        // Save only the image file name (not the full path) in the database
    $product->image = $imageName;
    $product->price = $request->price;
    $product->update();
}


    public function FindId($id){
        return Product::findOrFail($id);
    }
    public function delete($id){
        $product=$this->FindId($id);
        $product->delete();
    }


}

?>