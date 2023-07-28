import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Observable } from 'rxjs';
import { ProductService } from 'src/app/menu/product.service';
import { ProductInCart } from 'src/models/ProductInCart';

@Component({
  selector: 'app-shopping-cart-item',
  templateUrl: './shopping-cart-item.component.html',
  styleUrls: ['./shopping-cart-item.component.scss']
})
export class ShoppingCartItemComponent implements OnInit {

  @Input() cartItem: ProductInCart;
  @Output() itemRemoved = new EventEmitter<ProductInCart>();
  constructor(private productService: ProductService) { }

  ngOnInit(): void {
  }

  removeItemFromCart(){
    this.productService.removeFromCart(this.cartItem);
    this.itemRemoved.emit(this.cartItem);
  }

}
