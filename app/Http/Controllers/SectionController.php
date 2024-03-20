<?php

namespace App\Http\Controllers;

use App\interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    private $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('sectionIndex',['sections'=>$this->getSection(),'CurrentSection'=>$this->getCurrentSection($id),'categories'=> $this->getCategories(),'getSectionCategoriesPopularProducts'=>$this->getSectionCategoriesPopularProducts($id),'getAllSectionPopularProducts'=>$this->getAllSectionPopularProducts($id),'getSectionProducts'=>$this->getSectionProducts($id),'sectionTypes'=>$this->getSectionsCategoryTypes($id)]);
    }

    public function getSection():\Illuminate\Database\Eloquent\Collection
    {
        return Section::with([
            'categories'=>function($query){
                $query->select('category_id','category_name');
            }])
            ->get(['section_name','id']);
    }

    public function getCurrentSection($id):\Illuminate\Database\Eloquent\Collection
    {
        return Section::with([
            'categories'=>function($query){
                $query->select('category_id','category_name');
            },
            'types'=>function($query){
                $query->select('section_id','type_name');
            },
            'brands'=>function($query){
                $query->select('brand_id','brand_name');
            }])
            ->where('id','=',$id)
            ->get(['section_name','id']);
    }
    public function getCategories():Collection
    {
        return DB::table('categories')
            ->select('category_name', 'id')
            ->get();
    }

    public function getSectionsCategoryTypes($id):Collection
    {
        return DB::table('categories')
            ->join('sections_categories','categories.id','=','sections_categories.category_id')
            ->join('categories_types','sections_categories.id','=','categories_types.category_id')
            ->join('types','categories_types.type_id','=','types.id')
            ->select('categories.category_name','categories.id','types.type_name')
            ->where('sections_categories.section_id','=',$id)
            ->get();
    }
    public function getProduct($productId)
    {
        return $this->productRepository->getProduct($productId);
    }

    public function getSectionProducts($sectionId)
    {
        return Product::with([
            'images'=>function($query){
                $query->select('product_id','id','path');
            },
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','section_name');
            },
            'type'=>function($query) {
                $query->select('id','type_name');
            }
        ])->where('section_id','=',$sectionId)->paginate(20,['id','product_name','old_price','new_price','created_at','section_id']);
    }

    public function getSectionCategoriesPopularProducts($sectionId):\Illuminate\Database\Eloquent\Collection
    {


        return  Section::with([
            'categories'=>function($query){
                $query->select('category_id','category_name','categories.id');
            },
            'categories.products'=>function($query) use ($sectionId) {
                $query->select('category_id','id','type_id','product_name','old_price','new_price')
                    ->where('section_id','=',$sectionId);
            },
            'categories.products.images'=>function($query){
                $query->select('product_id','id','path');
            },
            'categories.products.type'=>function($query) {
                $query->select('id','type_name');
            }
        ])
            ->where('id','=',$sectionId)
            ->get(['section_name','id']);
    }

    public function getAllSectionPopularProducts($sectionId):\Illuminate\Database\Eloquent\Collection
    {
        return Product::with([
            'images'=>function($query){
                $query->select('product_id','id','path');
            },
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','section_name');
            },
            'type'=>function($query) {
                $query->select('id','type_name');
            }
        ])
            ->where('section_id','=',$sectionId)
            ->get(['id','product_name','old_price','new_price','created_at','section_id','category_id']);
    }
}
