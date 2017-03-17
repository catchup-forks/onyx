<?php namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\QuantityUnit;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ItemQuantityTest extends TestCase{
	use DatabaseTransactions;

	/**
	 * Running tests internally to wrap the database transaction reset over all the test case.
	 */
	public function testRun(){
		$this->itemOptionsHashCreation();
		$this->itemOptionsHashUpdate();
	}

	/**
	 * Testing unique hash creation of options and values of an item quantity assignment.
	 */
	public function itemOptionsHashCreation(){
		$category = Category::create([
			'type' => 0,
			'position' => 1
		]);

		$quantityUnit = QuantityUnit::create([
			'value' => 1.0
		]);

		$item = Item::create([
			'category_id' => $category->id,
			'price' => 10.0,
			'quantity' => 10,
			'quantity_unit_id' => $quantityUnit->id,
			'has_options' => false
		]);

		$itemQuantity = ItemQuantity::create([
			'item_id' => $item->id,
			'option_ids' => '[1, 2, 3]',
			'option_value_ids' => '[3, 2, 1]',
			'quantity' => 5
		]);

		$key = str_replace('base64:', '', env('APP_KEY'));
		$this->assertEquals(hash_hmac('sha256', $itemQuantity->item_id.$itemQuantity->option_ids.$itemQuantity->option_value_ids, $key), $itemQuantity->hash);
	}

	/**
	 * Testing unique hash update of options and values of an item quantity assignment.
	 */
	public function itemOptionsHashUpdate(){
		$itemQuantity = ItemQuantity::take(1)->get()->first();
		$oldHash = $itemQuantity->hash;
		$itemQuantity->update([
			'option_ids' => '[a, b, c]',
			'option_value_ids' => '[z, y, x]'
		]);

		$key = str_replace('base64:', '', env('APP_KEY'));
		$this->assertNotEquals($oldHash, $itemQuantity->hash);
		$this->assertEquals(hash_hmac('sha256', $itemQuantity->item_id.$itemQuantity->option_ids.$itemQuantity->option_value_ids, $key), $itemQuantity->hash);
	}
}