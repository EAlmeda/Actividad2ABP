import { Component, OnInit } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ProductService } from 'src/app/menu/product.service';
import { OnlineOrderService } from 'src/app/orders/online-order.service';
import { OrderStatus, OrderType } from 'src/models/OnlineOrder';
import { Product } from 'src/models/Product';
import { ProductInCart } from 'src/models/ProductInCart';

@Component({
  selector: 'app-shopping-cart',
  templateUrl: './shopping-cart.component.html',
  styleUrls: ['./shopping-cart.component.scss'],
})
export class ShoppingCartComponent implements OnInit {
  shoppingCartItems: ProductInCart[];
  total: number;

  constructor(
    private _snackBar: MatSnackBar,
    private productService: ProductService,
    private onlineOrderService: OnlineOrderService
  ) {
    this.shoppingCartItems = productService.getCart();
    this.total = this.calculateAmount();
  }

  ngOnInit(): void {}

  updateCart() {
    this.shoppingCartItems = this.productService.getCart();
    this.total = this.calculateAmount();
  }

  finishOrder() {
    this.onlineOrderService
      .saveOnlineOrder({
        address: 'Avenida Rodriguez',
        amount: this.total,
        date: new Date(),
        products: this.shoppingCartItems,
        status: OrderStatus[0],
        type: OrderType[1],
        expectedDate: new Date(),
        customerId: '7',
      })
      .subscribe(
        (result) => {
          this._snackBar.open('Online order ordered', 'Close', {
            horizontalPosition: 'end',
            verticalPosition: 'bottom',
          });
          this.productService.emptyCart();
          this.shoppingCartItems = [];
          this.total = this.calculateAmount();
        },
        (error) => {
          this._snackBar.open('An error has occured', 'Close', {
            horizontalPosition: 'end',
            verticalPosition: 'bottom',
          });
        }
      );
  }

  calculateAmount() {
    var total = 0;
    this.shoppingCartItems.forEach((element) => {
      total += element.price * element.quantity;
    });
    return total;
  }
}
