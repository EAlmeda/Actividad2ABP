import { Component, Input, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import * as fromActions from '../../../store/actions';

@Component({
  selector: 'app-shopping-cart-item',
  templateUrl: './shopping-cart-item.component.html',
  styleUrls: ['./shopping-cart-item.component.scss'],
})
export class ShoppingCartItemComponent implements OnInit {
  @Input() cartItem: any;

  constructor(private readonly store: Store) {}

  ngOnInit(): void {}

  public removeItemFromTheCart() {
    this.store.dispatch(
      fromActions.removeItemFromCart({ productId: this.cartItem.id })
    );
  }
}
