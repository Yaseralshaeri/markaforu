<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Advertisement
 *
 * @property int $id
 * @property string|null $ads_name
 * @property string|null $ads_start
 * @property string|null $ads_exp
 * @property string|null $ads_link
 * @property string|null $ads_type
 * @property int|null $has_products
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Media|null $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdsExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdsLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdsStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereHasProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUpdatedAt($value)
 */
	class Advertisement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $brand_name
 * @property string $brand_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand_categories
 *
 * @property int $id
 * @property int $category_id
 * @property int $brand_id
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand_categories whereId($value)
 */
	class Brand_categories extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property string $customer_id
 * @property float $totally
 * @property int $has_discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $shipping_companies_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart_item> $cartItems
 * @property-read int|null $cart_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereHasDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShippingCompaniesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTotally($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart_item
 *
 * @property int $id
 * @property int $cart_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * @property string|null $item_size
 * @property string|null $item_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $totally
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereItemColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereItemSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereTotally($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart_item whereUpdatedAt($value)
 */
	class Cart_item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $category_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Brand> $brands
 * @property-read int|null $brands_count
 * @property-read \App\Models\Media|null $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Catgeory_type
 *
 * @property int $id
 * @property int $category_id
 * @property int $type_id
 * @property int $status
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Type $type
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catgeory_type whereTypeId($value)
 */
	class Catgeory_type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Collection
 *
 * @property int $id
 * @property string|null $collection_name
 * @property int $view
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereView($value)
 */
	class Collection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Collection_product
 *
 * @property int $id
 * @property int $product_id
 * @property int $collection_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product whereCollectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection_product whereUpdatedAt($value)
 */
	class Collection_product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $color_name
 * @property string $color_hex
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 */
	class Color extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $comment_tittle
 * @property int|null $customer_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentTittle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $customer_name
 * @property string|null $phone_number
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DiscountCode
 *
 * @property int $id
 * @property string $discount_code
 * @property float $discount_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $expired_at
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereDiscountCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountCode whereUpdatedAt($value)
 */
	class DiscountCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Follow_Up_Status
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status query()
 */
	class Follow_Up_Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Follow_Up_Status_Log
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status_Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status_Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follow_Up_Status_Log query()
 */
	class Follow_Up_Status_Log extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property array $path
 * @property int $color_id
 * @property int $product_id
 * @property bool $showed
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property array|null $size
 * @property-read \App\Models\Color $color
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereShowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Institution
 *
 * @property int $id
 * @property string $institution_name
 * @property string $institution_address
 * @property string $institution_phone
 * @property string $institution_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Institution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereInstitutionAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereInstitutionLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereInstitutionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereInstitutionPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institution whereUpdatedAt($value)
 */
	class Institution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $mediable_type
 * @property int $mediable_id
 * @property string $media_name
 * @property string|null $media_description
 * @property array $path
 * @property int|null $show_in
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $mediable
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMediableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereShowIn($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $payment_method_id
 * @property int $address_id
 * @property string $current_status
 * @property float $order_coast
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $customer_id
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCurrentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderCoast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order_item
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_item whereUpdatedAt($value)
 */
	class Order_item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment_method
 *
 * @property int $id
 * @property string $method_name
 * @property string $method_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method whereMethodLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method whereMethodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method whereUpdatedAt($value)
 */
	class Payment_method extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $product_name
 * @property string $old_price
 * @property string $new_price
 * @property int $quantity
 * @property int|null $type_id
 * @property int $user_id
 * @property int|null $institution_id
 * @property int|null $brand_id
 * @property string|null $description
 * @property string $keyword
 * @property array $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Advertisement> $advertisements
 * @property-read int|null $advertisements_count
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Collection> $collections
 * @property-read int|null $collections_count
 * @property-read \App\Models\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Institution|null $institution
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Size> $sizes
 * @property-read int|null $sizes_count
 * @property-read \App\Models\Type|null $type
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Product discounts()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newProducts()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product recommendedProducts()
 * @method static \Illuminate\Database\Eloquent\Builder|Product specialProducts()
 * @method static \Illuminate\Database\Eloquent\Builder|Product topSoledProducts()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInstitutionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product_Size
 *
 * @property int $id
 * @property int $size_id
 * @property int $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_Size whereSizeId($value)
 */
	class Product_Size extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShippingCompany
 *
 * @property int $id
 * @property string $company_name
 * @property string $shipping_coast
 * @property string $company_logo
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereShippingCoast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingCompany whereUpdatedAt($value)
 */
	class ShippingCompany extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Size
 *
 * @property int $id
 * @property string $size
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereSize($value)
 */
	class Size extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $type_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Media|null $media
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\address
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $state
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address query()
 * @method static \Illuminate\Database\Eloquent\Builder|address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereZipCode($value)
 */
	class address extends \Eloquent {}
}

