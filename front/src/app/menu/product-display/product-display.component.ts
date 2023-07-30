import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Product } from 'src/models/Product';
import { ProductService } from '../product.service';

@Component({
  selector: 'app-product-display',
  templateUrl: './product-display.component.html',
  styleUrls: ['./product-display.component.scss'],
})
export class ProductDisplayComponent implements OnInit {
  @Input() public product: Product | undefined;
  @Output() onAddToCart: EventEmitter<string> = new EventEmitter<string>();

  constructor(
    private _snackBar: MatSnackBar,
    private productService: ProductService
  ) {}

  ngOnInit(): void {}

  addToTheCart() {
    this.productService.addToCart(this.product);
    // this.store.dispatch(
    //   fromActions.addProductToTheCart({ product: this.product })
    // );
    this._snackBar.open(this.product?.name + ' added to the cart', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

  disabled() {
    this._snackBar.open(this.product?.name + ' not available', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

  addToFavouriteList() {
    // this.store.dispatch(
    //   fromActions.addProductToTheFavouriteList({ product: this.product })
    // );
    this._snackBar.open(
      this.product?.name + ' added to favourite list.',
      'Close',
      {
        horizontalPosition: 'end',
        verticalPosition: 'bottom',
      }
    );
  }
}
