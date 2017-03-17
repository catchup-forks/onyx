<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CustomWarranty
 *
 * @property int $id
 * @property int $order_line_id
 * @property \Carbon\Carbon $expires_at
 * @property string $description
 * @property-read \App\Models\OrderLine $order_line
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomWarranty whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomWarranty whereExpiresAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomWarranty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomWarranty whereOrderLineId($value)
 */
	class CustomWarranty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Phone
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Phone whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Phone whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Phone whereUserId($value)
 */
	class Phone extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Account
 *
 * @property int $id
 * @property int $bank_id
 * @property int $contact_id
 * @property string $contact_type
 * @property string $number
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Bank $bank
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $contact
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereBankId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereContactType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereUpdatedAt($value)
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $contact_id
 * @property string $contact_type
 * @property string $address_1
 * @property string $address_2
 * @property int $city_id
 * @property-read \App\Models\Location $city
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereAddress1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereAddress2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereCityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereContactType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Address whereId($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemAttribute[] $item_attributes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AttributeLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductAttribute[] $product_attributes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attribute whereId($value)
 */
	class Attribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AttributeLocale
 *
 * @property int $attribute_id
 * @property string $locale
 * @property string $name
 * @property-read \App\Models\Attribute $attribute
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeLocale whereAttributeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AttributeLocale whereName($value)
 */
	class AttributeLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property int $id
 * @property string $name
 * @property string $swift
 * @property string $iban
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $accounts
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereIban($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereSwift($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Bank whereUpdatedAt($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property int $parent_id
 * @property bool $type
 * @property bool $position
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoryLocale[] $locales
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $subcategories
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryLocale
 *
 * @property int $category_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryLocale whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryLocale whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryLocale whereName($value)
 */
	class CategoryLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $birthdate
 * @property string $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $bank_accounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Email[] $emails
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phone[] $phones
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client whereUserId($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Consumption
 *
 * @property int $id
 * @property int $production_id
 * @property int $item_quantity_id
 * @property int $quantity
 * @property-read \App\Models\Production $production
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Consumption whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Consumption whereItemQuantityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Consumption whereProductionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Consumption whereQuantity($value)
 */
	class Consumption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id
 * @property float $value
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CurrencyLocale[] $locales
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereValue($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CurrencyLocale
 *
 * @property int $currency_id
 * @property string $locale
 * @property string $name
 * @property string $symbol
 * @property bool $suffix
 * @property-read \App\Models\Currency $currency
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CurrencyLocale whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CurrencyLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CurrencyLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CurrencyLocale whereSuffix($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CurrencyLocale whereSymbol($value)
 */
	class CurrencyLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Delivery
 *
 * @property int $id
 * @property int $distributor_id
 * @property int $order_id
 * @property \Carbon\Carbon $delivered_at
 * @property \Carbon\Carbon $created_at
 * @property-read \App\Models\User $distributor
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Delivery whereDeliveredAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Delivery whereDistributorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Delivery whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Delivery whereOrderId($value)
 */
	class Delivery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Device
 *
 * @property int $id
 * @property int $user_id
 * @property string $notification_token
 * @property string $api_token
 * @property string $last_ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereApiToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereLastIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereNotificationToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device whereUserId($value)
 */
	class Device extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Email
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Email whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Email whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Email whereUserId($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $category_id
 * @property float $price
 * @property int $quantity
 * @property int $quantity_unit_id
 * @property bool $has_options
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemAttribute[] $item_attributes
 * @property-read \App\Models\ItemOption $item_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemQuantity[] $item_quantities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseLine[] $purchase_lines
 * @property-read \App\Models\QuantityUnit $quantity_unit
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereHasOptions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereQuantityUnitId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item whereUpdatedAt($value)
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemAttribute
 *
 * @property int $item_id
 * @property int $attribute_id
 * @property string $locale
 * @property bool $sort
 * @property string $value
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Item $item
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemAttribute whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemAttribute whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemAttribute whereSort($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemAttribute whereValue($value)
 */
	class ItemAttribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemLocale
 *
 * @property int $item_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property-read \App\Models\Item $item
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemLocale whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemLocale whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemLocale whereName($value)
 */
	class ItemLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemOption
 *
 * @property int $item_id
 * @property int $option_id
 * @property bool $sort
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\Option $option
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemOption whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemOption whereOptionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemOption whereSort($value)
 */
	class ItemOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemQuantity
 *
 * @property int $id
 * @property int $item_id
 * @property string $option_ids
 * @property string $option_value_ids
 * @property string $hash
 * @property int $quantity
 * @property-read \App\Models\Item $item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseLine[] $purchase_lines
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereOptionIds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereOptionValueIds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ItemQuantity whereQuantity($value)
 */
	class ItemQuantity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Leave
 *
 * @property int $id
 * @property int $user_id
 * @property \Carbon\Carbon $from
 * @property \Carbon\Carbon $to
 * @property bool $approved
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereApproved($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Leave whereUserId($value)
 */
	class Leave extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property int $parent_id
 * @property bool $type
 * @property float $latitude
 * @property float $longitude
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LocationLocale[] $locales
 * @property-read \App\Models\Location $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $sub_locations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereLatitude($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereLongitude($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereType($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LocationLocale
 *
 * @property int $location_id
 * @property string $locale
 * @property string $name
 * @property-read \App\Models\Location $location
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LocationLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LocationLocale whereLocationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LocationLocale whereName($value)
 */
	class LocationLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Option
 *
 * @property int $id
 * @property bool $multivalue
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemOption[] $item_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValue[] $option_values
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductOption[] $product_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Option whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Option whereMultivalue($value)
 */
	class Option extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionLocale
 *
 * @property int $option_id
 * @property string $locale
 * @property string $name
 * @property-read \App\Models\Option $option
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionLocale whereOptionId($value)
 */
	class OptionLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValueLocale[] $locales
 * @property-read \App\Models\Option $option
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionValue whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionValue whereOptionId($value)
 */
	class OptionValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionValueLocale
 *
 * @property int $option_value_id
 * @property string $locale
 * @property string $value
 * @property-read \App\Models\OptionValue $option_value
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionValueLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionValueLocale whereOptionValueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OptionValueLocale whereValue($value)
 */
	class OptionValueLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $client_id
 * @property int $address_id
 * @property int $managed_by
 * @property int $order_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $distributors
 * @property-read \App\Models\User $handler
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $order_lines
 * @property-read \App\Models\OrderStatus $order_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderWarranty[] $order_warranties
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereAddressId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereManagedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderLine
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_quantity_id
 * @property int $quantity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CustomWarranty[] $custom_warranties
 * @property-read \App\Models\Order $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderWarranty[] $order_warranties
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductQuantity $product_quantity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Warranty[] $warranties
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderLine whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderLine whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderLine whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderLine whereProductQuantityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderLine whereQuantity($value)
 */
	class OrderLine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderStatus
 *
 * @property int $id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderStatusLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderStatus whereId($value)
 */
	class OrderStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderStatusLocale
 *
 * @property int $order_status_id
 * @property string $locale
 * @property string $name
 * @property-read \App\Models\OrderStatus $order_status
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderStatusLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderStatusLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderStatusLocale whereOrderStatusId($value)
 */
	class OrderStatusLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderWarranty
 *
 * @property int $order_line_id
 * @property int $warranty_id
 * @property \Carbon\Carbon $expires_at
 * @property-read \App\Models\OrderLine $order_line
 * @property-read \App\Models\Warranty $warranty
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderWarranty whereExpiresAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderWarranty whereOrderLineId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\OrderWarranty whereWarrantyId($value)
 */
	class OrderWarranty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payroll
 *
 * @property int $user_id
 * @property bool $on_bank
 * @property float $amount
 * @property string $duration
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PayrollPayment[] $payroll_payments
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payroll whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payroll whereDuration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payroll whereOnBank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payroll whereUserId($value)
 */
	class Payroll extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PayrollPayment
 *
 * @property int $id
 * @property int $payroll_id
 * @property float $incentive
 * @property float $deduction
 * @property bool $status
 * @property \Carbon\Carbon $due_date
 * @property-read \App\Models\Payroll $payroll
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment whereDeduction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment whereDueDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment whereIncentive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment wherePayrollId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PayrollPayment whereStatus($value)
 */
	class PayrollPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property float $price
 * @property int $quantity
 * @property int $quantity_unit_id
 * @property bool $has_options
 * @property bool $is_service
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $order_lines
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $producers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductAttribute[] $product_attributes
 * @property-read \App\Models\ProductOption $product_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductQuantity[] $product_quantities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Production[] $productions
 * @property-read \App\Models\QuantityUnit $quantity_unit
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read \App\Models\Service $service
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Warranty[] $warranties
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereHasOptions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereIsService($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereQuantityUnitId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductAttribute
 *
 * @property int $product_id
 * @property int $attribute_id
 * @property string $locale
 * @property bool $sort
 * @property string $value
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductAttribute whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductAttribute whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductAttribute whereSort($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductAttribute whereValue($value)
 */
	class ProductAttribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Production
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Consumption[] $consumptions
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Production whereUserId($value)
 */
	class Production extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductLocale
 *
 * @property int $product_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductLocale whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductLocale whereProductId($value)
 */
	class ProductLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductOption
 *
 * @property int $product_id
 * @property int $option_id
 * @property bool $sort
 * @property-read \App\Models\Option $option
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductOption whereOptionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductOption whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductOption whereSort($value)
 */
	class ProductOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductQuantity
 *
 * @property int $id
 * @property int $product_id
 * @property string $option_ids
 * @property string $option_value_ids
 * @property string $hash
 * @property int $quantity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $order_lines
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereOptionIds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereOptionValueIds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProductQuantity whereQuantity($value)
 */
	class ProductQuantity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $managed_by
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $manager
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseLine[] $purchase_lines
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereManagedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereSupplierId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Purchase whereUpdatedAt($value)
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchaseLine
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $item_id
 * @property int $item_quantity_id
 * @property int $quantity
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\ItemQuantity $item_quantity
 * @property-read \App\Models\Purchase $purchase
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PurchaseLine whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PurchaseLine whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PurchaseLine whereItemQuantityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PurchaseLine wherePurchaseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PurchaseLine whereQuantity($value)
 */
	class PurchaseLine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuantityUnit
 *
 * @property int $id
 * @property int $parent_id
 * @property float $value
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuantityUnitLocale[] $locales
 * @property-read \App\Models\QuantityUnit $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuantityUnit[] $sub_units
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnit whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnit whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnit whereValue($value)
 */
	class QuantityUnit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuantityUnitLocale
 *
 * @property int $quantity_unit_id
 * @property string $locale
 * @property string $name
 * @property string $symbol
 * @property bool $suffix
 * @property-read \App\Models\QuantityUnit $quantity_unit
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnitLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnitLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnitLocale whereQuantityUnitId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnitLocale whereSuffix($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\QuantityUnitLocale whereSymbol($value)
 */
	class QuantityUnitLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property bool $rating
 * @property string $message
 * @property bool $approved
 * @property \Carbon\Carbon $created_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereApproved($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereRating($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RoleLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereSlug($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleLocale
 *
 * @property int $role_id
 * @property string $locale
 * @property string $name
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RoleLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RoleLocale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\RoleLocale whereRoleId($value)
 */
	class RoleLocale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $product_id
 * @property int $duration_value
 * @property string $duration_unit
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Service whereDurationUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Service whereDurationValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Service whereProductId($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $bank_accounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SupplierContact[] $supplier_contacts
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Supplier whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Supplier whereName($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SupplierContact
 *
 * @property int $id
 * @property int $supplier_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SupplierContact whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SupplierContact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SupplierContact whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SupplierContact wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SupplierContact whereSupplierId($value)
 */
	class SupplierContact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $bank_accounts
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Device[] $devices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $dispatched_orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Email[] $emails
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Leave[] $leaves
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $managed_purchases
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read \App\Models\Payroll $payroll
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PayrollPayment[] $payroll_payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phone[] $phones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $production_products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Production[] $productions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Warranty
 *
 * @property int $id
 * @property int $product_id
 * @property int $duration_value
 * @property string $duration_unit
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WarrantyLocale[] $locales
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $order_lines
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderWarranty[] $order_warranties
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warranty whereDurationUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warranty whereDurationValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warranty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Warranty whereProductId($value)
 */
	class Warranty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WarrantyLocale
 *
 * @property int $warranty_id
 * @property string $locale
 * @property string $description
 * @property-read \App\Models\Warranty $warranty
 * @method static \Illuminate\Database\Query\Builder|\App\Models\WarrantyLocale whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\WarrantyLocale whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\WarrantyLocale whereWarrantyId($value)
 */
	class WarrantyLocale extends \Eloquent {}
}

