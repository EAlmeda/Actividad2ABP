import { Component, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import * as fromActions from '../../../store/actions';

@Component({
  selector: 'app-shopping-cart',
  templateUrl: './shopping-cart.component.html',
  styleUrls: ['./shopping-cart.component.scss'],
})
export class ShoppingCartComponent implements OnInit {
  shoppingCartItems: any[] = [
    {
      name: 'Gyozas de pollo',
      amount: 12,
      price: 12,
    },
  ];

  constructor(private readonly store: Store) {}

  ngOnInit(): void {}

  public removeAllItems() {
    this.store.dispatch(fromActions.removeAllItemsFromCart());
  }

  public saveOrder() {
    // this.store.dispatch(
    //   fromActions.addOnlineOrder({ order:  })
    // );
  }
}
