<?php

namespace App\Core\Models\CartDetails;

use App\Core\Models\Cart\Cart;
use App\Core\Models\Cart\CartId;
use App\Core\Models\Product\ProductId;
use App\Core\Models\User\UserId;

class CartDetails
{
    private CartDetailsId $cart_details_id;
    private CartId $cartId;
    private UserId $user_id;
    private ProductId $product_id;
    private int $quantity;
    private int $price;
    private string $name;
    private int $stock;

    public function __construct(
        CartDetailsId $cart_details_id,
        CartId $cartId,
        UserId $user_id,
        ProductId $product_id,
        int $quantity,
        int $price,
        string $name,
        int $stock
    ) {
        $this->cart_details_id = $cart_details_id;
        $this->cartId = $cartId;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->name = $name;
        $this->stock = $stock;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @return CartDetailsId
     */
    public function getCartDetailsId(): CartDetailsId
    {
        return $this->cart_details_id;
    }

    /**
     * @param CartDetailsId $cart_details_id
     */
    public function setCartDetailsId(CartDetailsId $cart_details_id): void
    {
        $this->cart_details_id = $cart_details_id;
    }

    /**
     * @return Cart
     */
    public function getCartId(): CartId
    {
        return $this->cartId;
    }

    /**
     * @param CartId $cart_id
     */
    public function setCartId(CartId $cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @param UserId $user_id
     */
    public function setUserId(UserId $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return ProductId
     */
    public function getProductId(): ProductId
    {
        return $this->product_id;
    }

    /**
     * @param ProductId $product_id
     */
    public function setProductId(ProductId $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}
