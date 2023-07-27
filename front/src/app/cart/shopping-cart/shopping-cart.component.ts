import { Component, OnInit } from '@angular/core';
import { ProductService } from 'src/app/menu/product-service.service';
import { Product } from 'src/models/Product';
import { ProductInCart } from 'src/models/ProductInCart';

@Component({
  selector: 'app-shopping-cart',
  templateUrl: './shopping-cart.component.html',
  styleUrls: ['./shopping-cart.component.scss'],
})
export class ShoppingCartComponent implements OnInit {
  shoppingCartItems: ProductInCart[];

  constructor(private productService: ProductService) {
    this.shoppingCartItems = productService.getCart();
  }

  ngOnInit(): void {}

  updateCart() {
    this.shoppingCartItems = this.productService.getCart();
  }
}
