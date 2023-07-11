import { Component, Input, OnInit } from '@angular/core';
import {
  MatSnackBar,
} from '@angular/material/snack-bar';

@Component({
  selector: 'app-product-display',
  templateUrl: './product-display.component.html',
  styleUrls: ['./product-display.component.scss']
})
export class ProductDisplayComponent implements OnInit {

  @Input() public product: any;

  constructor(private _snackBar: MatSnackBar) { }

  ngOnInit(): void {
  }

  addToTheCart() {
    this._snackBar.open(this.product.name + ' added to the cart', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

  addToFavouriteList() {
    this._snackBar.open(this.product.name + ' added to favourite list.', 'Close', {
      horizontalPosition: 'end',
      verticalPosition: 'bottom',
    });
  }

}
