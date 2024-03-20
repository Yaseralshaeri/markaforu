<?php

namespace App\interfaces;

use Illuminate\Support\Collection;

interface ProductInterface
{
    public function getProduct($productId);
    public function getProducts($scope);
    public function getCategoryNewProducts();
    public function getCategoryProducts($request,$categoryId);
    public function getProductRelatedProducts();
    public function getBrandProducts($request,$brandId);
    public function getAdvertisementProducts($request,$advertisementId);
    public function getCollectionsProducts($request,$scope);

}
