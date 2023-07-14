import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import {
  MatSnackBar,
} from '@angular/material/snack-bar';
import { Store } from '@ngrx/store';
import * as fromActions from '../../../store/actions';

@Component({
  selector: 'app-product-display',
  templateUrl: './product-display.component.html',
  styleUrls: ['./product-display.component.scss']
})
export class ProductDisplayComponent implements OnInit {

  @Input() public product: any;
  @Output() onAddToCart: EventEmitter<string> = new EventEmitter<string>();

  constructor(private _snackBar: MatSnackBar, private store: Store) { }

  ngOnInit(): void {
  }

  addToTheCart() {
    this.store.dispatch(fromActions.addProductToTheCart({ product: this.product }));
    this._snackBar.open(this.product.name + ' added to the cart', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

  addToFavouriteList() {
    this.store.dispatch(fromActions.addProductToTheFavouriteList({ product: this.product }));
    this._snackBar.open(this.product.name + ' added to favourite list.', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

}
