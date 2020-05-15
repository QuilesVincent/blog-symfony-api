<?php


namespace App\Tests\CoursPHPUnit;


use App\CoursPHPUnit\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package App\Tests\CoursPHPUnit
 */
class ProductTest extends TestCase
{

    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testComputeTVAFoodProductWithFewsNumber($price, $expectedTva)
    {
        $product = new Product("produit", Product::FOOD_PRODUCT, $price);

        $this->assertSame($expectedTva, $product->computeTVA());

    }

    /**
     * @return array[]
     */
    public function pricesForFoodProduct()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }

    /**
     *
     */
    public function testcomputeTVAFoodProduct()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);

        $this->assertSame(1.1, $product->computeTVA());
    }

    /**
     *
     */
    public function testComputeTVAOtherProduct()
    {
        $product = new Product("autre produit", "pharmacie", 20);

        $this->assertSame(3.92, $product->computeTVA());
    }

    /**
     *
     */
    public function testNegativePrice()
    {
        $product = new Product("troisieme produit", "food", -20);

        $this->expectException("LogicException");

        $product->computeTVA();
    }

}